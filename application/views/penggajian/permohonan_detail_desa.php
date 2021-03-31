<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Siltap</h4>
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
<?php
$back = $this->input->post('id');
$sesi = $this->session->userdata('siltap');
if ($sesi['groupid'] == 1 or $sesi['groupid'] == 2) {
?>
    <a class="btn btn-info btn-rounded btn-fw detail_desa" href="#" data-id="<?= substr($back, 0, 2) . sprintf("%02d", $bulan) . $tahun; ?>">Kembali</a>
<?php } ?>
<div class="table-responsive">
    <table class="table table-bordered" id="example2">
        <thead>
            <tr>
                <th style="text-align: center;" rowspan="3">Nama<br>Jabatan</th>
                <!-- <th style="text-align: center;" rowspan="3">Status Pns</th> -->
                <th style="text-align: center;" rowspan="3">Gaji Bulanan</th>
                <th style="text-align: center;" colspan="3">Jaminan</th>
                <th style="text-align: center;" rowspan="3">Jumlah Kotor</th>
                <th style="text-align: center;" colspan="6">Potongan</th>
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
                <th style="text-align: center;">Ksh</th>
                <th style="text-align: center;">Jkk</th>
                <th style="text-align: center;">Jkm</th>

                <th style="text-align: center;">Ksh</th>
                <th style="text-align: center;">Ksh2</th>
                <th style="text-align: center;">Jkk</th>
                <th style="text-align: center;">Jkm</th>
                <th style="text-align: center;">Jht</th>
                <th style="text-align: center;">Jp</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($ds as $k) {

                $data = $this->permohonan_model->getPembayaranSum($k->DesaId, $bulan, $tahun);
                $sum_perangkat = $this->permohonan_model->perangkatSum($k->DesaId, $bulan, $tahun);
                $desa = $this->permohonan_model->getDesaSum($k->DesaId, $bulan, $tahun);
                $n4 = $k->GajiBulanan;
                $n5 = $k->Jaminan_Kesehatan;
                $n6 = $k->Jaminan_Jkk;
                $n7 = $k->Jaminan_Jkm;
                $n8 = ($n4 + $n5 + $n6 + $n7);

                $n9 = $k->Potongan_Kesehatan1;
                $n10 = $k->Potongan_Kesehatan2;
                $n11 = $k->Potongan_Jkk;
                $n12 = $k->Potongan_Jkm;
                $n15 = $k->Potongan_Jht;
                $n16 = $k->Potongan_Jp;

                $n13 = ($n9 + $n10 + $n11 + $n12 + $n15 + $n16);
                $n14 = $n8 - $n13;

                $perangkat = $this->permohonan_model->perangkatByNik($k->Nik);
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

            ?>
                <tr>
                    <td style="text-align: left;">
                        <?= !empty($perangkat->Nama) ? $perangkat->Nama : ""; ?><br>
                        <span class="badge badge-primary"><?= !empty($perangkat->NamaJabatan) ? $perangkat->NamaJabatan : ""; ?></span><br>
                        <span class="badge badge-info"><?= !empty($k->Nik) ? $k->Nik : ""; ?></span><br>
                        <span class="badge badge-warning"><?= cekStatus($data->StatusProgress); ?></span>
                    </td>
                    <!-- <td style="text-align: center;"> -->
                    <!-- <?= pns($perangkatByNik->Pns); ?> -->
                    <!-- </td> -->
                    <td style="text-align: center;"><?= $this->angka->rupiah2($n4); ?></td>
                    <td style="text-align: center;"><?= $this->angka->rupiah2($n5); ?></td>
                    <td style="text-align: center;"><?= $this->angka->rupiah2($n6); ?></td>
                    <td style="text-align: center;"><?= $this->angka->rupiah2($n7); ?></td>

                    <td style="text-align: center;"><?= $this->angka->rupiah2($n8); ?></td>

                    <td style="text-align: center;"><?= $this->angka->rupiah2($n9); ?></td>
                    <td style="text-align: center;"><?= $this->angka->rupiah2($n10); ?></td>
                    <td style="text-align: center;"><?= $this->angka->rupiah2($n11); ?></td>
                    <td style="text-align: center;"><?= $this->angka->rupiah2($n12); ?></td>
                    <td style="text-align: center;"><?= $this->angka->rupiah2($n15); ?></td>
                    <td style="text-align: center;"><?= $this->angka->rupiah2($n16); ?></td>

                    <td style="text-align: center;"><?= $this->angka->rupiah2($n13); ?></td>
                    <td style="text-align: center;"><?= $this->angka->rupiah2($n14); ?></td>


                    <td style="width:150px; text-align: center;">

                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
</div>

<script>
    $(function() {
        $(document).on('click', '.detail_desa', function(e) {
            e.preventDefault();
            $("#myModal").modal('show');
            $.post('<?php echo base_url('penggajian/permohonan/detail/kec'); ?>', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $(".modal-body").html(html);
                }
            );
        });
    });
</script>