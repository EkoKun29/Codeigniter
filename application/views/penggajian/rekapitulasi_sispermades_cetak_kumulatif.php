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
</style>
<?php
function status($st)
{
    if ($st == 1) {
        echo "<div class='badge badge-primary'>Aktif</div>";
    } else {
        echo "<div class='badge badge-danger'>Tidak Aktif</div>";
    }
}
?>

<!-- rekaputulasi keseluruhan -->
<h4 style="margin-bottom:0;text-align: center">REKAPITULASI PENGHASILAN TETAP KABUPATEN PATI</h4>
<!-- <h4 style="margin-top:0;margin-bottom:0;text-align: center">KECAMATAN <?php echo strtoupper($this->rekapitulasi_model->getKecId($kecid)->KecNama); ?></h4> -->
<h4 style="margin-top:0;text-align: center">BULAN <?php echo strtoupper(convertBulan($bulan)); ?> TAHUN <?php echo $tahun; ?></h4>
<table border="1">
    <thead>
        <tr>
            <th style="text-align: center;" rowspan="3">#</th>
            <th class="whatever" style="text-align: center;" rowspan="3">DESA</th>
            <th style="text-align: center;width:10px;" rowspan="3">JML</th>
            <th style="text-align: center;width:85px;" rowspan="3">PENGHASILAN TETAP</th>
            <th style="text-align: center;" colspan="3">JAMINAN</th>
            <th style="text-align: center;width:70px;" rowspan="3">JUMLAH KOTOR</th>
            <th style="text-align: center;" colspan="4">POTONGAN</th>
            <th style="text-align: center;width:50px;" rowspan="3">JUMLAH POTONGAN</th>
            <th style="text-align: center;width:80px" rowspan="3">JUMLAH BERSIH</th>
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
        <tr>
            <?php for ($i = 1; $i <= 14; $i++) { ?>
                <th style="text-align: center;"><?= $i; ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        // if (isset($datadesa)) {
        $no = 1;
        // foreach ($datadesa as $rowdesa) {
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
            <td style="text-align: center;"><?php //$no++; 
                                            ?></td>
            <td style="width:150px;"><b>KABUPATEN PATI</b></td>
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
                $jmlkepaladesa = $this->rekapitulasi_model->getKepalaDesa_Kumulatif($tahun, $bulan, $kecid)->num_rows();
                echo $jmlkepaladesa; ?>
            </td>
            <td style="text-align: right;">
                <?php
                // if ($jmlkepaladesa != 0) {
                $rowperangkat = $this->rekapitulasi_model->getKepalaDesaByTahunByBulanByKec_Kumulatif($tahun, $bulan, $kecid)->row();
                $all_jmlpenghasilantetapkepaladesa = $this->rekapitulasi_model->getKepalaDesaByTahunByBulanByKec_Kumulatif($tahun, $bulan, $kecid)->row()->GajiBulanan;
                if ($all_jmlpenghasilantetapkepaladesa != 0) {
                    $totalpenghasilantetap = $totalpenghasilantetap + $all_jmlpenghasilantetapkepaladesa;
                }
                // }
                echo $this->angka->rupiah2($all_jmlpenghasilantetapkepaladesa);

                ?>
            </td>
            <td style="text-align: right;">
                <?php

                $all_n5 = $rowperangkat->Jaminan_Kesehatan;
                echo $this->angka->rupiah2($all_n5);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $all_n6 = $rowperangkat->Jaminan_Jkk;
                echo $this->angka->rupiah2($all_n6);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $all_n7 = $rowperangkat->Jaminan_Jkm;
                echo $this->angka->rupiah2($all_n7);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $all_n8 = ($all_jmlpenghasilantetapkepaladesa + $all_n5 + $all_n6 + $all_n7);
                echo $this->angka->rupiah2($all_n8);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $all_n9 = $rowperangkat->Potongan_Kesehatan1;
                echo $this->angka->rupiah2($all_n9);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $all_n10 = $rowperangkat->Potongan_Kesehatan2;
                echo $this->angka->rupiah2($all_n10);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $all_n11 = $rowperangkat->Potongan_Jkk;
                echo $this->angka->rupiah2($all_n11);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $all_n12 = $rowperangkat->Potongan_Jkm;
                echo $this->angka->rupiah2($all_n12);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $all_n13 = ($all_n9 + $all_n10 + $all_n11 + $all_n12 + $all_n15 + $all_n16);
                echo $this->angka->rupiah2($all_n13);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $all_n14 = $all_n8 - $all_n13;
                echo $this->angka->rupiah2($all_n14);
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>PERANGKAT DESA</td>
            <td style="text-align: center;">
                <?php
                $total_jmlperangkatdesa = $this->rekapitulasi_model->getPerangkatDesa_Kumulatif($tahun, $bulan, $kecid)->num_rows();
                $jmlperangkatdesa = $this->rekapitulasi_model->getPerangkatByTahunByBulanByKec_Kumulatif($tahun, $bulan, $kecid)->num_rows();
                if ($jmlperangkatdesa != 0) {
                    $totaljml = $totaljml + $jmlperangkatdesa;
                }
                echo $total_jmlperangkatdesa;
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                if ($jmlperangkatdesa != 0) {

                    $all_jmlpenghasilantetapperangkat = $this->rekapitulasi_model->getPenghasilanTetapPerangkatByTahunByBulanByKec_Kumulatif($tahun, $bulan, $kecid)->row()->GajiBulanan;
                    if ($all_jmlpenghasilantetapperangkat != 0) {
                        $totalpenghasilantetap = $totalpenghasilantetap + $jall_mlpenghasilantetapperangkat;
                    }
                }
                echo $this->angka->rupiah2($all_jmlpenghasilantetapperangkat);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $bpjsKesehatan = $this->rekapitulasi_model->sumBpjsKesehatanAll_Kumulatif($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Jaminan_Kesehatan;
                $all_perangkat_n5 = $bpjsKesehatan;
                echo $this->angka->rupiah2($all_perangkat_n5);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $bpjsJkk = $this->rekapitulasi_model->sumBpjsJkkAll_Kumulatif($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Jaminan_Jkk;
                $all_perangkat_n6 = $bpjsJkk;
                echo $this->angka->rupiah2($all_perangkat_n6);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $bpjsJkm = $this->rekapitulasi_model->sumBpjsJkmAll_Kumulatif($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Jaminan_Jkm;
                $all_perangkat_n7 = $bpjsJkm;
                echo $this->angka->rupiah2($all_perangkat_n7);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $all_perangkat_n8 = ($all_jmlpenghasilantetapperangkat + $all_perangkat_n5 + $all_perangkat_n6 + $all_perangkat_n7);
                echo $this->angka->rupiah2($all_perangkat_n8);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $bpjsPotonganKesehatan1 = $this->rekapitulasi_model->sumBpjsPotonganKesehatan1All_Kumulatif($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Potongan_Kesehatan1;
                $all_perangkat_n9 = $bpjsPotonganKesehatan1;
                echo $this->angka->rupiah2($all_perangkat_n9);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $bpjsPotonganKesehatan2 = $this->rekapitulasi_model->sumBpjsPotonganKesehatan2All_Kumulatif($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Potongan_Kesehatan2;
                $all_perangkat_n10 = $bpjsPotonganKesehatan2;
                echo $this->angka->rupiah2($all_perangkat_n10);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $bpjsPotonganJkk = $this->rekapitulasi_model->sumBpjsPotonganJkkAll_Kumulatif($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Potongan_Jkk;
                $all_perangkat_n11 = $bpjsPotonganJkk;
                echo $this->angka->rupiah2($all_perangkat_n11);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $bpjsPotonganJkm = $this->rekapitulasi_model->sumBpjsPotonganJkmAll_Kumulatif($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Potongan_Jkm;
                $all_perangkat_n12 = $bpjsPotonganJkm;
                echo $this->angka->rupiah2($all_perangkat_n12);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $all_perangkat_n13 = ($all_perangkat_n9 + $all_perangkat_n10 + $all_perangkat_n11 + $all_perangkat_n12 + $all_perangkat_n15 + $all_perangkat_n16);
                echo $this->angka->rupiah2($all_perangkat_n13);
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                $all_perangkat_n14 = $all_perangkat_n8 - $all_perangkat_n13;
                echo $this->angka->rupiah2($all_perangkat_n14);
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><strong>JUMLAH</strong></td>
            <td style="text-align: center;">
                <strong>
                    <?= $jmlkepaladesa + $total_jmlperangkatdesa; ?>
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
        <tr>
            <td></td>
            <td>PNS</td>
            <td style="text-align: center;"><?php
                                            $total_jml_pns = $this->rekapitulasi_model->getKumulatifPns($tahun, $bulan);
                                            echo $total_jml_pns; ?></td>
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
            <td style="text-align: center;"><?php
                                            // $total_jml_nonpns = $this->rekapitulasi_model->getKumulatifNonPns($tahun, $bulan);
                                            $total_jml_nonpns = $jmlkepaladesa + $total_jmlperangkatdesa - $total_jml_pns;
                                            echo $total_jml_nonpns; ?></td>
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
                    <?= $total_jml_pns + $total_jml_nonpns; ?>
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
        <tr>
            <td></td>
            <td>JML BPJS KSH</td>
            <td style="text-align: center;">
                <?php
                $total_total_bpjs_ksh = $this->rekapitulasi_model->getKumulatifBpjsKsh($tahun, $bulan);
                echo $total_total_bpjs_ksh;
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
                $total_total_bpjs_tk = $this->rekapitulasi_model->getKumulatifBpjsTenagaKerja($tahun, $bulan);
                echo $total_total_bpjs_tk;
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
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($all_jmlpenghasilantetapkepaladesa + $all_jmlpenghasilantetapperangkat); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($all_n5 + $all_perangkat_n5); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($all_n6 + $all_perangkat_n6); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($all_n7 + $all_perangkat_n7); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($all_n8 + $all_perangkat_n8); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($all_n9 + $all_perangkat_n9); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($all_n10 + $all_perangkat_n10); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($all_n11 + $all_perangkat_n11); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($all_n12 + $all_perangkat_n12); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($all_n13 + $all_perangkat_n13); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah2($all_n14 + $all_perangkat_n14); ?></b></td>
        </tr>

        <?php //}
        // } 
        ?>

    </tbody>
</table>



<table>
    <tr>
        <td style="text-align: center; width:50%;">
            <br>
            <br>
            <br>
            MENGETAHUI<br>
            KEPALA DISPERMADES<br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <?= kepalaDispermades(); ?>
        </td>
        <td style="width:50%;"></td>
    </tr>
</table>