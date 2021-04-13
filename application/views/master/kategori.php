<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="btn-group pull-right">
                <a href="<?= base_url('master/kategori/add') ?>" class="btn btn-success">
                    <i class="fa fa-plus"></i> Tambah Baru
                </a>
            </div>
            <div class="col-sm-16">
                <h3 class="card-title">list kategori</h3>
                <div class="row">
                    <div class="card"> </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kategori</th>
                                    <th>Bidang</th>
                                    <th style="width:100px;">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kategori as $data) { ?>
                                    <tr>
                                        <td><?= $data->KategoriId; ?></td>
                                        <td><?= $data->KategoriNama; ?></td>
                                        <td><?= $data->KategoriBidang; ?></td>
                                        <td>
                                            <a href="<?= base_url("master/kategori/update/" . $data->KategoriId) ?>" class="btn btn-outline-info">
                                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            </a>

                                            <a href="javascript:;" class="btn btn-outline-danger" onclick="hapus(<?= $data->KategoriId ?>)">'
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
                            '<?= base_url("master/kategori_do/delete") ?>', {
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