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
        padding: 5px;
    }

    td {
        padding: 3px;
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
<page orientation="landscape" format="Folio">
    <h4 style="margin-bottom:0;text-align: center">REKAPITULASI PENGHASILAN TETAP KEPALA DESA DAN PERANGKAT DESA</h4>
    <h4 style="margin-top:0;margin-bottom:0;text-align: center"><?php echo strtoupper($this->rekapitulasi_model->getKecId($kecid)->KecNama); ?></h4>
    <h4 style="margin-top:0;text-align: center">BULAN <?php echo strtoupper(convertBulan($bulan)); ?> TAHUN <?php echo $tahun; ?></h4>
    <table border="1">
        <thead>
            <tr>
                <th style="text-align: center;" rowspan="3">#</th>
                <th class="whatever" style="text-align: center;" rowspan="3">DESA</th>
                <th style="text-align: center;" rowspan="3">JML</th>
                <th style="text-align: center;width:80px;" rowspan="3">PENGHASILAN TETAP</th>
                <th style="text-align: center;" colspan="3">JAMINAN</th>
                <th style="text-align: center;width:80px;" rowspan="3">JUMLAH KOTOR</th>
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
                        <td style="width:140px;"><b><?= strtoupper($rowdesa->DesaNama); ?></b></td>
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
                            $jmlkepaladesa = $this->rekapitulasi_model->getKepalaDesaByTahunByBulanByKecByDesaJML($tahun, $bulan, $kecid, $rowdesa->DesaId)->num_rows();
                            if ($jmlkepaladesa != 0) {
                                $totaljml = $totaljml + $jmlkepaladesa;
                            }
                            echo $jmlkepaladesa;
                            $total_jmlkepaladesa += $jmlkepaladesa;
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
                            $total_jmlpenghasilantetapkepaladesa += $jmlpenghasilantetapkepaladesa;
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
                            $total_n5 += $n5;
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
                            $total_n6 += $n6;
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
                            $total_n7 += $n7;
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
                            $total_n8 += $n8;
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
                            $total_n9 += $n9;
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
                            $total_n10 += $n10;
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
                            $total_n11 += $n11;
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
                            $total_n12 += $n12;
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
                            $total_n13 += $n13;
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
                            $total_n14 += $n14;
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
                            $total_jmlperangkatdesa += $jmlperangkatdesa;
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
                            $total_jmlpenghasilantetapperangkat += $jmlpenghasilantetapperangkat;
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
                                $total_perangkat_n5 += $n5;
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
                                $total_perangkat_n6 += $n6;
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
                                $total_perangkat_n7 += $n7;
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
                                $total_perangkat_n8 += $n8;
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
                                $total_perangkat_n9 += $n9;
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
                                $total_perangkat_n10 += $n10;
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
                                $total_perangkat_n11 += $n11;
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
                                $total_perangkat_n12 += $n12;
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
                                $total_perangkat_n13 += $n13;
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
                                $total_perangkat_n14 += $n14;
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
                    <tr>
                        <td></td>
                        <td>PNS</td>
                        <td style="text-align: center;"><?=
                                                        $jml_pns = $this->rekapitulasi_model->TotalPns($rowdesa->DesaId, $tahun, $bulan);
                                                        $total_jml_pns += $jml_pns;
                                                        ?></td>
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
                        <td style="text-align: center;"><?=
                                                        $jml_nonpns = $this->rekapitulasi_model->TotalNonPns($rowdesa->DesaId, $tahun, $bulan);
                                                        $total_jml_nonpns += $jml_nonpns;
                                                        ?></td>
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
                                <?= $jml_pns + $jml_nonpns; ?>
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
                            $bpjs_ksh = $this->rekapitulasi_model->TotalBpjsKsh($rowdesa->DesaId, $tahun, $bulan)->BpjsKsh;
                            if ($bpjs_ksh != NULL) {
                                $total_bpjs_ksh = $bpjs_ksh;
                            } else {
                                $total_bpjs_ksh = 0;
                            }
                            echo $total_bpjs_ksh;
                            $total_total_bpjs_ksh += $total_bpjs_ksh;
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
                            $total_total_bpjs_tk += $total_bpjs_tk;
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
                    <tr style="background-color:#e6e6e6">
                        <td> <span style="color:#e6e6e6">a</span> </td>
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
                    <!-- end rowdesa -->
            <?php }
            } ?>
        </tbody>
    </table>

</page>
<!-- end rowkecamatan  -->
<page orientation="landscape" format="Folio">
    <!-- REKAPITULASI KESELURUHAN PEMERINTAH KABUPATEN PATI -->
    <h4 style="margin-bottom:0;text-align: center">REKAPITULASI PENGHASILAN TETAP KESELURUHAN</h4>
    <h4 style="margin-top:0;margin-bottom:0;text-align: center"><?php echo strtoupper($this->rekapitulasi_model->getKecId($kecid)->KecNama); ?></h4>
    <h4 style="margin-top:0;text-align: center">BULAN <?php echo strtoupper(convertBulan($bulan)); ?> TAHUN <?php echo $tahun; ?></h4>

    <table border="1">
        <thead>
            <tr>
                <th style="text-align: center;" rowspan="3">#</th>
                <th class="whatever" style="text-align: center;" rowspan="3">KECAMATAN</th>
                <th style="text-align: center;" rowspan="3">JML</th>
                <th style="text-align: center;width:80px;" rowspan="3">PENGHASILAN TETAP</th>
                <th style="text-align: center;" colspan="3">JAMINAN</th>
                <th style="text-align: center;width:80px;" rowspan="3">JUMLAH KOTOR</th>
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

            <tr>
                <td style="text-align: center;"><?php //echo $no++; 
                                                ?></td>
                <td style="width:140px;"><b><?php echo strtoupper($this->rekapitulasi_model->getKecId($kecid)->KecNama); ?></b></td>
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
                    <?= $total_jmlkepaladesa; ?>
                </td>
                <td style="text-align: right;">
                    <?php
                    // if ($jmlkepaladesa != 0) {
                    $rowperangkat = $this->rekapitulasi_model->getKepalaDesaByTahunByBulanByKec($tahun, $bulan, $kecid)->row();
                    $all_jmlpenghasilantetapkepaladesa = $this->rekapitulasi_model->getKepalaDesaByTahunByBulanByKec($tahun, $bulan, $kecid)->row()->GajiBulanan;
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
                    $jmlperangkatdesa = $this->rekapitulasi_model->getPerangkatByTahunByBulanByKec($tahun, $bulan, $kecid)->num_rows();
                    if ($jmlperangkatdesa != 0) {
                        $totaljml = $totaljml + $jmlperangkatdesa;
                    }
                    echo $total_jmlperangkatdesa;
                    ?>
                </td>
                <td style="text-align: right;">
                    <?php
                    if ($jmlperangkatdesa != 0) {

                        $all_jmlpenghasilantetapperangkat = $this->rekapitulasi_model->getPenghasilanTetapPerangkatByTahunByBulanByKec($tahun, $bulan, $kecid)->row()->GajiBulanan;
                        if ($all_jmlpenghasilantetapperangkat != 0) {
                            $totalpenghasilantetap = $totalpenghasilantetap + $jall_mlpenghasilantetapperangkat;
                        }
                    }
                    echo $this->angka->rupiah2($all_jmlpenghasilantetapperangkat);
                    ?>
                </td>
                <td style="text-align: right;">
                    <?php
                    $bpjsKesehatan = $this->rekapitulasi_model->sumBpjsKesehatanAll($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Jaminan_Kesehatan;
                    $all_perangkat_n5 = $bpjsKesehatan;
                    echo $this->angka->rupiah2($all_perangkat_n5);
                    ?>
                </td>
                <td style="text-align: right;">
                    <?php
                    $bpjsJkk = $this->rekapitulasi_model->sumBpjsJkkAll($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Jaminan_Jkk;
                    $all_perangkat_n6 = $bpjsJkk;
                    echo $this->angka->rupiah2($all_perangkat_n6);
                    ?>
                </td>
                <td style="text-align: right;">
                    <?php
                    $bpjsJkm = $this->rekapitulasi_model->sumBpjsJkmAll($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Jaminan_Jkm;
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
                    $bpjsPotonganKesehatan1 = $this->rekapitulasi_model->sumBpjsPotonganKesehatan1All($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Potongan_Kesehatan1;
                    $all_perangkat_n9 = $bpjsPotonganKesehatan1;
                    echo $this->angka->rupiah2($all_perangkat_n9);
                    ?>
                </td>
                <td style="text-align: right;">
                    <?php
                    $bpjsPotonganKesehatan2 = $this->rekapitulasi_model->sumBpjsPotonganKesehatan2All($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Potongan_Kesehatan2;
                    $all_perangkat_n10 = $bpjsPotonganKesehatan2;
                    echo $this->angka->rupiah2($all_perangkat_n10);
                    ?>
                </td>
                <td style="text-align: right;">
                    <?php
                    $bpjsPotonganJkk = $this->rekapitulasi_model->sumBpjsPotonganJkkAll($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Potongan_Jkk;
                    $all_perangkat_n11 = $bpjsPotonganJkk;
                    echo $this->angka->rupiah2($all_perangkat_n11);
                    ?>
                </td>
                <td style="text-align: right;">
                    <?php
                    $bpjsPotonganJkm = $this->rekapitulasi_model->sumBpjsPotonganJkmAll($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->Potongan_Jkm;
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
                        <?= $total_jmlkepaladesa + $total_jmlperangkatdesa; ?>
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
                <td style="text-align: center;"><?= $total_jml_pns; ?></td>
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
                <td style="text-align: center;"><?= $total_jml_nonpns; ?></td>
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
        </tbody>
    </table>
    <!-- end rowkecamatan  -->


    <table>
        <tr>
            <td style="text-align: center; width:50%;">
                <br>
                <br>
                <br>
                MENGETAHUI<br>
                CAMAT<br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <?= $camat; ?>
            </td>
            <td style="text-align: center; width:50%;">
                <br>
                <br>
                <br>
                <br>
                KASI PEMDES<br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <?= !empty($pemdes) ? $pemdes : "Nama Kasi Pemdes";  ?>
            </td>
        </tr>
    </table>
</page>