<?php
class Api extends CI_Controller{
    function laporan(){
        $data = $this->db->select('md5(l.id) _id, l.lokasi, l.akseptor, l.nama_bull, l.kode_bull, l.kode_batch, l.sexing, l.tgl_pkb, l.tgl_kelahiran, l.bunting, l.tidak_bunting, l.jantan, l.betina, l.date, l.keterangan, u.nama petugas, p.nama peternak')
                        ->from('laporan l')
                        ->join('user u', 'l.user_id = u.id')
                        ->join('peternak p', 'l.peternak_id = p.id')
                        ->get()->result();

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}