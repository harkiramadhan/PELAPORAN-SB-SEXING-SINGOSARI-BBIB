<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('role') == 1){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
        $var = [
            'title' => 'Dashboard Admin - PELAPORAN SB SEXING SINGOSARI BBIB',
            'pages' => 'Dashboard',
            'laporan' => $this->db->select('id')->get('laporan')->num_rows(),
            'peternak'  => $this->db->select('id')->get('peternak')->num_rows(),
            'petugas' => $this->db->select('id')->get('user')->num_rows()
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/dashboard', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function getChartIB(){
        $year = date('Y');
        $months = range(1, 12);

        $data = [];
        foreach($months as $m){
            $getLaporan = $this->db->select('id')->get_where('ib', [
                'MONTH(tgl)' => $m,
                'YEAR(tgl)' => $year
            ])->num_rows();

            array_push($data, $getLaporan);
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function getChartPKB(){
        $year = date('Y');
        $months = range(1, 12);

        $data = [];
        foreach($months as $m){
            $getLaporan = $this->db->select('id')->get_where('laporan', [
                'MONTH(tgl_pkb)' => $m,
                'YEAR(tgl_pkb)' => $year
            ])->num_rows();

            array_push($data, $getLaporan);
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function getChartKelahiranIB(){
        $year = date('Y');
        $months = range(1, 12);

        $dataJ = [];
        $dataB = [];
        foreach($months as $m){
            /* Jantan */
            $getJantan = $this->db->select('id')->get_where('laporan', [
                'MONTH(tgl_kelahiran)' => $m,
                'YEAR(tgl_kelahiran)' => $year,
                'kelamin' => 1
            ])->num_rows();
            array_push($dataJ, $getJantan);

            /* Betina */
            $getBetina = $this->db->select('id')->get_where('laporan', [
                'MONTH(tgl_kelahiran)' => $m,
                'YEAR(tgl_kelahiran)' => $year,
                'kelamin' => 0
            ])->num_rows();
            array_push($dataB, $getBetina);
        }

        $this->output->set_content_type('application/json')->set_output(json_encode([
            'j' => $dataJ,
            'b' => $dataB,
        ]));
    }

    function getChartSexing(){
        $year = date('Y');
        $months = range(1, 12);

        $dataX = [];
        $dataY = [];
        $dataN = [];
        foreach($months as $m){
            /* Sexing X */
            $getSexingX = $this->db->select('id')->get_where('ib', [
                'MONTH(tgl)' => $m,
                'YEAR(tgl)' => $year,
                'sexing' => 'x'
            ])->num_rows();
            array_push($dataX, $getSexingX);

            /* Sexing Y */
            $getSexingY = $this->db->select('id')->get_where('ib', [
                'MONTH(tgl)' => $m,
                'YEAR(tgl)' => $year,
                'sexing' => 'y'
            ])->num_rows();
            array_push($dataY, $getSexingY);

            /* Unsexing */
            $getSexingN = $this->db->select('id')->get_where('ib', [
                'MONTH(tgl)' => $m,
                'YEAR(tgl)' => $year,
                'sexing' => 'n'
            ])->num_rows();
            array_push($dataN, $getSexingN);
        }

        $this->output->set_content_type('application/json')->set_output(json_encode([
            'x' => $dataX,
            'y' => $dataY,
            'n' => $dataN
        ]));
    }
}