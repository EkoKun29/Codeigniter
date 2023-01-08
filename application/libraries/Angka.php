<?php
Class Angka{


function terbilang($x, $style=4) {

function kekata($xa) {
    $xa = abs($xa);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($xa <12) {
        $temp = " ". $angka[$xa];
    } else if ($xa <20) {
        $temp = kekata($xa - 10). " belas";
    } else if ($xa <100) {
        $temp = kekata($xa/10)." puluh". kekata($xa % 10);
    } else if ($xa <200) {
        $temp = " seratus" . kekata($xa - 100);
    } else if ($xa <1000) {
        $temp = kekata($xa/100) . " ratus" . kekata($xa % 100);
    } else if ($xa <2000) {
        $temp = " seribu" . kekata($xa - 1000);
    } else if ($xa <1000000) {
        $temp = kekata($xa/1000) . " ribu" . kekata($xa % 1000);
    } else if ($xa <1000000000) {
        $temp = kekata($xa/1000000) . " juta" . kekata($xa % 1000000);
    } else if ($xa <1000000000000) {
        $temp = kekata($xa/1000000000) . " milyar" . kekata(fmod($xa,1000000000));
    } else if ($xa <1000000000000000) {
        $temp = kekata($xa/1000000000000) . " trilyun" . kekata(fmod($xa,1000000000000));
    }     
        return $temp;
}

    if($x<0) {
        $hasil = "minus ". trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }     
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }     
    return $hasil;
}

function rupiah($angka){
    
    $hasil_rupiah = "Rp." . number_format($angka,0,',','.');
    return $hasil_rupiah;
}
function rupiah2($angka){
    
    $hasil_rupiah =  number_format($angka,0,',','.');
    return $hasil_rupiah;
}
function volume($angka){ 
    $hasil_rupiah = number_format($angka,2,'.',',');
    return $hasil_rupiah;
}

function sort_kata($kalimat){
$jumlah = "1";
$hasil = implode(" ", array_slice(explode(" ", $kalimat), 0, $jumlah));
return $hasil;
}

}
?>
