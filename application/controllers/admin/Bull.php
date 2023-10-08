<?php
class Bull extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('role') == 1){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
        $var = [
            'title' => 'Data Bull - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Data Bull',
            'bull' => $this->db->get('bull')
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/bull', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    /* Action HERE */
    function create(){
        $cekKode = $this->db->get_where('bull', ['kode' => $this->input->post('kode', TRUE)]);
        if($cekKode->num_rows() > 0){
            $this->session->set_flashdata('error', "Bull " . $this->input->post('bull', TRUE) . " Gagal Di Tambahkan, Kode Sudah Tersedia");
        }else{
            $this->db->insert('bull', [
                'kode' => $this->input->post('kode', TRUE),
                'bull' => $this->input->post('bull', TRUE)
            ]);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Bull " . $this->input->post('bull', TRUE) . " Berhasil Di Tambahkan");
            }else{
                $this->session->set_flashdata('error', "Bull " . $this->input->post('bull', TRUE) . " Gagal Di Tambahkan");
            }
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function update($id){
        $cekKode = $this->db->get_where('bull', ['kode' => $this->input->post('kode', TRUE), 'id !=' => $id]);
        if($cekKode->num_rows() > 0){
            $this->session->set_flashdata('error', "Bull " . $this->input->post('bull', TRUE) . " Gagal Di Simpan, Kode Sudah Tersedia");
        }else{
            $this->db->where('id', $id)->update('bull', [
                'kode' => $this->input->post('kode', TRUE),
                'bull' => $this->input->post('bull', TRUE)
            ]);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Bull " . $this->input->post('bull', TRUE) . " Berhasil Di Simpan");
            }else{
                $this->session->set_flashdata('error', "Bull " . $this->input->post('bull', TRUE) . " Gagal Di Simpan");
            }
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function remove($id){
        $this->db->where('id', $id)->delete('bull');
        ($this->db->affected_rows() > 0) ? 
            $this->session->set_flashdata('sukses', "Bull Berhasil Di Hapus") 
            : $this->session->set_flashdata('error', "Bull Gagal Di Hapus");
        redirect($_SERVER['HTTP_REFERER']);
    }
}