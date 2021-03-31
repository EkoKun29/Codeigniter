<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form <?= $sub == 'add' ? 'Tambah' : 'Edit' ?> Rekapitulasi</h4>
                    <form class="forms-sample" action="<?= base_url("penggajian/rekapitulasi_edit_do/$sub") ?>" method="post">
                        <?php if ($sub == 'add') { ?>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tahun</label>
                                <div class="col-sm-6">
                                    <select name="tahun" class="form-control">
                                        <?php for ($i = 2021; $i < 2030; $i++) { ?>
                                            <option><?= $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Bulan</label>
                                <div class="col-sm-6">
                                    <select name="bulan" class="form-control">
                                        <?php foreach ($bulan as $data) { ?>
                                            <option value="<?= $data->BulanId ?>" <?php if ($data->BulanId == date('m')) {
                                                                                        echo "selected";
                                                                                    } ?>><?= $data->BulanNama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-6">
                                <select name="desaid" class="form-control select2">
                                    <?php foreach ($desa as $data) { ?>
                                        <option value="<?= $data->DesaId ?>" ><?= remove_word($data->DesaNama)." - ".$data->KecNama."" ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gaji Tetap</label>
                            <div class="col-sm-6">
                                <input onkeyup="hitung_otomatis();"  id="GajiBulanan" name="GajiBulanan" type="text" placeholder="Gaji Tetap" class="form-control uang" value="<?= $pembayaran['GajiBulanan'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jaminan Kesehatan 4%</label>
                            <div class="col-sm-6">
                                <input onkeyup="hitung_otomatis();"  id="Jaminan_Kesehatan" name="Jaminan_Kesehatan" type="text" placeholder="Jaminan Kesehatan" class="form-control uang" value="<?= $pembayaran['Jaminan_Kesehatan'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jaminan_Jkk</label>
                            <div class="col-sm-6">
                                <input onkeyup="hitung_otomatis();"  id="Jaminan_Jkk" name="Jaminan_Jkk" type="text" placeholder="Jaminan Jkk" class="form-control uang" value="<?= $pembayaran['Jaminan_Jkk'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jaminan Jkm</label>
                            <div class="col-sm-6">
                                <input onkeyup="hitung_otomatis();" id="Jaminan_Jkm" name="Jaminan_Jkm" type="text" placeholder="Jaminan Jkm" class="form-control uang" value="<?= $pembayaran['Jaminan_Jkm'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gaji Kotor</label>
                            <div class="col-sm-6">
                                <input onkeyup="hitung_otomatis();" id="GajiKotor" name="GajiKotor" type="text" placeholder="Gaji Kotor" class="form-control uang" value="<?= $pembayaran['GajiKotor'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Potongan Kesehatan 1%</label>
                            <div class="col-sm-6">
                                <input onkeyup="hitung_otomatis();" id="Potongan_Kesehatan1" name="Potongan_Kesehatan1" type="text" placeholder="Potongan Kesehatan " class="form-control uang" value="<?= $pembayaran['Potongan_Kesehatan1'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Potongan Kesehatan 4%</label>
                            <div class="col-sm-6">
                                <input onkeyup="hitung_otomatis();" id="Potongan_Kesehatan2" name="Potongan_Kesehatan2" type="text" placeholder="Potongan Kesehatan" class="form-control uang" value="<?= $pembayaran['Potongan_Kesehatan2'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Potongan Jkk</label>
                            <div class="col-sm-6">
                                <input onkeyup="hitung_otomatis();" id="Potongan_Jkk" name="Potongan_Jkk" type="text" placeholder="Potongan_Jkk" class="form-control uang" value="<?= $pembayaran['Potongan_Jkk'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Potongan_Jkm</label>
                            <div class="col-sm-6">
                                <input onkeyup="hitung_otomatis();" id="Potongan_Jkm" name="Potongan_Jkm" type="text" placeholder="Potongan Jkm" class="form-control uang" value="<?= $pembayaran['Potongan_Jkm'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jumlah Potongan</label>
                            <div class="col-sm-6">
                                <input onkeyup="hitung_otomatis();" id="Jumlah_Potongan" name="Jumlah_Potongan" type="text" placeholder="Jumlah Potongan" class="form-control uang" value="<?= $pembayaran['Jumlah_Potongan'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gaji Bersih</label>
                            <div class="col-sm-6">
                                <input id="GajiBersih" name="GajiBersih" type="text" placeholder="Gaji Bersih" class="form-control uang" value="<?= $pembayaran['GajiBersih'] ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="hidden" name="PembayaranId" value="<?= $pembayaran['PembayaranId'] ?>" />
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
                        location.href = '<?= base_url('penggajian/rekapitulasi_edit') ?>';
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


//     function gajikotor() {
//       var gaji = document.getElementById('GajiBulanan').value;
//       var jaminan_kesehatan = document.getElementById('Jaminan_Kesehatan').value;
//       var jaminan_jkk = document.getElementById('Jaminan_Jkk').value;
//       var jaminan_jkm = document.getElementById('Jaminan_Jkm').value;
//       var result = parseInt(gaji) + parseInt(jaminan_kesehatan)+ parseInt(jaminan_jkk)+ parseInt(jaminan_jkm);;
//       if (!isNaN(result)) {
//          document.getElementById('GajiKotor').value = result;
//       }
// }

// function jumlahpotongan() {
//       var potongan_kesehatan1 = document.getElementById('Potongan_Kesehatan1').value;
//       var potongan_kesehatan2 = document.getElementById('Potongan_Kesehatan2').value;
//       var potongan_jkk = document.getElementById('Potongan_Jkk').value;
//       var potongan_jkm = document.getElementById('Potongan_Jkm').value;
//       var result = parseInt(potongan_kesehatan1) + parseInt(potongan_kesehatan2)+ parseInt(potongan_jkk)+ parseInt(potongan_jkm);;
//       if (!isNaN(result)) {
//          document.getElementById('Jumlah_Potongan').value = result;
//       }
// }

// function gajibersih() {
//       var gaji_kotor = document.getElementById('GajiKotor').value;
//       var jumlah_bersih = document.getElementById('Jumlah_Potongan').value;
//       var result = parseInt(gaji_kotor) - parseInt(jumlah_bersih);
//       if (!isNaN(result)) {
//          document.getElementById('GajiBersih').value = result;
//       }
// }


// // $(document).ready(function(){

// // Format mata uang.
// $( '.uang' ).mask('000.000.000', {reverse: true});

// })

function hitung_otomatis() {
    var gaji = document.getElementById('GajiBulanan').value;
      var jaminan_kesehatan = document.getElementById('Jaminan_Kesehatan').value;
      var jaminan_jkk = document.getElementById('Jaminan_Jkk').value;
      var jaminan_jkm = document.getElementById('Jaminan_Jkm').value;
      var result1 = parseInt(gaji) + parseInt(jaminan_kesehatan)+ parseInt(jaminan_jkk)+ parseInt(jaminan_jkm);
      if (!isNaN(result1)) {
         document.getElementById('GajiKotor').value = result1;
      }

      var potongan_kesehatan1 = document.getElementById('Potongan_Kesehatan1').value;
      var potongan_kesehatan2 = document.getElementById('Potongan_Kesehatan2').value;
      var potongan_jkk = document.getElementById('Potongan_Jkk').value;
      var potongan_jkm = document.getElementById('Potongan_Jkm').value;
      var result2 = parseInt(potongan_kesehatan1) + parseInt(potongan_kesehatan2)+ parseInt(potongan_jkk)+ parseInt(potongan_jkm);
      if (!isNaN(result2)) {
         document.getElementById('Jumlah_Potongan').value = result2;
      }

    //   var gaji_kotor = document.getElementById('GajiKotor').value;
    //   var jumlah_bersih = document.getElementById('Jumlah_Potongan').value;
      var result3 = (parseInt(gaji) + parseInt(jaminan_kesehatan)+ parseInt(jaminan_jkk)+ parseInt(jaminan_jkm)) - (parseInt(potongan_kesehatan1) + parseInt(potongan_kesehatan2)+ parseInt(potongan_jkk)+ parseInt(potongan_jkm));
      if (!isNaN(result3)) {
         document.getElementById('GajiBersih').value = result3;
      }
}


        
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