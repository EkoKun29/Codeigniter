<style type="text/css">
    table {
        table-layout: fixed;
        border:1px solid;
        border-collapse: collapse;
    }
    table thead tr {
        /*background-color:#e6e6e6;*/
    } 
    th{
        padding: 5px;
    }
</style>
<strong><center>
REKAPITULASI PENYALURAN KEBUTUHAN  PENGHASILAN TETAP (SILTAP)<br>                                                 
BAGI KEPALA DESA DAN PERANGKAT DESA DAN TUNJANGAN<br>                                          
BAGI KEPALA DESA DAN PERANGKAT DESA YANG BERSTATUS PNS<br>                                          
BULAN <?= strtoupper($bulan_in_char); ?><br>
DI KABUPATEN PATI TAHUN ANGGARAN <?= $tahun; ?><br>                          
</center></strong>
<center>
<table class="table table-bordered" border="1">
                        <thead>
                            <tr>
                                <th style="text-align: center;" rowspan="2">ID</th>
                                <th style="text-align: center;" rowspan="2">Kecamatan</th>
                                <th style="text-align: center;" rowspan="2">NO</th>
                                <th style="text-align: center;" rowspan="2">Desa</th>
                                <th style="text-align: center;" colspan="3">Pengajuan Desa</th>
                                <th style="text-align: center;" colspan="2">Realisasi Desa</th>
                                <th style="text-align: center;" colspan="2">Selisih</th>
                                <th style="text-align: center;" rowspan="2">Keterangan</th>
                                <th style="text-align: center;" rowspan="2">No Rek</th>
                                <th style="text-align: center;" rowspan="2">No Npwp</th>
                                <th style="text-align: center;" rowspan="2">Tanggal</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;">Siltap  <?= $bulan_in_char; ?></th>
                                <th style="text-align: center;">Tunjangan  <?= $bulan_in_char; ?></th>
                                <th style="text-align: center;">Total  <?= $bulan_in_char; ?></th>
                                <th style="text-align: center;">Siltap  <?= $bulan_in_char; ?></th>
                                <th style="text-align: center;">Tunjangan  <?= $bulan_in_char; ?></th>
                                <th style="text-align: center;">Siltap  <?= $bulan_in_char; ?></th>
                                <th style="text-align: center;">Tunjangan  <?= $bulan_in_char; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 1;
                            
                            foreach($kecamatan as $kec){
                                // $tahun = 2020;
                                // $bulan = 9;
                                $desa = $this->rekapitulasi_model->getDesaByKecByTahunByBulan($kec->KecId,$tahun,$bulan);

                                
                                $start2 = 1;
                                foreach($desa as $data){
                                    $siltap = $this->rekapitulasi_model->getGajiPnsRealisasi($tahun,$bulan,$data->DesaId);
                                    $tunjangan = $this->rekapitulasi_model->getTunjanganPnsRealisasi($tahun,$bulan,$data->DesaId);

                                    $siltap_pagu = $this->rekapitulasi_model->ApiPagu($data->DesaId,"5.1.2.01.");
                                    $tunjangan_pagu = $this->rekapitulasi_model->ApiPagu($data->DesaId,"5.1.2.02.");
                            ?>
                            <tr>
                                <td style="text-align: center;"><?= $start++; ?></td>
                                <td style="text-align: left;"><?= remove_word($kec->KecNama)?></td>
                                <td style="text-align: center;"><?= $start2++; ?></td>
                                <td style="text-align: left;"><?= remove_word2($data->DesaNama)." ".$data->DesaId;?></td>
                                <td style="text-align: center;"><?= $this->angka->rupiah($siltap_pagu);?></td>
                                <td style="text-align: center;"><?= $this->angka->rupiah($tunjangan_pagu);?></td>
                                <td style="text-align: center;"><?= $this->angka->rupiah($siltap_pagu + $tunjangan_pagu);?></td>
                                <td style="text-align: center;"><?= $this->angka->rupiah($siltap->GajiBulanan) ?></td>
                                <td style="text-align: center;"><?= $this->angka->rupiah($tunjangan->GajiBulanan) ?></td>
                                <td style="text-align: center;"><?= $this->angka->rupiah($siltap_pagu - $siltap->GajiBulanan)?></td>
                                <td style="text-align: center;"><?= $this->angka->rupiah($tunjangan_pagu - $tunjangan->GajiBulanan)?></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"><?= $data->NoRek; ?></td>
                                <td style="text-align: center;"><?= $data->Npwp; ?></td>
                                <td style="text-align: center;"><?= $data->TglPembayaran; ?></td>
                            </tr>
                        <?php } }?>
                        </tbody>
                    </table>  
                </center>