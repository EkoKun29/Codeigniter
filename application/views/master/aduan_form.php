<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form <?= $sub == 'add' ? 'Tambah' : 'Edit' ?> Pengguna</h4>
                    <form class="forms-sample" action="<?= base_url("master/aduan_do/$sub") ?>" method="post">



                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-6">
                                <!-- <input name="kategori_nama" type="text" placeholder="Kategori Nama" class="form-control" value="<?= $user['kategori_nama'] ?>" /> -->
                                <select class="form-control" name="kategori_nama">
                                    <?php foreach ($kategori as $data) { ?>
                                        <option value="<?= $data->KategoriId ?>"><?= $data->KategoriNama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-6">
                                <!-- <input name="bidang" type="text" placeholder="Bidang" class="form-control" value="<?= $user['deskripsi'] ?>" /> -->
                                <textarea name="deskrispi" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Bukti 1</label>
                            <div class="col-sm-6">
                                <input name="files1" type="file" placeholder="Files" class="form-control" value="<?= $user['files1'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Bukti 2</label>
                            <div class="col-sm-6">
                                <input name="files2" type="file" placeholder="Files" class="form-control" value="<?= $user['files2'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Bukti 3</label>
                            <div class="col-sm-6">
                                <input name="files3" type="file" placeholder="Files" class="form-control" value="<?= $user['files3'] ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="hidden" name="AduanId" value="<?= $user['AduanId'] ?>" />
                                <button type="reset" class="btn btn-light"><i class="fa fa-refresh"></i> Reset</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-warning" onclick="self.history.back()"><i class="fa fa-undo"></i> Kembali</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="modal-loading" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="ace-icon fa fa-hourglass-o icon-only"></i> Silahkan Tunggu!</h4>
                </div>
                <div class="modal-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal end here -->

    <script type="text/javascript">
        $(function() {

            $('form').ajaxForm({
                dataType: 'json',
                beforeSubmit: function(arr, $form, options) {
                    $('#modal-loading').modal('show');
                },
                success: function(data) {
                    $('#modal-loading').modal('hide');
                    if (data.success) {
                        location.href = '<?= base_url('master/aduan') ?>';
                    } else {
                        $.gritter.add({
                            title: 'Error!',
                            text: data.msg,
                            class_name: 'gritter-error gritter-center'
                        });
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>