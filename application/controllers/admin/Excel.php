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

    function laporansatubulan(){
       
        // Create a new Spreadsheet
        $spreadsheet = new Spreadsheet();

        $activeWorksheet = $spreadsheet->getActiveSheet();

        // HEADER
        $activeWorksheet->setCellValue('A1', 'REKAP PEMANTAUAN SEMEN BEKU SEXING');
        $activeWorksheet->setCellValue('A2', 'AGUSTUS 2023');
        $activeWorksheet->mergeCells('A1:H1');
        $activeWorksheet->mergeCells('A2:H2');
        
        // Apply formatting to the header
        $headerStyle = [
            'font' => ['bold' => true, 'size' => 14, 'name' => 'Calibri'],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        ];
        $activeWorksheet->getStyle('A1:H2')->applyFromArray($headerStyle);

        // LOKASI
        $activeWorksheet->setCellValue('A4', 'LOKASI: SINGOSARI');
        $activeWorksheet->mergeCells('A4:H4');

        // Apply formatting to the location text
        $locationStyle = [
            'font' => ['size' => 12, 'name' => 'Calibri'],
        ];
        $activeWorksheet->getStyle('A4')->applyFromArray($locationStyle);


        
        // LAPORAN
        // BARIS 1
        $activeWorksheet->setCellValue('A6', 'Nama');
        $activeWorksheet->setCellValue('B6', 'Kode Bull');
        $activeWorksheet->setCellValue('C6', 'Sexing');
        $activeWorksheet->setCellValue('D6', 'Unsexing');
        $activeWorksheet->setCellValue('E6', 'Kelahiran');
        $activeWorksheet->setCellValue('H6', 'Keberhasilan');
    
        // BARIS 2
        $activeWorksheet->setCellValue('E7', 'Jantan');
        $activeWorksheet->setCellValue('F7', 'Betina');
        $activeWorksheet->setCellValue('G7', 'Total');
        
        // MERGE
        $activeWorksheet->mergeCells('E6:F6');
        $activeWorksheet->mergeCells('A6:A7');
        $activeWorksheet->mergeCells('B6:B7');
        $activeWorksheet->mergeCells('C6:C7');
        $activeWorksheet->mergeCells('D6:D7');
        $activeWorksheet->mergeCells('H6:H7');

        // Apply formatting to the column headers
        $columnHeaderStyle = [
            'font' => ['bold' => true, 'size' => 14, 'name' => 'Calibri'],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER],
        ];
        $activeWorksheet->getStyle('A6:H7')->applyFromArray($columnHeaderStyle);

        // Apply background color (gray) to header rows
        $activeWorksheet->getStyle('A6:H7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $activeWorksheet->getStyle('A6:H7')->getFill()->getStartColor()->setARGB('FFD3D3D3');

        // FOOTER
        $activeWorksheet->setCellValue('A10', 'TOTAL');
        $activeWorksheet->setCellValue('E10', '1');
        $activeWorksheet->setCellValue('F10', '1');
        $activeWorksheet->setCellValue('G10', '1');
        $activeWorksheet->setCellValue('H10', '100%');

        $activeWorksheet->mergeCells('A10:D10');

        // Apply formatting to the total row
        $totalRowStyle = [
            'font' => ['bold' => true, 'size' => 14, 'name' => 'Calibri'],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER],
        ];
        $activeWorksheet->getStyle('A10:H10')->applyFromArray($totalRowStyle);

        // Apply background color (gray) to the total row
        $activeWorksheet->getStyle('A10:H10')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $activeWorksheet->getStyle('A10:H10')->getFill()->getStartColor()->setARGB('FFD3D3D3');

        // TABLE A6:H10
        // Apply borders to the table
        $borderStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $activeWorksheet->getStyle('A6:H10')->applyFromArray($borderStyle);


        $activeWorksheet->getColumnDimension('A')->setWidth(20);
        $activeWorksheet->getColumnDimension('B')->setWidth(15);
        $activeWorksheet->getColumnDimension('C')->setWidth(13);
        $activeWorksheet->getColumnDimension('D')->setWidth(13);
        $activeWorksheet->getColumnDimension('E')->setWidth(15);
        $activeWorksheet->getColumnDimension('F')->setWidth(15);
        $activeWorksheet->getColumnDimension('G')->setWidth(15);
        $activeWorksheet->getColumnDimension('H')->setWidth(15);

        $activeWorksheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        // Set ukuran kertas ke A4
        $activeWorksheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

        // Save the Excel file to the server
        $writer = new Xlsx($spreadsheet);

        // Set the file name for the Excel file
        $filename = 'Laporan Agustus 2023 - Inseminasi Buatan BBIB Singosari.xlsx';

        // Set headers for downloading the Excel file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Save the Excel file to the browser
        $writer->save('php://output');
    }

    function laporanbulanan(){
       
        // Create a new Spreadsheet
        $spreadsheet = new Spreadsheet();

        $activeWorksheet = $spreadsheet->getActiveSheet();

        // HEADER
        $activeWorksheet->setCellValue('A1', 'REKAP PEMANTAUAN SEMEN BEKU SEXING');
        $activeWorksheet->setCellValue('A2', 'AGUSTUS - DESEMBER 2023');
        $activeWorksheet->mergeCells('A1:H1');
        $activeWorksheet->mergeCells('A2:H2');
        
        // Apply formatting to the header
        $headerStyle = [
            'font' => ['bold' => true, 'size' => 14, 'name' => 'Calibri'],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        ];
        $activeWorksheet->getStyle('A1:H2')->applyFromArray($headerStyle);

        // LOKASI
        $activeWorksheet->setCellValue('A4', 'LOKASI: SINGOSARI');
        $activeWorksheet->mergeCells('A4:H4');

        // Apply formatting to the location text
        $locationStyle = [
            'font' => ['size' => 12, 'name' => 'Calibri'],
        ];
        $activeWorksheet->getStyle('A4')->applyFromArray($locationStyle);


        
        // LAPORAN
        // BARIS 1
        $activeWorksheet->setCellValue('A6', 'Nama');
        $activeWorksheet->setCellValue('B6', 'Kode Bull');
        $activeWorksheet->setCellValue('C6', 'Sexing');
        $activeWorksheet->setCellValue('D6', 'Unsexing');
        $activeWorksheet->setCellValue('E6', 'Kelahiran');
        $activeWorksheet->setCellValue('H6', 'Keberhasilan');
    
        // BARIS 2
        $activeWorksheet->setCellValue('E7', 'Jantan');
        $activeWorksheet->setCellValue('F7', 'Betina');
        $activeWorksheet->setCellValue('G7', 'Total');
        
        // MERGE
        $activeWorksheet->mergeCells('E6:F6');
        $activeWorksheet->mergeCells('A6:A7');
        $activeWorksheet->mergeCells('B6:B7');
        $activeWorksheet->mergeCells('C6:C7');
        $activeWorksheet->mergeCells('D6:D7');
        $activeWorksheet->mergeCells('H6:H7');

        // Apply formatting to the column headers
        $columnHeaderStyle = [
            'font' => ['bold' => true, 'size' => 14, 'name' => 'Calibri'],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER],
        ];
        $activeWorksheet->getStyle('A6:H7')->applyFromArray($columnHeaderStyle);

        // Apply background color (gray) to header rows
        $activeWorksheet->getStyle('A6:H7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $activeWorksheet->getStyle('A6:H7')->getFill()->getStartColor()->setARGB('FFD3D3D3');

        // FOOTER
        $activeWorksheet->setCellValue('A10', 'TOTAL');
        $activeWorksheet->setCellValue('E10', '1');
        $activeWorksheet->setCellValue('F10', '1');
        $activeWorksheet->setCellValue('G10', '1');
        $activeWorksheet->setCellValue('H10', '100%');

        $activeWorksheet->mergeCells('A10:D10');

        // Apply formatting to the total row
        $totalRowStyle = [
            'font' => ['bold' => true, 'size' => 14, 'name' => 'Calibri'],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER],
        ];
        $activeWorksheet->getStyle('A10:H10')->applyFromArray($totalRowStyle);

        // Apply background color (gray) to the total row
        $activeWorksheet->getStyle('A10:H10')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $activeWorksheet->getStyle('A10:H10')->getFill()->getStartColor()->setARGB('FFD3D3D3');

        // TABLE A6:H10
        // Apply borders to the table
        $borderStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $activeWorksheet->getStyle('A6:H10')->applyFromArray($borderStyle);


        $activeWorksheet->getColumnDimension('A')->setWidth(20);
        $activeWorksheet->getColumnDimension('B')->setWidth(15);
        $activeWorksheet->getColumnDimension('C')->setWidth(13);
        $activeWorksheet->getColumnDimension('D')->setWidth(13);
        $activeWorksheet->getColumnDimension('E')->setWidth(15);
        $activeWorksheet->getColumnDimension('F')->setWidth(15);
        $activeWorksheet->getColumnDimension('G')->setWidth(15);
        $activeWorksheet->getColumnDimension('H')->setWidth(15);

        $activeWorksheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        // Set ukuran kertas ke A4
        $activeWorksheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

        // Save the Excel file to the server
        $writer = new Xlsx($spreadsheet);

        // Set the file name for the Excel file
        $filename = 'Laporan Agustus 2023 - Inseminasi Buatan BBIB Singosari.xlsx';

        // Set headers for downloading the Excel file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Save the Excel file to the browser
        $writer->save('php://output');
    }
}   