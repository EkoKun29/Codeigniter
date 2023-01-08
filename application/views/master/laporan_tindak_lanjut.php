<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
            <section class="content">
                    <h3 class="m-0 text-dark">Laporan Tindak Lanjut</h3>
                    <br>

                    <style>
                        .dropbtn {
                        background-color: #04AA6D;;
                        color: white;
                        padding: 6px 20px;
                        font-size: 14px;
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
                        min-width: 200px;
                        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                        z-index: 1;
                        }

                        .dropdown-content a {
                        color: black;
                        padding: 7px 20px;
                        font-size: 14px;
                        text-decoration: none;
                        display: block;
                        }

                        .dropdown-content a:hover {background-color: #ddd;}

                        .dropdown:hover .dropdown-content {display: block;}

                        .dropdown:hover .dropbtn {background-color: #3e8e41;}
                        </style>
                            <div class="dropdown">
                            <button class="dropbtn"><i class="fa fa-file-text">Laporan</i></button>
                            <div class="dropdown-content">
                                <a href="<?php echo base_url('master/laporan/detail/laporanaduan')?>">Laporan Aduan</a>
                                <a href="<?php echo base_url('master/laporan/detail/laporantindaklanjut')?>">Laporan Tindak Lanjut</a>
                            </div><table class="table">
                            </div>

                        <a class="btn btn-danger" href="<?php echo base_url('master/laporan/export/') ?>"><i class="fa fa-print">Cetak</i></a>
                <table class="table">
                    <tr>
                        <td>No</td>
                        <td>Nama Pengurus</td>
                        <td>Waktu Masuk</td>
                        <td>Progres</td>
                        <td>Deskripsi</td>
                        <td>Waktu Penyelesaian</td>
                    </tr>  
                <?php
                    $no=1;
                    foreach($laporan as $data){
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data->TindakLanjutDari; ?></td>
                        <td><?php echo $data->TindakLanjutTgl; ?></td>
                        <td><?php echo $data->TindakLanjutProses; ?></td>
                        <td><?php echo $data->TindakLanjutDeskripsi; ?></td>
                        <td><?php echo $data->TindakLanjutTglSelesai; ?></td>
                    </tr>
                    <?php } ?>
                </table>
                <br>  
                <span class = "badge bg-warning">Total Laporan : <?php echo $count; ?></span>
            </div>
        </div>    
    </div>
</div>

>>>>>>> e3966c814671b40a22d011a1afe0d0bfc7bbba00
