<?php


use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('role') == 1){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
       
        require(APPPATH . 'vendor/autoload.php');
      
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');
     
        $writer = new Xlsx($spreadsheet);
        $writer->save('hello world.xlsx');
    }
}