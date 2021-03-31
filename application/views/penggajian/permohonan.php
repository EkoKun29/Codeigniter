<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Siltap</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<style type="text/css">
    .example2 {
        border: 11px black solid;
    }
</style>


<div class="content-wrapper">

    <div class="form-group row" style="background-color: white; padding:10px;">
        <label class="col-sm-2 col-form-label">FILTER PERMOHONAN </label>
        <div class="col-sm-5">
            <form method="POST" action="<?= base_url('penggajian/permohonan'); ?>">
                <table>
                    <tr>
                        <td>
                            <select name="bulan" class="form-control select2" id="bulan" style="width: 200px;">
                                <option value=''>Pilih Bulan</option>
                                <?php foreach ($bulan_list as $data) { ?>
                                    <option value="<?= $data->BulanId ?>"><?= $data->BulanNama ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan </button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

    </div>


    <div class="card">
        <div class="card-body">
            <?php if ($sess['group'] == "Desa") { ?>
                <div class="btn-group pull-right">
                    <!-- href="<?= base_url('penggajian/permohonan/add') ?>" -->

                    <?php if ($status == 0) { ?>

                        <a href="#" class="btn btn-success create-permohonan" data-id="<?= $bulan->BulanId . $tahun; ?>">
                            <i class="fa fa-plus"></i> Tambah Baru
                        </a>

                    <?php } else { ?>
                        <a href="#" class="btn btn-success" onclick="alert('Data sudah diapprove Tidak Bisa Tambah Data Lagi, Silahkan Hubungi Kecamatan Untuk Membatalkan')">
                            <i class="fa fa-plus"></i> Tambah Baru
                        </a>

                    <?php } ?>
                </div>
            <?php } ?>
            <div class="col-sm-16">
                <h3 class="card-title">Permohonan <?= $bulan->BulanNama . " " . $tahun; ?></h3>

                <div class="table-responsive">
                    <table class="table table-bordered" id="simple">
                        <thead>
                            <tr>
                                <th style="text-align: center;" rowspan="3">#</th>
                                <th style="text-align: center;" rowspan="3">Nama<br>Jabatan</th>
                                <!-- <th style="text-align: center;" rowspan="3">Status Pns</th> -->
                                <th style="text-align: center;" rowspan="3">Gaji Bulanan</th>
                                <th style="text-align: center;" colspan="3">Jaminan</th>
                                <th style="text-align: center;" rowspan="3">Jumlah Kotor</th>
                                <th style="text-align: center;" colspan="4">Potongan</th>
                                <th style="text-align: center;" rowspan="3">Jumlah Potongan</th>
                                <th style="text-align: center;" rowspan="3">Jumlah Bersih</th>
                                <th style="text-align: center;" rowspan="3">Action</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;">Kesehatan</th>
                                <th style="text-align: center;" colspan="2">Ketenagakerjaan</th>

                                <th style="text-align: center;" colspan="2">Kesehatan</th>
                                <th style="text-align: center;" colspan="2">Ketenagakerjaan</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;">4%</th>
                                <th style="text-align: center;">Jkk</th>
                                <th style="text-align: center;">Jkm</th>

                                <th style="text-align: center;">1%</th>
                                <th style="text-align: center;">4%</th>
                                <th style="text-align: center;">Jkk</th>
                                <th style="text-align: center;">Jkm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 1;
                            foreach ($permohonan as $data) {
                                $n4 = $data->GajiBulanan;
                                $n5 = $data->Jaminan_Kesehatan;
                                $n6 = $data->Jaminan_Jkk;
                                $n7 = $data->Jaminan_Jkm;
                                $n8 = ($n4 + $n5 + $n6 + $n7);

                                $n9 = $data->Potongan_Kesehatan1;
                                $n10 = $data->Potongan_Kesehatan2;
                                $n11 = $data->Potongan_Jkk;
                                $n12 = $data->Potongan_Jkm;
                                $n15 = $data->Potongan_Jht;
                                $n16 = $data->Potongan_Jp;

                                $n13 = ($n9 + $n10 + $n11 + $n12 + $n15 + $n16);
                                $n14 = $n8 - $n13;
                                /*
                        NOTES
                        $n4 = gaji tetap/ bulanan
                        $n5 = jaminan kesehatan
                        $n6 = jaminan jkk
                        $n7 = jaminan jkm
                        $n8 = gaji kotor

                        $n9 = potongan kesehatan 1
                        $n10 = potongan kesehatan 2
                        $n11 = potongan jkk
                        $n12 = potongan jkm
                        $n13 = total potongan
                        $n14 = gaji bersih

                        $n15 = bpjs jht
                        $n16 = bpjs jp
                        */

                            ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?= $start++; //$data->PembayaranId;
                                        ?>

                                    </td>
                                    <td style="text-align: left;">
                                        <?= $data->Nama; ?><br>
                                        <span class="badge badge-primary"><?= $data->NamaJabatan; ?></span><br>
                                        <span class="badge badge-warning"><?= cekStatus($data->StatusProgress); ?></span>
                                    </td>
                                    <!-- <td style="text-align: center;">
                                        <?= pns($data->Pns); ?>
                                    </td> -->
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n4); ?>
                                        <br>
                                        <span class="badge badge-success"><?= convertBulan($data->Bulan); ?></span>
                                    </td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n5); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n6); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n7); ?></td>

                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n8); ?></td>

                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n9); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n10); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n11); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n12); ?></td>

                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n13); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n14); ?></td>
                                    <td style="width:150px; text-align: center;">
                                        <!-- <a href="<?= base_url("penggajian/permohonan/update/" . $data->PembayaranId) ?>" class="btn btn-success btn-sm">
                    <i class="fa fa-pencil"></i>
                    </a> -->
                                        <?php if ($data->StatusProgress == "permohonan_kec") { ?>
                                            <a href="javascript:;" class="btn btn-danger btn-sm" onclick="hapus(<?= $data->PembayaranId ?>)">
                                                <i class="fa fa-trash-o"></i>
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
                url: "<?php echo site_url('penggajian/permohonan/detail/get_kecamatan'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option>Pilih Desa</option>';
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
                        '<?= base_url("penggajian/permohonan_do/delete") ?>', {
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

    $(document).ready(function() {
        //Initialize Select2 Elements

        $('.select2').select2();
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });

    $(function() {
        $(document).on('click', '.create-permohonan', function(e) {
            e.preventDefault();
            $("#myModal").modal('show');
            $.post('<?php echo base_url('penggajian/permohonan/add'); ?>', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $(".modal-body").html(html);
                }
            );
        });
    });
</script>