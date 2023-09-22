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
            'pages' => 'Dashboard',
            'laporan' => $this->db->select('id')->get_where('laporan', ['user_id' => $this->session->userdata('user_id')])->num_rows()
        ];

        $this->load->view('petugas/layout/header', $var);
        $this->load->view('petugas/dashboard', $var);
        $this->load->view('petugas/layout/footer', $var);
    }
}