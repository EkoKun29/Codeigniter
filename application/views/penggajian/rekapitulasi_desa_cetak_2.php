<style type="text/css">
    table {
        table-layout: fixed;
        width: 100%;
        border:1px solid;
        border-collapse: collapse;
    }
    table thead tr {
        background-color:#e6e6e6;
    }
    th {
        padding:5px;
    }
    td {
        padding:3px;
    }
</style>
<?php 
function status($st){
    if($st==1){
        echo "<div class='badge badge-primary'>Aktif</div>";
    }else{
        echo "<div class='badge badge-danger'>Tidak Aktif</div>";
    }
}
?>
<h4 style="margin-bottom:0;text-align: center">REKAPITULASI PENGHASILAN TETAP KEPALA DESA DAN PERANGKAT DESA</h4>
<h4 style="margin-top:0;margin-bottom:0;text-align: center">KECAMATAN <?php echo strtoupper($this->rekapitulasi_model->getKecId($kecid)->KecNama); ?></h4>
<h4 style="margin-top:0;text-align: center">BULAN <?php echo strtoupper(convertBulan($bulan)); ?> TAHUN <?php echo $tahun; ?></h4>
<table border="1">
    <thead>
        <tr>
            <th style="text-align: center;" rowspan="3">#</th>
            <th class="whatever" style="text-align: center;" rowspan="3">DESA</th>
            <th style="text-align: center;" rowspan="3">JML</th>
            <th style="text-align: center;width:85px;" rowspan="3">PENGHASILAN TETAP</th>
            <th style="text-align: center;" colspan="3">JAMINAN</th>
            <th style="text-align: center;width:85px;" rowspan="3">JUMLAH KOTOR</th>
            <th style="text-align: center;" colspan="4">POTONGAN</th>
            <th style="text-align: center;width:50px;" rowspan="3">JUMLAH POTONGAN</th>
            <th style="text-align: center;width:85px" rowspan="3">JUMLAH BERSIH</th>
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
        <?php for ($i = 1;$i <= 14;$i++){ ?>
            <th style="text-align: center;"><?= $i; ?></th>
        <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($datadesa)){
        $no = 1;
        foreach ($datadesa as $rowdesa){
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
        ?>
        <tr>
            <td style="text-align: center;"><?= $no++; ?></td> 
            <td style="width:150px;">DESA <b><?= strtoupper($rowdesa->DesaNama); ?></b></td>
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
            $jmlkepaladesa = $this->rekapitulasi_model->getKepalaDesaByTahunByBulanByKecByDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->num_rows();
            if ($jmlkepaladesa != 0){
                $totaljml = $totaljml + $jmlkepaladesa;
            }
            echo $jmlkepaladesa;
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlkepaladesa != 0){
                $jmlpenghasilantetapkepaladesa = $this->rekapitulasi_model->getKepalaDesaByTahunByBulanByKecByDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->GajiBulanan;
                if ($jmlpenghasilantetapkepaladesa != 0){
                    $totalpenghasilantetap = $totalpenghasilantetap + $jmlpenghasilantetapkepaladesa;
                }
            }
            echo $this->angka->rupiah($jmlpenghasilantetapkepaladesa);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlkepaladesa != 0){
                $n5 = ($jmlpenghasilantetapkepaladesa/100)*$BpjsKsh->KshPersen2;
                if ($n5 != 0){
                    $totaln5 = $totaln5 + $n5;
                }
            }
            echo $this->angka->rupiah($n5);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlkepaladesa != 0){
                $n6 = ($jmlpenghasilantetapkepaladesa/100)*$BpjsJkk->JkkPersen;
                if ($n6 != 0){
                    $totaln6 = $totaln6 + $n6;
                }
            }
            echo $this->angka->rupiah($n6);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlkepaladesa != 0){
                $n7 = ($jmlpenghasilantetapkepaladesa/100)*$BpjsJkm->JkmPersen;
                if ($n7 != 0){
                    $totaln7 = $totaln7 + $n7;
                }
            }
            echo $this->angka->rupiah($n7);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlkepaladesa != 0){
                $n8 = ($jmlpenghasilantetapkepaladesa+$n5+$n6+$n7);
                if ($n8 != 0){
                    $totaln8 = $totaln8 + $n8;
                }
            }
            echo $this->angka->rupiah($n8);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlkepaladesa != 0){
                $n9 = ($jmlpenghasilantetapkepaladesa/100)*$BpjsKsh->KshPersen;
                if ($n9 != 0){
                    $totaln9 = $totaln9 + $n9;
                }
            }
            echo $this->angka->rupiah($n9);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlkepaladesa != 0){
                $n10 = ($jmlpenghasilantetapkepaladesa/100)*$BpjsKsh->KshPersen2;
                if ($n10 != 0){
                    $totaln10 = $totaln10 + $n10;
                }
            }
            echo $this->angka->rupiah($n10);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlkepaladesa != 0){
                $n11 = ($jmlpenghasilantetapkepaladesa/100)*$BpjsJkk->JkkPersen;
                if ($n11 != 0){
                    $totaln11 = $totaln11 + $n11;
                }
            }
            echo $this->angka->rupiah($n11);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlkepaladesa != 0){
                $n12 = ($jmlpenghasilantetapkepaladesa/100)*$BpjsJkm->JkmPersen;
                if ($n12 != 0){
                    $totaln12 = $totaln12 + $n12;
                }
            }
            echo $this->angka->rupiah($n12);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlkepaladesa != 0){
                $n13 = ($n9+$n10+$n11+$n12);
                if ($n13 != 0){
                    $totaln13 = $totaln13 + $n13;
                }
            }
            echo $this->angka->rupiah($n13);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlkepaladesa != 0){
                $n14 = $n8-$n13;
                if ($n14 != 0){
                    $totaln14 = $totaln14 + $n14;
                }
            }
            echo $this->angka->rupiah($n14);
            ?>
            </td>
        </tr>
        <tr>
            <td></td> 
            <td>PERANGKAT DESA</td>
            <td style="text-align: center;">
            <?php 
            $jmlperangkatdesa = $this->rekapitulasi_model->getPerangkatByTahunByBulanByKecByDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->num_rows();
            if ($jmlperangkatdesa != 0){
                $totaljml = $totaljml + $jmlperangkatdesa;
            }
            echo $jmlperangkatdesa;
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlperangkatdesa != 0){
                $jmlpenghasilantetapperangkat = $this->rekapitulasi_model->getPenghasilanTetapPerangkatByTahunByBulanByKecByDesa($tahun, $bulan, $kecid, $rowdesa->DesaId)->row()->GajiBulanan;
                if ($jmlpenghasilantetapperangkat != 0){
                    $totalpenghasilantetap = $totalpenghasilantetap + $jmlpenghasilantetapperangkat;
                }
            }
            echo $this->angka->rupiah($jmlpenghasilantetapperangkat);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlperangkatdesa != 0){
                $n5 = ($jmlpenghasilantetapperangkat/100)*$BpjsKsh->KshPersen2;
                if ($n5 != 0){
                    $totaln5 = $totaln5 + $n5;
                }
            }
            echo $this->angka->rupiah($n5);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlperangkatdesa != 0){
                $n6 = ($jmlpenghasilantetapperangkat/100)*$BpjsJkk->JkkPersen;
                if ($n6 != 0){
                    $totaln6 = $totaln6 + $n6;
                }
            }
            echo $this->angka->rupiah($n6);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlperangkatdesa != 0){
                $n7 = ($jmlpenghasilantetapperangkat/100)*$BpjsJkm->JkmPersen;
                if ($n7 != 0){
                    $totaln7 = $totaln7 + $n7;
                }
            }
            echo $this->angka->rupiah($n7);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlperangkatdesa != 0){
                $n8 = ($jmlpenghasilantetapperangkat+$n5+$n6+$n7);
                if ($n8 != 0){
                    $totaln8 = $totaln8 + $n8;
                }
            }
            echo $this->angka->rupiah($n8);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlperangkatdesa != 0){
                $n9 = ($jmlpenghasilantetapperangkat/100)*$BpjsKsh->KshPersen;
                if ($n9 != 0){
                    $totaln9 = $totaln9 + $n9;
                }
            }
            echo $this->angka->rupiah($n9);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlperangkatdesa != 0){
                $n10 = ($jmlpenghasilantetapperangkat/100)*$BpjsKsh->KshPersen2;
                if ($n10 != 0){
                    $totaln10 = $totaln10 + $n10;
                }
            }
            echo $this->angka->rupiah($n10);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlperangkatdesa != 0){
                $n11 = ($jmlpenghasilantetapperangkat/100)*$BpjsJkk->JkkPersen;
                if ($n11 != 0){
                    $totaln11 = $totaln11 + $n11;
                }
            }
            echo $this->angka->rupiah($n11);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlperangkatdesa != 0){
                $n12 = ($jmlpenghasilantetapperangkat/100)*$BpjsJkm->JkmPersen;
                if ($n12 != 0){
                    $totaln12 = $totaln12 + $n12;
                }
            }
            echo $this->angka->rupiah($n12);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlperangkatdesa != 0){
                $n13 = ($n9+$n10+$n11+$n12);
                if ($n13 != 0){
                    $totaln13 = $totaln13 + $n13;
                }
            }
            echo $this->angka->rupiah($n13);
            ?>
            </td>
            <td style="text-align: right;">
            <?php
            if ($jmlperangkatdesa != 0){
                $n14 = $n8-$n13;
                if ($n14 != 0){
                    $totaln14 = $totaln14 + $n14;
                }
            }
            echo $this->angka->rupiah($n14);
            ?>
            </td>
        </tr>
        <tr style="background-color:#f2f2f2;">
            <td></td> 
            <td>JML PNS</td>
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
            <td>JML NON PNS</td>
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
            <td><b>TOTAL</b></td>
            <td style="text-align: center;"><?php echo $totaljml; ?></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah($totalpenghasilantetap); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah($totaln5); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah($totaln6); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah($totaln7); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah($totaln8); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah($totaln9); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah($totaln10); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah($totaln11); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah($totaln12); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah($totaln13); ?></b></td>
            <td style="text-align: right;"><b><?php echo $this->angka->rupiah($totaln14); ?></b></td>
        </tr>
        <!-- end rowdesa -->
        <?php }} ?>
    </tbody>
</table>