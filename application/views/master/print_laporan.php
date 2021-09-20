<?php
    $html = '
        <h3 align="center">Laporan Tindak Lanjut</h3>
        <table border="1" align="center">
        <tr>
            <td>No</td>
            <td>Nama Pengurus</td>
            <td>Waktu Masuk</td>
            <td>Progres</td>
            <td>Deskripsi</td>
            <td>Waktu Penyelesaian</td>
        </tr>    
    ';
    $no=1;
    foreach($laporan as $data){
        $html .='
        <tr>
            <td>'.$no++.'</td>
            <td>'.$data->TindakLanjutDari.'</td>
            <td>'.$data->TindakLanjutTgl.'</td>
            <td>'.$data->TindakLanjutProses.'</td>
            <td>'.$data->TindakLanjutDeskripsi.'</td>
            <td>'.$data->TindakLanjutTglSelesai.'</td>
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