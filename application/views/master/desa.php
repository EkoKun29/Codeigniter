<div class="content-wrapper">
    <div class="card">
        <div class="card-body">

            <div class="btn-group pull-right">
                <a href="<?= base_url('master/desa/add') ?>" class="btn btn-success">
                    <i class="fa fa-plus"></i> Tambah Baru
                </a>
            </div>
            <div class="col-sm-16">
                <h3 class="card-title col-md-6">

                    <form method="POST" action="<?= base_url('master/desa/search'); ?>">
                        <table class="col-md-12">
                            <tr>
                                <td>
                                    <select name="kec" class="form-control select2" style="width: 100%;">
                                        <?php foreach ($kecamatan as $k) { ?>
                                            <option value="<?= $k->KecId ?>"><?= $k->KecNama ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="submit" name="submit" value="Sortir" class="btn btn-primary">
                                </td>
                            </tr>
                        </table>
                    </form>
                </h3>
                <div class="row">
                    <div class="card"> </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kecamatan</th>
                                    <th>Desa</th>
                                    <th>No Rekening</th>
                                    <th>No NPWP</th>
                                    <th>Bendahara</th>
                                    <th>Alamat Kantor</th>
                                    <th>Kode Pos</th>
                                    <th style="width:100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($desa as $data) { ?>
                                    <tr>
                                        <td><?= $data->DesaId; ?></td>
                                        <td><?= $data->KecNama; ?></td>
                                        <td><?= $data->DesaNama; ?></td>
                                        <td><?= $data->NoRek; ?></td>
                                        <td><?= $data->Npwp; ?></td>
                                        <td><?= $data->Bendahara; ?></td>
                                        <td><?= $data->Alamat; ?></td>
                                        <td><?= $data->KodePos; ?></td>
                                        <td>
                                            <a href="<?= base_url("master/desa/update/" . $data->DesaId) ?>" class="btn btn-outline-info">
                                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            </a>

                                            <a href="javascript:;" class="btn btn-outline-danger" onclick="hapus('<?= $data->DesaId ?>')">'
                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
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
    <script type="text/javascript" src="<?= base_url("template/backend/js/jquery.js") ?>"></script>
    <script type="text/javascript">
        function hapus(id) {
            // id.toString();
            bootbox.confirm({
                message: "Apakah anda yakin akan menghapus data Data ini?" + id,
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
                            '<?= base_url("master/desa_do/delete") ?>', {
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