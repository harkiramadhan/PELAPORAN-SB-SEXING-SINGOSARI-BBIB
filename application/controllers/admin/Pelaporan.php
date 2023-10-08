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
        ($this->input->get('date', TRUE)) ? $this->db->where('l.date', $this->input->get('date', TRUE)) : NULL;
        ($this->input->get('pt', TRUE)) ? $this->db->where('l.peternak_id', $this->input->get('pt', TRUE)) : NULL;
        ($this->input->get('pg', TRUE)) ? $this->db->where('l.user_id', $this->input->get('pg', TRUE)) : NULL;


        $laporan = $this->db->select('l.*, u.username, u.nama, p.nama peternak, b.bull nama_bull, b.kode kode_bull')
                                ->from('laporan l')
                                ->join('user u', 'l.user_id = u.id')
                                ->join('peternak p', 'l.peternak_id = p.id')
                                ->join('bull b', 'l.bull_id = b.id', 'LEFT')
                                ->get();
        $var = [
            'title' => 'Pelaporan - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Pelaporan',
            'laporan' => $laporan
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/pelaporan', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function tambah(){
        $var = [
            'title' => 'Tambah Laporan - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Tambah Laporan',
            'peternak' => $this->db->get('peternak'),
            'petugas' => $this->db->get('user'),
            'bull' => $this->db->get('bull')
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/pelaporan-tambah', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function edit($id){
        $var = [
            'title' => 'Edit Laporan - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Edit Laporan',
            'peternak' => $this->db->get('peternak'),
            'petugas' => $this->db->get('user'),
            'laporan' => $this->db->get_where('laporan', ['id' => $id])->row(),
            'ib' => $this->db->get_where('ib', ['id_laporan' => $id]),
            'bull' => $this->db->get('bull')
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/pelaporan-edit', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function create(){
        $this->db->insert('laporan', [
            'user_id' => $this->input->post('user_id', TRUE),
            'date' => $this->input->post('date', TRUE),
            'lokasi' => $this->input->post('lokasi', TRUE),
            'peternak_id' => $this->input->post('peternak_id', TRUE),
            'akseptor' => $this->input->post('akseptor', TRUE),
            'bull_id' => $this->input->post('bull_id', TRUE),
            'kode_batch' => $this->input->post('kode_batch', TRUE),
            'sexing' => $this->input->post('sexing', TRUE),
            'tgl_pkb' => $this->input->post('tgl_pkb', TRUE),
            'bunting' => $this->input->post('bunting', TRUE),
            'tgl_kelahiran' => $this->input->post('tgl_kelahiran', TRUE),
            'kelamin' => $this->input->post('kelamin', TRUE),
            'keterangan' => $this->input->post('keterangan', TRUE)
        ]);
        if($this->db->affected_rows() > 0){
            $laporanid = $this->db->insert_id();
            foreach($this->input->post('tgl_ib[]', TRUE) as $d){
                $this->db->insert('ib', [
                    'id_laporan' => $laporanid,
                    'tgl' => $d
                ]);
            }

            $this->session->set_flashdata('sukses', "Laporan Berhasil Di Tambahkan");
            redirect('admin/pelaporan');
        }else{
            $this->session->set_flashdata('error', "Laporan Gagal Di Tambahkan");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function update($id){
        if($this->input->post('tgl_ib[]', TRUE)){
            $this->db->where('id_laporan', $id)->delete('ib');
            foreach($this->input->post('tgl_ib[]', TRUE) as $d){
                $this->db->insert('ib', [
                    'id_laporan' => $id,
                    'tgl' => $d
                ]);
            }
        }

        $this->db->where('id', $id)->update('laporan', [
            'user_id' => $this->input->post('user_id', TRUE),
            'date' => $this->input->post('date', TRUE),
            'lokasi' => $this->input->post('lokasi', TRUE),
            'peternak_id' => $this->input->post('peternak_id', TRUE),
            'akseptor' => $this->input->post('akseptor', TRUE),
            'bull_id' => $this->input->post('bull_id', TRUE),
            'kode_batch' => $this->input->post('kode_batch', TRUE),
            'sexing' => $this->input->post('sexing', TRUE),
            'tgl_pkb' => $this->input->post('tgl_pkb', TRUE),
            'bunting' => $this->input->post('bunting', TRUE),
            'tgl_kelahiran' => $this->input->post('tgl_kelahiran', TRUE),
            'kelamin' => $this->input->post('kelamin', TRUE),
            'keterangan' => $this->input->post('keterangan', TRUE)
        ]);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Laporan Berhasil Di Simpan");
        }else{
            $this->session->set_flashdata('error', "Laporan Gagal Di Simpan");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function remove($id){
        $this->db->where('id_laporan', $id)->delete('ib');
        $this->db->where('id', $id)->delete('laporan');
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Laporan Berhasil Di Hapus");
        }else{
            $this->session->set_flashdata('error', "Laporan Gagal Di Hapus");
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}