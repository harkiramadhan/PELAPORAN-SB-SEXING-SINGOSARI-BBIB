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
            'title' => 'Dashboard Petugas - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Dashboard Petugas'
        ];

        $this->load->view('petugas/layout/header', $var);
        $this->load->view('petugas/dashboard', $var);
        $this->load->view('petugas/layout/footer', $var);
    }
}