<?php
class Webview extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('role') == 2){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
        $var = [
            'title' => 'Sistem Pelaporan Inseminasi Buatan BBIB Singosari ',
            'pages' => 'Dashboard'
        ];
        $this->load->view('webview', $var);
    }
}