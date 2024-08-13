<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    public function get_user($id = '')
    {
        if ($id == '') {
            $this->db->select('*, tb_outlet.nama as nama_outlet, tb_user.nama as nama_user');
            $this->db->join('tb_outlet', 'id_outlet', 'left');
            return $this->db->get('tb_user')->result_array();
        } else {
            return $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
        }
    }

    public function insert($post)
    {
        $this->db->insert('tb_user', [
            'id_user' => $post['id_user'],
            'nama' => $post['nama'],
            'username' => $post['username'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'id_outlet' => $post['id_outlet'],
            'role' => $post['role']
        ]);
    }

    public function update($post)
    {
        $data = [
            'nama' => $post['nama'],
            'username' => $post['username'],
            'id_outlet' => $post['id_outlet'],
            'role' => $post['role']
        ];

        if ($post['password'] != '') {
            $data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
        }
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('tb_user', $data);
    }
}
