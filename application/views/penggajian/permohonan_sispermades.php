<style type="text/css">
    .example2 {
        border: 11px black solid;
    }
</style>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail</h4>
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

            <div class="col-sm-16">
                <h3 class="card-title">Permohonan <?= $bulan->BulanNama . " " . $tahun; ?></h3>

                <div class="table-responsive">
                    <table class="table table-bordered" id="example2">

                        <thead>
                            <tr>
                                <th style="text-align: center;" rowspan="3">#</th>
                                <th style="text-align: center;" rowspan="3">Kecamatan</th>
                                <th style="text-align: center;" rowspan="3">Jml</th>
                                <th style="text-align: center;" rowspan="3">Gaji Bulanan</th>
                                <th style="text-align: center;" colspan="3">Jaminan</th>
                                <th style="text-align: center;" rowspan="3">Jumlah Kotor</th>
                                <th style="text-align: center;" colspan="4">Potongan</th>
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
                            <?php foreach ($kec as $k) {
                                $data = $this->permohonan_model->getPembayaranSumKec($k->KecId, $bulan->BulanId, $tahun);
                                $sum_perangkat = $this->permohonan_model->perangkatSumKec($k->KecId, $bulan->BulanId, $tahun);
                                $kecamatan = $this->permohonan_model->getDesaSumKec($k->KecId, $bulan->BulanId, $tahun);
                                $cek_approve_kec = $this->permohonan_model->cekApproveKec($k->KecId, $bulan->BulanId, $tahun);

                                // $cek_desa_null = $this->permohonan_model->cekDesaNull($k->KecId);
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
                                // if($n4 != NULL){
                            ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <!-- <?= $data->PembayaranId; ?>
                            -->
                                        <?= approveStatusSispermades($data->StatusProgress, $k->KecId, $cek_approve_kec,$tahun,$bulan->BulanId); ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-rounded btn-fw detail" href="#" data-id="<?= $k->KecId . sprintf("%02d", $bulan->BulanId) . $tahun ?>">
                                            <?= $k->KecNama; ?></a>
                                    </td>
                                    <td style="text-align: center;">
                                        <?= $sum_perangkat;
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?= $this->angka->rupiah2($n4); ?><br>
                                        <span class="badge badge-success"><?= convertBulan($data->Bulan); ?></span>
                                    </td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n5); ?> </td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n6); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n7); ?></td>

                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n8); ?></td>

                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n9); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n10); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n11); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n12); ?></td>

                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n13); ?></td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n14); ?></td>

                                </tr>
                            <?php
                                // } 
                            }
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
    $(function() {
        $(document).on('click', '.detail', function(e) {
            e.preventDefault();
            $("#myModal").modal('show');
            $.post('<?php echo base_url('penggajian/permohonan/detail/kec'); ?>', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $(".modal-body").html(html);
                }
            );
        });
    });

    function approve(kec,tahun,bulan) {
        function n(n) {
            return n > 9 ? "" + n : "0" + n;
        }
        var id = n(kec) ;
        var tahun = tahun;
        var bulan = n(bulan);
        bootbox.confirm({
            message: "Apakah anda yakin menyetujui kec ini?",
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
                        '<?= base_url("penggajian/permohonan/detail/approve_sispermades/'+id+'/'+tahun+'/'+bulan+'") ?>', {
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

    function cancel(kec,tahun,bulan) {
        function n(n) {
            return n > 9 ? "" + n : "0" + n;
        }
        var id = n(kec);
        var tahun = tahun;
        var bulan = n(bulan);
        bootbox.confirm({
            message: "Apakah anda yakin membatalkan kec ini?",
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
                        '<?= base_url("penggajian/permohonan/detail/cancel_sispermades/'+id+'/'+tahun+'/'+bulan+'") ?>', {
                            id: id
                        },
                        function(data) {
                            if (data.success) {
                                $.gritter.add({
                                    title: 'Informasi',
                                    text: 'Berhasil dicancel.',
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

    function approve_desa(kec, desa,tahun,bulan) {
        function n(n) {
            return n > 9 ? "" + n : "0" + n;
        }
        var id = n(kec) + '.' + desa + '.';
        var tahun = tahun;
        var bulan = n(bulan);
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
                        '<?= base_url("penggajian/permohonan/detail/approve/'+id+'/'+tahun+'/'+bulan+'") ?>', {
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

    function cancel_desa(kec, desa,tahun,bulan) {
        function n(n) {
            return n > 9 ? "" + n : "0" + n;
        }
        var id = n(kec) + '.' + desa + '.';
        var tahun = tahun;
        var bulan = n(bulan);
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
                        '<?= base_url("penggajian/permohonan/detail/cancel/'+id+'/'+tahun+'/'+bulan+'") ?>', {
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
</script>