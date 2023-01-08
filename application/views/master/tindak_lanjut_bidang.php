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

<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tindak Lanjut</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


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
                    <h3 class="card-title">Tindak Lanjut</h3>
                    <div class="row">
                        <div class="card"> </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example2">
                                <thead>
                                    <tr>
                                        <th>Tiket</th>
                                        <th>Nama Pengirim</th>
                                        <th>Tgl Tindak Lanjut</th>
                                        <!-- <th>Deskripsi</th> -->
                                        <th>Proses</th>
                                        <th style="width:100px;">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($aduan as $data) {
                                        $aduan = $this->tindak_lanjut_model->getId($data->TindakLanjutAduanId);
                                        if ($data->TindakLanjutProses == "selesai") {
                                            $status_proses = "badge-success";
                                        } elseif ($data->TindakLanjutProses == "dibatalkan") {
                                            $status_proses = "badge-danger";
                                        } else {
                                            $status_proses = "badge-warning";
                                        }

                                    ?>
                                        <tr <?php if ($aduan->AduanId == $aduanid->AduanId) {
                                                echo "style='background-color:rgb(0, 180, 255); color:white'";
                                            } ?>>
                                            <td><?= $aduan->NoTiket; ?></td>
                                            <td><?= $aduan->AduanNamaPengirim; ?></td>
                                            <td><?= $data->TindakLanjutTgl; ?></td>
                                            <!-- <td><?= $data->TindakLanjutDeskripsi; ?></td> -->
                                            <td>
                                                <div class="badge <?= $status_proses ?> badge-fw"><?= $aduan->TindakLanjutProses; ?></div>
                                            </td>
                                            <td>
                                                <a href="<?= base_url("master/tindak_lanjut/detail/" . $aduan->AduanId) ?>" class="btn btn-primary">
                                                    <i class="ace-icon fa fa-list bigger-120"></i>
                                                </a>
                                                <!-- <a href="<?= base_url("master/tindak_lanjut/update/update/" . $aduanid->AduanId) ?>" class="btn btn-info">
                                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                </a> -->
                                                <?php if ($data->TindakLanjutProses == "tindak_lanjut") { ?>
                                                    <a href="#" onclick="tindak_lanjut(<?= $data->TindakLanjutId ?>)" class="btn btn-success">
                                                        <i class="ace-icon fa fa-check bigger-120"></i>
                                                    </a>
                                                <?php } ?>
                                                <a href="#" class="btn btn-warning create-forward" data-id="<?= $aduanid->TindakLanjutAduanId; ?>">
                                                <i class="fa fa-mail-forward"></i>
                                            </a>
                                                <a href="#" onclick="hapus(<?= $data->TindakLanjutId ?>)" class="btn btn-danger">
                                                        <i class="ace-icon fa fa-trash bigger-120"></i>
                                                    </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">PROSES TINDAK LANJUT</h4>
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
                        <!-- <tr>
                            <td>Pengirim: </td>
                            <td><b><?= $aduanid->AduanNamaPengirim ?></b> </td>
                        </tr>
                        <tr>
                            <td>Tindak Lanjut: </td>
                            <td><b><?= $aduanid->TindakLanjutDari ?></b> </td>
                        </tr> -->
<?php 

$tindaklanjut = $this->tindak_lanjut_model->getForward($aduanid->AduanId,$_SESSION['desktik']['kdlokasi'],20000);
if($tindaklanjut->TindakLanjutForward != NULL){?>
                        <tr>
                            <td>Forward Tindak Lanjut: </td>
                            <td><b><?= $tindaklanjut->TindakLanjutForward ?></b> </td>
                        </tr>
<?php } ?>
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
                                    <?php if ($tindaklanjutid->AduanProses == "diterima") { ?>
                                        <?php if ($tindaklanjutid->TindakLanjutProses == "selesai") {
                                            echo "Sudah Selesai";
                                        } else {
                                            echo "Belum Selesai";
                                        } ?>
                                    <?php } else { ?>
                                        <span style="color: grey;">Tindak Lanjut Belum Selesai</span>

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

    $(function() {
        $(document).on('click', '.create-deskripsi', function(e) {
            e.preventDefault();
            $("#myModal").modal('show');
            $.post('<?php echo base_url('master/tindak_lanjut/update/deskripsi'); ?>', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $(".modal-body").html(html);
                }
            );
        });
    });
    $(function() {
        $(document).on('click', '.create-forward', function(e) {
            e.preventDefault();
            $("#myModal").modal('show');
            $.post('<?php echo base_url('master/tindak_lanjut/update/forward'); ?>', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $(".modal-body").html(html);
                }
            );
        });
    });
    function tindak_lanjut(id) {
        bootbox.confirm({
            message: "Apakah anda yakin akan menindak lanjut permohonan ini?",
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
                        '<?= base_url("master/tindak_lanjut_do/update/selesai") ?>', {
                            id: id
                        },
                        function(data) {
                            if (data.success) {
                                $.gritter.add({
                                    title: 'Informasi',
                                    text: 'Data berhasil Diselesaikan.',
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


    function hapus(id) {
        bootbox.confirm({
            message: "Apakah anda yakin akan menghapus data ini?",
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
                        '<?= base_url("master/tindak_lanjut_do/delete") ?>', {
                            id: id
                        },
                        function(data) {
                            if (data.success) {
                                $.gritter.add({
                                    title: 'Informasi',
                                    text: 'Data berhasil Dihapus.',
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