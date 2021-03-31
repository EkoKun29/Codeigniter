<?php
function status($st)
{
    if ($st == 1) {
        echo "<div class='badge badge-primary'>Aktif</div>";
    } else {
        echo "<div class='badge badge-danger'>Tidak Aktif</div>";
    }
}

function pns($st)
{
    if ($st == 1) {
        echo "<div class='badge badge-warning'>PNS</div>";
    } else {
        echo "<div class='badge badge-danger'>NON PNS</div>";
    }
}
?>

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">

            <div class="col-sm-16">
                <h4 class="card-title">Rekapitulasi</h4>
                <form method="POST" name="sortir" action="<?= base_url('penggajian/rekapitulasi/detail/sortir'); ?>">
                    <div class="row">
                        <div class="card col-md-5">
                            <div class="form-group">
                                <label for="varchar">Tahun</label>
                                <select class="form-control select2" name="tahun" id="tahun">
                                    <option>Pilih Tahun</option>
                                    <?php foreach ($tahun_pembayaran as $row) { ?>
                                        <option><?= $row->tahun ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="card col-md-5">
                            <div class="form-group">
                                <label for="varchar">Bulan</label>
                                <select name="bulan" id="bulan" class="form-control select2">
                                    <option>Pilih</option>
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
                <a class="btn btn-danger" onclick="window.open('<?= base_url('penggajian/rekapitulasi/cetak/' . $tahun . '/' . $bulan . '/' . $kecid) ?>')" href="#"><i class="fa fa-print"></i> Cetak</a>

                <!--  <a class="btn btn-success" href="<?= base_url('penggajian/rekapitulasi/cetak/' . $tahun . '/' . $bulan) ?>"><i class="fa fa-download"></i> Export Excel</a>
                 -->
                <div class="mt-3"></div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="example2">
                        <thead>
                            <tr>
                                <th style="text-align: center;" rowspan="3">#</th>
                                <th style="text-align: center;" rowspan="3">Nama<br>Jabatan</th>
                                <th style="text-align: center;" rowspan="3">Status Pns</th>
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
                            <?php
                            foreach ($rekapitulasi as $data) {

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

                                $perangkat = $this->rekapitulasi_model->perangkatByNik($data->Nik);

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
                                        <?= $data->PembayaranId; ?></td>
                                    <td style="text-align: center;">
                                        <?= $perangkat->Nama; ?>
                                        <br>
                                        <span class="badge badge-primary"><?= $perangkat->NamaJabatan; ?></span><br>
                                        <span class="badge badge-info"><?= $data->Nik; ?></span><br>
                                    </td>
                                    <td style="text-align: center;">
                                        <?= pns($perangkat->Pns); ?>
                                    </td>
                                    <td style="text-align: center;"><?= $this->angka->rupiah2($n4); ?></td>
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
        $('#tahun').change(function() {
            var tahun = $(this).val();
            $.ajax({
                url: "<?php echo site_url('penggajian/rekapitulasi/detail/getBulanByDesa'); ?>",
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
</script>