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
            'title' => 'Pelaporan - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Pelaporan',
            'laporan' => $this->db->select('l.*, u.username, u.nama, p.peternak')
                                ->from('laporan l')
                                ->join('user u', 'l.user_id = u.id')
                                ->join('peternak p', 'l.peternak_id = p.id')
                                ->get()
        ];

        $this->load->view('petugas/layout/header', $var);
        $this->load->view('petugas/pelaporan', $var);
        $this->load->view('petugas/layout/footer', $var);
    }

    function tambah(){
        $var = [
            'title' => 'Tambah Laporan - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Tambah Laporan'
        ];

        $this->load->view('petugas/layout/header', $var);
        $this->load->view('admin/pelaporan-tambah', $var);
        $this->load->view('petugas/layout/footer', $var);
    }

}