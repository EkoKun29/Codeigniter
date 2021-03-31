<style type="text/css">
    .example2 {
        border: 11px black solid;
    }
</style>

<div class="table-responsive">
    <table class="table table-bordered" id="example2" border="1">

        <thead>
            <tr>
                <th style="text-align: center;" rowspan="3">#</th>
                <th style="text-align: center;" rowspan="3">Desa</th>
                <th style="text-align: center;" rowspan="3">Jml Perangkat</th>
                <th style="text-align: center;" rowspan="3">Jml Bpjs_Kesehatan </th>
                <th style="text-align: center;" rowspan="3">Jml Bpjs_Tenaga_Kerja </th>
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
            $CI = &get_instance();
            foreach ($kec as $k) {

                //$data = $this->CI->getDataDesa($d->DesaId);
                //print_r($data);
                $data = $this->permohonan_model->getPembayaranSum($k->DesaId, $bulan, $tahun);
                $sum_perangkat = $this->permohonan_model->perangkatSum($k->DesaId, $bulan, $tahun);
                $desa = $this->permohonan_model->getDesaSum($k->DesaId, $bulan, $tahun);
                $bpjs_ksh = $this->permohonan_model->getDesaBpjsKsh($k->DesaId,$tahun,$bulan);
                $bpjs_tenaga_kerja = $this->permohonan_model->getDesaBpjsTenagaKerja($k->DesaId,$tahun,$bulan);
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
                //if($n4 != NULL){

            ?>




                <tr>
                    <td style="text-align: center;">
                        <!-- <?= $data->PembayaranId; ?>
                            -->
                        <?= approveStatusKecByPengelola($data->StatusProgress, $k->DesaId,$tahun,$bulan); ?>

                    </td>
                    <td style="">
                        <!-- <?= $k->DesaNama; ?> -->
                        <a class="btn btn-info btn-rounded btn-fw detail_kec_desa" href="#" data-id="<?= $k->DesaId . sprintf("%02d", $bulan) . $tahun ?>">
                            <?= remove_word($k->DesaNama); ?></a>
                    </td>
                    <td style="text-align: center;">
                        <?= $sum_perangkat; ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $bpjs_ksh; ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $bpjs_tenaga_kerja; ?>
                    </td>
                    <td style="text-align: center;"><?= $this->angka->rupiah2($n4); ?> </td>
                    <td style="text-align: center;"><?= $this->angka->rupiah2($n5); ?> </td>
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


            <?php }
            //} 
            ?>

        </tbody>

    </table>
</div>

<script>
    $(function() {
        $(document).on('click', '.detail_kec_desa', function(e) {
            e.preventDefault();
            $("#myModal").modal('show');
            $.post('<?php echo base_url('penggajian/permohonan/detail/desa'); ?>', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $(".modal-body").html(html);
                }
            );
        });
    });
</script>