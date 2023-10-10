<?php
class Rumpun extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('role') == 1){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
        $var = [
            'title' => 'Data Rumpun - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Data Rumpun',
            'rumpun' => $this->db->get('rumpun')
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/rumpun', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    /* Action HERE */
    function create(){
        $this->db->insert('rumpun', [
            'rumpun' => $this->input->post('rumpun', TRUE)
        ]);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Rumpun " . $this->input->post('rumpun', TRUE) . " Berhasil Di Tambahkan");
        }else{
            $this->session->set_flashdata('error', "Rumpun " . $this->input->post('rumpun', TRUE) . " Gagal Di Tambahkan");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function update($id){
        $this->db->where('id', $id)->update('rumpun', [
            'rumpun' => $this->input->post('rumpun', TRUE)
        ]);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Rumpun " . $this->input->post('rumpun', TRUE) . " Berhasil Di Simpan");
        }else{
            $this->session->set_flashdata('error', "Rumpun " . $this->input->post('rumpun', TRUE) . " Gagal Di Simpan");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function remove($id){
        $this->db->where('id', $id)->delete('rumpun');
        ($this->db->affected_rows() > 0) ? 
            $this->session->set_flashdata('sukses', "Rumpun Berhasil Di Hapus") 
            : $this->session->set_flashdata('error', "Rumpun Gagal Di Hapus");
        redirect($_SERVER['HTTP_REFERER']);
    }
}