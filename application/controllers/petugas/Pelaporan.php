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
            'laporan' => $this->db->select('l.*, u.username, u.nama, p.nama peternak')
                                ->from('laporan l')
                                ->join('user u', 'l.user_id = u.id')
                                ->join('peternak p', 'l.peternak_id = p.id')
                                ->where([
                                    'l.user_id' => $this->session->userdata('user_id')
                                ])->get()
        ];

        $this->load->view('petugas/layout/header', $var);
        $this->load->view('petugas/pelaporan', $var);
        $this->load->view('petugas/layout/footer', $var);
    }

    function tambah(){
        $var = [
            'title' => 'Tambah Laporan - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Tambah Laporan',
            'peternak' => $this->db->get('peternak'),
            'petugas' => $this->db->get('user')
        ];

        $this->load->view('petugas/layout/header', $var);
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
            'ib' => $this->db->get_where('ib', ['id_laporan' => $id])
        ];

        $this->load->view('petugas/layout/header', $var);
        $this->load->view('admin/pelaporan-edit', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function create(){
        $this->db->insert('laporan', [
            'user_id' => $this->input->post('user_id', TRUE),
            'lokasi' => $this->input->post('lokasi', TRUE),
            'peternak_id' => $this->input->post('peternak_id', TRUE),
            'akseptor' => $this->input->post('akseptor', TRUE),
            'nama_bull' => $this->input->post('nama_bull', TRUE),
            'kode_bull' => $this->input->post('kode_bull', TRUE),
            'kode_batch' => $this->input->post('kode_batch', TRUE),
            'sexing' => $this->input->post('sexing', TRUE),
            'tgl_pkb' => $this->input->post('tgl_pkb', TRUE),
            'bunting' => $this->input->post('bunting', TRUE),
            'tidak_bunting' => $this->input->post('tidak_bunting', TRUE),
            'tgl_kelahiran' => $this->input->post('tgl_kelahiran', TRUE),
            'jantan' => $this->input->post('jantan', TRUE),
            'betina' => $this->input->post('betina', TRUE),
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
            redirect('petugas/pelaporan');
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
            'lokasi' => $this->input->post('lokasi', TRUE),
            'peternak_id' => $this->input->post('peternak_id', TRUE),
            'akseptor' => $this->input->post('akseptor', TRUE),
            'nama_bull' => $this->input->post('nama_bull', TRUE),
            'kode_bull' => $this->input->post('kode_bull', TRUE),
            'kode_batch' => $this->input->post('kode_batch', TRUE),
            'sexing' => $this->input->post('sexing', TRUE),
            'tgl_pkb' => $this->input->post('tgl_pkb', TRUE),
            'bunting' => $this->input->post('bunting', TRUE),
            'tidak_bunting' => $this->input->post('tidak_bunting', TRUE),
            'tgl_kelahiran' => $this->input->post('tgl_kelahiran', TRUE),
            'jantan' => $this->input->post('jantan', TRUE),
            'betina' => $this->input->post('betina', TRUE),
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