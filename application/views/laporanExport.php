<table>
    <tbody>
        <tr>
            <td style="text-align: center !important; font-weight: bold; font-size: 18px" colspan="19">LAPORAN PELAKSANAAN IB SEMEN BEKU SEXING</td>
        </tr>
        <tr>
            <td style="text-align: center !important; font-weight: bold; font-size: 18px" colspan="19">BBIB SINGOSARI</td>
        </tr>

        <tr>
            <td colspan="19"></td>
        </tr>

        <tr>
            <td rowspan="2" style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;">&nbsp;&nbsp;PETUGAS&nbsp;&nbsp;</td>
            <td rowspan="2" style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;">&nbsp;&nbsp;LOKASI&nbsp;&nbsp;</td>
            <td rowspan="2" style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;">&nbsp;&nbsp;PETERNAK&nbsp;&nbsp;</td>
            <td rowspan="2" style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;">&nbsp;&nbsp;AKSEPTOR&nbsp;&nbsp;</td>
            <td rowspan="2" style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;">&nbsp;&nbsp;NAMA BULL&nbsp;&nbsp;</td>
            <td rowspan="2" style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;">&nbsp;&nbsp;KODE BULL&nbsp;&nbsp;</td>
            <td rowspan="2" style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;">&nbsp;&nbsp;METODE&nbsp;&nbsp;</td>
            <td rowspan="2" style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;">&nbsp;&nbsp;KODE BATCH&nbsp;&nbsp;</td>
            <td colspan="2" style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;">&nbsp;&nbsp;SEXING&nbsp;&nbsp;</td>
            <td rowspan="2" style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;">&nbsp;&nbsp;UNSEXING&nbsp;&nbsp;</td>
            <td rowspan="2" style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;">&nbsp;&nbsp;TANGGAL IB&nbsp;&nbsp;</td>
            <td colspan="3" style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;">&nbsp;&nbsp;PKB&nbsp;&nbsp;</td>
            <td colspan="3" style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;">&nbsp;&nbsp;KELAHIRAN&nbsp;&nbsp;</td>
            <td rowspan="2" style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;">&nbsp;&nbsp;KEBERHASILAN&nbsp;&nbsp;</td>
            <td rowspan="2" style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;">&nbsp;&nbsp;KETERANGAN&nbsp;&nbsp;</td>
        </tr>
        <tr>
            <td style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;" >&nbsp;&nbsp;x&nbsp;&nbsp;</td>
            <td style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;" >&nbsp;&nbsp;y&nbsp;&nbsp;</td>
            <td style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;" >&nbsp;&nbsp;TANGGAL&nbsp;&nbsp;</td>
            <td style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;" >&nbsp;&nbsp;+&nbsp;&nbsp;</td>
            <td style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;" >&nbsp;&nbsp;-&nbsp;&nbsp;</td>
            <td style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;" >&nbsp;&nbsp;TANGGAL&nbsp;&nbsp;</td>
            <td style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;" >&nbsp;&nbsp;JTN&nbsp;&nbsp;</td>
            <td style="background-color: #E0E0E0; text-align: center; font-weight: bold; white-space: nowrap;" >&nbsp;&nbsp;BTN&nbsp;&nbsp;</td>
        </tr>
        
        <?php foreach($data->result() as $row){ 
            $ib = $this->db->select('b.bull, b.kode, ib.*')
                            ->from('ib')
                            ->join('bull b', 'ib.bull_id = b.id')
                            ->where('ib.id_laporan', $row->id)->get();
            $rowspanIb = $ib->num_rows();


            $currentLaporanId = '';
            $bunting = ($row->bunting == 1 && $row->bunting != NULL) ? 'v' : '-';
            $tdk_bunting = ($row->bunting == 0 && $row->bunting != NULL) ? 'v' : '-';
            $jantan = ($row->kelamin == 1 && $row->kelamin != NULL) ? 'v' : '-';
            $betina = ($row->kelamin == 0 && $row->kelamin != NULL) ? 'v' : '-';

            foreach($ib->result() as $i){
                $lapid = $row->id;
                $x = ($i->sexing == 'x' && $i->sexing != NULL) ? 'v' : '-';
                $y = ($i->sexing == 'y' && $i->sexing != NULL) ? 'v' : '-';
                $n = ($i->sexing == 'n' && $i->sexing != NULL) ? 'v' : '-';

                if($lapid !== $currentLaporanId){
                    $currentLaporanId = $lapid;
                    echo "<tr>";
                    echo "<td style='white-space: nowrap;' rowspan='$rowspanIb'> $row->nama </td>";
                    echo "<td style='white-space: nowrap;' rowspan='$rowspanIb'> " . $row->kabupaten_name . ",  " . $row->kecamatan_name . " </td>";
                    echo "<td style='white-space: nowrap;' rowspan='$rowspanIb'> $row->peternak </td>";
                    echo "<td style='white-space: nowrap;' rowspan='$rowspanIb'> $row->akseptor </td>";
                    echo "<td style='white-space: nowrap;'> $i->bull </td>";
                    echo "<td style='white-space: nowrap;'> $i->kode </td>";
                    echo "<td style='text-align: center; white-space: nowrap;'> $i->metode </td>";
                    echo "<td style='white-space: nowrap;'> $i->kode_batch </td>";
                    echo "<td style='text-align: center'> $x </td>";
                    echo "<td style='text-align: center'> $y </td>";
                    echo "<td style='text-align: center'> $n </td>";
                    echo "<td style='text-align: center; white-space: nowrap;' rowspan='$rowspanIb'> " . longdate_indo(date('Y-m-d', strtotime($i->tgl))) . " </td>";
                    echo "<td style='text-align: center; white-space: nowrap;' rowspan='$rowspanIb'> " . longdate_indo(date('Y-m-d', strtotime($row->tgl_pkb))) . " </td>";
                    echo "<td style='text-align: center; white-space: nowrap;' rowspan='$rowspanIb'> $bunting </td>";
                    echo "<td style='text-align: center; white-space: nowrap;' rowspan='$rowspanIb'> $tdk_bunting </td>";
                    echo "<td style='text-align: center; white-space: nowrap;' rowspan='$rowspanIb'> " . longdate_indo(date('Y-m-d', strtotime($row->tgl_kelahiran))) . " </td>";
                    echo "<td style='text-align: center; white-space: nowrap;' rowspan='$rowspanIb'> $jantan </td>";
                    echo "<td style='text-align: center; white-space: nowrap;' rowspan='$rowspanIb'> $betina </td>";
                    echo "<td rowspan='$rowspanIb'></td>";
                    echo "<td rowspan='$rowspanIb'> $row->keterangan </td>";
                }else{
                    echo "<tr>";
                    echo "<td style='white-space: nowrap;'> $i->bull </td>";
                    echo "<td style='white-space: nowrap;'> $i->kode </td>";
                    echo "<td style='text-align: center; white-space: nowrap;'> $i->metode </td>";
                    echo "<td style='white-space: nowrap;'> $i->kode_batch </td>";
                    echo "<td style='text-align: center'> $x </td>";
                    echo "<td style='text-align: center'> $y </td>";
                    echo "<td style='text-align: center'> $n </td>";
                }

                echo "</tr>";
            }
        } ?>
    </tbody>
</table>