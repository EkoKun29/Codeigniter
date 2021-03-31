<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form <?= $sub == 'add' ? 'Tambah' : 'Edit' ?> Pengguna</h4>
                    <form class="forms-sample" action="<?= base_url("master/desa_do/$sub") ?>" method="post">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                            <div class="col-sm-6">
                                <select name="KecId" class="form-control select2" <?php if ($status_form != 1) {
                                                                                        echo "disabled";
                                                                                    } ?>>
                                    <?php foreach ($kec as $k) { ?>
                                        <option value="<?= $k->KecId ?>" <?php if ($k->KecId == $user['KecId']) {
                                                                                echo "selected";
                                                                            } ?>><?= $k->KecNama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <?php if ($sub == "add") { ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ID Desa</label>
                                <div class="col-sm-6">
                                    <input name="DesaId" type="text" placeholder="ID Desa" class="form-control" value="<?= $user['DesaId'] ?>" />
                                </div>
                            </div>
                        <?php } else { ?>
                            <input type="hidden" name="DesaId" value="<?= $user['DesaId'] ?>" />

                        <?php } ?>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Desa</label>
                            <div class="col-sm-6">
                                <input name="DesaNama" type="text" placeholder="Desa" class="form-control" value="<?= $user['DesaNama'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No Rekening</label>
                            <div class="col-sm-6">
                                <input name="NoRek" type="text" placeholder="No Rekening" class="form-control" value="<?= $user['NoRek'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No Npwp</label>
                            <div class="col-sm-6">
                                <input name="Npwp" type="text" placeholder="No NPWP" class="form-control" value="<?= $user['Npwp'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bendahara</label>
                            <div class="col-sm-6">
                                <input name="Bendahara" type="text" placeholder="Bendahara" class="form-control" value="<?= $user['Bendahara'] ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat Kantor</label>
                            <div class="col-sm-6">
                                <input name="Alamat" type="text" placeholder="Alamat" class="form-control" value="<?= $user['Alamat'] ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kode Pos</label>
                            <div class="col-sm-6">
                                <input name="KodePos" type="text" placeholder="KodePos" class="form-control" value="<?= $user['KodePos'] ?>" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-6">

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
                        location.href = '<?= base_url('master/desa') ?>';
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