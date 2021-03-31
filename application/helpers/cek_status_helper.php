<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function cekStatus($status){
        if($status=="permohonan_kec"){
          return  $st = "Permohonan Kecamatan";
        }elseif($status=="approved_kec"){
          return  $st = "Disetujui Kecamatan";
        }elseif($status=="permohonan_bpkad"){
          return  $st = "Permohonan Bpkad";
        }elseif($status=="approved_bpkad"){
           return $st = "Disetujui Bpkad";
        }else{
           return $st = "Unknown";
        }
    }

function approveStatusKec($status,$desaid,$tahun,$bulan){
    if($status=="permohonan_kec"){  
          return  $st = "<a href='javascript:;' style='width:130px; padding:10px;' class='btn btn-warning' onclick='approve(".substr($desaid,0,2).",".substr($desaid,3,4).",".$tahun.",".$bulan.")'><span class='fa fa-check-circle'></span> Approve</a>";
        }elseif($status=="approved_kec"){
          return  $st = "<a onclick='cancel(".substr($desaid,0,2).",".substr($desaid,3,4).",".$tahun.",".$bulan.")' style='width:130px; padding:10px;' href='javascript:;' class='btn btn-success'><span class='fa fa-bookmark'></span> Approved</a>";
        }elseif($status=="permohonan_bpkad"){
          return  $st = "<a href='javascript:;' style='width:130px; padding:10px;' class='btn btn-success'><span class='fa fa-bookmark' onclick='cancel(".substr($desaid,0,2).",".substr($desaid,3,4).",".$tahun.",".$bulan.")'></span> Approved</a>";
        }elseif($status=="approved_bpkad"){
           return  $st = "<a href='#' style='width:130px; padding:10px;' class='btn btn-success'><span class='fa fa-bookmark'></span>  Approved Bpkad</a>";
        }else{
           return $st = "<a href='#' style='width:130px; padding:10px;' class='btn btn-danger'>Belum Ada Permohonan</a>";
        }
    
}


function approveStatusKecByPengelola($status,$desaid,$tahun,$bulan){
    if($status=="permohonan_kec"){  
          return  $st = "<a href='javascript:;' style='width:130px; padding:10px;' class='btn btn-warning' onclick='approve_desa(".substr($desaid,0,2).",".substr($desaid,3,4).",".$tahun.",".$bulan.")'><span class='fa fa-check-circle'></span> Approve</a>";
        }elseif($status=="approved_kec"){
          return  $st = "<a onclick='cancel_desa(".substr($desaid,0,2).",".substr($desaid,3,4).",".$tahun.",".$bulan.")' style='width:130px; padding:10px;' href='javascript:;' class='btn btn-success'><span class='fa fa-bookmark'></span> Approved</a>";
        }elseif($status=="permohonan_bpkad"){
          return  $st = "<a href='javascript:;' style='width:130px; padding:10px;' class='btn btn-success'><span class='fa fa-bookmark' onclick='cancel_desa(".substr($desaid,0,2).",".substr($desaid,3,4).",".$tahun.",".$bulan.")'></span> Approved</a>";
        }elseif($status=="approved_bpkad"){
           return  $st = "<a href='#' style='width:130px; padding:10px;' class='btn btn-success'><span class='fa fa-bookmark'></span>  Approved Bpkad</a>";
        }else{
           return $st = "<a href='#' style='width:130px; padding:10px;' class='btn btn-danger'>Belum Ada Permohonan</a>";
        }
    
}


function approveStatusSispermades($status,$kecid,$valueapprove,$tahun,$bulan){

        // $cek_desa_null = $this->permohonan_model->getAll();
        if($status=="permohonan_kec" OR $valueapprove != 0){  
          return  $st = "<a href='#' style='width:130px; padding:10px;' class='btn btn-danger'><span class='fa fa-circle-o-notch'></span> Pengecekan</a>";
        }elseif($status=="approved_kec"){
          return  $st = "<a href='javascript:;' style='width:130px; padding:10px;' class='btn btn-warning' onclick='approve(".$kecid.",".$tahun.",".$bulan.")'> <span class='fa fa-check-circle'></span> Approve</a>";
        }elseif($status=="approved_bpkad"){
           return  $st = "<a href='javascript:;' style='width:130px; padding:10px;' class='btn btn-success' onclick='cancel(".$kecid.",".$tahun.",".$bulan.")'><span class='fa fa-bookmark'></span> Approved</a>";
        }else{
           return $st = "<a href='#' style='width:130px; padding:10px;' class='btn btn-danger'><span class='fa fa-circle-o-notch'></span> Proses</a>";
        }
    
}


function pns($status){
  if($status==1){
    return "PNS";
  }else{
    return "TIDAK PNS";
  }

}
