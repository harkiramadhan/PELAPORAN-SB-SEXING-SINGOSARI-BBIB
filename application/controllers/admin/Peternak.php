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
            'title' => 'Peternak - PELAPORAN SB SEXING SINGOSARI BBIB',
            'pages' => 'Peternak',
            'peternak' => $this->db->get('peternak')
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/peternak', $var);
        $this->load->view('admin/layout/footer', $var);
    }
}