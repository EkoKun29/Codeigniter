<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="btn-group pull-right">
                <a href="<?= base_url('master/perangkat/add') ?>" class="btn btn-success">
                    <i class="fa fa-plus"></i> Tambah Baru
                </a>
            </div>
            <div class="col-sm-16">
                <h3 class="card-title">Data Perangkat Desa</h3>
                <form method="POST" name="sortir" action="<?= base_url('master/perangkat/detail/sortir/'); ?>">
                    <div class="row">

                        <div class="card col-md-5">
                            <div class="form-group">
                                <label for="varchar">Kecamatan</label>
                                <select class="form-control select2" name="kecamatan" id="kecamatan">
                                    <option>Pilih Kecamatan</option>
                                    <?php foreach ($kecamatan as $k) { ?>

                                        <option value="<?= $k->KecId ?>"><?= $k->KecNama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="card col-md-5">
                            <div class="form-group">
                                <label for="varchar">Desa</label>
                                <select name="desa" id="desa" class="form-control select2">
                                    <option>Pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="card col-md-2">
                            <div class="form-group">
                                <input type="submit" name="submit" value="Sortir" class="btn btn-primary" style="width:150px;" />
                            </div>
                        </div>

                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered" id="example2">

                        <thead>
                            <tr>
                                <th>NIK</th>
                                <!-- <th>Desa</th> -->
                                <th>Nama</th>
                                <th>No Rekening</th>
                                <!-- <th>Jabatan</th> -->
                                <th>Alamat</th>
                                <th style="width:170px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($perangkat as $data) { ?>
                                <tr <?php if ($data->Status == 0) {
                                        echo "style='background-color:#fd5c63'";
                                    } ?>>
                                    <td><?= $data->Nik; ?></td>
                                    <!-- <td><?= $data->DesaId; ?></td> -->
                                    <td>
                                        <?= $data->Nama; ?><br>
                                        <span class="badge badge-primary"><?= $data->NamaJabatan; ?></span><br>
                                    </td>
                                    <td>
                                        <?= $data->NoRekening; ?>
                                    </td>

                                    <!-- <td></td> -->
                                    <td><?= $data->Alamat; ?></td>
                                    <td>
                                        <?php if ($data->Status == 0) {
                                        ?>
                                            <a href="javascript:;" class="btn btn-outline-danger" onclick="update_status(<?= $data->Nik ?>)">
                                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            </a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="<?= base_url("master/perangkat/detail/nik/" . $data->Nik) ?>" class="btn btn-outline-primary">
                                                <i class="ace-icon fa fa-list bigger-120"></i>
                                            </a>

                                            <a href="<?= base_url("master/perangkat/update/" . $data->Nik) ?>" class="btn btn-outline-info">
                                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            </a>

                                            <a href="javascript:;" class="btn btn-outline-danger" onclick="hapus(<?= $data->Nik ?>)">
                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                            </a>

                                        <?php } ?>
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

<script type="text/javascript" src="<?= base_url("template/backend/js/jquery.js") ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#kecamatan').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('master/perangkat/detail/get_kecamatan'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value="">Pilih Desa</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].nama + '</option>';
                    }
                    $('#desa').html(html);

                }
            });
            return false;
        });
    });



    function hapus(id) {
        bootbox.confirm({
            message: "Apakah anda yakin akan menghapus data Pengguna ini?",
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
                        '<?= base_url("master/perangkat_do/delete") ?>', {
                            id: id
                        },
                        function(data) {
                            if (data.success) {
                                $.gritter.add({
                                    title: 'Informasi',
                                    text: 'Pengguna berhasil dihapus.',
                                    class_name: 'gritter-info gritter-center'
                                });
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1000);
                                $("#data-table").tabel({
                                    reload: true
                                });
                            } else {
                                bootbox.alert(data.msg);
                            }
                        }, "json"
                    );
                }
            }
        });
    }

    function update_status(id) {
        bootbox.confirm({
            message: "Apakah anda yakin akan mengembalikan data Pengguna ini?",
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
                        '<?= base_url("master/perangkat_do/search") ?>', {
                            id: id
                        },
                        function(data) {
                            if (data.success) {
                                $.gritter.add({
                                    title: 'Informasi',
                                    text: 'Pengguna berhasil diedit.',
                                    class_name: 'gritter-info gritter-center'
                                });
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1000);
                                $("#data-table").tabel({
                                    reload: true
                                });
                            } else {
                                bootbox.alert(data.msg);
                            }
                        }, "json"
                    );
                }
            }
        });
    }
    $(document).ready(function() {
        //Initialize Select2 Elements

        $('.select2').select2();
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>