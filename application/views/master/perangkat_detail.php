<?php
function booleanConvert($status)
{
    if ($status == 0) {
        echo "Tidak";
    } elseif ($status == 1) {
        echo "<strong>Iya</strong>";
    } else {
        echo "Tidak Diketahui";
    }
}
?>
<div class="content-wrapper">

    <div class="row col-md-12">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Detail Perangkat</h4>


                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Desa</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->DesaNama; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Nik</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->Nik; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">No Rekening</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->NoRekening; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Nama</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->Nama; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Alamat</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->Alamat; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Kelompok Jabatan</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->KJabatanNama; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Jabatan</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->NamaJabatan; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Status Pns</label>
                        <div class="col-sm-7">
                            : <?= booleanConvert($perangkat->Pns); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Status Pensiun Pns</label>
                        <div class="col-sm-7">
                            : <?= booleanConvert($perangkat->PensiunPns); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Keanggotaan Bpjs Kesehatan</label>
                        <div class="col-sm-7">
                            : <?= booleanConvert($perangkat->BpjsKsh); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Keanggotaan Bpjs Tenaga Kerja</label>
                        <div class="col-sm-7">
                            : <?= booleanConvert($perangkat->BpjsTenagaKerja); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Keanggotaan Bpjs JHT</label>
                        <div class="col-sm-7">
                            : <?= booleanConvert($perangkat->BpjsJht); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Keanggotaan Bpjs Jaminan Pensiun</label>
                        <div class="col-sm-7">
                            : <?= booleanConvert($perangkat->BpjsJp); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Alasan Mendaftar Bpjs</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->BpjsAlasan; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Tanggal Mulai Terdaftar Bpjs</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->BpjsTMT; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Pj</label>
                        <div class="col-sm-7">
                            : <?= booleanConvert($perangkat->Pj); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Plt</label>
                        <div class="col-sm-7">
                            : <?= booleanConvert($perangkat->Plt); ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Status</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->Status; ?>
                        </div>
                    </div>


                    </form>
                </div>
            </div>
        </div>









        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Detail SK</h4>



                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">No SK</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->NoSk; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Tanggal SK</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->TglSk; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Pejabat Yang Melantik</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->SkPelantik; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->SkJenkel; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->SkTempatLahir; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->SkTglLahir; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Pendidikan</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->SkPendidikan; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Agama</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->SkAgama; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Bengkok</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->SkBengkok; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">No HP</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->SkNoHp; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Umur Masa Akhir Jabatan</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->SkAkhirJabatanUmur; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Tanggal Masa Akhir Jabatan</label>
                        <div class="col-sm-7">
                            : <?= $perangkat->SkAkhirJabatanTgl; ?>
                        </div>
                    </div>



                </div>
            </div>
        </div>







    </div>
</div>