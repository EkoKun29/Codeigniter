<?php
    $html = '
        <h3 align="center">Proses Laporan Aduan</h3>
        <table border="1" align="center">
        <tr>
        <td>No</td>
        <td>Nama Pengirim</td>
        <td>Deskripsi</td>
        <td>Proses</td>
        <td>Tanggal Permohonan</td>
        </tr>    
    ';
    $no=1;
    foreach($laporan as $data){
        $html .='
        <tr>
            <td>'.$no++.'</td>
            <td>'.$data->AduanNamaPengirim.'</td>
            <td>'.$data->AduanDeskripsi.'</td>
            <td>'.$data->AduanProses.'</td>
            <td>'.$data->AduanTglPermohonan.'</td>
            
        </tr>    
        ';
    }
    $html .='
    </table>
    ';
    require_once('vendor/TCPDF/tcpdf.php');
    $pdf = new TCPDF('p','mm','A4');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->AddPage();
    $pdf->SetHeaderData();
    $pdf->WriteHTML($html);
    $pdf->Output('Laporan.pdf');
    exit;
?>
