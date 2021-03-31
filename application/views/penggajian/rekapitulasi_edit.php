<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="btn-group pull-right">
                <!-- <a href="<?= base_url('penggajian/rekapitulasi_edit/add') ?>" class="btn btn-success">
                    <i class="fa fa-plus"></i> Tambah Baru
                </a> -->
            </div>
            <div class="col-sm-16">
                <h3 class="card-title">edit rekapitulasi</h3>

                <form method="POST" name="sortir" action="<?= base_url('penggajian/rekapitulasi_edit'); ?>">
                    <div class="row">
                        <div class="card col-md-2">
                            <div class="form-group">
                                <label for="varchar">Tahun</label>
                                <select class="form-control select2" name="tahun" id="tahun">
                                    <option>Pilih Tahun</option>
                                    <?php foreach ($tahun as $row) { ?>
                                        <option><?= $row->tahun ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="card col-md-2">
                            <div class="form-group">
                                <label for="varchar">Bulan</label>
                                <select name="bulan" id="bulan" class="form-control select2">
                                    <option>Pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="card col-md-2">
                            <div class="form-group">
                                <label for="varchar">Kecamatan</label>
                                <select name="kec" id="kec" class="form-control select2">
                                    <option>Pilih Kecamatan</option>
                                    <?php foreach ($kecamatan as $data) { ?>
                                        <option value="<?= $data->KecId; ?>" <?php if ($post_kec == $data->KecId) {
                                                                                    echo "selected";
                                                                                } ?>><?= $data->KecNama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="card col-md-2">
                            <div class="form-group">
                                <label for="varchar">Desa</label>
                                <select name="desa" id="desa" class="form-control select2">
                                    <option>Pilih </option>
                                </select>
                            </div>
                        </div>
                        <div class="card col-md-2">
                            <div class="form-group">
                                <label for="varchar"></label>
                                <input type="submit" name="submit" value="Sortir" class="btn btn-primary" style="width:150px;" />
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="card"> </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" rowspan="3">#</th>
                                    <th style="text-align: center;" rowspan="3">NAMA</th>
                                    <th style="text-align: center;" rowspan="3">PENGHASILAN TETAP</th>
                                    <th style="text-align: center;" colspan="3">JAMINAN</th>
                                    <th style="text-align: center;" rowspan="3">JUMLAH KOTOR</th>
                                    <th style="text-align: center;" colspan="4">POTONGAN</th>
                                    <th style="text-align: center;" rowspan="3">JUMLAH POTONGAN</th>
                                    <th style="text-align: center;" rowspan="3">JUMLAH BERSIH</th>
                                </tr>
                                <tr>
                                    <th style="text-align: center;">KESEHATAN</th>
                                    <th style="text-align: center;" colspan="2">KETENAGAKERJAAN</th>
                                    <th style="text-align: center;" colspan="2">KESEHATAN</th>
                                    <th style="text-align: center;" colspan="2">KETENAGAKERJAAN</th>
                                </tr>
                                <tr>
                                    <th style="text-align: center;">4%</th>
                                    <th style="text-align: center;">JKK</th>
                                    <th style="text-align: center;">JKM</th>
                                    <th style="text-align: center;">1%</th>
                                    <th style="text-align: center;">4%</th>
                                    <th style="text-align: center;">JKK</th>
                                    <th style="text-align: center;">JKM</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $number = 1;
                                foreach ($rekapitulasi as $data) { ?>
                                    <tr>
                                        <td><?= $number++; ?></td>
                                        <td><?= $data->Nama . "<br>" . $data->Nik; ?></td>
                                        <td><?= $this->angka->rupiah2($data->GajiBulanan); ?></td>
                                        <td><?= $this->angka->rupiah2($data->Jaminan_Kesehatan); ?></td>
                                        <td><?= $this->angka->rupiah2($data->Jaminan_Jkk); ?></td>
                                        <td><?= $this->angka->rupiah2($data->Jaminan_Jkm); ?></td>
                                        <td><?= $this->angka->rupiah2($data->GajiKotor); ?></td>
                                        <td><?= $this->angka->rupiah2($data->Potongan_Kesehatan1); ?></td>
                                        <td><?= $this->angka->rupiah2($data->Potongan_Kesehatan2); ?></td>
                                        <td><?= $this->angka->rupiah2($data->Potongan_Jkk); ?></td>
                                        <td><?= $this->angka->rupiah2($data->Potongan_Jkm); ?></td>
                                        <td><?= $this->angka->rupiah2($data->Jumlah_Potongan); ?></td>
                                        <td><?= $this->angka->rupiah2($data->GajiBersih); ?></td>
                                        <td>
                                            <a href="<?= base_url("penggajian/rekapitulasi_edit/update/" . $data->PembayaranId) ?>" class="btn btn-outline-info">
                                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            </a>

                                            <a href="javascript:;" class="btn btn-outline-danger" onclick="hapus(<?= $data->PembayaranId ?>)">'
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
                            '<?= base_url("penggajian/rekapitulasi_edit_do/delete") ?>', {
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
        $(document).ready(function() {
            $('#tahun').change(function() {
                var tahun = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('penggajian/rekapitulasi_edit/detail/getBulan'); ?>",
                    method: "POST",
                    data: {
                        tahun: tahun
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html += '<option>Pilih Bulan </option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].bulanId + '>' + data[i].bulanNama + '</option>';
                        }
                        $('#bulan').html(html);
                    }
                });
                return false;
            });
        });
        $(document).ready(function() {
            $('#kec').change(function() {
                var kecid = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('penggajian/rekapitulasi_edit/detail/getDesa'); ?>",
                    method: "POST",
                    data: {
                        kecid: kecid
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html += '<option>Pilih Desa </option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].desaId + '>' + data[i].desaNama + '</option>';
                        }
                        $('#desa').html(html);
                    }
                });
                return false;
            });
        });
    </script>