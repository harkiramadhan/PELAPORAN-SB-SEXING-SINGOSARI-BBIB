<?php
class Pelaporan extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('role') == 1){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
        $var = [
            'title' => 'Pelaporan - PELAPORAN SB SEXING SINGOSARI BBIB',
            'pages' => 'Pelaporan'
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/pelaporan', $var);
        $this->load->view('admin/layout/footer', $var);
    }
}