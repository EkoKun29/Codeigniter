<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            
          <h4 class="card-title">Form <?=$sub == 'add' ? 'Tambah' : 'Edit'?> Pengguna</h4>
          <?php if($sess['group'] == "Desa"){?>
          <form class="forms-sample" action="<?=base_url("penggajian/permohonan_do/$sub")?>" method="post">
            
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Perangkat</label>
                <div class="col-sm-6">
                <select name="Nik" class="form-control select2" id="perangkat">
                <option value=''>Pilih Perangkat</option>    
                <?php foreach($perangkat as $p){?>
                    <option value="<?= $p->Nik?>" <?php if($p->Nik==$user['Nik']){ echo "selected";}?>><?= $p->Nama?></option>
                <?php }?>
                </select>
                </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Bulan</label>
                    <div class="col-sm-6">
                        <select name="Bulan" class="form-control select2" id="Bulan">
                <option value=''>Pilih Bulan</option>    
                <?php for($a=1;$a<13;$a++){
                    
                    $m = date('m');
                    ?>
                    <option value="<?= $a; ?>" <?php if($a==$user['Bulan'] OR $a==$m){ echo "selected";} ?>><?= convertBulan($a); ?></option>
                <?php }?>
                </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Gaji Bulanan</label>
                    <div class="col-sm-6">
                        <select name="GajiBulanan" class="form-control select2" id="GajiBulanan">
                        <?php 
                        if($GajiBulanan == ''){
                        
                            echo "<option>Gaji Bulanan</option>";    
                         }else{
                            echo "<option value='".$GajiBulanan."'>".$this->angka->rupiah($GajiBulanan)."</option>"; 
                        }
                        ?>
                
                </select>
                    </div>
                </div>
                
            <input type="hidden" name="PembayaranId" value="<?= $user['PembayaranId']?>">      
            <div class="form-group row">
            <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-6">
                    <button type="reset" class="btn btn-light"><i class="fa fa-refresh"></i> Reset</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-warning" onclick="self.history.back()"><i class="fa fa-undo"></i> Kembali</button>
                </div>
            </div> 
            
          </form>

      <?php }else{
        echo "<h3><center>Dilarang Menambah/Mengedit</center></h3>";
      }?>
        </div>
      </div>
    </div>
 </div>   
<!-- Modal -->
<div id="modal-loading" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">                    
            <div class="modal-header">                        
                <h4 class="modal-title"><i class="ace-icon fa fa-hourglass-o icon-only"></i> Silahkan Tunggu!</h4>
            </div>
            <div class="modal-body">
                <div class="progress">
                  <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>                                        
        </div>
    </div>
</div>
<!-- /.modal end here -->

<script type="text/javascript">
        $(function(){
            
        $('form').ajaxForm({
            dataType: 'json',
            beforeSubmit: function(arr, $form, options) { 
                $('#modal-loading').modal('show');
            },        
            success: function(data){
                $('#modal-loading').modal('hide');
                if(data.success) {
                    location.href = '<?= base_url('penggajian/permohonan')?>';
                } else{
                    $.gritter.add({
                        title: 'Error!',
                        text: data.msg,
                        class_name: 'gritter-error gritter-center'
                    });
                }
            }
        });        
    });        


    $(document).ready(function(){
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
            
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

            $('#perangkat').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('penggajian/permohonan/detail/get_perangkat');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                            
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].gaji+'>'+formatRupiah(data[i].gaji,2)+'</option>';

                        }

                        $('#GajiBulanan').html(html);
                    }
                });
                return false;
            }); 




    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
    </script>

