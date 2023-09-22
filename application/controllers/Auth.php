<?php
class Auth extends CI_Controller{
    function index(){
        $this->load->view('login');
    }

    function login(){
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $cek = $this->db->get_where('user', ['username' => $username]);
        if($cek->num_rows() > 0){
            if($cek->row()->password == md5($password)){
                if($cek->row()->status == 1){
                    $this->session->set_userdata([
                        'user_id' => $cek->row()->id,
                        'role' => $cek->row()->role,
                        'username' => $cek->row()->username,
                        'nama' => $cek->row()->nama
                    ]);
    
                    $this->session->set_flashdata('success', "Berhasil Login");
    
                    if($cek->row()->role == 1){
                        redirect('admin/dashboard');
                    }else{
                        redirect('petugas/dashboard');
                    }
                }else{
                    $this->session->set_flashdata('error', "Hubungi Admin Untuk Mengaktifkan Akun Anda");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }else{
                $this->session->set_flashdata('username', $username);
                $this->session->set_flashdata('error', "Password Tidak Sesuai");
                $this->session->set_flashdata('pwd_error', TRUE);
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
            $this->session->set_flashdata('error', "User Tidak Di Temukan");
            $this->session->set_flashdata('pwd_error', TRUE);
            $this->session->set_flashdata('usr_error', TRUE);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function logout(){
        session_destroy();
        redirect('');
    }
}