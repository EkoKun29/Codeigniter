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
                <td>900/ </td>
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
                    foreach ($datadesa as $rowdesa) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= remove_word(strtoupper($this->rekapitulasi_model->getKecId($kecid)->KecNama)); ?></td>
                            <td><?= remove_word2($rowdesa->DesaNama); ?></td>
                            <td><?= $this->angka->rupiah($this->rekapitulasi_model->getSumSiltapDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->GajiBulanan) ?></td>
                            <td></td>
                            <td><?= $this->angka->rupiah($this->rekapitulasi_model->getSumJkkDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->Jaminan_Kesehatan) ?></td>
                            <td><?= $this->angka->rupiah($this->rekapitulasi_model->getSumJkmDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->Jaminan_Jkk + $this->rekapitulasi_model->getSumJkmDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->Jaminan_Jkm) ?></td>
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

                    <?= date('d ') . convertBulan($bulan); ?>, 2021<br>
                    Camat <?= remove_word(strtolower($this->rekapitulasi_model->getKecId($kecid)->KecNama)); ?>
                    <br><br><br><br>

                    <?= remove_word($this->rekapitulasi_model->getKecId($kecid)->KecKepala); ?>
                </div>
            </td>
        </tr>
    </table>



</page>

<?php if (isset($datadesa)) {
    $no = 1;
    foreach ($datadesa as $rowdesa) { ?>

        <page orientation="potrait" format="Folio">
            <div style="font-size:18px; font-weight:bold; text-align:center;">PEMERINTAH KABUPATEN PATI</div><br>
            <div style="font-size:18px; font-weight:bold; text-align:center;"><?= $this->rekapitulasi_model->getKecId($kecid)->KecNama; ?></div><br>
            <div style="font-size:22px; font-weight:bold; text-align:center;"><?= remove_word($rowdesa->DesaNama); ?></div><br>
            <div style="text-align:center;">
                Jl. P. Sudirman No.01 Kode Pos 59155<br><br>
                <?= remove_word($rowdesa->DesaNama); ?>
                <br>
                <img src="<?= base_url("data/spaceline-01.jpg"); ?>" style="width:650px">
            </div>

            <span style="color:white">aaaaaaa</span>
            <div style="text-align:justify; width:500px; line-height: 1.6;">
                <table>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>DESA <?= remove_word2($rowdesa->DesaNama); ?>, <?= convertBulan($bulan) . " " . $tahun; ?> </td>
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
                        <td> </td>
                        <td></td>
                        <td>KEPADA:</td>
                    </tr>
                    <tr>
                        <td>Sifat</td>
                        <td> : </td>
                        <td></td>
                        <td></td>
                        <td>Yth. BUPATI PATI </td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td> : </td>
                        <td>1 (satu) bendel </td>
                        <td></td>
                        <td>Cq. Kepala Dispermades Kab Pati <br>Lewat Camat </td>
                    </tr>
                    <tr>
                        <td>Hal</td>
                        <td> : </td>
                        <td>Permohonan Penyaluran Penghasilan <br>Tunjangan dan Iuran Jaminan<br>
                            Tahun <?= $tahun ?>. </td>
                        <td></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Kesehatan, Iuran JKM dan JKK</td>
                        <td></td>
                        <td>Di-
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="4" width='550'>
                            <br>
                            Bersama ini kami mengajukan permohonan penyaluran Siltap Kepala
                            Desa dan Perangkat Desa dan Tunjangan Bagi Kepala Desa dan SekretarisDesa
                            yang berstatus PNS, Iuran Jaminan Kesehatan sebesar 4%, dan Iuran JKM dan JKK
                            sebesar 0,54% dari Siltap dan Tunjangan Bagi Kepala Desa dan Sekretaris Desa
                            yang berstatus PNS yang bersumber dari ADD Tahun Anggaran <?= $tahun ?> Bulan Januari
                            untuk Desa <?= remove_word2($rowdesa->DesaNama); ?> Kecamatan <?= remove_word(strtoupper($this->rekapitulasi_model->getKecId($kecid)->KecNama)); ?> Kabupaten Pati dengan rincian sebagai berikut : <br>

                            Siltap sebesar <?= $this->angka->rupiah($this->rekapitulasi_model->getSumSiltapDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->GajiBulanan) ?><br>
                            Tunjangan Bagi Kepala Desa dan Sekretaris Desa yang berstatus PNS sebesar<br>
                            Rp. ………………… dengan No. Rekening Desa : ………………. Pada Bank ………………….<br>
                            Iuran Jaminan Kesehatan (4%) sebesar <?= $this->angka->rupiah($this->rekapitulasi_model->getSumJkkDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->Jaminan_Kesehatan) ?><br>
                            Iuran JKM dan JKK (0,54%) sebesar <?= $this->angka->rupiah($this->rekapitulasi_model->getSumJkmDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->Jaminan_Jkk + $this->rekapitulasi_model->getSumJkmDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->Jaminan_Jkm) ?> <br>
                            Total Rp…. <br>
                            Sebagai pertimbangan bersama ini kami lampirkan :
                            <ol style="text-align:justify; line-height: 1.6;">
                                <li>Surat Kuasa Pemotongan Iuran Jaminan Kesehatan dan Iuran JKM dan JKK Tahun <?= $tahun ?></li>
                                <li>……………………..</li>
                                <li>Dst </li>
                            </ol>

                            Demikian untuk menjadikan periksa dan atas kerjasamanya di ucapkan terima kasih.

                        </td>
                    </tr>

                </table>
                <br>





                <br><br><br>


                <table>
                    <tr>
                        <td style="width: 200px;"></td>
                        <td>
                            <div style="text-align: center; width:600px;  line-height: 1.6;">


                                KEPALA DESA <?= remove_word2($rowdesa->DesaNama); ?>
                                <br><br><br><br>

                                <?= $this->rekapitulasi_model->getKades($rowdesa->DesaId)->row()->Nama ?>
                            </div>
                        </td>
                    </tr>
                </table>


            </div>



        </page>
        <page orientation="potrait" format="Folio">

            <div style="font-size:18px; font-weight:bold; text-align:center;">PEMERINTAH KABUPATEN PATI</div><br>
            <div style="font-size:18px; font-weight:bold; text-align:center;"><?= remove_word(strtoupper($this->rekapitulasi_model->getKecId($kecid)->KecNama)); ?></div><br>
            <div style="font-size:22px; font-weight:bold; text-align:center;"><?= remove_word2($rowdesa->DesaNama); ?></div><br>
            <div style="text-align:center;">
                Jl. P. Sudirman No.01 Kode Pos 59155<br><br>
                <?= remove_word2($rowdesa->DesaNama); ?>
                <br>
                <img src="<?= base_url("data/spaceline-01.jpg"); ?>" style="width:650px">
            </div>

            <br>
            <div style="text-align:center; line-height: 1.6;">
                SURAT KUASA PEMOTONGAN IURAN JAMINAN KESEHATAN, IURAN<br>
                JAMINAN KEMATIAN (JKM) DAN IURAN JAMINAN KECELAKAAN KERJA <br>
                (JKK)<br>
                TAHUN <?= $tahun ?>

            </div>

            <span style="color:white">aaaaaaaaaaa</span>
            <div style="text-align:justify; width:500px; line-height: 1.6;">
                <br><br><br>

                Yang bertandatangan di bawah ini :<br>
                <table>
                    <tr>
                        <td>N a m a </td>
                        <td>:</td>
                        <td><?= $this->rekapitulasi_model->getKades($rowdesa->DesaId)->row()->Nama ?></td>
                    </tr>
                    <tr>
                        <td>Jabatan </td>
                        <td>:</td>
                        <td>Kepala Desa <?= remove_word2($rowdesa->DesaNama); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Kecamatan <?= remove_word(strtoupper($this->rekapitulasi_model->getKecId($kecid)->KecNama)); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Kabupaten Pati</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2" width="550">
                            <br>


                        </td>
                    </tr>
                </table>
                <div style="text-align: justify; width:600px;  line-height: 1.6;">
                    Dengan ini memberikan Kuasa untuk pemotongan Iuran Jaminan Kesehatan sebesar 1%
                    dari Siltap Kades dan Perangkat Desa dan 4% dari Siltap yg bersumber dari pagu ADD
                    setelah dikurangi Siltap Kades dan Perangkat Desa, serta pemotongan Iuran JKM dan JKK sebesar 0,54% dari Siltap yg bersumber dari pagu ADD setelah dikurangi Siltap mulai bulan Januari <?= $tahun ?> sampai dengan Desember <?= $tahun ?>.
                    <br>
                    Demikian disampaikan, atas kerjasamanya diucapkan terima kasih.

                </div>
                <br><br><br><br><br><br><br><br><br>



                <table>
                    <tr>
                        <td style="width: 200px;"></td>
                        <td>
                            <div style="text-align: center; width:600px;  line-height: 1.6;">


                                Pati, <?= date('d ') . convertBulan($bulan) . " " . $tahun; ?> <br>
                                KEPALA DESA <?= remove_word2($rowdesa->DesaNama); ?>
                                <br><br><br><br>

                                …………..…………………..<br>
                                (<?= $this->rekapitulasi_model->getKades($rowdesa->DesaId)->row()->Nama ?>)
                            </div>
                        </td>
                    </tr>
                </table>

            </div>





        </page>
<?php }
} ?>

<?php if (isset($datadesa)) {
    $no = 1;
    foreach ($datadesa as $rowdesa) { ?>
        <page orientation="landscape" format="Folio">
            <div style="text-align: center;  line-height: 1.6;">
                REKAPITULASI KEBUTUHAN SILTAP DAN TUNJANGAN BAGI KEPALA DESA DAN PERANGKAT DESA YANG BERSTATUS PNS<br>
                TAHUN ANGGARAN 2021
            </div>
            <br><br>

            <table>

                <tr>
                    <td>DESA </td>
                    <td>: </td>
                    <td><?= remove_word2($rowdesa->DesaNama); ?></td>
                </tr>
                <tr>
                    <td>KECAMATAN </td>
                    <td>: </td>
                    <td><?= remove_word(strtoupper($this->rekapitulasi_model->getKecId($kecid)->KecNama)); ?></td>
                </tr>
            </table>
            <div style="font-size:12px;">
                <table border="1" style="width:1000px; line-height: 1.6;">
                    <tr style=" text-align: center;">
                        <td width='13' rowspan="2">NO</td>
                        <td width='100' rowspan="2">NAMA</td>
                        <td width='110' rowspan="2">JABATAN</td>
                        <td width='700' colspan="12">BULAN (SATUAN) </td>
                        <td width='90'>JUMLAH/Thn</td>
                    </tr>
                    <tr style=" text-align: center;">
                        <td>JAN</td>
                        <td>FEB</td>
                        <td>MAR</td>
                        <td>APR</td>
                        <td>MEI</td>
                        <td>JUN</td>
                        <td>JUL</td>
                        <td>AGS</td>
                        <td>SEPT</td>
                        <td>OKT</td>
                        <td>NOP</td>
                        <td>DES</td>
                        <td>(Rp)</td>
                    </tr>
                    <tr style=" text-align: center;">
                        <?php for ($i = 1; $i < 17; $i++) { ?>
                            <td><?= $i; ?></td>
                        <?php } ?>
                    </tr>
                    <tr style=" text-align: center;">

                        <td colspan="3">PENGHASILAN TETAP</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <?php
                    $data_perangkat_non_pns = $this->rekapitulasi_model->perangkatByDesaNonPns($tahun, $bulan, $rowdesa->DesaId);
                    $no_non_pns = 1;
                    if ($data_perangkat_non_pns->num_rows() != 0) {
                        foreach ($data_perangkat_non_pns->result() as $row) {
                            $nik = $row->Nik;
                            $jan = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 1, $rowdesa->DesaId, $nik);
                            $feb = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 2, $rowdesa->DesaId, $nik);
                            $mar = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 3, $rowdesa->DesaId, $nik);
                            $apr = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 4, $rowdesa->DesaId, $nik);
                            $mei = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 5, $rowdesa->DesaId, $nik);
                            $jun = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 6, $rowdesa->DesaId, $nik);
                            $jul = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 7, $rowdesa->DesaId, $nik);
                            $agu = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 8, $rowdesa->DesaId, $nik);
                            $sep = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 9, $rowdesa->DesaId, $nik);
                            $okt = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 10, $rowdesa->DesaId, $nik);
                            $nov = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 11, $rowdesa->DesaId, $nik);
                            $des = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 12, $rowdesa->DesaId, $nik);

                            $pertahun = $this->rekapitulasi_model->gajiByPerangkatByTahun($tahun, $rowdesa->DesaId, $nik);

                            $sum_jan += $jan->GajiBulanan;
                            $sum_feb += $feb->GajiBulanan;
                            $sum_mar += $mar->GajiBulanan;
                            $sum_apr += $apr->GajiBulanan;
                            $sum_mei += $mei->GajiBulanan;
                            $sum_jun += $jun->GajiBulanan;
                            $sum_jul += $jul->GajiBulanan;
                            $sum_agu += $agu->GajiBulanan;
                            $sum_sep += $sep->GajiBulanan;
                            $sum_okt += $okt->GajiBulanan;
                            $sum_nov += $nov->GajiBulanan;
                            $sum_des += $des->GajiBulanan;
                            $sum_pertahun += $pertahun->GajiBulanan;
                    ?>

                            <tr>
                                <td style=" text-align: center;"><?= $no_non_pns++ ?></td>
                                <td width='100'><?= $row->Nama ?></td>
                                <td width='110'><?= $row->NamaJabatan ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jan->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($feb->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($mar->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($apr->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($mei->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jun->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jul->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($agu->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($sep->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($okt->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($nov->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($des->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='90'><?= $this->angka->rupiah2($pertahun->GajiBulanan) ?></td>

                            </tr>

                    <?php }
                    } ?>


                    <tr style="font-weight: bold">

                        <td colspan="3">JUMLAH</td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_jan) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_feb) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_mar) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_apr) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_mei) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_jun) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_jul) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_agu) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_sep) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_okt) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_nov) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_des) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_pertahun) ?></td>

                    </tr>

                    <tr style=" text-align: center;">

                        <td colspan="3">PENGHASILAN TETAP</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <?php
                    $data_perangkat_pns = $this->rekapitulasi_model->perangkatByDesaPns($tahun, $bulan, $rowdesa->DesaId);
                    $no_pns = 1;
                    if ($data_perangkat_pns->num_rows() != 0) {
                        foreach ($data_perangkat_pns->result() as $row) {
                            $nik = $row->Nik;
                            $jan = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 1, $rowdesa->DesaId, $nik);
                            $feb = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 2, $rowdesa->DesaId, $nik);
                            $mar = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 3, $rowdesa->DesaId, $nik);
                            $apr = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 4, $rowdesa->DesaId, $nik);
                            $mei = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 5, $rowdesa->DesaId, $nik);
                            $jun = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 6, $rowdesa->DesaId, $nik);
                            $jul = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 7, $rowdesa->DesaId, $nik);
                            $agu = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 8, $rowdesa->DesaId, $nik);
                            $sep = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 9, $rowdesa->DesaId, $nik);
                            $okt = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 10, $rowdesa->DesaId, $nik);
                            $nov = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 11, $rowdesa->DesaId, $nik);
                            $des = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 12, $rowdesa->DesaId, $nik);

                            $pertahun = $this->rekapitulasi_model->gajiByPerangkatByTahun($tahun, $rowdesa->DesaId, $nik);

                            $sum_jan2 += $jan->GajiBulanan;
                            $sum_feb2 += $feb->GajiBulanan;
                            $sum_mar2 += $mar->GajiBulanan;
                            $sum_apr2 += $apr->GajiBulanan;
                            $sum_mei2 += $mei->GajiBulanan;
                            $sum_jun2 += $jun->GajiBulanan;
                            $sum_jul2 += $jul->GajiBulanan;
                            $sum_agu2 += $agu->GajiBulanan;
                            $sum_sep2 += $sep->GajiBulanan;
                            $sum_okt2 += $okt->GajiBulanan;
                            $sum_nov2 += $nov->GajiBulanan;
                            $sum_des2 += $des->GajiBulanan;
                            $sum_pertahun2 += $pertahun->GajiBulanan;
                    ?>

                            <tr>
                                <td style=" text-align: center;"><?= $no_pns++ ?></td>
                                <td><?= $row->Nama ?></td>
                                <td width='110'><?= $row->NamaJabatan ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jan->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($feb->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($mar->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($apr->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($mei->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jun->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jul->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($agu->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($sep->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($okt->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($nov->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($des->GajiBulanan) ?></td>
                                <td style=" text-align: right;" width='90'><?= $this->angka->rupiah2($pertahun->GajiBulanan) ?></td>

                            </tr>

                    <?php }
                    } ?>
                    <tr style="font-weight: bold">

                        <td colspan="3">JUMLAH</td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_jan2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_feb2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_mar2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_apr2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_mei2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_jun2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_jul2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_agu2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_sep2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_okt2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_nov2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_des2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_pertahun2) ?></td>

                    </tr>
                    <tr>
                        <td style="color:white">a</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr style="font-weight: bold">
                        <td colspan="3">TOTAL PERBULAN</td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_jan + $sum_jan2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_feb + $sum_feb2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_mar + $sum_mar2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_apr + $sum_apr2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_mei + $sum_mei2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_jun + $sum_jun2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_jul + $sum_jul2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_agu + $sum_agu2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_sep + $sum_sep2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_okt + $sum_okt2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_nov + $sum_nov2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_des + $sum_des2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($sum_pertahun + $sum_pertahun2) ?></td>

                    </tr>
                </table>
            </div>
            <br><br>
            <table>
                <tr>
                    <td style="width:400px; "></td>
                    <td>
                        <div style="text-align: center;  line-height: 1.6;">


                            Pati, <?= date('d ') . convertBulan($bulan) . " " . $tahun ?> <br>
                            KEPALA DESA
                            <br><br><br><br>

                            <?= $this->rekapitulasi_model->getKades($rowdesa->DesaId)->row()->Nama ?><br>

                        </div>
                    </td>
                </tr>
            </table>





        </page>
        <page orientation="landscape" format="Folio">

            <div style="text-align: center;  line-height: 1.6;">
                REKAPITULASI KEBUTUHAN IURAN JAMINAN KESEHATAN (4%)<br>
                TAHUN ANGGARAN 2021
            </div>
            <br><br>

            <table>

                <tr>
                    <td>DESA </td>
                    <td>: </td>
                    <td><?= remove_word2($rowdesa->DesaNama); ?></td>
                </tr>
                <tr>
                    <td>KECAMATAN </td>
                    <td>: </td>
                    <td><?= remove_word(strtoupper($this->rekapitulasi_model->getKecId($kecid)->KecNama)); ?></td>
                </tr>
            </table>
            <div style="font-size:12px;">
                <table border="1" style="width:1000px; line-height: 1.6;">
                    <tr style=" text-align: center;">
                        <td width='13' rowspan="2">NO</td>
                        <td width='100' rowspan="2">NAMA</td>
                        <td width='110' rowspan="2">JABATAN</td>
                        <td width='700' colspan="12">BULAN (SATUAN) </td>
                        <td width='90'>JUMLAH/Thn</td>
                    </tr>
                    <tr style=" text-align: center;">
                        <td>JAN</td>
                        <td>FEB</td>
                        <td>MAR</td>
                        <td>APR</td>
                        <td>MEI</td>
                        <td>JUN</td>
                        <td>JUL</td>
                        <td>AGS</td>
                        <td>SEPT</td>
                        <td>OKT</td>
                        <td>NOP</td>
                        <td>DES</td>
                        <td>(Rp)</td>
                    </tr>
                    <tr style=" text-align: center;">
                        <?php for ($i = 1; $i < 17; $i++) { ?>
                            <td><?= $i; ?></td>
                        <?php } ?>
                    </tr>
                    <tr style=" text-align: center;">

                        <td colspan="3">PENGHASILAN TETAP</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <?php
                    $data_perangkat_non_pns = $this->rekapitulasi_model->perangkatByDesaNonPns($tahun, $bulan, $rowdesa->DesaId);
                    $no_non_pns = 1;
                    if ($data_perangkat_non_pns->num_rows() != 0) {
                        foreach ($data_perangkat_non_pns->result() as $row) {
                            $nik = $row->Nik;
                            $jan = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 1, $rowdesa->DesaId, $nik);
                            $feb = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 2, $rowdesa->DesaId, $nik);
                            $mar = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 3, $rowdesa->DesaId, $nik);
                            $apr = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 4, $rowdesa->DesaId, $nik);
                            $mei = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 5, $rowdesa->DesaId, $nik);
                            $jun = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 6, $rowdesa->DesaId, $nik);
                            $jul = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 7, $rowdesa->DesaId, $nik);
                            $agu = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 8, $rowdesa->DesaId, $nik);
                            $sep = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 9, $rowdesa->DesaId, $nik);
                            $okt = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 10, $rowdesa->DesaId, $nik);
                            $nov = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 11, $rowdesa->DesaId, $nik);
                            $des = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 12, $rowdesa->DesaId, $nik);

                            $pertahun = $this->rekapitulasi_model->gajiByPerangkatByTahun($tahun, $rowdesa->DesaId, $nik);

                            $bpjs_kes_sum_jan += $jan->Jaminan_Kesehatan;
                            $bpjs_kes_sum_feb += $feb->Jaminan_Kesehatan;
                            $bpjs_kes_sum_mar += $mar->Jaminan_Kesehatan;
                            $bpjs_kes_sum_apr += $apr->Jaminan_Kesehatan;
                            $bpjs_kes_sum_mei += $mei->Jaminan_Kesehatan;
                            $bpjs_kes_sum_jun += $jun->Jaminan_Kesehatan;
                            $bpjs_kes_sum_jul += $jul->Jaminan_Kesehatan;
                            $bpjs_kes_sum_agu += $agu->Jaminan_Kesehatan;
                            $bpjs_kes_sum_sep += $sep->Jaminan_Kesehatan;
                            $bpjs_kes_sum_okt += $okt->Jaminan_Kesehatan;
                            $bpjs_kes_sum_nov += $nov->Jaminan_Kesehatan;
                            $bpjs_kes_sum_des += $des->Jaminan_Kesehatan;
                            $bpjs_kes_sum_pertahun += $pertahun->Jaminan_Kesehatan;
                    ?>

                            <tr>
                                <td style=" text-align: center;"><?= $no_non_pns++ ?></td>
                                <td width='100'><?= $row->Nama ?></td>
                                <td width='110'><?= $row->NamaJabatan ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jan->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($feb->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($mar->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($apr->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($mei->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jun->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jul->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($agu->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($sep->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($okt->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($nov->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($des->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='90'><?= $this->angka->rupiah2($pertahun->Jaminan_Kesehatan) ?></td>

                            </tr>

                    <?php }
                    } ?>


                    <tr style="font-weight: bold">

                        <td colspan="3">JUMLAH</td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_jan) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_feb) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_mar) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_apr) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_mei) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_jun) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_jul) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_agu) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_sep) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_okt) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_nov) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_des) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_pertahun) ?></td>

                    </tr>

                    <tr style=" text-align: center;">

                        <td colspan="3">PENGHASILAN TETAP</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <?php
                    $data_perangkat_pns = $this->rekapitulasi_model->perangkatByDesaPns($tahun, $bulan, $rowdesa->DesaId);
                    $no_pns = 1;
                    if ($data_perangkat_pns->num_rows() != 0) {
                        foreach ($data_perangkat_pns->result() as $row) {
                            $nik = $row->Nik;
                            $jan = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 1, $rowdesa->DesaId, $nik);
                            $feb = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 2, $rowdesa->DesaId, $nik);
                            $mar = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 3, $rowdesa->DesaId, $nik);
                            $apr = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 4, $rowdesa->DesaId, $nik);
                            $mei = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 5, $rowdesa->DesaId, $nik);
                            $jun = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 6, $rowdesa->DesaId, $nik);
                            $jul = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 7, $rowdesa->DesaId, $nik);
                            $agu = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 8, $rowdesa->DesaId, $nik);
                            $sep = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 9, $rowdesa->DesaId, $nik);
                            $okt = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 10, $rowdesa->DesaId, $nik);
                            $nov = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 11, $rowdesa->DesaId, $nik);
                            $des = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 12, $rowdesa->DesaId, $nik);

                            $pertahun = $this->rekapitulasi_model->gajiByPerangkatByTahun($tahun, $rowdesa->DesaId, $nik);

                            $bpjs_kes_sum_jan2 += $jan->Jaminan_Kesehatan;
                            $bpjs_kes_sum_feb2 += $feb->Jaminan_Kesehatan;
                            $bpjs_kes_sum_mar2 += $mar->Jaminan_Kesehatan;
                            $bpjs_kes_sum_apr2 += $apr->Jaminan_Kesehatan;
                            $bpjs_kes_sum_mei2 += $mei->Jaminan_Kesehatan;
                            $bpjs_kes_sum_jun2 += $jun->Jaminan_Kesehatan;
                            $bpjs_kes_sum_jul2 += $jul->Jaminan_Kesehatan;
                            $bpjs_kes_sum_agu2 += $agu->Jaminan_Kesehatan;
                            $bpjs_kes_sum_sep2 += $sep->Jaminan_Kesehatan;
                            $bpjs_kes_sum_okt2 += $okt->Jaminan_Kesehatan;
                            $bpjs_kes_sum_nov2 += $nov->Jaminan_Kesehatan;
                            $bpjs_kes_sum_des2 += $des->Jaminan_Kesehatan;
                            $bpjs_kes_sum_pertahun2 += $pertahun->Jaminan_Kesehatan;
                    ?>

                            <tr>
                                <td style=" text-align: center;"><?= $no_pns++ ?></td>
                                <td><?= $row->Nama ?></td>
                                <td width='110'><?= $row->NamaJabatan ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jan->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($feb->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($mar->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($apr->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($mei->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jun->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jul->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($agu->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($sep->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($okt->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($nov->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($des->Jaminan_Kesehatan) ?></td>
                                <td style=" text-align: right;" width='90'><?= $this->angka->rupiah2($pertahun->Jaminan_Kesehatan) ?></td>

                            </tr>

                    <?php }
                    } ?>
                    <tr style="font-weight: bold">

                        <td colspan="3">JUMLAH</td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_jan2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_feb2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_mar2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_apr2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_mei2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_jun2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_jul2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_agu2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_sep2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_okt2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_nov2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_des2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_pertahun2) ?></td>

                    </tr>
                    <tr>
                        <td style="color:white">a</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr style="font-weight: bold">
                        <td colspan="3">TOTAL PERBULAN</td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_jan + $bpjs_kes_sum_jan2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_feb + $bpjs_kes_sum_feb2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_mar + $bpjs_kes_sum_mar2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_apr + $bpjs_kes_sum_apr2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_mei + $bpjs_kes_sum_mei2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_jun + $bpjs_kes_sum_jun2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_jul + $bpjs_kes_sum_jul2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_agu + $bpjs_kes_sum_agu2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_sep + $bpjs_kes_sum_sep2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_okt + $bpjs_kes_sum_okt2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_nov + $bpjs_kes_sum_nov2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_des + $bpjs_kes_sum_des2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_kes_sum_pertahun + $bpjs_kes_sum_pertahun2) ?></td>

                    </tr>
                </table>
            </div>
            <br><br>
            <table>
                <tr>
                    <td style="width:400px; "></td>
                    <td>
                        <div style="text-align: center;  line-height: 1.6;">


                            Pati, <?= date('d ') . convertBulan($bulan) . " " . $tahun ?> <br>
                            KEPALA DESA
                            <br><br><br><br>

                            <?= $this->rekapitulasi_model->getKades($rowdesa->DesaId)->row()->Nama ?><br>

                        </div>
                    </td>
                </tr>
            </table>

        </page>
        <page orientation="landscape" format="Folio">

            <div style="text-align: center;  line-height: 1.6;">
                REKAPITULASI KEBUTUHAN IURAN JKK dan JKM (0.54%)<br>
                TAHUN ANGGARAN 2021
            </div>
            <br><br>
            <table>

                <tr>
                    <td>DESA </td>
                    <td>: </td>
                    <td><?= remove_word2($rowdesa->DesaNama); ?></td>
                </tr>
                <tr>
                    <td>KECAMATAN </td>
                    <td>: </td>
                    <td><?= remove_word(strtoupper($this->rekapitulasi_model->getKecId($kecid)->KecNama)); ?></td>
                </tr>
            </table>
            <div style="font-size:12px;">
                <table border="1" style="width:1000px; line-height: 1.6;">
                    <tr style=" text-align: center;">
                        <td width='13' rowspan="2">NO</td>
                        <td width='100' rowspan="2">NAMA</td>
                        <td width='110' rowspan="2">JABATAN</td>
                        <td width='700' colspan="12">BULAN (SATUAN) </td>
                        <td width='90'>JUMLAH/Thn</td>
                    </tr>
                    <tr style=" text-align: center;">
                        <td>JAN</td>
                        <td>FEB</td>
                        <td>MAR</td>
                        <td>APR</td>
                        <td>MEI</td>
                        <td>JUN</td>
                        <td>JUL</td>
                        <td>AGS</td>
                        <td>SEPT</td>
                        <td>OKT</td>
                        <td>NOP</td>
                        <td>DES</td>
                        <td>(Rp)</td>
                    </tr>
                    <tr style=" text-align: center;">
                        <?php for ($i = 1; $i < 17; $i++) { ?>
                            <td><?= $i; ?></td>
                        <?php } ?>
                    </tr>
                    <tr style=" text-align: center;">

                        <td colspan="3">PENGHASILAN TETAP</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <?php
                    $data_perangkat_non_pns = $this->rekapitulasi_model->perangkatByDesaNonPns($tahun, $bulan, $rowdesa->DesaId);
                    $no_non_pns = 1;
                    if ($data_perangkat_non_pns->num_rows() != 0) {
                        foreach ($data_perangkat_non_pns->result() as $row) {
                            $nik = $row->Nik;
                            $jan = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 1, $rowdesa->DesaId, $nik);
                            $feb = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 2, $rowdesa->DesaId, $nik);
                            $mar = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 3, $rowdesa->DesaId, $nik);
                            $apr = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 4, $rowdesa->DesaId, $nik);
                            $mei = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 5, $rowdesa->DesaId, $nik);
                            $jun = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 6, $rowdesa->DesaId, $nik);
                            $jul = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 7, $rowdesa->DesaId, $nik);
                            $agu = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 8, $rowdesa->DesaId, $nik);
                            $sep = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 9, $rowdesa->DesaId, $nik);
                            $okt = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 10, $rowdesa->DesaId, $nik);
                            $nov = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 11, $rowdesa->DesaId, $nik);
                            $des = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 12, $rowdesa->DesaId, $nik);

                            $pertahun = $this->rekapitulasi_model->gajiByPerangkatByTahun($tahun, $rowdesa->DesaId, $nik);

                            $bpjs_tk_sum_jan += ($jan->Jaminan_Jkk + $jan->Jaminan_Jkm);
                            $bpjs_tk_sum_feb += ($feb->Jaminan_Jkk + $feb->Jaminan_Jkm);
                            $bpjs_tk_sum_mar += ($mar->Jaminan_Jkk + $mar->Jaminan_Jkm);
                            $bpjs_tk_sum_apr += ($apr->Jaminan_Jkk + $apr->Jaminan_Jkm);
                            $bpjs_tk_sum_mei += ($mei->Jaminan_Jkk + $mei->Jaminan_Jkm);
                            $bpjs_tk_sum_jun += ($jun->Jaminan_Jkk + $jun->Jaminan_Jkm);
                            $bpjs_tk_sum_jul += ($jul->Jaminan_Jkk + $jul->Jaminan_Jkm);
                            $bpjs_tk_sum_agu += ($agu->Jaminan_Jkk + $agu->Jaminan_Jkm);
                            $bpjs_tk_sum_sep += ($sep->Jaminan_Jkk + $sep->Jaminan_Jkm);
                            $bpjs_tk_sum_okt += ($okt->Jaminan_Jkk + $okt->Jaminan_Jkm);
                            $bpjs_tk_sum_nov += ($nov->Jaminan_Jkk + $nov->Jaminan_Jkm);
                            $bpjs_tk_sum_des += ($des->Jaminan_Jkk + $des->Jaminan_Jkm);
                            $bpjs_tk_sum_pertahun += ($pertahun->Jaminan_Jkk + $pertahun->Jaminan_Jkm);
                    ?>

                            <tr>
                                <td style=" text-align: center;"><?= $no_non_pns++ ?></td>
                                <td width='100'><?= $row->Nama ?></td>
                                <td width='110'><?= $row->NamaJabatan ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jan->Jaminan_Jkk + $jan->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($feb->Jaminan_Jkk + $feb->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($mar->Jaminan_Jkk + $mar->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($apr->Jaminan_Jkk + $apr->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($mei->Jaminan_Jkk + $mei->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jun->Jaminan_Jkk + $jun->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jul->Jaminan_Jkk + $jul->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($agu->Jaminan_Jkk + $agu->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($sep->Jaminan_Jkk + $sep->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($okt->Jaminan_Jkk + $okt->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($nov->Jaminan_Jkk + $nov->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($des->Jaminan_Jkk + $des->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='90'><?= $this->angka->rupiah2($pertahun->Jaminan_Jkk + $pertahun->Jaminan_Jkm) ?></td>

                            </tr>

                    <?php }
                    } ?>


                    <tr style="font-weight: bold">

                        <td colspan="3">JUMLAH</td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_jan) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_feb) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_mar) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_apr) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_mei) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_jun) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_jul) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_agu) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_sep) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_okt) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_nov) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_des) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_pertahun) ?></td>

                    </tr>

                    <tr style=" text-align: center;">

                        <td colspan="3">PENGHASILAN TETAP</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <?php
                    $data_perangkat_pns = $this->rekapitulasi_model->perangkatByDesaPns($tahun, $bulan, $rowdesa->DesaId);
                    $no_pns = 1;
                    if ($data_perangkat_pns->num_rows() != 0) {
                        foreach ($data_perangkat_pns->result() as $row) {
                            $nik = $row->Nik;
                            $jan = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 1, $rowdesa->DesaId, $nik);
                            $feb = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 2, $rowdesa->DesaId, $nik);
                            $mar = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 3, $rowdesa->DesaId, $nik);
                            $apr = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 4, $rowdesa->DesaId, $nik);
                            $mei = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 5, $rowdesa->DesaId, $nik);
                            $jun = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 6, $rowdesa->DesaId, $nik);
                            $jul = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 7, $rowdesa->DesaId, $nik);
                            $agu = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 8, $rowdesa->DesaId, $nik);
                            $sep = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 9, $rowdesa->DesaId, $nik);
                            $okt = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 10, $rowdesa->DesaId, $nik);
                            $nov = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 11, $rowdesa->DesaId, $nik);
                            $des = $this->rekapitulasi_model->gajiByPerangkatByBulan($tahun, 12, $rowdesa->DesaId, $nik);

                            $pertahun = $this->rekapitulasi_model->gajiByPerangkatByTahun($tahun, $rowdesa->DesaId, $nik);

                            $bpjs_tk_sum_jan2 += ($jan->Jaminan_Jkk + $jan->Jaminan_Jkm);
                            $bpjs_tk_sum_feb2 += ($feb->Jaminan_Jkk + $feb->Jaminan_Jkm);
                            $bpjs_tk_sum_mar2 += ($mar->Jaminan_Jkk + $mar->Jaminan_Jkm);
                            $bpjs_tk_sum_apr2 += ($apr->Jaminan_Jkk + $apr->Jaminan_Jkm);
                            $bpjs_tk_sum_mei2 += ($mei->Jaminan_Jkk + $mei->Jaminan_Jkm);
                            $bpjs_tk_sum_jun2 += ($jun->Jaminan_Jkk + $jun->Jaminan_Jkm);
                            $bpjs_tk_sum_jul2 += ($jul->Jaminan_Jkk + $jul->Jaminan_Jkm);
                            $bpjs_tk_sum_agu2 += ($agu->Jaminan_Jkk + $agu->Jaminan_Jkm);
                            $bpjs_tk_sum_sep2 += ($sep->Jaminan_Jkk + $sep->Jaminan_Jkm);
                            $bpjs_tk_sum_okt2 += ($okt->Jaminan_Jkk + $okt->Jaminan_Jkm);
                            $bpjs_tk_sum_nov2 += ($nov->Jaminan_Jkk + $nov->Jaminan_Jkm);
                            $bpjs_tk_sum_des2 += ($des->Jaminan_Jkk + $des->Jaminan_Jkm);
                            $bpjs_tk_sum_pertahun2 += ($pertahun->Jaminan_Jkk + $pertahun->Jaminan_Jkm);
                    ?>

                            <tr>
                                <td style=" text-align: center;"><?= $no_pns++ ?></td>
                                <td width='100'><?= $row->Nama ?></td>
                                <td width='110'><?= $row->NamaJabatan ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jan->Jaminan_Jkk + $jan->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($feb->Jaminan_Jkk + $feb->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($mar->Jaminan_Jkk + $mar->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($apr->Jaminan_Jkk + $apr->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($mei->Jaminan_Jkk + $mei->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jun->Jaminan_Jkk + $jun->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($jul->Jaminan_Jkk + $jul->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($agu->Jaminan_Jkk + $agu->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($sep->Jaminan_Jkk + $sep->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($okt->Jaminan_Jkk + $okt->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($nov->Jaminan_Jkk + $nov->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='58'><?= $this->angka->rupiah2($des->Jaminan_Jkk + $des->Jaminan_Jkm) ?></td>
                                <td style=" text-align: right;" width='90'><?= $this->angka->rupiah2($pertahun->Jaminan_Jkk + $pertahun->Jaminan_Jkm) ?></td>

                            </tr>

                    <?php }
                    } ?>
                    <tr style="font-weight: bold">

                        <td colspan="3">JUMLAH</td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_jan2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_feb2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_mar2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_apr2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_mei2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_jun2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_jul2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_agu2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_sep2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_okt2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_nov2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_des2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_pertahun2) ?></td>

                    </tr>
                    <tr>
                        <td style="color:white">a</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr style="font-weight: bold">
                        <td colspan="3">TOTAL PERBULAN</td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_jan + $bpjs_tk_sum_jan2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_feb + $bpjs_tk_sum_feb2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_mar + $bpjs_tk_sum_mar2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_apr + $bpjs_tk_sum_apr2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_mei + $bpjs_tk_sum_mei2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_jun + $bpjs_tk_sum_jun2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_jul + $bpjs_tk_sum_jul2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_agu + $bpjs_tk_sum_agu2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_sep + $bpjs_tk_sum_sep2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_okt + $bpjs_tk_sum_okt2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_nov + $bpjs_tk_sum_nov2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_ktk_sum_des + $bpjs_tk_sum_des2) ?></td>
                        <td style=" text-align: right;"><?= $this->angka->rupiah2($bpjs_tk_sum_pertahun + $bpjs_tk_sum_pertahun2) ?></td>

                    </tr>
                </table>
            </div>
            <br><br>
            <table>
                <tr>
                    <td style="width:400px; "></td>
                    <td>
                        <div style="text-align: center;  line-height: 1.6;">


                            Pati, <?= date('d ') . convertBulan($bulan) . " " . $tahun ?> <br>
                            KEPALA DESA
                            <br><br><br><br>

                            <?= $this->rekapitulasi_model->getKades($rowdesa->DesaId)->row()->Nama ?><br>

                        </div>
                    </td>
                </tr>
            </table>
        </page>


        <page orientation="landscape" format="Folio">

            <div style="text-align: center;  line-height: 1.6;">
                REKAPITULASI KEPUTUSAN DAN DATA KEPALA DESA DAN PERANGKAT DESA<br>
                TAHUN ANGGARAN 2021
            </div>
            <br><br>
            DESA .....<br>
            KECAMATAN .........<br>
            <br>
            <div style="font-size:11">
                <table border="1" style="width:1000px; text-align: center;  line-height: 1.6; ">
                    <tr>
                        <td width='10'>NO</td>
                        <td width='90'>NAMA</td>
                        <td width='90'>JABATAN</td>
                        <td width='50'>NO. SK</td>
                        <td width='50'>TGL. SK</td>
                        <td width='50'>Pejabat Yang Melantik</td>
                        <td width='30'>Bengkok</td>
                        <td width='30'>PNS/Non PNS</td>
                        <td width='50'>Akhir Masa Jabatan</td>
                        <td width='50'>No HP</td>
                        <td width='50'>NIK</td>
                        <td width='50'>Jenis Kelamin</td>
                        <td width='50'>Tempat Lahir</td>
                        <td width='50'>Tanggal Lahir</td>
                        <td width='50'>Pendidikan</td>
                    </tr>
                    <tr>
                        <?php for ($i = 1; $i < 16; $i++) { ?>
                            <td><?= $i; ?></td>
                        <?php } ?>
                    </tr>
                    <tr>

                        <td colspan="16">KEPALA DESA DAN PERANGKAT DESA NON PNS</td>

                    </tr>
                    <?php $data_perangkat_non_pns = $this->rekapitulasi_model->perangkatByDesaNonPns($tahun, $bulan, $rowdesa->DesaId);
                    $no_non_pns = 1;

                    if ($data_perangkat_non_pns->num_rows() != 0) {
                        foreach ($data_perangkat_non_pns->result() as $row) {
                    ?>
                            <tr>
                                <td width='10'><?= $no_non_pns++ ?></td>
                                <td width='90'><?= $row->Nama ?></td>
                                <td width='90'><?= $row->NamaJabatan ?></td>
                                <td width='50'><?= $row->NoSk ?></td>
                                <td width='50'><?= $row->TglSk ?></td>
                                <td width='50'><?= $row->SkPelantik ?></td>
                                <td width='30'><?= $row->Nama ?></td>
                                <td width='30'><?= $row->Pns ?></td>
                                <td width='50'><?= $row->SkAkhirJabatanTgl ?></td>
                                <td width='50'><?= $row->Nama ?></td>
                                <td width='50'><?= $row->Nik ?></td>
                                <td width='50'><?= $row->SkJenkel ?></td>
                                <td width='50'><?= $row->SkTempatLahir ?></td>
                                <td width='50'><?= $row->SkTglLahir ?></td>
                                <td width='50'><?= $row->SkPendidikan ?></td>

                            </tr>
                    <?php }
                    } ?>

                    <tr>

                        <td colspan="3">JUMLAH </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>

                        <td colspan="15">KEPALA DESA DAN SEKRETARIS DESA YANG BERSTATUS SEBAGAI PNS</td>


                    </tr>
                    <?php $data_perangkat_pns = $this->rekapitulasi_model->perangkatByDesaPns($tahun, $bulan, $rowdesa->DesaId);
                    $no_pns = 1;

                    if ($data_perangkat_pns->num_rows() != 0) {
                        foreach ($data_perangkat_pns->result() as $row) {
                    ?>
                            <tr>
                                <td><?= $no_pns++ ?></td>
                                <td><?= $row->Nama ?></td>
                                <td><?= $row->NamaJabatan ?></td>
                                <td><?= $row->NoSk ?></td>
                                <td><?= $row->TglSk ?></td>
                                <td><?= $row->SkPelantik ?></td>
                                <td>-</td>
                                <td><?= $row->Pns ?></td>
                                <td><?= $row->SkAkhirJabatanTgl ?></td>
                                <td><?= $row->Nama ?></td>
                                <td><?= $row->Nik ?></td>
                                <td><?= $row->SkJenkel ?></td>
                                <td><?= $row->SkTempatLahir ?></td>
                                <td><?= $row->SkTglLahir ?></td>
                                <td><?= $row->SkPendidikan ?></td>

                            </tr>
                    <?php }
                    } ?>
                    <tr>
                        <td></td>
                        <td colspan="2">JUMLAH</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td>a</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2">TOTAL PERBULAN </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                </table>
            </div>

            <br><br>
            <table>
                <tr>
                    <td style="width:400px; "></td>
                    <td>
                        <div style="text-align: center;  line-height: 1.6;">


                            Pati, 17 Januari 2021 <br>
                            KEPALA DESA
                            <br><br><br><br>

                            …………..…………………..<br>

                        </div>
                    </td>
                </tr>
            </table>

        </page>
<?php }
} ?>