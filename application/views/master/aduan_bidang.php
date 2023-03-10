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
                <h4 class="modal-title">Deskripsi Aduan di Tolak</h4>
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
                    <h3 class="card-title">Permohonan</h3>
                    <div class="row">
                        <div class="card"> </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example2">
                                <thead>
                                    <tr>
                                        <th>Tiket</th>
                                        <th>Pengirim</th>
                                        <th>Instansi</th>
                                        <th>Status</th>
                                        <th style="width:100px;">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                    foreach($KategoriByKdLokasi as $kategori){
                                        $aduanByKategori = $this->aduan_model->getAllByBidang($kategori->KategoriId);
                                    
                                    foreach ($aduanByKategori as $data) {
                                        if ($data->AduanProses == "diterima") {
                                            $status_proses = "badge-success";
                                        } elseif ($data->AduanProses == "ditolak") {
                                            $status_proses = "badge-danger";
                                        } else {
                                            $status_proses = "badge-warning";
                                        }

                                    ?>
                                        <tr <?php if ($data->AduanId == $aduanid->AduanId) {
                                                echo "style='background-color:rgb(0, 180, 255); color:white'";
                                            } ?>>
                                            <td><?= $data->NoTiket; ?></td>
                                            <td><?= $data->AduanNamaPengirim; ?><br>
                                            <span style="color:green"><?= $data->nmjabatan; ?></span></td>
                                            <td><?= $data->nminstansi; ?></td>
                                            <td>
                                                <div class="badge <?= $status_proses ?> badge-fw"><?= $data->AduanProses; ?></div>
                                            </td>
                                            <td><?php if ($data->AduanProses == "permohonan") { ?>
                                                <a href="<?= base_url("master/aduan/detail/" . $data->AduanId) ?>" class="btn btn-primary">
                                                        <i class="ace-icon fa fa-list bigger-120"></i>
                                                    </a>
                                                    <a href="#" onclick="tindak_lanjut(<?= $data->AduanId ?>)" class="btn btn-success">
                                                        <i class="ace-icon fa fa-check bigger-120"></i>
                                                    </a>
                                                    <a href="#" onclick="tolak_aduan(<?= $data->AduanId ?>)" class="btn btn-danger">
                                                        <i class="ace-icon fa fa-close bigger-120"></i>
                                                    </a>
                                                    <a href="<?= base_url("master/aduan/update/" . $data->AduanId) ?>" class="btn btn-info">
                                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                    </a>
                                                <?php } else { ?>
                                                <a href="<?= base_url("master/aduan/detail/" . $data->AduanId) ?>" class="btn btn-primary">
                                                        <i class="ace-icon fa fa-list bigger-120"></i>
                                                    </a>

                                                <?php } ?>

                                        </tr>
                                    <?php } } ?>
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
                    <h4 class="card-title">PROSES PERMOHONAN</h4>
                    <p class="card-description">
                        <?php if ($aduanid != NULL) { ?>
                    <h4><?= $aduanid->KategoriNama ?>

                    </h4><br>
                    <span style="color: grey;"><?= $aduanid->AduanTglPermohonan ?></span>

                    <?php if ($aduanid->AduanFiles1 != NULL) { ?>
                        <div class="wrapper d-flex align-items-center py-2 border-bottom">
                            <div class="wrapper ml-3">
                                <h6 class="ml-1 mb-1">Files 1</h6>
                                <small class="text-muted mb-0"><i class="mdi mdi-map-marker-outline mr-1"></i><a href="<?= base_url("files/" . $aduanid->AduanFiles1) ?>"><?= $aduanid->AduanFiles1 ?></a></small>
                            </div>
                            <div class="badge badge-pill badge-info ml-auto px-1 py-1"><i class="mdi mdi-check font-weight-bold"></i></div>
                        </div>
                    <?php } ?>
                    <?php if ($aduanid->AduanFiles2 != NULL) { ?>
                        <div class="wrapper d-flex align-items-center py-2 border-bottom">
                            <div class="wrapper ml-3">
                                <h6 class="ml-1 mb-1">Files 2</h6>
                                <small class="text-muted mb-0"><i class="mdi mdi-map-marker-outline mr-1"></i><a href="<?= base_url("files/" . $aduanid->AduanFiles2) ?>"><?= $aduanid->AduanFiles2 ?></a></small>
                            </div>
                            <div class="badge badge-pill badge-info ml-auto px-1 py-1"><i class="mdi mdi-check font-weight-bold"></i></div>
                        </div>
                    <?php } ?>

                    <?php if ($aduanid->AduanFiles3 != NULL) { ?>
                        <div class="wrapper d-flex align-items-center py-2 border-bottom">
                            <div class="wrapper ml-3">
                                <h6 class="ml-1 mb-1">Files 3</h6>
                                <small class="text-muted mb-0"><i class="mdi mdi-map-marker-outline mr-1"></i><a href="<?= base_url("files/" . $aduanid->AduanFiles3) ?>"><?= $aduanid->AduanFiles3 ?></a></small>
                            </div>
                            <div class="badge badge-pill badge-info ml-auto px-1 py-1"><i class="mdi mdi-check font-weight-bold"></i></div>
                        </div>
                    <?php } ?>




                <?php } else { ?>
                    <span style="color: grey;">Aduan Belum Dipilih</span>
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

                                        <span style="color: grey;">Aduan Belum Dipilih</span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-wrapper timeline-inverted timeline-wrapper-danger">
                            <div class="timeline-badge"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <?php if ($aduanid->AduanProses != "ditolak") { ?>
                                        <h6 class="timeline-title">Tindak Lanjut</h6>
                                    <?php } else { ?>
                                        <h6 class="timeline-title">Ditolak</h6>
                                    <?php } ?>
                                </div>
                                <div class="timeline-body">
                                    <?php if ($aduanid->AduanProses == "diterima") { ?>
                                        <!-- <?= $aduanid->TindakLanjutDeskripsi ?> -->
                                        <span style="color: grey;">Sudah di Tindak Lanjut</span>
                                        <a class="btn btn-success" href="<?= base_url('master/tindak_lanjut/detail/' . $aduanid->AduanId); ?>">Lihat Tindak Lanjut</a>
                                    <?php } elseif ($aduanid->AduanProses == "permohonan") { ?>
                                        <span style="color: grey;">Belum Ada Tindak Lanjut</span>

                                    <?php } elseif ($aduanid->AduanProses == "ditolak") { ?>

                                        <span style="color: grey;"> <?= $aduanid->AduanTolakDeskripsi ?></span>
                                        <a href="#" class="btn btn-success create-tolak" data-id="<?= $aduanid->AduanId; ?>">
                                            <i class="fa fa-plus"></i> Edit Deskripsi
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="timeline-wrapper timeline-wrapper-success">
                            <div class="timeline-badge"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h6 class="timeline-title">Tindak Lanjut</h6>
                                </div>
                                <div class="timeline-body">
                                    <?php if ($aduanid->AduanProses == "diterima") {

                                        if ($aduanid->TindakLanjutProses == "selesai") {
                                            echo "Sudah Selesai";
                                        } else {
                                            echo "Belum Selesai";
                                        }
                                    } else { ?>
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
                        '<?= base_url("master/aduan_do/update/tindak_lanjut") ?>', {
                            id: id
                        },
                        function(data) {
                            if (data.success) {
                                $.gritter.add({
                                    title: 'Informasi',
                                    text: 'Data berhasil ditindak lanjut.',
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


    function tolak_aduan(id) {
        bootbox.confirm({
            message: "Apakah anda yakin akan menolak permohonan ini?",
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
                        '<?= base_url("master/aduan_do/update/tolak_aduan") ?>', {
                            id: id
                        },
                        function(data) {
                            if (data.success) {
                                $.gritter.add({
                                    title: 'Informasi',
                                    text: 'Data berhasil ditolak.',
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
        $(document).on('click', '.create-tolak', function(e) {
            e.preventDefault();
            $("#myModal").modal('show');
            $.post('<?php echo base_url('master/aduan/search'); ?>', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $(".modal-body").html(html);
                }
            );
        });
    });
</script>