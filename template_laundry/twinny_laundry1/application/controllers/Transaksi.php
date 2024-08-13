<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('transaksi_m');
        $this->load->model('paket_m');
        $this->load->model('member_m');

        if ($this->session->userdata('role') == 'owner') {
            echo "Error";
            die;
        }
    }

    public function index()
    {
        $data['judul'] = "Data transaksi";
        $data['transaksi'] = $this->transaksi_m->get_transaksi();

        $this->load->view('template/header', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function tambah()
    {
        $valid = $this->form_validation;

        $valid->set_rules('kd_invoice', 'kd_invoice', 'required');
        if ($valid->run()) {
            $this->transaksi_m->insert($this->input->post());
            $this->session->set_flashdata('message', 'Berhasil Ditambahkan');
            redirect('transaksi', 'refresh');
        }

        $data['judul'] = "Tambah Transaksi";
        $data['transaksi'] = $this->transaksi_m->get_transaksi();
        $data['paket'] = $this->paket_m->get_paket();
        $data['member'] = $this->member_m->get_member();

        $this->load->view('template/header', $data);
        $this->load->view('transaksi/tambah', $data);
        $this->load->view('template/footer', $data);
    }
    public function ubah($id)
    {
        $valid = $this->form_validation;

        $valid->set_rules('kd_invoice', 'kd_invoice', 'required');

        if ($valid->run()) {
            $this->transaksi_m->update($this->input->post());
            $this->session->set_flashdata('message', 'Berhasil diUbah');
            redirect('transaksi', 'refresh');
        }

        $data['judul'] = "Ubah Data";
        $data['transaksi'] = $this->transaksi_m->get_transaksi($id);
        $data['paket'] = $this->paket_m->get_paket();
        $data['member'] = $this->member_m->get_member();

        $this->load->view('template/header', $data);
        $this->load->view('transaksi/ubah', $data);
        $this->load->view('template/footer', $data);
    }
    public function hapus($id)
    {
        $this->db->delete('tb_transaksi', ['id_transaksi' => $id]);
        $this->session->set_flashdata('message', 'Berhasil DiHapus');
        redirect('transaksi', 'refresh');
    }

    public function exportToPdf()
    {
        $valid = $this->form_validation;

        $valid->set_rules('kd_invoice', 'kd_invoice', 'required');

        $id_transaksi = $this->session->userdata('id_transaksi');
        $data['judul'] = "Cetak Data";
        $data['transaksi'] = $this->transaksi_m->get_transaksi();
        $data['paket'] = $this->paket_m->get_paket();
        $data['member'] = $this->member_m->get_member();
        

        $sroot      = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/twinny_laundry1/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();

        $this->load->view('transaksi/cetak_pdf', $data);

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
