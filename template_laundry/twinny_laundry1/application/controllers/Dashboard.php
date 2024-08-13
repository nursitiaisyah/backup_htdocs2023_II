<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('transaksi_m');
         $this->load->model('member_m');
    }

    public function index()
    {
        $data['judul'] = "Dashboard";

        $data['pesanan_baru'] = $this->transaksi_m->pesanan_baru();
        $data['pesanan_proses'] = $this->transaksi_m->pesanan_proses();
          $data['pesanan_selesai'] = $this->transaksi_m->pesanan_selesai();
           $data['jumlah_member'] = $this->member_m->jumlah_member();

        $this->load->view('template/header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer', $data);
    }
}
