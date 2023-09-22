<?php
class User extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('role') == 1){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
        $var = [
            'title' => 'Petugas - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Petugas',
            'user' => $this->db->get('user')
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/user', $var);
        $this->load->view('admin/layout/footer', $var);
    }
    
    function tambah(){
        $var = [
            'title' => 'Tambah Petugas - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Tambah Petugas',
            'user' => $this->db->get('user')
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/user-tambah', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function edit($id){
        $var = [
            'title' => 'Edit Petugas - Sistem Pelaporan Inseminasi Buatan BBIB Singosari',
            'pages' => 'Edit Petugas',
            'user' => $this->db->get_where('user', ['id' => $id])->row()
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/user-edit', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function create(){
        $username = $this->input->post('username', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $jenkel = $this->input->post('jenkel', TRUE);
        $nowa = $this->input->post('nowa', TRUE);
        $password = $this->input->post('password', TRUE);

        $cekUsername = $this->db->get_where('user', ['username' => $username])->num_rows();
        if($cekUsername > 0){
            $this->session->set_flashdata('error', "Username Sudah Tersedia, Gunakan Username Lainnya");
            $this->session->set_flashdata([
                'username' => $username,
                'nama' => $nama,
                'jenkel' => $jenkel,
                'nowa' => $nowa
            ]);
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->db->insert('user', [
                'username' => $username,
                'nama' => $nama,
                'jenkel' => $jenkel,
                'nowa' => $nowa,
                'password' => md5($password)
            ]);
            $this->session->set_flashdata('sukses', "Petugas Berhasil Di Tambahkan");
            redirect('admin/user','refresh');
        }
    }

    function update($id){
        $username = $this->input->post('username', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $jenkel = $this->input->post('jenkel', TRUE);
        $nowa = $this->input->post('nowa', TRUE);
        $password = $this->input->post('password', TRUE);

        $cekUsername = $this->db->get_where('user', ['username' => $username, 'id !=' => $id])->num_rows();
        if($cekUsername > 0){
            $this->session->set_flashdata('error', "Username Sudah Tersedia, Gunakan Username Lainnya");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            if($password){
                $this->db->where('id', $id)->update('user', [
                    'username' => $username,
                    'nama' => $nama,
                    'jenkel' => $jenkel,
                    'nowa' => $nowa,
                    'password' => md5($password)
                ]);
            }else{
                $this->db->where('id', $id)->update('user', [
                    'username' => $username,
                    'nama' => $nama,
                    'jenkel' => $jenkel,
                    'nowa' => $nowa
                ]);
            }

            $this->session->set_flashdata('sukses', "Petugas Berhasil Di Simpan");
            redirect('admin/user','refresh');
        }
    }

    function remove($id){
        $this->db->where('id', $id)->delete('user');
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "User Berhasil Di Hapus");
        }else{
            $this->session->set_flashdata('error', "User Gagal Di Hapus");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    function checkUsername(){
        $username = $this->input->get('username', TRUE);
        $id = $this->input->get('id', TRUE);
        ($id) ? $this->db->where('id !=', $id) : NULL;
        $get = $this->db->get_where('user', ['username' => $username])->num_rows();
        if($get > 0){
            $res = 400;
        }else{
            $res = 200;
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($res));
    }
}