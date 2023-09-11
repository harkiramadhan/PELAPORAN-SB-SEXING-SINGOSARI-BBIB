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
            'title' => 'User - PELAPORAN SB SEXING SINGOSARI BBIB',
            'pages' => 'User',
            'user' => $this->db->get('user')
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/user', $var);
        $this->load->view('admin/layout/footer', $var);
    }
}