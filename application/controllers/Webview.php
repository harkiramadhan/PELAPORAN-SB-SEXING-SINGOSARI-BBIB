<?php
class Webview extends CI_Controller{
    function __construct(){
        parent::__construct();
    }

    function laporan($_id){
        $data = $this->db->select('l.*, u.nama petugas, p.nama peternak')
                        ->from('laporan l')
                        ->join('user u', 'l.user_id = u.id')
                        ->join('peternak p', 'l.peternak_id = p.id')
                        ->where(['md5(l.id)' => $_id])->get();
        $var = [
            'title' => 'Sistem Pelaporan Inseminasi Buatan BBIB Singosari ',
            'pages' => 'Dashboard',
            'laporan' => $data->row(),
            'ib' => $this->db->get_where('ib', ['md5(id_laporan)' => $_id])
        ];
        $this->load->view('webview', $var);
    }
}