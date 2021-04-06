<div class="content-wrapper">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="btn-group pull-right">
                    <a href="<?= base_url('master/kategori/add') ?>" class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah Baru
                    </a>
                </div>
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
                                    <tr>
                                        <td><?= $data->AduanId; ?></td>
                                        <td><?= $data->KategoriNama; ?></td>
                                        <td><?= $data->AduanBidang; ?></td>
                                        <td>
                                            <div class="badge <?= $status_proses ?> badge-fw"><?= $data->AduanProses; ?></div>
                                        </td>
                                        <td>
                                            <a href="<?= base_url("master/kategori/update/" . $data->AduanId) ?>" class="btn btn-outline-info">
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