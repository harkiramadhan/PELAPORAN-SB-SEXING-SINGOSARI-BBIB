<?php


use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('user_id')){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function laporansatubulan(){
        $bulan = $this->input->post('bulan', TRUE);
        $tahun = $this->input->post('tahun', TRUE);
        // Create a new Spreadsheet
        $spreadsheet = new Spreadsheet();

        $activeWorksheet = $spreadsheet->getActiveSheet();

        // HEADER
        $activeWorksheet->setCellValue('A1', 'REKAP PEMANTAUAN SEMEN BEKU SEXING');
        $activeWorksheet->setCellValue('A2', strtoupper(bulan($bulan)) . " " . $tahun);
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
        $filename = 'Laporan ' . bulan($bulan) . ' ' . $tahun . ' - Inseminasi Buatan BBIB Singosari.xlsx';

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

    function laporanlokasi(){
        $bulan = $this->input->post('bulan', TRUE);
        $tahun = $this->input->post('tahun', TRUE);
       

        $data = $this->db->select('l.*, u.username, u.nama, p.nama peternak, b.bull nama_bull, b.kode kode_bull')
                        ->select("CONCAT(kab.name , ', ', kec.name, ', ', kel.name) as lokasi")
                        ->from('laporan l')
                        ->join('user u', 'l.user_id = u.id')
                        ->join('peternak p', 'l.peternak_id = p.id')
                        ->join('bull b', 'l.bull_id = b.id', 'LEFT')
                        ->join('regencies kab', 'l.kabupaten_id = kab.code', 'LEFT')
                        ->join('districts kec', 'l.kecamatan_id = kec.code', 'LEFT')
                        ->join('villages kel', 'l.kelurahan_id = kel.code', 'LEFT')
                        // ->where([
                        //     'MONTH(l.date)' => sprintf("%02d", $bulan)
                        // ])
                        ->get();

        // Create a new Spreadsheet
        $spreadsheet = new Spreadsheet();

        $activeWorksheet = $spreadsheet->getActiveSheet();

        // HEADER
        $activeWorksheet->setCellValue('A1', 'LAPORAN PELAKSANAAN IB SEMEN BEKU SEXING BBIB SINGOSARI');
        $activeWorksheet->setCellValue('A2', 'DI ............');
        $activeWorksheet->mergeCells('A1:R1');
        $activeWorksheet->mergeCells('A2:R2');
        
        // Apply formatting to the header
        $headerStyle = [
            'font' => ['bold' => true, 'size' => 14, 'name' => 'Calibri'],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        ];
        $activeWorksheet->getStyle('A1:S2')->applyFromArray($headerStyle);

        // LOKASI
        $activeWorksheet->setCellValue('A4', 'PETUGAS');
        $activeWorksheet->setCellValue('C4', ': ALFIAN RAHMATULLAH');
        $activeWorksheet->setCellValue('A5', 'LOKASI');
        $activeWorksheet->setCellValue('C5', ': SINGOSARI');
        $activeWorksheet->mergeCells('C4:R4');
        $activeWorksheet->mergeCells('C5:R5');

        // Apply formatting to the location text
        $locationStyle = [
            'font' => ['size' => 12, 'name' => 'Calibri'],
        ];
        $activeWorksheet->getStyle('A4:C5')->applyFromArray($locationStyle);

        // LAPORAN
        // BARIS 1
        $activeWorksheet->setCellValue('A7', 'No.');
        $activeWorksheet->setCellValue('B7', 'Peternak');
        $activeWorksheet->setCellValue('C7', 'Akseptor');
        $activeWorksheet->setCellValue('D7', 'Nama Bull');
        $activeWorksheet->setCellValue('E7', 'Kode Bull');
        $activeWorksheet->setCellValue('F7', 'Kode Batch');
        $activeWorksheet->setCellValue('G7', 'Sexing');
        $activeWorksheet->setCellValue('I7', 'Unsexing');
        $activeWorksheet->setCellValue('J7', 'Tanggal IB');
        $activeWorksheet->setCellValue('K7', 'PKB');
        $activeWorksheet->setCellValue('N7', 'Kelahiran');
        $activeWorksheet->setCellValue('Q7', 'Keberhasilan');
        $activeWorksheet->setCellValue('R7', 'Keterangan');
    
        // BARIS 2
        $activeWorksheet->setCellValue('G8', 'x');
        $activeWorksheet->setCellValue('H8', 'y');
        $activeWorksheet->setCellValue('K8', 'Tanggal');
        $activeWorksheet->setCellValue('L8', '+');
        $activeWorksheet->setCellValue('M8', '-');
        $activeWorksheet->setCellValue('N8', 'Tanggal');
        $activeWorksheet->setCellValue('O8', 'jtn');
        $activeWorksheet->setCellValue('P8', 'btn');
        
        // MERGE
        $activeWorksheet->mergeCells('A7:A8');
        $activeWorksheet->mergeCells('B7:B8');
        $activeWorksheet->mergeCells('C7:C8');
        $activeWorksheet->mergeCells('D7:D8');
        $activeWorksheet->mergeCells('E7:E8');
        $activeWorksheet->mergeCells('F7:F8');
        $activeWorksheet->mergeCells('I7:I8');
        $activeWorksheet->mergeCells('J7:J8');
        $activeWorksheet->mergeCells('Q7:Q8');
        $activeWorksheet->mergeCells('R7:R8');

        // MERGE HORIZONTAL
        $activeWorksheet->mergeCells('G7:H7');
        $activeWorksheet->mergeCells('K7:M7');
        $activeWorksheet->mergeCells('N7:P7');

        
        // Apply formatting to the column headers
        $columnHeaderStyle = [
            'font' => ['bold' => true, 'size' => 14, 'name' => 'Calibri'],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER],
        ];
        $activeWorksheet->getStyle('A7:R8')->applyFromArray($columnHeaderStyle);

        // Apply background color (gray) to header rows
        $activeWorksheet->getStyle('A7:R8')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $activeWorksheet->getStyle('A7:R8')->getFill()->getStartColor()->setARGB('FFD3D3D3');

        // Apply borders to the table
        $borderStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $activeWorksheet->getStyle('A7:R8')->applyFromArray($borderStyle);

        $activeWorksheet->getStyle('A')->getAlignment()->setHorizontal('center');
        $activeWorksheet->getStyle('G')->getAlignment()->setHorizontal('center');
        $activeWorksheet->getStyle('H')->getAlignment()->setHorizontal('center');
        $activeWorksheet->getStyle('I')->getAlignment()->setHorizontal('center');
        $activeWorksheet->getStyle('L')->getAlignment()->setHorizontal('center');
        $activeWorksheet->getStyle('M')->getAlignment()->setHorizontal('center');
        $activeWorksheet->getStyle('O')->getAlignment()->setHorizontal('center');
        $activeWorksheet->getStyle('P')->getAlignment()->setHorizontal('center');

        $no = 1;
        $excel_row = 9;
        foreach($data->result() as $row){
            $dataIB = [];
            $ib = $this->db->order_by('tgl', "ASC")->get_where('ib', ['id_laporan' => $row->id])->result();

            foreach($ib as $i){
                array_push($dataIB, mediumdate_indo(date('Y-m-d', strtotime($i->tgl))));
            }

            $activeWorksheet->getStyle('A' . $excel_row . ':R' . $excel_row)->applyFromArray($borderStyle);
            $activeWorksheet->getStyle('J' . $excel_row)->getAlignment()->setWrapText(true);

            $activeWorksheet->setCellValueByColumnAndRow(1, $excel_row, $no++);
            $activeWorksheet->setCellValueByColumnAndRow(2, $excel_row, $row->peternak);
            $activeWorksheet->setCellValueByColumnAndRow(3, $excel_row, $row->akseptor);
            $activeWorksheet->setCellValueByColumnAndRow(4, $excel_row, $row->nama_bull);
            $activeWorksheet->setCellValueByColumnAndRow(5, $excel_row, $row->kode_bull);
            $activeWorksheet->setCellValueByColumnAndRow(6, $excel_row, $row->kode_batch);
            $activeWorksheet->setCellValueByColumnAndRow(7, $excel_row, ($row->sexing == 'y') ? 'v' : '');
            $activeWorksheet->setCellValueByColumnAndRow(8, $excel_row, ($row->sexing == 'x') ? 'v' : '');
            $activeWorksheet->setCellValueByColumnAndRow(9, $excel_row, ($row->sexing == 'n') ? 'v' : '');
            $activeWorksheet->setCellValueByColumnAndRow(10, $excel_row, _createmDashList($dataIB));
            $activeWorksheet->setCellValueByColumnAndRow(11, $excel_row, mediumdate_indo(date('Y-m-d', strtotime($row->tgl_pkb))));
            $activeWorksheet->setCellValueByColumnAndRow(12, $excel_row, ($row->bunting == 1) ? 'v' : 'x');
            $activeWorksheet->setCellValueByColumnAndRow(13, $excel_row, ($row->bunting == 0) ? 'v' : 'x');
            $activeWorksheet->setCellValueByColumnAndRow(14, $excel_row, mediumdate_indo(date('Y-m-d', strtotime($row->tgl_kelahiran))));
            $activeWorksheet->setCellValueByColumnAndRow(15, $excel_row, ($row->kelamin == 1) ? 'v' : 'x');
            $activeWorksheet->setCellValueByColumnAndRow(16, $excel_row, ($row->kelamin == 0) ? 'v' : 'x');
            $excel_row++;
        }

        // $activeWorksheet->getRowDimension('J')->setRowHeight(-1);

        $activeWorksheet->getColumnDimension('A')->setWidth(5);
        $activeWorksheet->getColumnDimension('B')->setWidth(20);
        $activeWorksheet->getColumnDimension('C')->setWidth(13);
        $activeWorksheet->getColumnDimension('D')->setWidth(13);
        $activeWorksheet->getColumnDimension('E')->setWidth(15);
        $activeWorksheet->getColumnDimension('F')->setWidth(15);
        $activeWorksheet->getColumnDimension('G')->setWidth(10);
        $activeWorksheet->getColumnDimension('H')->setWidth(10);
        $activeWorksheet->getColumnDimension('I')->setWidth(10);
        $activeWorksheet->getColumnDimension('J')->setWidth(20);
        $activeWorksheet->getColumnDimension('K')->setWidth(20);
        $activeWorksheet->getColumnDimension('L')->setWidth(5);
        $activeWorksheet->getColumnDimension('M')->setWidth(5);
        $activeWorksheet->getColumnDimension('N')->setWidth(20);
        $activeWorksheet->getColumnDimension('O')->setWidth(5);
        $activeWorksheet->getColumnDimension('P')->setWidth(5);
        $activeWorksheet->getColumnDimension('Q')->setWidth(15);
        $activeWorksheet->getColumnDimension('R')->setWidth(15);

        $activeWorksheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        // Set ukuran kertas ke A4
        $activeWorksheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

        // Save the Excel file to the server
        $writer = new Xlsx($spreadsheet);

        // Set the file name for the Excel file
        $filename = 'LAPORAN PELAKSANAAN IB SEMEN BEKU SEXING BBIB SINGOSARI.xlsx';

        // Set headers for downloading the Excel file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Save the Excel file to the browser
        $writer->save('php://output');
    }

    /* Export Laporan */
    function exportLaporan(){
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->mergeCells('A1:G1');
        $activeWorksheet->mergeCells('A2:G2');
        $activeWorksheet->setCellValue('A1', 'LAPORAN PELAKSANAAN IB SEMEN BEKU SEXING');
        $activeWorksheet->setCellValue('A2', 'BBIB SINGOSARI');

        $activeWorksheet->getStyle('A1:G2')->applyFromArray([
            'font' => ['bold' => true, 'size' => 18, 'name' => 'Calibri'],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        ]);

        $laporan = $this->db->select('l.*, u.username, u.nama, p.nama peternak, p.no_anggota')
                            ->select("kab.name as kabupaten_name")
                            ->select("kec.name as kecamatan_name")
                            ->select("kel.name as kelurahan_name")
                            ->from('laporan l')
                            ->join('user u', 'l.user_id = u.id')
                            ->join('peternak p', 'l.peternak_id = p.id')
                            ->join('regencies kab', 'l.kabupaten_id = kab.code', 'LEFT')
                            ->join('districts kec', 'l.kecamatan_id = kec.code', 'LEFT')
                            ->join('villages kel', 'l.kelurahan_id = kel.code', 'LEFT')
                            ->get();

        $activeWorksheet->getColumnDimension('A')->setWidth(30);
        $activeWorksheet->getColumnDimension('B')->setWidth(15);
        $activeWorksheet->getColumnDimension('C')->setWidth(20);
        $activeWorksheet->getColumnDimension('E')->setWidth(12);
        $activeWorksheet->getColumnDimension('F')->setWidth(15);
        $activeWorksheet->getColumnDimension('G')->setWidth(15);

        $excel_row = 4;
        foreach($laporan->result() as $row){
            $formatExport = [
                'LAPORAN' => [
                    'data' => '',
                    'style' => [
                        'merge' => ['A', 'G']
                    ]
                ],
                'PETUGAS' => [
                    'data' => $row->nama,
                    'style' => []
                ],
                'KOTA / KABUPATEN' => [
                    'data' => $row->kabupaten_name,
                    'style' => []
                ],
                'KECAMATAN' => [
                    'data' => $row->kecamatan_name,
                    'style' => []
                ],
                'KELURAHAN' => [
                    'data' => $row->kelurahan_name,
                    'style' => []
                ],
                'PETERNAK' => [
                    'data' => $row->peternak,
                    'style' => []
                ],
                'AKSEPTOR' => [
                    'data' => $row->akseptor,
                    'style' => []
                ],
                'LAPORAN PKB' => [
                    'data' => '',
                    'style' => [
                        'merge' => ['A', 'G']
                    ]
                ],
                'TANGGAL PKB' => [
                    'data' => $row->tgl_pkb,
                    'style' => []
                ],
                'STATUS PKB' => [
                    'data' => '',
                    'style' => []
                ],
                'TANGGAL KELAHIRAN' => [
                    'data' => $row->tgl_kelahiran,
                    'style' => []
                ],
                'STATUS KELAHIRAN' => [
                    'data' => '',
                    'style' => []
                ],
                'KETERANGAN' => [
                    'data' => $row->keterangan,
                    'style' => []
                ],
            ];

            $row = 4;
            foreach($formatExport as $key => $val){
                if(@$val['style'] == ''){
                    echo @$val['style']['merge'][0] . $row . ':' . @$val['style']['merge'][1] . $row;
                    if(@$val['style']['merge']){
                        $activeWorksheet->mergeCells(@$val['style']['merge'][0] . $row . ':' . @$val['style']['merge'][1] . $row);
                    }
                    $activeWorksheet->getStyle('A' . $row . ':G' . $row)
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('E6E6E6');
                }
                $activeWorksheet->setCellValue( 'A' . $row, $key);
                $activeWorksheet->setCellValue( 'B' . $row, $val['data']);
                $row+18;
                $row++;
            }

            $excel_row+18;
            $excel_row++;
        }

        die();
        $writer = new Xlsx($spreadsheet);
        $filename = 'LAPORAN PELAKSANAAN IB SEMEN BEKU SEXING BBIB SINGOSARI.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    function exportHtml(){
        $this->load->view('laporanExport');
    }

    /* Format Import */
    function importFormat(){
        /* Master Data */
        $petugas = $this->db->get('user')->result();
        $kota = $this->db->select('*')->from('regencies')->where(['code' => '35.07'])->or_where(['code' => '35.73'])->get()->result();
        $kecamatan = $this->db->select('*')->from('districts')->where(['regency_code' => '35.07'])->or_where(['regency_code' => '35.73'])->get()->result();
        $kelurahan = $this->db->select('v.*')
                                ->from('villages v')
                                ->join('districts d', 'v.district_code = d.code')
                                ->where([
                                    'd.regency_code' => '35.07'
                                ])->or_where([
                                    'd.regency_code' => '35.73'  
                                ])->get()->result();
        $peternak = $this->db->get('peternak')->result();
        $bull = $this->db->get('bull')->result();

        $spreadsheet = new Spreadsheet();

        /* Master Data */
        $spreadsheet->createSheet();
        $masterSheet = $spreadsheet->getSheet(1);
        $masterSheet->setTitle('MasterDataSheet');

        $masterSheet->setCellValue('A1', 'Master Data Pegawai');
        $masterSheet->setCellValue('B1', 'Master Data Kota');
        $masterSheet->setCellValue('C1', 'Master Data Kecamatan');
        $masterSheet->setCellValue('D1', 'Master Data Kelurahan');
        $masterSheet->setCellValue('E1', 'Master Data Peternak');
        $masterSheet->setCellValue('F1', 'Master Data Bull');

        $masterSheet->getColumnDimension('A')->setAutoSize(true);
        $masterSheet->getColumnDimension('B')->setAutoSize(true);
        $masterSheet->getColumnDimension('C')->setAutoSize(true);
        $masterSheet->getColumnDimension('D')->setAutoSize(true);
        $masterSheet->getColumnDimension('E')->setAutoSize(true);
        $masterSheet->getColumnDimension('F')->setAutoSize(true);

        $lastRowPetugas = 0;
        $rowPetugas = 2;
        foreach($petugas as $p){
            $masterSheet->setCellValue('A' . $rowPetugas, $p->id . " - " . $p->nama);
            $lastRowPetugas = $rowPetugas++;
        }

        $lastRowKota = 0;
        $rowKota = 2;
        foreach($kota as $k){
            $masterSheet->setCellValue('B' . $rowKota, $k->code . " - " . $k->name);
            $lastRowKota = $rowKota++;
        }

        $lastRowKecamatan = 0;
        $rowKecamatan = 2;
        foreach($kecamatan as $kc){
            $masterSheet->setCellValue('C' . $rowKecamatan, $kc->code . " - " . $kc->name);
            $lastRowKecamatan = $rowKecamatan++;
        }

        $lastRowKelurahan = 0;
        $rowKelurahan = 2;
        foreach($kelurahan as $kl){
            $masterSheet->setCellValue('D' . $rowKelurahan, $kl->code . " - " . $kl->name);
            $lastRowKelurahan = $rowKelurahan++;
        }

        $lastRowPeternak = 0;
        $rowPeternak = 2;
        foreach($peternak as $pt){
            $masterSheet->setCellValue('E' . $rowPeternak, $pt->id . " - " . $pt->no_anggota . " - " . $pt->nama);
            $lastRowPeternak = $rowPeternak++;
        }

        $lastRowBull = 0;
        $rowBull = 2;
        foreach($bull as $b){
            $masterSheet->setCellValue('F' . $rowBull, $b->id . " - " . $b->kode . " - " . $b->bull);
            $lastRowBull = $rowBull++;
        }

        /* Format Import */
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setTitle('Format Import');

        $activeWorksheet->mergeCells('A1:G1');
        $activeWorksheet->mergeCells('A2:G2');
        $activeWorksheet->setCellValue('A1', 'FORMAT IMPORT LAPORAN PELAKSANAAN IB SEMEN BEKU SEXING');
        $activeWorksheet->setCellValue('A2', 'BBIB SINGOSARI');

        $activeWorksheet->getStyle('A1:G2')->applyFromArray([
            'font' => ['bold' => true, 'size' => 18, 'name' => 'Calibri'],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        ]);

        $activeWorksheet->getStyle('A4:G4')->applyFromArray([
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        ]);

        $activeWorksheet->getStyle('A12:G12')->applyFromArray([
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        ]);

        $activeWorksheet->getStyle('A19:G20')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
        ]);

        $activeWorksheet->getStyle('A4:G20')->applyFromArray([
            'font' => ['bold' => true, 'size' => 12, 'name' => 'Calibri'],
        ]);

        $activeWorksheet->getStyle('A4:G4')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FFFF00');

        $activeWorksheet->getStyle('A12:G12')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FFFF00');

        $activeWorksheet->getStyle('A19:G20')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('E6E6E6');

        $activeWorksheet->getColumnDimension('A')->setWidth(30);
        $activeWorksheet->getColumnDimension('B')->setWidth(15);
        $activeWorksheet->getColumnDimension('C')->setWidth(20);
        $activeWorksheet->getColumnDimension('E')->setWidth(12);
        $activeWorksheet->getColumnDimension('F')->setWidth(15);
        $activeWorksheet->getColumnDimension('G')->setWidth(15);

        $activeWorksheet->mergeCells('A4:G4');
        $activeWorksheet->mergeCells('B5:G5');
        $activeWorksheet->mergeCells('B6:G6');
        $activeWorksheet->mergeCells('B7:G7');
        $activeWorksheet->mergeCells('B8:G8');
        $activeWorksheet->mergeCells('B9:G9');
        $activeWorksheet->mergeCells('B10:G10');
        $activeWorksheet->mergeCells('B11:G11');
        $activeWorksheet->mergeCells('A12:G12');
        $activeWorksheet->mergeCells('B13:G13');
        $activeWorksheet->mergeCells('B14:G14');
        $activeWorksheet->mergeCells('B15:G15');
        $activeWorksheet->mergeCells('B16:G16');
        $activeWorksheet->mergeCells('B17:G17');

        $activeWorksheet->getStyle('B13')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDD2);
        $activeWorksheet->getStyle('B15')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDD2);

        $activeWorksheet->setCellValue('A4', 'LAPORAN');
        $activeWorksheet->setCellValue('A5', 'PETUGAS');
        $activeWorksheet->setCellValue('A6', 'KOTA / KABUPATEN');
        $activeWorksheet->setCellValue('A7', 'KECAMATAN');
        $activeWorksheet->setCellValue('A8', 'KELURAHAN');
        $activeWorksheet->setCellValue('A9', 'PETERNAK');
        $activeWorksheet->setCellValue('A10', 'AKSEPTOR');
        $activeWorksheet->setCellValue('A12', 'LAPORAN PKB');
        $activeWorksheet->setCellValue('A13', 'TANGGAL PKB');
        $activeWorksheet->setCellValue('B13', date('Y-m-d'));
        $activeWorksheet->setCellValue('A14', 'STATUS PKB');

        $activeWorksheet->setCellValue('A15', 'TANGGAL KELAHIRAN');
        $activeWorksheet->setCellValue('B15', date('Y-m-d'));
        $activeWorksheet->setCellValue('A16', 'STATUS KELAHIRAN');
        $activeWorksheet->setCellValue('A17', 'KETERANGAN');

        /* Format Input Tanggal IB */
        $activeWorksheet->mergeCells('A19:A20');
        $activeWorksheet->mergeCells('B19:B20');
        $activeWorksheet->mergeCells('C19:C20');
        $activeWorksheet->mergeCells('D19:E19');
        $activeWorksheet->mergeCells('F19:F20');
        $activeWorksheet->mergeCells('G19:G20');

        $activeWorksheet->setCellValue('A19', 'BULL');
        $activeWorksheet->setCellValue('B19', 'KODE BATCH');
        $activeWorksheet->setCellValue('C19', 'METODE SEXING');
        $activeWorksheet->setCellValue('D19', 'SEXING');
        $activeWorksheet->setCellValue('D20', 'X');
        $activeWorksheet->setCellValue('E20', 'y');
        $activeWorksheet->setCellValue('F19', 'UNSEXING');
        $activeWorksheet->setCellValue('G19', 'TANGGAL IB');
        

        /* Contoh Inputan Data IB */
        $activeWorksheet->getStyle('A21:G21')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
        ]);

        $activeWorksheet->getStyle('A21:G21')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FFFF00');

        $activeWorksheet->setCellValue('A21', '201873- DAMAR');
        $activeWorksheet->setCellValue('B21', 'B0001');
        $activeWorksheet->setCellValue('C21', '1');
        $activeWorksheet->setCellValue('D21', '');
        $activeWorksheet->setCellValue('E21', 'v');
        $activeWorksheet->setCellValue('F21', '');
        $activeWorksheet->setCellValue('G21', date('Y-m-d'));

        /* Dropdown Petugas */
        $dropdownPetugas = $activeWorksheet->getCell('B5')->getDataValidation();
        $dropdownPetugas->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
        $dropdownPetugas->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
        $dropdownPetugas->setErrorTitle('Input error');
        $dropdownPetugas->setError('Value is not in list.');
        $dropdownPetugas->setPromptTitle('Pick from list');
        $dropdownPetugas->setPrompt('Please pick a value from the drop-down list.');
        $dropdownPetugas->setShowDropDown(true);
        $dropdownPetugas->setShowErrorMessage(true);
        $dropdownPetugas->setAllowBlank(false);
        $dropdownPetugas->setFormula1('MasterDataSheet!$A$2:$A$' . $lastRowPetugas);
        $activeWorksheet->getCell('B5')->setValue(' - PILIH PETUGAS - ');

        /* Dropdown Kota */
        $dropdownKota = $activeWorksheet->getCell('B6')->getDataValidation();
        $dropdownKota->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
        $dropdownKota->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
        $dropdownKota->setErrorTitle('Input error');
        $dropdownKota->setError('Value is not in list.');
        $dropdownKota->setPromptTitle('Pick from list');
        $dropdownKota->setPrompt('Please pick a value from the drop-down list.');
        $dropdownKota->setShowDropDown(true);
        $dropdownKota->setShowErrorMessage(true);
        $dropdownKota->setAllowBlank(false);
        $dropdownKota->setFormula1('MasterDataSheet!$B$2:$B$' . $lastRowKota);
        $activeWorksheet->getCell('B6')->setValue(' - PILIH KOTA - ');

        /* Dropdown Kecamatan */
        $dropdownKecamatan = $activeWorksheet->getCell('B7')->getDataValidation();
        $dropdownKecamatan->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
        $dropdownKecamatan->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
        $dropdownKecamatan->setErrorTitle('Input error');
        $dropdownKecamatan->setError('Value is not in list.');
        $dropdownKecamatan->setPromptTitle('Pick from list');
        $dropdownKecamatan->setPrompt('Please pick a value from the drop-down list.');
        $dropdownKecamatan->setShowDropDown(true);
        $dropdownKecamatan->setShowErrorMessage(true);
        $dropdownKecamatan->setAllowBlank(false);
        $dropdownKecamatan->setFormula1('MasterDataSheet!$C$2:$C$' . $lastRowKecamatan);
        $activeWorksheet->getCell('B7')->setValue(' - PILIH KECAMATAN -'); 

        /* Dropdown Kelurahan */
        $dropdownKelurahan = $activeWorksheet->getCell('B8')->getDataValidation();
        $dropdownKelurahan->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
        $dropdownKelurahan->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
        $dropdownKelurahan->setErrorTitle('Input error');
        $dropdownKelurahan->setError('Value is not in list.');
        $dropdownKelurahan->setPromptTitle('Pick from list');
        $dropdownKelurahan->setPrompt('Please pick a value from the drop-down list.');
        $dropdownKelurahan->setShowDropDown(true);
        $dropdownKelurahan->setShowErrorMessage(true);
        $dropdownKelurahan->setAllowBlank(false);
        $dropdownKelurahan->setFormula1('MasterDataSheet!$D$2:$D$' . $lastRowKelurahan);
        $activeWorksheet->getCell('B8')->setValue(' - PILIH KELURAHAN -'); 

        /* Dropdown Peternak */
        $dropdownPeternak = $activeWorksheet->getCell('B9')->getDataValidation();
        $dropdownPeternak->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
        $dropdownPeternak->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
        $dropdownPeternak->setErrorTitle('Input error');
        $dropdownPeternak->setError('Value is not in list.');
        $dropdownPeternak->setPromptTitle('Pick from list');
        $dropdownPeternak->setPrompt('Please pick a value from the drop-down list.');
        $dropdownPeternak->setShowDropDown(true);
        $dropdownPeternak->setShowErrorMessage(true);
        $dropdownPeternak->setAllowBlank(false);
        $dropdownPeternak->setFormula1('MasterDataSheet!$E$2:$E$' . $lastRowPeternak);
        $activeWorksheet->getCell('B9')->setValue(' - PILIH PETERNAK -'); 

        /* Dropdown Status PKB */
        $dropdownStatusPKB = $activeWorksheet->getCell('B14')->getDataValidation();
        $dropdownStatusPKB->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
        $dropdownStatusPKB->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
        $dropdownStatusPKB->setErrorTitle('Input error');
        $dropdownStatusPKB->setError('Value is not in list.');
        $dropdownStatusPKB->setPromptTitle('Pick from list');
        $dropdownStatusPKB->setPrompt('Please pick a value from the drop-down list.');
        $dropdownStatusPKB->setShowDropDown(true);
        $dropdownStatusPKB->setShowErrorMessage(true);
        $dropdownStatusPKB->setAllowBlank(false);
        $dropdownStatusPKB->setFormula1('"1 - BUNTING,0 - TIDAK BUNTING"');
        $activeWorksheet->getCell('B14')->setValue(' - PILIH STATUS PKB -'); 

        /* Dropdown Status Kelahiran */
        $dropdownStatusKelahiran = $activeWorksheet->getCell('B16')->getDataValidation();
        $dropdownStatusKelahiran->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
        $dropdownStatusKelahiran->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
        $dropdownStatusKelahiran->setErrorTitle('Input error');
        $dropdownStatusKelahiran->setError('Value is not in list.');
        $dropdownStatusKelahiran->setPromptTitle('Pick from list');
        $dropdownStatusKelahiran->setPrompt('Please pick a value from the drop-down list.');
        $dropdownStatusKelahiran->setShowDropDown(true);
        $dropdownStatusKelahiran->setShowErrorMessage(true);
        $dropdownStatusKelahiran->setAllowBlank(false);
        $dropdownStatusKelahiran->setFormula1('"1 - JANTAN,0 - BETINA"');
        $activeWorksheet->getCell('B16')->setValue(' - PILIH STATUS KELAHIRAN -'); 

        foreach(range(22, 50) as $r){
            $activeWorksheet->getStyle('G' . $r)->getNumberFormat()
                            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDD2);

            $activeWorksheet->getStyle('C' . $r)->applyFromArray([
                'font' => ['bold' => true]
            ]);
            $activeWorksheet->getStyle('A' . $r)->applyFromArray([
                'font' => ['bold' => true]
            ]);

            /* Dropdown Metode Sexing */
            $dropdownMetodeSexing = $activeWorksheet->getCell('C' . $r)->getDataValidation();
            $dropdownMetodeSexing->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
            $dropdownMetodeSexing->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
            $dropdownMetodeSexing->setErrorTitle('Input error');
            $dropdownMetodeSexing->setError('Value is not in list.');
            $dropdownMetodeSexing->setPromptTitle('Pick from list');
            $dropdownMetodeSexing->setPrompt('Please pick a value from the drop-down list.');
            $dropdownMetodeSexing->setShowDropDown(true);
            $dropdownMetodeSexing->setShowErrorMessage(true);
            $dropdownMetodeSexing->setAllowBlank(false);
            $dropdownMetodeSexing->setFormula1('"1,0"');
            $activeWorksheet->getCell('C' . $r)->setValue(' - PILIH METODE SEXING -'); 

            /* Dropdown Bull */
            $dropdownBull = $activeWorksheet->getCell('A' . $r)->getDataValidation();
            $dropdownBull->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
            $dropdownBull->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
            $dropdownBull->setErrorTitle('Input error');
            $dropdownBull->setError('Value is not in list.');
            $dropdownBull->setPromptTitle('Pick from list');
            $dropdownBull->setPrompt('Please pick a value from the drop-down list.');
            $dropdownBull->setShowDropDown(true);
            $dropdownBull->setShowErrorMessage(true);
            $dropdownBull->setAllowBlank(false);
            $dropdownBull->setFormula1('MasterDataSheet!$F$2:$F$' . $lastRowBull);
            $activeWorksheet->getCell('A' . $r)->setValue(' - PILIH BULL -'); 
        }

        $spreadsheet->getSheetByName('MasterDataSheet')->setSheetState(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::SHEETSTATE_VERYHIDDEN);

        $writer = new Xlsx($spreadsheet);
        $filename = 'FORMAT IMPORT LAPORAN PELAKSANAAN IB SEMEN BEKU SEXING BBIB SINGOSARI.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    function importLaporan(){
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'xls|xlsx|XLS|XLSX';
        $config['encrypt_name']     = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('fileImport')) {
            $this->session->set_flashdata('error', "File Yang Di Pilih Tidak Sesuai");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $file = $this->upload->data();
    
            $spreadsheet = new Spreadsheet();
            $inputFileName = './uploads/' . $file['file_name'];
    
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
            $worksheet = $spreadsheet->getActiveSheet();
    
            $PETUGAS = explode(' - ', $worksheet->getCell('B5')->getValue());
            $KOTA = explode(' - ', $worksheet->getCell('B6')->getValue());
            $KECAMATAN = explode(' - ', $worksheet->getCell('B7')->getValue());
            $KELURAHAN = explode(' - ', $worksheet->getCell('B8')->getValue());
            $PETERNAK = explode(' - ', $worksheet->getCell('B9')->getValue());
            $AKSEPTOR = $worksheet->getCell('B10')->getValue();
            $TANGGAL_PKB = $worksheet->getCell('B13')->getFormattedValue();
            $STATUS_PKB = explode(' - ', $worksheet->getCell('B14')->getValue());
            $TANGGAL_KELAHIRAN = $worksheet->getCell('B15')->getFormattedValue();
            $STATUS_KELAHIRAN = explode(' - ', $worksheet->getCell('B16')->getValue());
            $KETERANGAN = $worksheet->getCell('B17')->getValue();
            
            $this->db->insert('laporan', [
                'user_id' => $PETUGAS[0],
                'kabupaten_id' => $KOTA[0],
                'kecamatan_id' => $KECAMATAN[0],
                'kelurahan_id' => $KELURAHAN[0],
                'peternak_id' => $PETERNAK[0],
                'akseptor' => $AKSEPTOR,
                'tgl_pkb' => date('Y-m-d', strtotime($TANGGAL_PKB)),
                'bunting' => $STATUS_PKB[0],
                'tgl_kelahiran' => date('Y-m-d', strtotime($TANGGAL_KELAHIRAN)),
                'kelamin' => $STATUS_KELAHIRAN[0],
                'keterangan' => $KETERANGAN,
            ]);
            if($this->db->affected_rows() > 0){
                $laporainId = $this->db->insert_id();
                $endRow = $worksheet->getHighestRow();

                for($row = 22; $row <= $endRow; $row++){
                    if($worksheet->getCell('A'. $row)->getValue() != NULL && $worksheet->getCell('A'. $row)->getValue() != ' - PILIH BULL -'){
                        $BULL = $worksheet->getCell('A'. $row)->getValue();
                        $sexing = ($worksheet->getCell('D'. $row)->getValue() == 'v') ? 'x' : (($worksheet->getCell('E'. $row)->getValue() == 'v') ? 'y' : (($worksheet->getCell('F'. $row)->getValue() == 'v') ? 'n' : NULL));
        
                        $this->db->insert('ib', [
                            'id_laporan' => $laporainId,
                            'bull_id' => $BULL[0],
                            'kode_batch' => $worksheet->getCell('B'. $row)->getValue(),
                            'metode' => $worksheet->getCell('C' . $row)->getValue(),
                            'sexing' => $sexing,
                            'tgl' => date('Y-m-d', strtotime($worksheet->getCell('G'. $row)->getFormattedValue()))
                        ]);
                    }
                }   
            }

            @unlink($inputFileName);
            $this->session->set_flashdata('success', "Laporan Berhasil Di Import");
            redirect('petugas/pelaporan');
        }
    }
}   