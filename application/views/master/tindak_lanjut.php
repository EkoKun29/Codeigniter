<?php
function Proses($aduan_id, $aduan_proses, $aduan_deskripsi, $status)
{
    // if ($aduan_id != NULL) {
    //     if ($aduan_proses == "permohonan") {
    //         $deskripsi = $aduan_deskripsi;
    //     }
    // } else {
    // }
}
?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="btn-group pull-right">
                        <a href="<?= base_url('master/aduan/add') ?>" class="btn btn-success">
                            <i class="fa fa-plus"></i> Tambah Baru
                        </a>
                    </div> -->
                    <h3 class="card-title">PROSES TINDAK LANJUT</h3>
                    <div class="row">
                        <div class="card"> </div>
                        <div class="table-responsive">
                        <div class="mt-5">
                    <div class="timeline">
                        <div class="timeline-wrapper timeline-wrapper-warning">
                            <div class="timeline-badge"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h6 class="timeline-title">Permohonan</h6>
                                </div>
                                <div class="timeline-body">
                                    <?php if ($aduanid != NULL) { ?>
                                        <?= $aduanid->AduanDeskripsi ?>
                                    <?php } else { ?>

                                        <span style="color: grey;">Tindak Lanjut Belum Dipilih</span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php foreach($tindaklanjutid as $data){?>
<?php if($data->TindakLanjutProses =="selesai"){?>
    <div  class="timeline-wrapper timeline-inverted timeline-wrapper-success">
                                <?php }else{ ?>
                                    <div  class="timeline-wrapper timeline-inverted timeline-wrapper-danger">
                                <?php } ?>
                        
                            <div class="timeline-badge"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                <?php if($data->TindakLanjutProses =="selesai"){?>
                                    <h6 class="timeline-title" style="color:green"><span class="fa fa-check-circle"></span> <?= $data->TindakLanjutDari?></h6>
                                <?php }else{ ?>
                                    <h6 class="timeline-title" style="color:orange"><span class="fa fa fa-window-close"></span> <?= $data->TindakLanjutDari?></h6>
                                <?php } ?>
                                </div>
                                <div class="timeline-body">
                                    <?php if ($data->AduanProses == "diterima") { ?>
                                        <?php if ($data->TindakLanjutKdLokasi == $_SESSION['desktik']['kdlokasi']) {
                                            echo $data->TindakLanjutDeskripsi;
                                        ?>
                                        <span style="color:grey; font-size:12px"><?= $data->TindakLanjutTgl?></span>
                                        
                                            <a href="#" class="btn btn-success create-deskripsi" data-id="<?= $data->TindakLanjutId; ?>">
                                                <i class="fa fa-plus"></i> Edit Deskripsi
                                            </a>
                                        <?php
                                        } else { ?>
                                           <?= $data->TindakLanjutDeskripsi; ?>
                                           <span style="color:grey; font-size:12px"><?= $data->TindakLanjutTgl?></span>
                                       <?php }
                                        ?>
                                    <?php } else { ?>
                                        <span style="color: grey;">Belum Ada Tindak Lanjut</span>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- <div class="timeline-wrapper timeline-wrapper-success">
                            <div class="timeline-badge"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h6 class="timeline-title">Selesai</h6>
                                </div>
                                <div class="timeline-body">
                                    <?php if ($aduanid->AduanProses == "diterima") { ?>
                                        <?php if ($aduanid->TindakLanjutProses == "selesai") {
                                            echo "Sudah Selesai";
                                        } else {
                                            echo "Belum Selesai";
                                        } ?>
                                    <?php } else { ?>
                                        <span style="color: grey;">Belum Ada Tindak Lanjut</span>

                                    <?php } ?>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">DETAIL</h4>
                    <p class="card-description">
                        <?php if ($aduanid != NULL) { ?>
                    <h4></h4>
                    <table class="table table-bordered" id="example2">
                        <tr>
                            <td>Kategori: </td>
                            <td><b><?= $aduanid->KategoriNama ?></b> </td>
                        </tr>
                        <tr>
                            <td>Deskripsi Permohonan: </td>
                            <td><b><?= $aduanid->AduanDeskripsi ?></b> </td>
                        </tr>
                        <tr>
                            <td>Pengirim: </td>
                            <td><b><?= $aduanid->AduanNamaPengirim ?></b> </td>
                        </tr>
                        <tr>
                            <td>Tindak Lanjut: </td>
                            <td><b><?= $aduanid->TindakLanjutDari ?></b> </td>
                        </tr>
                        
                        <tr>
                            <td>Tanggal Permohonan: </td>
                            <td><b><?= $aduanid->AduanTglPermohonan    ?></b> </td>
                        </tr>

                        
                    </table>
                    <br>
                    <!-- <span style="color: grey;"><?= $aduanid->TindakLanjutTgl ?></span> -->

                    <?php if ($aduanid->AduanFiles1 != NULL) { ?>
                        <div class="wrapper d-flex align-items-center py-2 border-bottom">
                            <div class="wrapper ml-3">
                                <h6 class="ml-1 mb-1">Files 1</h6>
                                <small class="text-muted mb-0"><i class="mdi mdi-map-marker-outline mr-1"></i><a href="<?= base_url("files/".$aduanid->AduanFiles1) ?>"><?= $aduanid->AduanFiles1 ?></a></small>
                            </div>
                            <div class="badge badge-pill badge-info ml-auto px-1 py-1"><i class="mdi mdi-check font-weight-bold"></i></div>
                        </div>
                    <?php } ?>
                    <?php if ($aduanid->AduanFiles2 != NULL) { ?>
                        <div class="wrapper d-flex align-items-center py-2 border-bottom">
                            <div class="wrapper ml-3">
                                <h6 class="ml-1 mb-1">Files 2</h6>
                                <small class="text-muted mb-0"><i class="mdi mdi-map-marker-outline mr-1"></i><a href="<?= base_url("files/".$aduanid->AduanFiles2) ?>"><?= $aduanid->AduanFiles2 ?></a></small>
                            </div>
                            <div class="badge badge-pill badge-info ml-auto px-1 py-1"><i class="mdi mdi-check font-weight-bold"></i></div>
                        </div>
                    <?php } ?>

                    <?php if ($aduanid->AduanFiles3 != NULL) { ?>
                        <div class="wrapper d-flex align-items-center py-2 border-bottom">
                            <div class="wrapper ml-3">
                                <h6 class="ml-1 mb-1">Files 3</h6>
                                <small class="text-muted mb-0"><i class="mdi mdi-map-marker-outline mr-1"></i><a href="<?= base_url("files/".$aduanid->AduanFiles3) ?>"><?= $aduanid->AduanFiles3 ?></a></small>
                            </div>
                            <div class="badge badge-pill badge-info ml-auto px-1 py-1"><i class="mdi mdi-check font-weight-bold"></i></div>
                        </div>
                    <?php } ?>




                <?php } else { ?>
                    <span style="color: grey;">Tindak Lanjut Belum Dipilih</span>
                <?php } ?>
                </p>
                
                </div>
            </div>
        </div>

    </div>
</div>



<script type="text/javascript" src="<?= base_url("template/backend/js/jquery.js") ?>"></script>
<script type="text/javascript">
    /*
    $(function() {
        $("#data-table").tabel({
            source: '<?= base_url("master/kategori/search") ?>',
            filterParams: $("div#data-table_wrapper").find("select").serializeArray(),
            order: [[ 2, 'asc' ]],
            columns: [		            	
                {bVisible: false,data :'KecId'},  
                {title: 'ID' , data : 'KecId'},
                {title: 'Kabupaten' , data : 'KabNama'},
                {title: 'kategori' , data : 'KecNama'},
                {title: 'Aksi' , data : 'aksi'},
            ]
        });
    });
    

    */
    function hapus(id) {
        bootbox.confirm({
            message: "Apakah anda yakin akan menghapus data Data ini?",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Batal',
                    className: "btn-danger btn-sm"
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Yakin',
                    className: "btn-primary btn-sm"
                }
            },
            callback: function(result) {
                if (result) {
                    $.post(
                        '<?= base_url("master/aduan_do/delete") ?>', {
                            id: id
                        },
                        function(data) {
                            if (data.success) {
                                $.gritter.add({
                                    title: 'Informasi',
                                    text: 'Data berhasil dihapus.',
                                    class_name: 'gritter-info gritter-center'
                                });
                                $("#data-table").tabel({
                                    reload: true
                                });
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1000);
                            } else {
                                bootbox.alert(data.msg);
                            }
                        }, "json"
                    );
                }
            }
        });
    }
</script>