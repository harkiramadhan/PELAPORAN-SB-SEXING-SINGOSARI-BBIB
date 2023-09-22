<?php
class Peternak extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('role') == 1){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
        $var = [
            'title' => 'Peternak - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Peternak',
            'peternak' => $this->db->get('peternak')
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/peternak', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function tambah(){
        $var = [
            'title' => 'Tambah Peternak - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Tambah Peternak'
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/peternak-tambah', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function edit($id){
        $var = [
            'title' => 'Edit Peternak - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Edit Peternak',
            'peternak' => $this->db->get_where('peternak', ['id' => $id])->row()
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/peternak-edit', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function create(){
        $this->db->insert('peternak', [
            'nama' => $this->input->post('nama', TRUE),
            'jenkel' => $this->input->post('jenkel', TRUE),
            'nowa' => $this->input->post('nowa', TRUE),
        ]);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Peternak " . $this->input->post('nama', TRUE) . " Berhasil Di Tambahkan");
            redirect('admin/peternak');
        }else{
            $this->session->set_flashdata('error', "Peternak " . $this->input->post('nama', TRUE) . " Gagal Di Tambahkan");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function update($id){
        $this->db->where('id', $id)->update('peternak', [
            'nama' => $this->input->post('nama', TRUE),
            'jenkel' => $this->input->post('jenkel', TRUE),
            'nowa' => $this->input->post('nowa', TRUE),
        ]);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Peternak " . $this->input->post('nama', TRUE) . " Berhasil Di Simpan");
        }else{
            $this->session->set_flashdata('error', "Peternak " . $this->input->post('nama', TRUE) . " Gagal Di Simpan");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    function remove($id){
        $this->db->where('id', $id)->delete('peternak');
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Peternak Berhasil Di Hapus");
        }else{
            $this->session->set_flashdata('error', "Peternak Gagal Di Hapus");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}