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
        echo "Pns";
    } else {
        echo "Non Pns";
    }
}
?>
<style>
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
        padding: 2px;
    }

    td {
        padding: 3px;
    }
</style>
<page orientation="landscape" format="Folio">
    <span style="text-align: center;">
        <h3>
            DAFTAR PENGHASILAN TETAP KEPALA DESA DAN PERANGKAT DESA
        </h3>
        <h4>
            <?= strtoupper($desa); ?> <?= strtoupper($kec); ?> <br>
            BULAN <?= strtoupper(convertBulan($bulan)); ?> TAHUN <?= strtoupper($tahun); ?><br>
        </h4>
    </span>

    <table border="1" style=" border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th style="text-align: center;" rowspan="3">#</th>
                <th style="text-align: center;" rowspan="3">NAMA<br>JABATAN</th>
                <th style="text-align: center;" rowspan="3">STATUS <br>PNS</th>
                <th style="text-align: center;" rowspan="3">GAJI <br>BULANAN</th>
                <th style="text-align: center;" colspan="3">JAMINAN</th>
                <th style="text-align: center;" rowspan="3">JUMLAH<br> KOTOR</th>
                <th style="text-align: center;" colspan="4">POTONGAN</th>
                <th style="text-align: center;" rowspan="3">JUMLAH<br> POTONGAN</th>
                <th style="text-align: center;" rowspan="3">JUMLAH<br> BERSIH</th>
            </tr>
            <tr>
                <th style="text-align: center;">KSH</th>
                <th style="text-align: center;" colspan="2">KETENAGA <br>KERJAAN</th>
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
            $start      = 1;
            foreach ($rekapitulasi as $data) {
                $n4     = $data->GajiBulanan;
                $n5     = $data->Jaminan_Kesehatan;
                $n6     = $data->Jaminan_Jkk;
                $n7     = $data->Jaminan_Jkm;
                $n8     = $data->GajiKotor;

                $n9     = $data->Potongan_Kesehatan1;
                $n10    = $data->Potongan_Kesehatan2;
                $n11    = $data->Potongan_Jkk;
                $n12    = $data->Potongan_Jkm;
                $n15    = $data->Potongan_Jht;
                $n16    = $data->Potongan_Jp;
                $n13    = $data->Jumlah_Potongan;
                $n14    = $data->GajiBersih;

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
                        */

            ?>
                <tr>
                    <td style="text-align: center; width: 10px;">
                        <?= $start++; ?></td>
                    <td style="text-align: center; width:150px;">
                        <?= $perangkat->Nama; ?>
                        <br>
                        <strong><?= $perangkat->NamaJabatan; ?></strong><br>

                    </td>
                    <td style="text-align: center;">
                        <?= pns($perangkat->Pns); ?>
                    </td>
                    <td style="text-align: right; width:70px;"><?= $this->angka->rupiah2($n4); ?></td>
                    <td style="text-align: right; width:50px;"><?= $this->angka->rupiah2($n5); ?></td>
                    <td style="text-align: right; width:50px;"><?= $this->angka->rupiah2($n6); ?></td>
                    <td style="text-align: right; width:50px;"><?= $this->angka->rupiah2($n7); ?></td>

                    <td style="text-align: right; width:70px;"><?= $this->angka->rupiah2($n8); ?></td>

                    <td style="text-align: right; width:50px;"><?= $this->angka->rupiah2($n9); ?></td>
                    <td style="text-align: right; width:50px;"><?= $this->angka->rupiah2($n10); ?></td>
                    <td style="text-align: right; width:50px;"><?= $this->angka->rupiah2($n11); ?></td>

                    <td style="text-align: right; width:50px;"><?= $this->angka->rupiah2($n12); ?></td>
                    <td style="text-align: right; width:70px;"><?= $this->angka->rupiah2($n13); ?></td>
                    <td style="text-align: right; width:90px;"><?= $this->angka->rupiah2($n14); ?></td>

                </tr>
            <?php } ?>
            <tr><strong>
                    <td style="text-align: center; " colspan="3">

                        JUMLAH

                    </td>
                    <td style="text-align: right; width:70px;"><?= $this->angka->rupiah2($rekapitulasi_total->GajiBulanan); ?></td>
                    <td style="text-align: right; width:50px;"><?= $this->angka->rupiah2($rekapitulasi_total->Jaminan_Kesehatan); ?></td>
                    <td style="text-align: right; width:50px;"><?= $this->angka->rupiah2($rekapitulasi_total->Jaminan_Jkk); ?></td>
                    <td style="text-align: right; width:50px;"><?= $this->angka->rupiah2($rekapitulasi_total->Jaminan_Jkm); ?></td>

                    <td style="text-align: right; width:70px;"><?= $this->angka->rupiah2($rekapitulasi_total->GajiKotor); ?></td>

                    <td style="text-align: right; width:50px;"><?= $this->angka->rupiah2($rekapitulasi_total->Potongan_Kesehatan1); ?></td>
                    <td style="text-align: right; width:50px;"><?= $this->angka->rupiah2($rekapitulasi_total->Potongan_Kesehatan2); ?></td>
                    <td style="text-align: right; width:50px;"><?= $this->angka->rupiah2($rekapitulasi_total->Potongan_Jkk); ?></td>
                    <td style="text-align: right; width:50px;"><?= $this->angka->rupiah2($rekapitulasi_total->Potongan_Jkm); ?></td>

                    <td style="text-align: right; width:70px;"><?= $this->angka->rupiah2($rekapitulasi_total->Jumlah_Potongan); ?></td>
                    <td style="text-align: right; width:90px;"><?= $this->angka->rupiah2($rekapitulasi_total->GajiBersih); ?></td>
                </strong>
            </tr>
        </tbody>

    </table>
</page>

<!-- rekapitulasi 2 -->

<page orientation="landscape" format="Folio">
    <h4 style="margin-bottom:0;text-align: center">REKAPITULASI PENGHASILAN TETAP KEPALA DESA DAN PERANGKAT DESA</h4>
    <br>
    <table border="1">

        <tr style="background-color:#e6e6e6;">
            <th style="text-align: center;  width:10px;" rowspan="3">#</th>
            <th class="whatever" style="text-align: center;" rowspan="3">DESA</th>
            <th style="text-align: center;" rowspan="3">JML</th>
            <th style="text-align: center; width:90px;" rowspan="3">PENGHASILAN TETAP</th>
            <th style="text-align: center; width:200px;" colspan="3">JAMINAN</th>
            <th style="text-align: center; width:100px;" rowspan="3">JUMLAH KOTOR</th>
            <th style="text-align: center; width:220px;" colspan="4">POTONGAN</th>
            <th style="text-align: center; width:80px;" rowspan="3">JUMLAH POTONGAN</th>
            <th style="text-align: center; width:100px" rowspan="3">JUMLAH BERSIH</th>
        </tr>
        <tr style="background-color:#e6e6e6;">
            <th style="text-align: center;">KESEHATAN</th>
            <th style="text-align: center;" colspan="2">KETENAGAKERJAAN</th>
            <th style="text-align: center;" colspan="2">KESEHATAN</th>
            <th style="text-align: center;" colspan="2">KETENAGAKERJAAN</th>
        </tr>
        <tr style="background-color:#e6e6e6;">
            <th style="text-align: center;">4%</th>
            <th style="text-align: center;">JKK</th>
            <th style="text-align: center;">JKM</th>
            <th style="text-align: center;">1%</th>
            <th style="text-align: center;">4%</th>
            <th style="text-align: center;">JKK</th>
            <th style="text-align: center;">JKM</th>
        </tr>
        <tr>
            <?php for ($i = 1; $i <= 14; $i++) { ?>
                <th style="text-align: center;"><?= $i; ?></th>
            <?php } ?>
        </tr>
        <?php
        if (isset($datadesa)) {
            $no = 1;
            foreach ($datadesa as $rowdesa) {
                $jmlpenghasilantetapkepaladesa = 0;
                $n5 = 0;
                $n6 = 0;
                $n7 = 0;
                $n8 = 0;
                $n9 = 0;
                $n10 = 0;
                $n11 = 0;
                $n12 = 0;
                $n13 = 0;
                $n14 = 0;
                $n15 = 0;
                $n16 = 0;
                $totaljml = 0;
                $totalpenghasilantetap = 0;
                $totaln5 = 0;
                $totaln6 = 0;
                $totaln7 = 0;
                $totaln8 = 0;
                $totaln9 = 0;
                $totaln10 = 0;
                $totaln11 = 0;
                $totaln12 = 0;
                $totaln13 = 0;
                $totaln14 = 0;
                $totaln15 = 0;
                $totaln16 = 0;
        ?>
                <tr>
                    <td style="text-align: center;"><?= $no++; ?></td>
                    <td style="width:150px;"> <b><?= strtoupper($rowdesa->DesaNama); ?></b></td>
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
                <tr style="background-color:#f2f2f2;">
                    <td></td>
                    <td>KEPALA DESA</td>
                    <td style="text-align: center;">
                        <?php
                        // $jmlkepaladesa = $this->rekapitulasi_model->getKepalaDesaByTahunByBulanByKecByDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->num_rows();
                        $jmlkepaladesa = $this->rekapitulasi_model->totalKepalaDesaByTahunByBulanByKecByDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->num_rows();
                        if ($jmlkepaladesa != 0) {
                            $totaljml = $totaljml + $jmlkepaladesa;
                        }

                        echo $jmlkepaladesa;
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlkepaladesa != 0) {
                            $rowperangkat = $this->rekapitulasi_model->getKepalaDesaByTahunByBulanByKecByDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->row();
                            $jmlpenghasilantetapkepaladesa = $this->rekapitulasi_model->getKepalaDesaByTahunByBulanByKecByDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->GajiBulanan;
                            if ($jmlpenghasilantetapkepaladesa != 0) {
                                $totalpenghasilantetap = $totalpenghasilantetap + $jmlpenghasilantetapkepaladesa;
                            }
                        }
                        echo $this->angka->rupiah2($jmlpenghasilantetapkepaladesa);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlkepaladesa != 0) {
                            $n5 = $rowperangkat->Jaminan_Kesehatan;
                            if ($n5 != 0) {
                                $totaln5 = $totaln5 + $n5;
                            }
                        }
                        echo $this->angka->rupiah2($n5);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlkepaladesa != 0) {
                            $n6 = $rowperangkat->Jaminan_Jkk;
                            if ($n6 != 0) {
                                $totaln6 = $totaln6 + $n6;
                            }
                        }
                        echo $this->angka->rupiah2($n6);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlkepaladesa != 0) {
                            $n7 = $rowperangkat->Jaminan_Jkm;
                            if ($n7 != 0) {
                                $totaln7 = $totaln7 + $n7;
                            }
                        }
                        echo $this->angka->rupiah2($n7);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlkepaladesa != 0) {
                            $n8 = ($jmlpenghasilantetapkepaladesa + $n5 + $n6 + $n7);
                            if ($n8 != 0) {
                                $totaln8 = $totaln8 + $n8;
                            }
                        }
                        echo $this->angka->rupiah2($n8);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlkepaladesa != 0) {
                            $n9 = $rowperangkat->Potongan_Kesehatan1;
                            if ($n9 != 0) {
                                $totaln9 = $totaln9 + $n9;
                            }
                        }
                        echo $this->angka->rupiah2($n9);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlkepaladesa != 0) {
                            $n10 = $rowperangkat->Potongan_Kesehatan2;
                            if ($n10 != 0) {
                                $totaln10 = $totaln10 + $n10;
                            }
                        }
                        echo $this->angka->rupiah2($n10);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlkepaladesa != 0) {
                            $n11 = $rowperangkat->Potongan_Jkk;
                            if ($n11 != 0) {
                                $totaln11 = $totaln11 + $n11;
                            }
                        }
                        echo $this->angka->rupiah2($n11);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlkepaladesa != 0) {
                            $n12 = $rowperangkat->Potongan_Jkm;
                            if ($n12 != 0) {
                                $totaln12 = $totaln12 + $n12;
                            }
                        }
                        echo $this->angka->rupiah2($n12);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlkepaladesa != 0) {
                            $n13 = ($n9 + $n10 + $n11 + $n12);
                            if ($n13 != 0) {
                                $totaln13 = $totaln13 + $n13;
                            }
                        }
                        echo $this->angka->rupiah2($n13);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlkepaladesa != 0) {
                            $n14 = $n8 - $n13;
                            if ($n14 != 0) {
                                $totaln14 = $totaln14 + $n14;
                            }
                        }
                        echo $this->angka->rupiah2($n14);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>PERANGKAT DESA</td>
                    <td style="text-align: center;">
                        <?php
                        $jmlperangkatdesa = $this->rekapitulasi_model->getPerangkatByTahunByBulanByKecByDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->num_rows();
                        if ($jmlperangkatdesa != 0) {
                            $totaljml = $totaljml + $jmlperangkatdesa;
                        }
                        echo $jmlperangkatdesa;
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlperangkatdesa != 0) {

                            $jmlpenghasilantetapperangkat = $this->rekapitulasi_model->getPenghasilanTetapPerangkatByTahunByBulanByKecByDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->GajiBulanan;
                            if ($jmlpenghasilantetapperangkat != 0) {
                                $totalpenghasilantetap = $totalpenghasilantetap + $jmlpenghasilantetapperangkat;
                            }
                        }
                        echo $this->angka->rupiah2($jmlpenghasilantetapperangkat);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlperangkatdesa != 0) {
                            $bpjsKesehatan = $this->rekapitulasi_model->sumBpjsKesehatan($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Jaminan_Kesehatan;
                            $n5 = $bpjsKesehatan;
                            if ($n5 != 0) {
                                $totaln5 = $totaln5 + $n5;
                            }
                        }
                        echo $this->angka->rupiah2($n5);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlperangkatdesa != 0) {
                            $bpjsJkk = $this->rekapitulasi_model->sumBpjsJkk($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Jaminan_Jkk;
                            $n6 = $bpjsJkk;
                            if ($n6 != 0) {
                                $totaln6 = $totaln6 + $n6;
                            }
                        }
                        echo $this->angka->rupiah2($n6);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlperangkatdesa != 0) {
                            $bpjsJkm = $this->rekapitulasi_model->sumBpjsJkm($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Jaminan_Jkm;
                            $n7 = $bpjsJkm;
                            if ($n7 != 0) {
                                $totaln7 = $totaln7 + $n7;
                            }
                        }
                        echo $this->angka->rupiah2($n7);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlperangkatdesa != 0) {
                            $n8 = ($jmlpenghasilantetapperangkat + $n5 + $n6 + $n7);
                            if ($n8 != 0) {
                                $totaln8 = $totaln8 + $n8;
                            }
                        }
                        echo $this->angka->rupiah2($n8);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlperangkatdesa != 0) {
                            $bpjsPotonganKesehatan1 = $this->rekapitulasi_model->sumBpjsPotonganKesehatan1($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Potongan_Kesehatan1;
                            $n9 = $bpjsPotonganKesehatan1;
                            if ($n9 != 0) {
                                $totaln9 = $totaln9 + $n9;
                            }
                        }
                        echo $this->angka->rupiah2($n9);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlperangkatdesa != 0) {
                            $bpjsPotonganKesehatan2 = $this->rekapitulasi_model->sumBpjsPotonganKesehatan2($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Potongan_Kesehatan2;
                            $n10 = $bpjsPotonganKesehatan2;
                            if ($n10 != 0) {
                                $totaln10 = $totaln10 + $n10;
                            }
                        }
                        echo $this->angka->rupiah2($n10);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlperangkatdesa != 0) {
                            $bpjsPotonganJkk = $this->rekapitulasi_model->sumBpjsPotonganJkk($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Potongan_Jkk;
                            $n11 = $bpjsPotonganJkk;
                            if ($n11 != 0) {
                                $totaln11 = $totaln11 + $n11;
                            }
                        }
                        echo $this->angka->rupiah2($n11);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlperangkatdesa != 0) {
                            $bpjsPotonganJkm = $this->rekapitulasi_model->sumBpjsPotonganJkm($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Potongan_Jkm;
                            $n12 = $bpjsPotonganJkm;
                            if ($n12 != 0) {
                                $totaln12 = $totaln12 + $n12;
                            }
                        }
                        echo $this->angka->rupiah2($n12);
                        ?>
                    </td>

                    <td style="text-align: right;">
                        <?php
                        if ($jmlperangkatdesa != 0) {
                            $n13 = ($n9 + $n10 + $n11 + $n12 + $n15 + $n16);
                            if ($n13 != 0) {
                                $totaln13 = $totaln13 + $n13;
                            }
                        }
                        echo $this->angka->rupiah2($n13);
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if ($jmlperangkatdesa != 0) {
                            $n14 = $n8 - $n13;
                            if ($n14 != 0) {
                                $totaln14 = $totaln14 + $n14;
                            }
                        }
                        echo $this->angka->rupiah2($n14);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><strong>JUMLAH</strong></td>
                    <td style="text-align: center;">
                        <strong>
                            <?= $jmlkepaladesa + $jmlperangkatdesa; ?>
                        </strong>
                    </td>
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
                    <td> <span style="color:white">a</span> </td>
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
                <tr style="background-color:#f2f2f2;">
                    <td></td>
                    <td>PNS</td>
                    <td style="text-align: center;">
                        <?= $jml_pns = $this->rekapitulasi_model->TotalPns($rowdesa->DesaId, $tahun, $bulan); ?>
                    </td>
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
                    <td>NON PNS</td>
                    <td style="text-align: center;">

                        <?= $jml_nonpns = $this->rekapitulasi_model->TotalNonPns($rowdesa->DesaId, $tahun, $bulan); ?>

                    </td>
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
                    <td><strong>JUMLAH</strong></td>
                    <td style="text-align: center;">
                        <strong>
                            <?= $jml_pns + $jml_nonpns ?>
                        </strong>
                    </td>
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
                    <td> <span style="color:white">a</span></td>
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
                    <td>JML BPJS KSH</td>
                    <td style="text-align: center;">
                        <?php
                        $bpjs_ksh = $this->rekapitulasi_model->TotalBpjsKsh($rowdesa->DesaId, $tahun, $bulan)->BpjsKsh;
                        if ($bpjs_ksh != NULL) {
                            $total_bpjs_ksh = $bpjs_ksh;
                        } else {
                            $total_bpjs_ksh = 0;
                        }
                        echo $total_bpjs_ksh;
                        ?>

                    </td>
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
                    <td>JML BPJS TK</td>
                    <td style="text-align: center;">
                        <?php
                        $bpjs_tk = $this->rekapitulasi_model->TotalBpjsTK($rowdesa->DesaId, $tahun, $bulan)->BpjsTenagaKerja;
                        if ($bpjs_tk != NULL) {
                            $total_bpjs_tk = $bpjs_tk;
                        } else {
                            $total_bpjs_tk = 0;
                        }
                        echo $total_bpjs_tk;
                        ?>
                    </td>
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
                <tr style="background-color:#f2f2f2;">
                    <td></td>
                    <td><b>TOTAL</b></td>
                    <td style="text-align: center;"><?php //echo $totaljml; 
                                                    ?></td>
                    <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($totalpenghasilantetap); ?></b></td>
                    <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($totaln5); ?></b></td>
                    <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($totaln6); ?></b></td>
                    <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($totaln7); ?></b></td>
                    <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($totaln8); ?></b></td>
                    <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($totaln9); ?></b></td>
                    <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($totaln10); ?></b></td>
                    <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($totaln11); ?></b></td>
                    <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($totaln12); ?></b></td>
                    <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($totaln13); ?></b></td>
                    <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($totaln14); ?></b></td>
                </tr>
                <!-- end rowdesa -->
        <?php }
        } ?>

    </table>
    <table>
        <tr>
            <td style="text-align: center; width:50%;">
                <br>
                <br>
                <br>
                MENGETAHUI<br>
                KEPALA <?= strtoupper(remove_word($desa)) ?> KEC <?= strtoupper(remove_word($kec)) ?><br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <?= $kades; ?>
            </td>
            <td style="text-align: center; width:50%;">
                <br>
                <br>
                <br>
                <br>
                BENDAHARA DESA<br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <?= $bendahara; ?>
            </td>
        </tr>
    </table>

</page>