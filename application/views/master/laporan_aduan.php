<!DOCTYPE html>
<div class="content-wrapper">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-12">
<section class="content">
<h1 class="m-0 text-dark">Laporan Aduan</h1>

<style>

.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 5px 20px;
  font-size: 16px;
  border: none;
  border-radius: 4px;
}
.eko {
  background-color: #05f0f0;
  color: white;
  padding: 5px 20px;
  font-size: 16px;
  border: none;
  border-radius: 4px;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  font-size: 12px;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 7px 20px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

<div class="dropdown">
  <button class="dropbtn"><btn class="fa fa-arrow-down">Kategori Id</button>
  <div class="dropdown-content">
  <?php
foreach ($kategori as $data){
 ?>
    <a href="<?php echo base_url('master/Laporan/export/'.$data->KategoriId) ?>">  <?php echo $data->KategoriNama?></a>
<?php
}?>
  </div>
</div>
<div class="dropdown">
  <button class="eko"><btn class="fa fa-arrow-down">Proses</button>
  <div class="dropdown-content">
  <?php
foreach ($kategori as $data){
  ?>
    <a href="<?php echo base_url('master/Laporan/search/'.$data->KategoriSeksi) ?>">  <?php echo $data->KategoriNama?></a>
<?php
}?>  
</div> </div>

    <a class="btn btn-danger" href="<?php echo base_url('master/Laporan/Cetak/cetak_aduan') ?>"> <i class="fa fa-print">Cetak</i></a>

<table class="table">
    <tr>
        <td>No</td>
        <td>NIP</td>
        <td>Pemohon</td>
        <td>Deskripsi</td>
        <td>Waktu</td>
        </tr>


<?php
$no=1;
foreach ($laporan as $data):
 ?>
 <tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $data->AduanNipPengirim; ?></td>
    <td><?php echo $data->AduanNamaPengirim; ?></td>
    <td><?php echo $data->AduanDeskripsi; ?></td>
    <td><?php echo $data->AduanTglPermohonan; ?></td>
</tr>
<?php endforeach; ?>
</table>
</div>
</div>
</div>
</div>

</html>