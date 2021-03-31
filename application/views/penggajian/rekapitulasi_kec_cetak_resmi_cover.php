<style type="text/css">
    table {
        table-layout: fixed;
        width: 100%;
        border: 1px solid;
        border-collapse: collapse;
    }

    table thead tr {
        background-color: #e6e6e6;
    }

    th {
        padding: 3px;
    }

    td {
        padding: 2px;
    }

    div {
        /* font-family: "Times New Roman", Times, serif; */
    }
</style>
<page orientation="potrait" format="Folio">
    <!-- <div style="text-align:center; line-height: 1.6;"> -->
    <div style="font-size:18px; font-weight:bold; text-align:center;">PEMERINTAH KABUPATEN PATI</div><br>
    <div style="font-size:22px; font-weight:bold; text-align:center;"><?php echo strtoupper($this->rekapitulasi_model->getKecId($kecid)->KecNama); ?></div><br>
    <div style="text-align:center;">
        Jl. P. Sudirman No.01 Kode Pos 59155<br>
        Telepon (0295) 451231<br>
        <br>
        <img src="<?= base_url("data/spaceline-01.jpg"); ?>" style="width:650px">
    </div>


    <!-- </div> -->
    <span style="color:white">aaaaaaa</span>
    <div style="text-align:justify; width:550px; line-height: 1.6;">
        <table>
            <tr>
                <td width="80"></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Pati, <?= date('d ') . convertBulan($bulan) . " " . $tahun; ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Nomor </td>
                <td> : </td>
                <td></td>
                <td></td>
                <td>Kepada :</td>
            </tr>
            <tr>
                <td>Sifat</td>
                <td> : </td>
                <td>Segera</td>
                <td></td>
                <td> BUPATI PATI</td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td> : </td>
                <td>1 (satu) bendel </td>
                <td></td>
                <td>Cq. Kepala Dispermades Kab Pati</td>
            </tr>
            <tr>
                <td>Hal</td>
                <td> : </td>
                <td>Permohonan Penyaluran Penghasilan <br>Tetap bagi Kepala Desa dan Perangkat <br>Desa Serta IJK Perangkat Desa<br>
                    Tahun <?= $tahun ?>. </td>
                <td></td>
                <td>Di
                    <br>
                    P A T I.
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4" width='550'>

                    <br><br>
                    Berdasarkan dokumen permohonan Siltap Kepala Desa dan Perangkat Desa, dan Tunjangan
                    Bagi Kepala Desa dan Sekretaris Desa yang berstatus PNS serta Iuran Jaminan Kesehatan
                    sebesar 4%, Iuran Jaminan Kematian (JKM) dan Iuran Jaminan Kecelakaan Kerja (JKK) sebesar 0,54%
                    dari Siltap dan tunjangan Bagi Kepala Desa dan Sekretaris Desa yang berstatus PNS yang bersumber
                    dari ADD dengan ini menyampaikan permohonan Penyaluran Siltap Kepala Desa dan Perangkat Desa dan
                    Tunjangan Kepala Desa dan Sekretaris Desa yang berstatus PNS serta Iuran Jaminan Kesehatan
                    sebesar 4% dan Iuran JKM dan JKK sebesar 0,54% dari Siltap dan tunjangan Bagi Kepala Desa dan
                    Sekretaris Desa yang berstatus PNS yang bersumber dari Alokasi Dana Desa (ADD) Tahun 2021
                    untuk Bulan Januari tahun 2021, sebagaimana berikut :


                </td>
            </tr>
        </table>

        <br>
        <span style="color:white">aaaaaaaa</span>
        <div style="text-align:justify;">
            <table border="1" width='500' style="font-weight: bold; ">
                <tr style="">
                    <td width="20">NO</td>
                    <td width="95">KECAMATAN</td>
                    <td width="45">DESA</td>
                    <td width="60">SILTAP <br>BLN <?= strtoupper(convertBulan($bulan)); ?></td>
                    <td width="70">Tunjangan<br> Kades<br> Sekdes<br> PNS</td>
                    <td width="70">IJK<br> Kesehatan</td>
                    <td width="90">Iuran JKM dan <br>JKK</td>
                </tr>
                <?php if (isset($datadesa)) {
                    $no = 1;
                    foreach ($datadesa as $rowdesa) {
                        $sumgaji = $this->rekapitulasi_model->tunjanganPns($tahun, $bulan, $rowdesa->DesaId);

                        if ($sumgaji->GajiBulanan != 0) {
                            $tunjangan = $this->angka->rupiah($sumgaji->GajiBulanan);
                        } else {
                            $tunjangan = "Rp.0";
                        }
                ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= remove_word(strtoupper($this->rekapitulasi_model->getKecId($kecid)->KecNama)); ?></td>
                            <td><?= remove_word2($rowdesa->DesaNama); ?></td>
                            <td><?= $this->angka->rupiah($this->rekapitulasi_model->getSumSiltapDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->GajiBulanan) ?></td>
                            <td><?= $tunjangan; ?></td>
                            <td><?= $this->angka->rupiah($this->rekapitulasi_model->getSumIjkKesehatanDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->Jaminan_Kesehatan) ?></td>
                            <td><?= $this->angka->rupiah($this->rekapitulasi_model->getSumJkkDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->Jaminan_Jkk + $this->rekapitulasi_model->getSumJkmDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->Jaminan_Jkm) ?></td>
                        </tr>

                <?php }
                } ?>
            </table>

            <br>
            Demikian surat permohon rekomendasi ini di buat untuk dipergunakan sebagai mana mestinya.
        </div>


    </div>
    <br><br><br>
    <table>
        <tr>
            <td style="width: 300px;"></td>
            <td>
                <div style="text-align: center; width:600px;  line-height: 1.6;">

                    Pati, <?= date('d ') . convertBulan($bulan); ?>, 2021<br>
                    Camat <?= remove_word(strtolower($this->rekapitulasi_model->getKecId($kecid)->KecNama)); ?>
                    <br><br><br><br>

                    <?= remove_word($this->rekapitulasi_model->getKecId($kecid)->KecKepala); ?>
                </div>
            </td>
        </tr>
    </table>



</page>