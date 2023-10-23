<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('role') == 2){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
        $var = [
            'title' => 'Dashboard Petugas - PELAPORAN SB SEXING SINGOSARI BBIB',
            'pages' => 'Dashboard',
            'laporan' => $this->db->select('id')->get_where('laporan', ['user_id' => $this->session->userdata('user_id')])->num_rows()
        ];

        $this->load->view('petugas/layout/header', $var);
        $this->load->view('petugas/dashboard', $var);
        $this->load->view('petugas/layout/footer', $var);
    }

    function getChartIB(){
        $year = date('Y');
        $months = range(1, 12);

        $data = [];
        foreach($months as $m){
            $getLaporan = $this->db->select('id')->get_where('laporan', [
                'user_id' => $this->session->userdata('user_id'),
                'MONTH(date)' => $m,
                'YEAR(date)' => $year
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
                'user_id' => $this->session->userdata('user_id'),
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
                'user_id' => $this->session->userdata('user_id'),
                'MONTH(tgl_kelahiran)' => $m,
                'YEAR(tgl_kelahiran)' => $year,
                'kelamin' => 1
            ])->num_rows();
            array_push($dataJ, $getJantan);

            /* Betina */
            $getBetina = $this->db->select('id')->get_where('laporan', [
                'user_id' => $this->session->userdata('user_id'),
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
            $getSexingX = $this->db->select('ib.id')
                                ->from('ib')
                                ->join('laporan l', 'ib.id_laporan = l.id')
                                ->where([
                                    'l.user_id' => $this->session->userdata('user_id'),
                                    'MONTH(ib.tgl)' => $m,
                                    'YEAR(ib.tgl)' => $year,
                                    'ib.sexing' => 'x'
                                ])->get()->num_rows();
            array_push($dataX, $getSexingX);

            /* Sexing Y */
            $getSexingY = $this->db->select('ib.id')
                                ->from('ib')
                                ->join('laporan l', 'ib.id_laporan = l.id')
                                ->where([
                                    'l.user_id' => $this->session->userdata('user_id'),
                                    'MONTH(ib.tgl)' => $m,
                                    'YEAR(ib.tgl)' => $year,
                                    'ib.sexing' => 'y'
                                ])->get()->num_rows();
            array_push($dataY, $getSexingY);

            /* Unsexing */
            $getSexingN = $this->db->select('ib.id')
                                ->from('ib')
                                ->join('laporan l', 'ib.id_laporan = l.id')
                                ->where([
                                    'l.user_id' => $this->session->userdata('user_id'),
                                    'MONTH(ib.tgl)' => $m,
                                    'YEAR(ib.tgl)' => $year,
                                    'ib.sexing' => 'n'
                                ])->get()->num_rows();
            array_push($dataN, $getSexingN);
        }

        $this->output->set_content_type('application/json')->set_output(json_encode([
            'x' => $dataX,
            'y' => $dataY,
            'n' => $dataN
        ]));
    }
}