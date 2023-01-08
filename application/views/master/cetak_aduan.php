<?php
    $html = '
        <h3 align="center">Laporan Aduan</h3>
        <table border="1" align="center">
        <tr>
        <td>No</td>
        <td>NIP</td>
        <td>Pemohon</td>
        <td>Deskripsi</td>
        <td>Waktu</td>
        </tr>    
    ';
    $no=1;
    foreach($laporan as $data){
        $html .='
        <tr>
            <td>'.$no++.'</td>
            <td>'.$data->AduanNipPengirim.'</td>
            <td>'.$data->AduanNamaPengirim.'</td>
            <td>'.$data->AduanDeskripsi.'</td>
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