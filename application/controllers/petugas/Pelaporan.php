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
        ($this->input->get('m', TRUE)) ? $this->db->where('MONTH(l.date)', $this->input->get('m', TRUE)) : NULL;
        ($this->input->get('y', TRUE)) ? $this->db->where('YEAR(l.date)', $this->input->get('y', TRUE)) : NULL;

        $laporan = $this->db->select('l.*, u.username, u.nama, p.nama peternak')
                            ->select("CONCAT(kab.name , ', ', kec.name, ', ', kel.name) as lokasi")
                            ->from('laporan l')
                            ->join('user u', 'l.user_id = u.id')
                            ->join('peternak p', 'l.peternak_id = p.id')
                            ->join('regencies kab', 'l.kabupaten_id = kab.code', 'LEFT')
                            ->join('districts kec', 'l.kecamatan_id = kec.code', 'LEFT')
                            ->join('villages kel', 'l.kelurahan_id = kel.code', 'LEFT')
                            ->where([
                                'l.user_id' => $this->session->userdata('user_id')
                            ])->get();

        $var = [
            'title' => 'Pelaporan - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Pelaporan',
            'peternak' => $this->db->get('peternak'),
            'laporan' => $laporan
        ];

        $this->load->view('petugas/layout/header', $var);
        $this->load->view('petugas/pelaporan', $var);
        $this->load->view('petugas/layout/footer', $var);
    }

    function tambah(){
        $bull = $this->db->select('b.*, r.rumpun')
                        ->from('bull b')
                        ->join('rumpun r', 'b.id_rumpun = r.id')
                        ->get();
        $var = [
            'title' => 'Tambah Laporan - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Tambah Laporan',
            'peternak' => $this->db->get('peternak'),
            'petugas' => $this->db->get('user'),
            'bull' => $bull,
            'kabupaten' => $this->db->select('*')->from('regencies')->where(['code' => '35.07'])->or_where(['code' => '35.73'])->get()
        ];

        $this->load->view('petugas/layout/header', $var);
        $this->load->view('admin/pelaporan-tambah', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function edit($id){
        $detail = $this->db->select('l.*, u.username, u.nama, p.nama peternak, p.no_anggota')
                            ->select("kab.name as kabupaten_name")
                            ->select("kec.name as kecamatan_name")
                            ->select("kel.name as kelurahan_name")
                            ->from('laporan l')
                            ->join('user u', 'l.user_id = u.id')
                            ->join('peternak p', 'l.peternak_id = p.id')
                            ->join('regencies kab', 'l.kabupaten_id = kab.code', 'LEFT')
                            ->join('districts kec', 'l.kecamatan_id = kec.code', 'LEFT')
                            ->join('villages kel', 'l.kelurahan_id = kel.code', 'LEFT')
                            ->where([
                                'l.id' => $id
                            ])->get()->row();

        $bull = $this->db->select('b.*, r.rumpun')
                        ->from('bull b')
                        ->join('rumpun r', 'b.id_rumpun = r.id')
                        ->get();
        $var = [
            'title' => 'Edit Laporan - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Edit Laporan',
            'peternak' => $this->db->get('peternak'),
            'petugas' => $this->db->get('user'),
            'detail' => $detail,
            'laporan' => $this->db->get_where('laporan', ['id' => $id])->row(),
            'ib' => $this->db->get_where('ib', ['id_laporan' => $id]),
            'bull' => $bull,
            'kabupaten' => $this->db->select('*')->from('regencies')->where(['code' => '35.07'])->or_where(['code' => '35.73'])->get()
        ];

        $this->load->view('petugas/layout/header', $var);
        $this->load->view('admin/pelaporan-edit', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function create(){
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'png|jpg|jpeg';
        $config['encrypt_name']     = TRUE;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            $img = $this->upload->data();
            $filename = $img['file_name'];
        }else{
            $filename = NULL;
        }

        if(is_numeric($this->input->post('peternak_id', TRUE))){
            $peternakid = $this->input->post('peternak_id', TRUE);
            $cekPeternak = $this->db->get_where('peternak', ['id' => $peternakid])->row();
            if($this->input->post('no_anggota', TRUE) != $cekPeternak->no_anggota){
                $this->db->where('id', $peternakid)->update('peternak', [
                    'no_anggota' => $this->input->post('no_anggota', TRUE)
                ]);
            }

            $this->db->insert('laporan', [
                'user_id' => $this->input->post('user_id', TRUE),
                'date' => $this->input->post('date', TRUE),
                'kabupaten_id' => $this->input->post('kabupaten_id', TRUE),
                'kecamatan_id' => $this->input->post('kecamatan_id', TRUE),
                'kelurahan_id' => $this->input->post('kelurahan_id', TRUE),
                'peternak_id' => $this->input->post('peternak_id', TRUE),
                'akseptor' => $this->input->post('akseptor', TRUE),
                'tgl_pkb' => $this->input->post('tgl_pkb', TRUE),
                'bunting' => $this->input->post('bunting', TRUE),
                'tgl_kelahiran' => $this->input->post('tgl_kelahiran', TRUE),
                'kelamin' => $this->input->post('kelamin', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'metode' => $this->input->post('metode', TRUE),
                'img' => $filename
            ]);
        }else{
            $this->db->insert('peternak', [
                'nama' => $this->input->post('peternak_id', TRUE),
                'no_anggota' => $this->input->post('no_anggota', TRUE)
            ]);
            
            if($this->db->affected_rows() > 0){
                $peternakid = $this->db->insert_id();
                $this->db->insert('laporan', [
                    'user_id' => $this->input->post('user_id', TRUE),
                    'date' => $this->input->post('date', TRUE),
                    'kabupaten_id' => $this->input->post('kabupaten_id', TRUE),
                    'kecamatan_id' => $this->input->post('kecamatan_id', TRUE),
                    'kelurahan_id' => $this->input->post('kelurahan_id', TRUE),
                    'peternak_id' => $peternakid,
                    'akseptor' => $this->input->post('akseptor', TRUE),
                    'tgl_pkb' => $this->input->post('tgl_pkb', TRUE),
                    'bunting' => $this->input->post('bunting', TRUE),
                    'tgl_kelahiran' => $this->input->post('tgl_kelahiran', TRUE),
                    'kelamin' => $this->input->post('kelamin', TRUE),
                    'keterangan' => $this->input->post('keterangan', TRUE),
                    'metode' => $this->input->post('metode', TRUE),
                    'img' => $filename
                ]);
            }
        }

        if($this->db->affected_rows() > 0){
            $laporanid = $this->db->insert_id();

            $tglib = $this->input->post('tgl_ib[]', TRUE);
            $bullid = $this->input->post('bull_id[]', TRUE);
            $sexing = $this->input->post('sexing[]', TRUE);
            $kodebatch = $this->input->post('kode_batch[]', TRUE);

            foreach($tglib as $key => $val){
                $this->db->insert('ib', [
                    'id_laporan' => $laporanid,
                    'tgl' => $val,
                    'bull_id' => $bullid[$key],
                    'sexing' => $sexing[$key],
                    'kode_batch' => $kodebatch[$key]
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
        $laporan = $this->db->get_where('laporan', ['id' => $id])->row();

        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'png|jpg|jpeg';
        $config['encrypt_name']     = TRUE;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            if(@$laporan->img){
                @unlink('./uploads/' . @$laporan->img);
            }

            $img = $this->upload->data();
            $filename = $img['file_name'];
        }else{
            $filename = $laporan->img;
        }

        if($this->input->post('tgl_ib[]', TRUE)){
            $this->db->where('id_laporan', $id)->delete('ib');

            $tglib = $this->input->post('tgl_ib[]', TRUE);
            $bullid = $this->input->post('bull_id[]', TRUE);
            $sexing = $this->input->post('sexing[]', TRUE);
            $kodebatch = $this->input->post('kode_batch[]', TRUE);

            foreach($tglib as $key => $val){
                $this->db->insert('ib', [
                    'id_laporan' => $id,
                    'tgl' => $val,
                    'bull_id' => $bullid[$key],
                    'sexing' => $sexing[$key],
                    'kode_batch' => $kodebatch[$key]
                ]);
            }
        }

        $this->db->where('id', $id)->update('laporan', [
            'user_id' => $this->input->post('user_id', TRUE),
            'date' => $this->input->post('date', TRUE),
            'kabupaten_id' => $this->input->post('kabupaten_id', TRUE),
            'kecamatan_id' => $this->input->post('kecamatan_id', TRUE),
            'kelurahan_id' => $this->input->post('kelurahan_id', TRUE),
            'peternak_id' => $this->input->post('peternak_id', TRUE),
            'akseptor' => $this->input->post('akseptor', TRUE),
            'tgl_pkb' => $this->input->post('tgl_pkb', TRUE),
            'bunting' => $this->input->post('bunting', TRUE),
            'tgl_kelahiran' => $this->input->post('tgl_kelahiran', TRUE),
            'kelamin' => $this->input->post('kelamin', TRUE),
            'keterangan' => $this->input->post('keterangan', TRUE),
            'metode' => $this->input->post('metode', TRUE),
            'img' => $filename
        ]);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Laporan Berhasil Di Simpan");
        }else{
            $this->session->set_flashdata('error', "Laporan Gagal Di Simpan");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function remove($id){
        $laporan = $this->db->get_where('laporan', ['id' => $id])->row();
        if(@$laporan->img){
            @unlink('./uploads/' . @$laporan->img);
        }

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