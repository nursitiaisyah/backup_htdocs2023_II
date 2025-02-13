<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('user_m');
        $this->load->model('outlet_m');
        if ($this->session->userdata('role') == 'kasir'){
            echo "Error";
            die;
       }
    }

    public function index()
    {
        $data['judul'] = "Data User";
        $data['user'] = $this->user_m->get_user();

        $this->load->view('template/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function tambah()
    {
        $valid = $this->form_validation;

        $valid->set_rules('id_user', 'id_user', 'required');
        if ($valid->run()) {
            $this->user_m->insert($this->input->post());
            $this->session->set_flashdata('message', 'Berhasil Ditambahkan');
            redirect('user', 'refresh');
        }

        $data['judul'] = "Tambah Data";
        $data['user'] = $this->user_m->get_user();
        $data['outlet'] = $this->outlet_m->get_outlet();

        $this->load->view('template/header', $data);
        $this->load->view('user/tambah', $data);
        $this->load->view('template/footer', $data);
    }
    public function ubah($id)
    {
        $valid = $this->form_validation;

        $valid->set_rules('id_user', 'id_user', 'required');

        if ($valid->run()) {
            $this->user_m->update($this->input->post());
            $this->session->set_flashdata('message', 'Berhasil diUbah');
            redirect('user', 'refresh');
        }

        $data['judul'] = "Ubah Data";
        $data['user'] = $this->user_m->get_user($id);
        $data['outlet'] = $this->outlet_m->get_outlet();

        $this->load->view('template/header', $data);
        $this->load->view('user/ubah', $data);
        $this->load->view('template/footer', $data);
    }
    public function hapus($id)
    {
        $this->db->delete('tb_user', ['id_user' => $id]);
        $this->session->set_flashdata('message', 'Berhasil DiHapus');
        redirect('user', 'refresh');
    }
}
