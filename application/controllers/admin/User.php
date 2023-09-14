<?php
class User extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('role') == 1){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
        $var = [
            'title' => 'Petugas - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Petugas',
            'user' => $this->db->get('user')
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/user', $var);
        $this->load->view('admin/layout/footer', $var);
    }
    
    function tambah(){
        $var = [
            'title' => 'Tambah Petugas - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Tambah Petugas',
            'user' => $this->db->get('user')
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/user-tambah', $var);
        $this->load->view('admin/layout/footer', $var);
    }
}