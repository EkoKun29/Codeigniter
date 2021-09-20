<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <section class="content">
                    <h1 class="m-0 text-dark">Laporan Aduan</h1>
                    <br>
                    <style>
                        .dropbtn {
                        background-color: #04AA6D;;
                        color: white;
                        padding: 8px 20px;
                        font-size: 12px;
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
                        font-size: 12px;
                        text-decoration: none;
                        display: block;
                        }

                        .dropdown-content a:hover {background-color: #ddd;}

                        .dropdown:hover .dropdown-content {display: block;}

                        .dropdown:hover .dropbtn {background-color: #3e8e41;}
                        </style>
                            <div class="dropdown">
                            <button class="dropbtn">Laporan</button>
                            <div class="dropdown-content">
                                <a href="<?php echo base_url('master/laporan/detail/laporanaduan')?>">Laporan Aduan</a>
                                <a href="<?php echo base_url('master/laporan/detail/laporantindaklanjut')?>">Laporan Tindak Lanjut</a>
                            </div>
                            </div>
                            
                <table class="table">
                    <tr>
                        <td>No</td>
                        <td>Nama Pengurus</td>
                        <td>Waktu</td>
                        <td>Progres</td>
                    </tr>  
                
                </table>
            </div>
        </div>    
    </div>
</div>