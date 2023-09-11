<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('role') == 2){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
        $var = [
            'title' => 'Dashboard Petugas - PELAPORAN SB SEXING SINGOSARI BBIB',
            'pages' => 'Dashboard'
        ];

        $this->load->view('layout/header', $var);
        $this->load->view('dashboard', $var);
        $this->load->view('layout/footer', $var);
    }
}