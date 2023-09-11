<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('role') == 1){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
        $var = [
            'title' => 'Dashboard Admin - PELAPORAN SB SEXING SINGOSARI BBIB',
            'pages' => 'Dashboard'
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/dashboard', $var);
        $this->load->view('admin/layout/footer', $var);
    }
}