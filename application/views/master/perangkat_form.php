<style>
    .option {
        background-color: yellow;
    }
</style>
<div class="content-wrapper">

    <form class="forms-sample" action="<?= base_url("master/perangkat_do/$sub") ?>" method="post">
        <div class="row col-md-12">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Form <?= $sub == 'add' ? 'Tambah' : 'Edit' ?> Perangkat</h4>


                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Desa</label>
                            <div class="col-sm-6">
                                <select name="DesaId" class="form-control select2">
                                    <?php foreach ($desa as $k) { ?>
                                        <option class="option" value="<?= $k->DesaId ?>" <?php if ($k->DesaId == $user['DesaId']) {
                                                                                                echo "selected";
                                                                                            } ?>><?= $k->DesaNama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Nik</label>
                            <div class="col-sm-6">
                                <input name="Nik" type="text" placeholder="Nik" class="form-control" value="<?= $user['Nik'] ?>" <?php if ($sub == "update") {
                                                                                                                                        echo 'readonly';
                                                                                                                                    } ?> />

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">No Rekening</label>
                            <div class="col-sm-6">
                                <input name="NoRekening" type="text" placeholder="No Rekening" class="form-control" value="<?= $user['NoRekening'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Nama</label>
                            <div class="col-sm-6">
                                <input name="Nama" type="text" placeholder="Nama" class="form-control" value="<?= $user['Nama'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Alamat</label>
                            <div class="col-sm-6">
                                <input name="Alamat" type="text" placeholder="Alamat" class="form-control" value="<?= $user['Alamat'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Kelompok Jabatan</label>
                            <div class="col-sm-6">
                                <select class="form-control select2" name="KJabatan">
                                    <?php foreach ($kjabatan as $data) { ?>
                                        <option value="<?= $data->KJabatanId ?>" <?php if ($user['KJabatanId'] == $data->KJabatanId) {
                                                                                        echo "selected";
                                                                                    } ?>><?= $data->KJabatanNama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Jabatan</label>
                            <div class="col-sm-6">
                                <select class="form-control select2" name="Jabatan">
                                    <?php foreach ($jabatan as $data) { ?>
                                        <option value="<?= $data->JabatanId ?>" <?php if ($user['Jabatan'] == $data->JabatanId) {
                                                                                    echo "selected";
                                                                                } ?>><?= $data->NamaJabatan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Status Pns</label>
                            <div class="col-sm-6">
                                <select class="form-control select2" name="Pns">
                                    <option value="0" <?php if ($user['Pns'] == 0) {
                                                            echo "selected";
                                                        } ?>>Tidak Pns</option>
                                    <option value="1" <?php if ($user['Pns'] == 1) {
                                                            echo "selected";
                                                        } ?>>Pns</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Status Pensiun Pns</label>
                            <div class="col-sm-6">
                                <select class="form-control select2" name="PensiunPns">
                                    <option value="0" <?php if ($user['PensiunPns'] == 0) {
                                                            echo "selected";
                                                        } ?>>Tidak Pensiun Pns</option>
                                    <option value="1" <?php if ($user['PensiunPns'] == 1) {
                                                            echo "selected";
                                                        } ?>>Pensiun Pns</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Keanggotaan Bpjs Kesehatan</label>
                            <div class="col-sm-6">
                                <select class="form-control select2" name="Bpjs_Ksh">
                                    <option value="0" <?php if ($user['BpjsKsh'] == 0) {
                                                            echo "selected";
                                                        } ?>>Tidak</option>
                                    <option value="1" <?php if ($user['BpjsKsh'] == 1) {
                                                            echo "selected";
                                                        } ?>>Iya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Keanggotaan Bpjs Tenaga Kerja (jkk &jkm)</label>
                            <div class="col-sm-6">
                                <select class="form-control select2" name="Bpjs_Tenaga_Kerja">
                                    <option value="0" <?php if ($user['BpjsTenagaKerja'] == 0) {
                                                            echo "selected";
                                                        } ?>>Tidak</option>
                                    <option value="1" <?php if ($user['BpjsTenagaKerja'] == 1) {
                                                            echo "selected";
                                                        } ?>>Iya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Keanggotaan Bpjs JHT</label>
                            <div class="col-sm-6">
                                <select class="form-control select2" name="Bpjs_Jht">
                                    <option value="0" <?php if ($user['BpjsJht'] == 0) {
                                                            echo "selected";
                                                        } ?>>Tidak</option>
                                    <option value="1" <?php if ($user['BpjsJht'] == 1) {
                                                            echo "selected";
                                                        } ?>>Iya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Keanggotaan Bpjs Jaminan Pensiun</label>
                            <div class="col-sm-6">
                                <select class="form-control select2" name="Bpjs_Jp">
                                    <option value="0" <?php if ($user['BpjsJp'] == 0) {
                                                            echo "selected";
                                                        } ?>>Tidak</option>
                                    <option value="1" <?php if ($user['BpjsJp'] == 1) {
                                                            echo "selected";
                                                        } ?>>Iya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Alasan Mendaftar Bpjs</label>
                            <div class="col-sm-6">
                                <select class="form-control select2" name="Bpjs_Alasan">
                                    <option value="0" <?php if ($user['BpjsAlasan'] == 0) {
                                                            echo "selected";
                                                        } ?>>Tidak</option>
                                    <option value="1" <?php if ($user['BpjsAlasan'] == 1) {
                                                            echo "selected";
                                                        } ?>>Iya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Tanggal Mulai Terdaftar Bpjs</label>
                            <div class="col-sm-6">
                                <input type="text" id="tgl_tmt" name="Bpjs_Tmt" class="form-control" value="<?= $user['BpjsTMT']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Pj</label>
                            <div class="col-sm-6">
                                <select class="form-control select2" name="Pj">
                                    <option value="0" <?php if ($user['Pj'] == 0) {
                                                            echo "selected";
                                                        } ?>>Tidak</option>
                                    <option value="1" <?php if ($user['Pj'] == 1) {
                                                            echo "selected";
                                                        } ?>>Iya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Plt</label>
                            <div class="col-sm-6">
                                <select class="form-control select2" name="Plt">
                                    <option value="0" <?php if ($user['Plt'] == 0) {
                                                            echo "selected";
                                                        } ?>>Tidak</option>
                                    <option value="1" <?php if ($user['Plt'] == 1) {
                                                            echo "selected";
                                                        } ?>>Iya</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Status</label>
                            <div class="col-sm-6">
                                <select name="StatusId" class="form-control select2">
                                    <?php foreach ($status as $data) { ?>
                                        <option value="<?= $data->StatusId ?>"><?= $data->Status ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label"></label>
                            <div class="col-sm-6">
                                <!-- <input type="hidden" name="Nik" value="<?= $user['Nik'] ?>"/> -->
                                <button type="reset" class="btn btn-light"><i class="fa fa-refresh"></i> Reset</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-warning" onclick="self.history.back()"><i class="fa fa-undo"></i> Kembali</button>
                            </div>
                        </div>

    </form>
</div>
</div>
</div>









<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Form <?= $sub == 'add' ? 'Tambah' : 'Edit' ?> SK</h4>



            <div class="form-group row">
                <label class="col-sm-6 col-form-label">No SK</label>
                <div class="col-sm-6">
                    <input name="NoSk" type="text" placeholder="Masukan No SK" class="form-control" value="<?= $user['NoSk'] ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Tanggal SK</label>
                <div class="col-sm-6">
                    <input type="text" id="tgl_sk" name="TglSk" class="form-control" value="<?= $user['TglSk']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Pejabat Yang Melantik</label>
                <div class="col-sm-6">
                    <input name="SkPelantik" type="text" placeholder="Pejabat Yang Melantik" class="form-control" value="<?= $user['SkPelantik'] ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-6">
                    <select class="form-control select2" name="SkJenkel">
                        <option value="L" <?php if ($user['SkJenkel'] == 'L') {
                                                echo "selected";
                                            } ?>>Laki-laki</option>
                        <option value="P" <?php if ($user['SkJenkel'] == 'P') {
                                                echo "selected";
                                            } ?>>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Tempat Lahir</label>
                <div class="col-sm-6">
                    <input name="SkTempatLahir" type="text" placeholder="Masukan Tempat Lahir" class="form-control" value="<?= $user['SkTempatLahir'] ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-6">
                    <input type="text" id="tgl_lahir" name="SkTglLahir" class="form-control" value="<?= $user['SkTglLahir']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Pendidikan</label>
                <div class="col-sm-6">
                    <select class="form-control select2" name="SkPendidikan">
                        <option value="SD" <?php if ($user['SkPendidikan'] == 'SD') {
                                                echo "selected";
                                            } ?>>SD</option>
                        <option value="SLTP" <?php if ($user['SkPendidikan'] == 'SLTP') {
                                                    echo "selected";
                                                } ?>>SLTP</option>
                        <option value="SLTA" <?php if ($user['SkPendidikan'] == 'SLTA') {
                                                    echo "selected";
                                                } ?>>SLTA</option>
                        <option value="SLTA Kejuruan" <?php if ($user['SkPendidikan'] == 'SLTA Kejuruan') {
                                                            echo "selected";
                                                        } ?>>SLTA Kejuruan</option>
                        <option value="DI/DII/DIII" <?php if ($user['SkPendidikan'] == 'DI/DII/DIII') {
                                                        echo "selected";
                                                    } ?>>DI/DII/DIII</option>
                        <option value="S1" <?php if ($user['SkPendidikan'] == 'S1') {
                                                echo "selected";
                                            } ?>>S1</option>
                        <option value="S2" <?php if ($user['SkPendidikan'] == 'S2') {
                                                echo "selected";
                                            } ?>>S2</option>
                        <option value="S3" <?php if ($user['SkPendidikan'] == 'S3') {
                                                echo "selected";
                                            } ?>>S3</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Agama</label>
                <div class="col-sm-6">
                    <input name="SkAgama" type="text" placeholder="Masukan Tempat Lahir" class="form-control" value="<?= $user['SkAgama'] ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Bengkok</label>
                <div class="col-sm-6">
                    <input name="SkBengkok" type="text" placeholder="Masukan Bengkok" class="form-control" value="<?= $user['SkBengkok'] ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Nomor HP</label>
                <div class="col-sm-6">
                    <input name="SkNoHp" type="text" placeholder="Masukan Nomor HP" class="form-control" value="<?= $user['SkNoHp'] ?>" />
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Umur Masa Akhir Jabatan</label>
                <div class="col-sm-6">
                    <input name="SkAkhirJabatanUmur" type="number" placeholder="Masukan Umur" class="form-control" value="<?= $user['SkAkhirJabatanUmur'] ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Tanggal Masa Akhir Jabatan</label>
                <div class="col-sm-6">
                    <input type="text" id="tgl_akhir_jbt" name="SkAkhirJabatanTgl" class="form-control" value="<?= $user['SkAkhirJabatanTgl']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-6 col-form-label"></label>
                <div class="col-sm-6">
                    <!-- <input type="hidden" name="Nik" value="<?= $user['Nik'] ?>"/> -->
                    <button type="reset" class="btn btn-light"><i class="fa fa-refresh"></i> Reset</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-warning" onclick="self.history.back()"><i class="fa fa-undo"></i> Kembali</button>
                </div>
            </div>


        </div>
    </div>
</div>







</div>
</form>

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
                    location.href = '<?= base_url('master/perangkat') ?>';
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


    $(document).ready(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
    $(function() {
        $('#tgl_tmt').datepicker();
        $('#tgl_sk').datepicker();
        $('#tgl_lahir').datepicker();
        $('#tgl_akhir_jbt').datepicker();
    });
</script>