<style type="text/css">
    .example2 {
        border: 11px black solid;
    }
</style>
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">

            <div class="col-sm-16">
                <h3 class="card-title">Daftar Permohonan Penghasilan Tetap</h3>

                <div class="table-responsive">
                    <table class="table table-bordered" id="example2">

                        <thead>
                            <tr>
                                <th style="text-align: center;" rowspan="3">#</th>
                                <th style="text-align: center;" rowspan="3">Desa</th>
                                <th style="text-align: center;" rowspan="3">Jml Perangkat</th>
                                <th style="text-align: center;" rowspan="3">Gaji Bulanan</th>
                                <th style="text-align: center;" colspan="3">Jaminan</th>
                                <th style="text-align: center;" rowspan="3">Jumlah Kotor</th>
                                <th style="text-align: center;" colspan="6">Potongan</th>
                                <th style="text-align: center;" rowspan="3">Jumlah Potongan</th>
                                <th style="text-align: center;" rowspan="3">Jumlah Bersih</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;">Kesehatan</th>
                                <th style="text-align: center;" colspan="2">Ketenagakerjaan</th>

                                <th style="text-align: center;" colspan="2">Kesehatan</th>
                                <th style="text-align: center;" colspan="2">Ketenagakerjaan</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;">Ksh</th>
                                <th style="text-align: center;">Jkk</th>
                                <th style="text-align: center;">Jkm</th>

                                <th style="text-align: center;">Ksh</th>
                                <th style="text-align: center;">Ksh2</th>
                                <th style="text-align: center;">Jkk</th>
                                <th style="text-align: center;">Jkm</th>
                                <th style="text-align: center;">Jht</th>
                                <th style="text-align: center;">Jp</th>

                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            $CI = &get_instance();
                            foreach ($kec as $k) {

                                //$data = $this->CI->getDataDesa($d->DesaId);
                                //print_r($data);
                                $data = $this->permohonan_model->getPembayaranSum($k->DesaId);
                                $sum_perangkat = $this->permohonan_model->perangkatSum($k->DesaId);
                                $desa = $this->permohonan_model->getDesaSum($k->DesaId);
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
                        */
                                //if($n4 != NULL){

                            ?>




                                <tr>
                                    <td style="text-align: center;">
                                        <!-- <?= $data->PembayaranId; ?>
                            -->
                                        <?= approveStatusKec($data->StatusProgress, $k->DesaId); ?>

                                    </td>
                                    <td style="">
                                        <?= $k->DesaNama; ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?= $sum_perangkat; ?>
                                    </td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah($n4); ?> </td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah($n5); ?> </td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah($n6); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah($n7); ?></td>

                                    <td style="text-align: center;"><?= $this->angka->rupiah($n8); ?></td>

                                    <td style="text-align: center;"><?= $this->angka->rupiah($n9); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah($n10); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah($n11); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah($n12); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah($n15); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah($n16); ?></td>

                                    <td style="text-align: center;"><?= $this->angka->rupiah($n13); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah($n14); ?></td>

                                </tr>


                            <?php }
                            //} 
                            ?>

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

    function approve(id) {
        bootbox.confirm({
            message: "Apakah anda yakin menyetujui desa ini?",
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
                        '<?= base_url("penggajian/permohonan/detail/approve/'+id+'") ?>', {
                            id: id
                        },
                        function(data) {
                            if (data.success) {
                                $.gritter.add({
                                    title: 'Informasi',
                                    text: 'Berhasil diapprove.',
                                    class_name: 'gritter-info gritter-center'
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

    function cancel(id) {
        bootbox.confirm({
            message: "Apakah anda yakin membatalkan desa ini?",
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
                        '<?= base_url("penggajian/permohonan/detail/cancel/'+id+'") ?>', {
                            id: id
                        },
                        function(data) {
                            if (data.success) {
                                $.gritter.add({
                                    title: 'Informasi',
                                    text: 'Berhasil diapprove.',
                                    class_name: 'gritter-info gritter-center'
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
        //Initialize Select2 Elements

        $('.select2').select2();
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>