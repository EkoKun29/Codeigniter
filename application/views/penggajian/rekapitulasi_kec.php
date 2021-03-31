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
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cetak Rekapitulasi</h4>
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
<style type="text/css">
    .example2 {
        border: 11px black solid;
    }
</style>

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="col-sm-16">
                <h4 class="card-title">Rekapitulasi </h4>
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
                <?php if ($this->input->post('tahun') && $this->input->post('bulan')) { ?>
                    <a class="btn btn-danger" onclick="window.open('<?= base_url('penggajian/rekapitulasi/cetak/' . $tahun . '/' . $bulan . '/' . $kecid) ?>')" href="#"><i class="fa fa-print"></i> Cetak Rekapitulasi</a>
                    <!-- <a class="btn btn-danger" onclick="window.open('<?= base_url('penggajian/rekapitulasi/cetak/' . $tahun . '/' . $bulan . '/' . $kecid) ?>/resmi')" href="#"><i class="fa fa-print"></i> Cetak Pengajuan Resmi</a> -->
                    <!--  <a class="btn btn-success" href="<?= base_url('penggajian/rekapitulasi/cetak/' . $tahun . '/' . $bulan) ?>"><i class="fa fa-download"></i> Export Excel</a> -->
                    <a class="btn btn-success cetak_resmi_desa" href="#" data-id="<?= $kecid; ?>" data-tahun="<?= $tahun ?>" data-bulan="<?= $bulan ?>">
                        <i class="fa fa-print"></i> Cetak Rekapitulasi Resmi
                    </a>
                    <hr>

                    <?php
                    // $api = $this->rekapitulasi_model->ApiPagu($rowdesa->DesaId, "5.1.2.01.");
                    // print_r($api);
                    ?>

                    <div class="text-center">
                        <h5>REKAPITULASI PENGHASILAN TETAP KEPALA DESA DAN PERANGKAT DESA</h5>
                        <h5>KECAMATAN <?php echo strtoupper($this->rekapitulasi_model->getKecId($kecid)->KecNama); ?></h5>
                        <h5>BULAN <?php echo strtoupper(convertBulan($bulan)); ?> TAHUN <?php echo $tahun; ?></h5>
                        <div class="mt-3"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" rowspan="3">#</th>
                                    <th style="text-align: center;" rowspan="3">DESA</th>
                                    <th style="text-align: center;" rowspan="3">JML</th>
                                    <th style="text-align: center;" rowspan="3">PENGHASILAN TETAP</th>
                                    <th style="text-align: center;" colspan="3">JAMINAN</th>
                                    <th style="text-align: center;" rowspan="3">JUMLAH KOTOR</th>
                                    <th style="text-align: center;" colspan="4">POTONGAN</th>
                                    <th style="text-align: center;" rowspan="3">JUMLAH POTONGAN</th>
                                    <th style="text-align: center;" rowspan="3">JUMLAH BERSIH</th>
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
                                            <td> <b><?= strtoupper($rowdesa->DesaNama); ?></b></td>
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
                                            <td>KEPALA DESA</td>
                                            <td style="text-align: center;">
                                                <?php

                                                $jmlkepaladesa = $this->rekapitulasi_model->getKepalaDesaByTahunByBulanByKecByDesaJML($tahun, $bulan, $kecid, $rowdesa->DesaId);
                                                // $kepaladesa = $jmlkepaladesa->row();
                                                if ($jmlkepaladesa->num_rows() != 0) {
                                                    $totaljml = $totaljml + $jmlkepaladesa->num_rows();
                                                }

                                                echo $jmlkepaladesa->num_rows();
                                                ?>
                                            </td>
                                            <td style="text-align: right;">

                                                <?php
                                                // if ($jmlkepaladesa->num_rows() == 1) {
                                                //     echo $this->angka->rupiah2($kepaladesa->GajiTetap);
                                                // } else {
                                                //     echo 0;
                                                // }


                                                $cek_siltap_kades = $this->rekapitulasi_model->getKepalaDesaByTahunByBulanByKecByDesa($tahun, $bulan, $kecid, $rowdesa->DesaId);
                                                $kepaladesa = $cek_siltap_kades->row();
                                                if ($cek_siltap_kades->num_rows() != 0) {
                                                    $jmlpenghasilantetapkepaladesa = $cek_siltap_kades->row()->GajiBulanan;
                                                } else {
                                                    $jmlpenghasilantetapkepaladesa = 0;
                                                }

                                                $totalpenghasilantetap = $totalpenghasilantetap + $jmlpenghasilantetapkepaladesa;
                                                echo $this->angka->rupiah2($jmlpenghasilantetapkepaladesa);
                                                ?>
                                            </td>
                                            <td style="text-align: right;">
                                                <?php
                                                if ($jmlkepaladesa->num_rows() == 1) {
                                                    $n5 = $kepaladesa->Jaminan_Kesehatan;
                                                } else {
                                                    $n5 = 0;
                                                }


                                                if ($n5 != 0) {
                                                    $totaln5 = $totaln5 + $n5 * $jmlkepaladesa->num_rows();
                                                }
                                                echo $this->angka->rupiah2($n5);
                                                ?>
                                            </td>
                                            <td style="text-align: right;">
                                                <?php

                                                if ($jmlkepaladesa->num_rows() == 1) {
                                                    $n6 = $kepaladesa->Jaminan_Jkk;
                                                } else {
                                                    $n6 = 0;
                                                }
                                                if ($n6 != 0) {
                                                    $totaln6 = $totaln6 + $n6 * $jmlkepaladesa->num_rows();
                                                }
                                                echo $this->angka->rupiah2($n6);
                                                ?>
                                            </td>
                                            <td style="text-align: right;">
                                                <?php

                                                if ($jmlkepaladesa->num_rows() == 1) {
                                                    $n7 = $kepaladesa->Jaminan_Jkm;
                                                } else {
                                                    $n7 = 0;
                                                }
                                                if ($n7 != 0) {
                                                    $totaln7 = $totaln7 + $n7 * $jmlkepaladesa->num_rows();
                                                }
                                                echo $this->angka->rupiah2($n7);
                                                ?>
                                            </td>
                                            <td style="text-align: right;">
                                                <?php

                                                if ($jmlkepaladesa->num_rows() == 1) {
                                                    $n8 = ($kepaladesa->GajiBulanan + $n5 + $n6 + $n7);
                                                } else {
                                                    $n8 = 0;
                                                }
                                                if ($n8 != 0) {
                                                    $totaln8 = $totaln8 + $n8 * $jmlkepaladesa->num_rows();
                                                }
                                                echo $this->angka->rupiah2($n8);
                                                ?>
                                            </td>
                                            <td style="text-align: right;">
                                                <?php

                                                if ($jmlkepaladesa->num_rows() == 1) {
                                                    $n9 = $kepaladesa->Potongan_Kesehatan1;
                                                } else {
                                                    $n9 = 0;
                                                }
                                                if ($n9 != 0) {
                                                    $totaln9 = $totaln9 + $n9 * $jmlkepaladesa->num_rows();
                                                }

                                                echo $this->angka->rupiah2($n9);
                                                ?>
                                            </td>
                                            <td style="text-align: right;">
                                                <?php

                                                if ($jmlkepaladesa->num_rows() == 1) {
                                                    $n10 = $kepaladesa->Potongan_Kesehatan2;
                                                } else {
                                                    $n10 = 0;
                                                }
                                                if ($n10 != 0) {
                                                    $totaln10 = $totaln10 + $n10 * $jmlkepaladesa->num_rows();
                                                }

                                                echo $this->angka->rupiah2($n10);
                                                ?>
                                            </td>
                                            <td style="text-align: right;">
                                                <?php

                                                if ($jmlkepaladesa->num_rows() == 1) {
                                                    $n11 = $kepaladesa->Potongan_Jkk;
                                                } else {
                                                    $n11 = 0;
                                                }
                                                if ($n11 != 0) {
                                                    $totaln11 = $totaln11 + $n11 * $jmlkepaladesa->num_rows();
                                                }

                                                echo $this->angka->rupiah2($n11);
                                                ?>
                                            </td>
                                            <td style="text-align: right;">
                                                <?php

                                                if ($jmlkepaladesa->num_rows() == 1) {
                                                    $n12 = $kepaladesa->Potongan_Jkm;
                                                } else {
                                                    $n12 = 0;
                                                }
                                                if ($n12 != 0) {
                                                    $totaln12 = $totaln12 + $n12 * $jmlkepaladesa->num_rows();
                                                }

                                                echo $this->angka->rupiah2($n12);
                                                ?>
                                            </td>

                                            <td style="text-align: right;">
                                                <?php
                                                $n13 = ($n9 + $n10 + $n11 + $n12 + $n15 + $n16);

                                                if ($n13 != 0) {
                                                    $totaln13 = $totaln13 + $n13 * $jmlkepaladesa->num_rows();
                                                }

                                                echo $this->angka->rupiah2($n13);
                                                ?>
                                            </td>
                                            <td style="text-align: right;">
                                                <?php
                                                $n14 = $n8 - $n13;
                                                if ($n14 != 0) {
                                                    $totaln14 = $totaln14 + $n14 * $jmlkepaladesa->num_rows();
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
                                                    <?= $jmlkepaladesa->num_rows() + $jmlperangkatdesa; ?>
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
                                            <td style="text-align: center;"><?= $jml_pns = $this->rekapitulasi_model->TotalPns($rowdesa->DesaId, $tahun, $bulan); ?></td>
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
                                            <td style="text-align: center;"><?= $jml_nonpns = $this->rekapitulasi_model->TotalNonPns($rowdesa->DesaId, $tahun, $bulan); ?></td>
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

                                        <tr>
                                            <td></td>
                                            <td>TOTAL</td>
                                            <td style="text-align: center;">
                                                <?php //echo $totaljml; 
                                                ?>
                                            </td>
                                            <td style="text-align: right;"><?php echo $this->angka->rupiah2($totalpenghasilantetap); ?></td>
                                            <td style="text-align: right;"><?php echo $this->angka->rupiah2($totaln5); ?></td>
                                            <td style="text-align: right;"><?php echo $this->angka->rupiah2($totaln6); ?></td>
                                            <td style="text-align: right;"><?php echo $this->angka->rupiah2($totaln7); ?></td>
                                            <td style="text-align: right;"><?php echo $this->angka->rupiah2($totaln8); ?></td>
                                            <td style="text-align: right;"><?php echo $this->angka->rupiah2($totaln9); ?></td>
                                            <td style="text-align: right;"><?php echo $this->angka->rupiah2($totaln10); ?></td>
                                            <td style="text-align: right;"><?php echo $this->angka->rupiah2($totaln11); ?></td>
                                            <td style="text-align: right;"><?php echo $this->angka->rupiah2($totaln12); ?></td>
                                            <td style="text-align: right;"><?php echo $this->angka->rupiah2($totaln13); ?></td>
                                            <td style="text-align: right;"><?php echo $this->angka->rupiah2($totaln14); ?></td>
                                        </tr>
                                        <!-- end rowdesa -->
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
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
                url: "<?php echo site_url('penggajian/rekapitulasi/detail/getBulanByKec'); ?>",
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

    $(function() {
        $(document).on('click', '.cetak_resmi_desa', function(e) {
            e.preventDefault();
            $("#myModal").modal('show');
            $.post('<?php echo base_url('penggajian/rekapitulasi/detail/RekapDesaResmi'); ?>', {
                    id: $(this).attr('data-id'),
                    tahun: $(this).attr('data-tahun'),
                    bulan: $(this).attr('data-bulan'),
                },
                function(html) {
                    $(".modal-body").html(html);
                }
            );
        });
    });
</script>