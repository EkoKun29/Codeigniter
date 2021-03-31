<div class="card-body">

    <!-- <h4 class="card-title">Tambah Permohonan</h4> -->
    <form method="POST" action="<?= base_url('penggajian/permohonan_do/add/'); ?>">
        <table class="table table-bordered" id="example2">

            <thead>
                <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Nama</th>
                    <th style="text-align: center;">Jabatan</th>
                    <th style="text-align: center;">Status Pns</th>
                    <th style="text-align: center;">Gaji Bulanan</th>
                    <th style="text-align: center;">Action</th>
                </tr>

            </thead>
            <tbody>
                <?php
                $start = 1;
                // if (date('m') != 12) {
                // $bulan = date('m') + 1;
                // $tahun = date('Y');
                $day = date('d');
                $tgl = $tahun . "-" . $bulan . "-" . $day;
                // } else {
                // $bulan = "01";
                // $tahun = date('Y') + 1;
                // $day = date('d');
                // $tgl = $tahun . "-" . $bulan . "-" . $day;
                // }

                foreach ($permohonan as $data) {
                    $n4 = $data->GajiTetap;
                    $cekPembayaran = $this->permohonan_model->cekPembayaran($data->Nik, $bulan, $tahun);
                    $cekStatusPembayaran = $this->permohonan_model->cekStatusPembayaran($data->Nik);
                    $cekSK = $this->permohonan_model->cekSK($data->Nik);
                    $tglSK = date("Y-m-d", strtotime($cekSK->SkAkhirJabatanTgl));
                    if ($cekPembayaran == 0 or $cekStatusPembayaran == 1) {
                        // if ($cekSK->SkAkhirJabatanTgl == NULL or $tglSK >= $tgl) {


                ?>

                        <tr>
                            <td style="text-align: center;">
                                <?= $start++; ?>

                            </td>
                            <td style="text-align: left;">
                                <?= $data->Nama ?>

                            </td>
                            <td style="text-align: center;"><span class="badge badge-primary"><?= $data->NamaJabatan; ?></span></td>
                            <td style="text-align: center;">
                                <?= pns($data->Pns); ?>
                            </td>
                            <td style="text-align: center;"><?= $this->angka->rupiah($n4); ?></td>
                            <td style="width:150px; text-align: center;">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="<?= $data->Nik; ?>" name="perangkat[]" checked> Setujui</label>
                                </div>
                            </td>
                        </tr>
                <?php //}
                    }
                } ?>

                <tr>
                    <td colspan="5"></td>
                    <input type="hidden" name="bulan" value="<?= $bulan ?>">
                    <input type="hidden" name="tahun" value="<?= $tahun ?>">
                    <td style="text-align: center;"><input type="submit" name="submit" value="Submit" class="btn btn-success"> </td>
                </tr>
            </tbody>

        </table>
    </form>
</div>