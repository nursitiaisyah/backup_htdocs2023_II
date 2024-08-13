 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Laporan extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            cek_login();
            $this->load->model('laporan_m');
            $this->load->model('outlet_m');
            $this->load->model('paket_m');
            $this->load->model('member_m');
            if ($this->session->userdata('role') == 'kasir') {
                echo "Error";
                die;
            }
        }

        public function index()
        {
            $dari = $this->input->get('dari');
            $sampai = $this->input->get('sampai');
            $id_paket = $this->input->get('id_paket');
            $id_outlet = $this->input->get('id_outlet');
            $id_member  = $this->input->get('id_member');

            $data['judul'] = "Data Laporan";
            $data['laporan'] = $this->laporan_m->get_laporan($dari, $sampai, $id_paket, $id_outlet, $id_member);
            $data['outlet'] = $this->outlet_m->get_outlet();
            $data['paket'] = $this->paket_m->get_paket();
            $data['member'] = $this->member_m->get_member();

            $this->load->view('template/header', $data);
            $this->load->view('laporan/index', $data);
            $this->load->view('template/footer', $data);
        }

        public function exportToPdf()
        {
            $dari = $this->input->get('dari');
            $sampai = $this->input->get('sampai');
            $id_paket = $this->input->get('id_paket');
            $id_outlet = $this->input->get('id_outlet');
            $id_member  = $this->input->get('id_member');

            $id_transaksi = $this->session->userdata('id_transaksi');
            $data['judul'] = "Cetak Data";
            $data['laporan'] = $this->laporan_m->get_laporan($dari, $sampai, $id_paket, $id_outlet, $id_member);

            $data['paket'] = $this->paket_m->get_paket();
            $data['member'] = $this->member_m->get_member();

            $sroot      = $_SERVER['DOCUMENT_ROOT'];
            include $sroot . "/twinny_laundry1/application/third_party/dompdf/autoload.inc.php";
            $dompdf = new Dompdf\Dompdf();

            $this->load->view('laporan/cetak_laporan', $data);

            $paper_size  = 'A4'; // ukuran kertas
            $orientation = 'landscape'; //tipe format kertas potrait atau landscape
            $html = $this->output->get_output();

            $dompdf->set_paper($paper_size, $orientation);
            // //Convert to PDF
            $dompdf->load_html($html);
            $dompdf->render();
            $dompdf->stream("cetak_pdf-$id_transaksi.pdf", array('Attachment' => 0));
            // // nama file pdf yang di hasilkan
        }
    }
