<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Member_m');
        
       
        
    }

    public function index()
    {
        $data['judul'] = "Data member";
        $data['member'] = $this->Member_m->get_member();

        $this->load->view('template/header', $data);
        $this->load->view('member/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function tambah()
    {
        
        $valid = $this->form_validation;

        $valid->set_rules('id_member', 'id_member', 'required');
        if ($valid->run()) {
            $this->Member_m->insert($this->input->post());
            $this->session->set_flashdata('message', 'Berhasil Ditambahkan');
            redirect('member', 'refresh');
        }

        $data['judul'] = "Tambah Data";
        $data['member'] = $this->Member_m->get_member();

        $this->load->view('template/header', $data);
        $this->load->view('member/tambah', $data);
        $this->load->view('template/footer', $data);
    }
    public function ubah($id)
    {
        $valid = $this->form_validation;

        $valid->set_rules('id_member', 'id_member', 'required');

        if ($valid->run()) {
            $this->Member_m->update($this->input->post());
            $this->session->set_flashdata('message', 'Berhasil diUbah');
            redirect('member', 'refresh');
        }

        $data['judul'] = "Ubah Data";
        $data['member'] = $this->Member_m->get_member($id);

        $this->load->view('template/header', $data);
        $this->load->view('member/ubah', $data);
        $this->load->view('template/footer', $data);
    }
    public function hapus($id)
    {
        $this->db->delete('tb_member', ['id_member' => $id]);
        $this->session->set_flashdata('message', 'Berhasil DiHapus');
        redirect('member', 'refresh');
    }
}
