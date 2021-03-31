<?php 
function status($st){
    if($st==1){
        echo "<div class='badge badge-primary'>Aktif</div>";
    }else{
        echo "<div class='badge badge-danger'>Tidak Aktif</div>";
    }
}
?>
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
        <?php if($sess['groupid'] == 1 OR $sess['groupid'] == 2){ ?>
      <div class="btn-group pull-right">
          <a href="<?= base_url('penggajian/gaji_tetap/add') ?>" class="btn btn-success">
              <i class="fa fa-plus"></i> Tambah Baru
          </a>
      </div>
      <div class="col-sm-16">
      <h3 class="card-title">Data Gaji Tetap</h3>
      
      <form method="POST" name="sortir" action="<?= base_url('penggajian/gaji_tetap/detail/sortir/');?>">
        <div class="row">
            
         <div class="card col-md-5"> 
         <div class="form-group">
            <label for="varchar">Kecamatan</label>
            <select class="form-control select2" name="kecamatan" id="kecamatan">
              <option>Pilih Kecamatan</option>  
            <?php foreach($kecamatan as $k){?>
            
            <option value="<?= $k->KecId?>"><?= $k->KecNama?></option>
            <?php } ?>
            </select>
        </div>
        </div>
        <div class="card col-md-5"> 
        <div class="form-group">
            <label for="varchar">Desa</label>
            <select name="desa" id="desa" class="form-control select2">
            <option>Pilih</option>
            </select>
        </div>
        </div>
            <div class="card col-md-2">
            <div class="form-group">
            <label for="varchar"></label>
             <input type="submit" name="submit" value="Sortir" class="btn btn-primary" style="width:150px;"/>  
        </div> 
        </div> 
            
         </div> 
        </form>
    <?php }elseif($sess['groupid'] == 4){ ?>
        <div class="btn-group pull-right">
          <a href="<?= base_url('penggajian/gaji_tetap/add') ?>" class="btn btn-success">
              <i class="fa fa-plus"></i> Tambah Baru
          </a>
      </div>
      <div class="col-sm-16">
      <h3 class="card-title">Data Gaji Tetap</h3>
      
      <form method="POST" name="sortir" action="<?= base_url('penggajian/gaji_tetap/detail/sortir/');?>">
        <div class="row">
          
        <div class="card col-md-5"> 
        <div class="form-group">
            <label for="varchar">Desa</label>
            <select name="desa" id="desa" class="form-control select2">
            <option>Pilih</option>
            <?php foreach($desa as $d){?>
                <option value='<?= $d->DesaId ?>'><?= $d->DesaNama ?></option>
            <?php } ?>
            </select>
        </div>
        </div>
            <div class="card col-md-2">
            <div class="form-group">
            <label for="varchar"></label>
             <input type="submit" name="submit" value="Sortir" class="btn btn-primary" style="width:150px;"/>  
        </div> 
        </div> 
            
         </div> 
        </form>

    <?php }elseif($sess['groupid'] == 3){ ?>
<div class="btn-group pull-right">
          <a href="<?= base_url('penggajian/gaji_tetap/add') ?>" class="btn btn-success">
              <i class="fa fa-plus"></i> Tambah Baru
          </a>
      </div>
      <br><br>
    <?php } ?>

          <div class="table-responsive">   
            <table class="table table-bordered" id="example2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>No Rekening</th>
                        <th>Gaji Tetap</th>
                        <th>Status</th>
                        <th style="width:100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($gaji_tetap as $data){
                        $ket = $this->gaji_tetap_model->ketSiltap($data->Nik)->row();
                        $cek_ket = $this->gaji_tetap_model->ketSiltap($data->Nik)->num_rows();
                        if($sess['groupid'] == 1 OR $sess['groupid'] == 2){
                            $title = $data->Nama. " <br> ";
                            if($cek_ket != 0){
                            $title .= "<span class='badge badge-primary'>".$ket->NamaJabatan."</span><br>";
                            $title .= "<span class='badge badge-warning'>".$ket->DesaNama."</span>";
                            }
                        }elseif($sess['groupid']== 4){
                            $title = $data->Nama. " <br>";
                            if($cek_ket != 0){
                            $title .= "<span class='badge badge-primary'>".$ket->NamaJabatan."</span><br>";
                            $title .= "<span class='badge badge-warning'>".$ket->DesaNama."</span>";
                            }
                        }elseif($sess['groupid']== 3){
                            $title = $data->Nama."<br>";
                            if($cek_ket != 0){
                            $title .= "<span class='badge badge-primary'>".$ket->NamaJabatan."</span>";
                            }
                        }
                        
                        ?>
                    <tr>
                        <td style="text-align: center;"><?= $data->SiltapId;?></td>
                        <td style=""><?= $title;?></td>
                        <td style="text-align: center;"><?= $data->NoRekening;?></td>
                        <td style="text-align: right;"><?= $this->angka->rupiah((int)$data->GajiTetap);?></td>
                        <td style="text-align: center;"><?= status($data->Status);?></td>
                        <td>
                    <a href="<?= base_url("penggajian/gaji_tetap/update/".$data->SiltapId) ?>" class="btn btn-outline-info">
                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                    </a>
                    <a href="javascript:;" class="btn btn-outline-danger" onclick="hapus(<?= $data->SiltapId ?>)">'
                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                    </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>

            </table>  
          </div>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript" src="<?=base_url("template/backend/js/jquery.js")?>"></script>
<script type="text/javascript">


$(document).ready(function(){
            
            $('#kecamatan').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('penggajian/gaji_tetap/detail/get_kecamatan');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                            html += '<option>Pilih Desa</option>';
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id+'>'+data[i].nama+'</option>';
                        }
                        $('#desa').html(html);
 
                    }
                });
                return false;
            }); 
});

 
    function hapus(id) {
        bootbox.confirm({
            message: "Apakah anda yakin akan menghapus data Pengguna ini?",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Batal',
                    className: "btn-danger btn-sm"
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Yakin',
                    className: "btn-primary btn-sm"        
                }
            },
            callback: function (result) {
                if(result) {
                    $.post(
                        '<?=base_url("penggajian/gaji_tetap_do/delete")?>',
                        {id: id},
                        function(data) {
                            if(data.success) {
                                $.gritter.add({
                                    title: 'Informasi',
                                    text: 'Pengguna berhasil dihapus.',
                                    class_name: 'gritter-info gritter-center'
                                });
                                setTimeout(function(){
                                    window.location.reload(); 
                                },1000);
                                $("#data-table").tabel({
                                    reload :true                                
                                });

                            } else {
                                bootbox.alert(data.msg);
                            }
                        }, "json"
                    );
                }
            }
        });                
    }

 
</script>    