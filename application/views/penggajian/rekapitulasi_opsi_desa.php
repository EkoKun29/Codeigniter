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

<style type="text/css">
    .example2 {
        border: 11px black solid;
    }
</style>
<?php
$kecid = $_POST['id'];
$tahun = $_POST['tahun'];
$bulan = $_POST['bulan'];
?>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>

            <tr>
                <th style="text-align: center;">No</th>
                <th>Nama Desa</th>
                <th style="text-align: center;">Cetak</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center;">0</td>
                <td> PERMOHONAN KECAMATAN </td>
                <td><a class="btn btn-danger" onclick="window.open('<?= base_url('penggajian/rekapitulasi/cetak/' . $tahun . '/' . $bulan . '/' . $kecid . '/resmi_cover'); ?>')" href=" #"><i class="fa fa-print"></i> Cetak</a></td>
            </tr>
            <?php
            $no = 1;
            foreach ($desa as $rowdesa) {
            ?>
                <tr>
                    <td style="text-align: center;"><?= $no++; ?></td>
                    <td> <?= strtoupper($rowdesa->DesaNama); ?></td>
                    <td><a class="btn btn-danger" onclick="window.open('<?= base_url('penggajian/rekapitulasi/cetak/' . $tahun . '/' . $bulan . '/' . $kecid . '/' . $rowdesa->DesaId . '/resmi_desa'); ?>')" href=" #"><i class="fa fa-print"></i> Cetak</a></td>

                </tr>

            <?php
            } ?>
        </tbody>
    </table>
</div>