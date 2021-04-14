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
                    <h3 class="card-title">Permohonan</h3>
                    <div class="row">
                        <div class="card"> </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example2">
                                <thead>
                                    <tr>
                                        <th>Tiket</th>
                                        <th>Pengirim</th>
                                        <th>Jabatan</th>
                                        <th>Proses</th>
                                        <th style="width:100px;">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($aduan as $data) {
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
                                            <td><?= $data->AduanNamaPengirim; ?></td>
                                            <!-- <td><?= $data->AduanBidang; ?></td> -->
                                            <td><?= $data->nmjabatan; ?></td>
                                            <td>
                                                <div class="badge <?= $status_proses ?> badge-fw"><?= $data->AduanProses; ?></div>
                                            </td>
                                            <td>
                                                <a href="<?= base_url("master/aduan/detail/" . $data->AduanId) ?>" class="btn btn-primary">
                                                    <i class="ace-icon fa fa-list bigger-120"></i>
                                                </a>
                                                <a href="<?= base_url("master/aduan/update/" . $data->AduanId) ?>" class="btn btn-info">
                                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
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
                                <small class="text-muted mb-0"><i class="mdi mdi-map-marker-outline mr-1"></i>asfdasfafasf.doc</small>
                            </div>
                            <div class="badge badge-pill badge-info ml-auto px-1 py-1"><i class="mdi mdi-check font-weight-bold"></i></div>
                        </div>
                    <?php } ?>
                    <?php if ($aduanid->AduanFiles2 != NULL) { ?>
                        <div class="wrapper d-flex align-items-center py-2 border-bottom">
                            <div class="wrapper ml-3">
                                <h6 class="ml-1 mb-1">Files 2</h6>
                                <small class="text-muted mb-0"><i class="mdi mdi-map-marker-outline mr-1"></i>asfdasfafasf.doc</small>
                            </div>
                            <div class="badge badge-pill badge-info ml-auto px-1 py-1"><i class="mdi mdi-check font-weight-bold"></i></div>
                        </div>
                    <?php } ?>

                    <?php if ($aduanid->AduanFiles3 != NULL) { ?>
                        <div class="wrapper d-flex align-items-center py-2 border-bottom">
                            <div class="wrapper ml-3">
                                <h6 class="ml-1 mb-1">Files 3</h6>
                                <small class="text-muted mb-0"><i class="mdi mdi-map-marker-outline mr-1"></i>asfdasfafasf.doc</small>
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
                                        <?= $aduanid->KategoriNama ?>
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
                                    <h6 class="timeline-title">Tindak Lanjut</h6>
                                </div>
                                <div class="timeline-body">
                                    <?php if ($aduanid->AduanProses == "diterima") { ?>
                                        <?= $aduanid->AduanDeskripsi ?>
                                    <?php } else { ?>
                                        <span style="color: grey;">Belum Ada Tindak Lanjut</span>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-wrapper timeline-wrapper-success">
                            <div class="timeline-badge"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h6 class="timeline-title">Selesai</h6>
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
                        </div>
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
</script>