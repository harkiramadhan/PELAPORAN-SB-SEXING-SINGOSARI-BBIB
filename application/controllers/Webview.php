<?php
class Webview extends CI_Controller{
    function __construct(){
        parent::__construct();
    }

    function laporan($_id){
        $data = $this->db->select('l.*, u.nama petugas, p.nama peternak')
                        ->select('b.bull nama_bull, b.kode kode_bull')
                        ->select("CONCAT(kab.name , ', ', kec.name, ', ', kel.name) as lokasi")
                        ->from('laporan l')
                        ->join('user u', 'l.user_id = u.id')
                        ->join('peternak p', 'l.peternak_id = p.id')
                        ->join('bull b', 'l.bull_id = b.id', 'LEFT')
                        ->join('regencies kab', 'l.kabupaten_id = kab.code', 'LEFT')
                        ->join('districts kec', 'l.kecamatan_id = kec.code', 'LEFT')
                        ->join('villages kel', 'l.kelurahan_id = kel.code', 'LEFT')
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