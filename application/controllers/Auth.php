<?php
class Auth extends CI_Controller{
    function index(){
        $this->load->view('login');
    }

    function login(){
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $cek = $this->db->get('user', ['username' => $username]);
        if($cek->num_rows() > 0){
            if($cek->row()->password == md5($password)){
                if($cek->row()->status == 1){
                    $this->session->set_userdata([
                        'role' => $cek->row()->role,
                        'username' => $cek->row()->username
                    ]);
    
                    $this->session->set_flashdata('success', "Berhasil Login");
    
                    if($cek->row()->role == 1){
                        redirect('admin/dashboard');
                    }else{
                        redirect('dashboard');
                    }
                }else{
                    $this->session->set_flashdata('error', "Hubungi Admin Untuk Mengaktifkan Akun Anda");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }else{
                $this->session->set_flashdata('username', $username);
                $this->session->set_flashdata('error', "Password Tidak Sesuai");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
            $this->session->set_flashdata('error', "User Tidak Di Temukan");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}