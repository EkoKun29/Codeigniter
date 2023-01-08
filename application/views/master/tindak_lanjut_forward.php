<link rel="stylesheet" href="<?= base_url('template/backend/'); ?>vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="<?= base_url('template/backend/'); ?>vendors/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="<?= base_url('template/backend/'); ?>vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="<?= base_url('template/backend/'); ?>vendors/css/vendor.bundle.base.css">
<!-- endinject -->
<!-- plugin css for this page -->
<link rel="stylesheet" href="<?= base_url('template/backend/'); ?>vendors/summernote/dist/summernote-bs4.css">
<link rel="stylesheet" href="<?= base_url('template/backend/'); ?>vendors/quill/quill.snow.css">
<link rel="stylesheet" href="<?= base_url('template/backend/'); ?>vendors/simplemde/simplemde.min.css">


<form class="forms-sample" action="<?= base_url("master/tindak_lanjut_do/update/forward") ?>" method="post">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">Deskripsi Tindak Lanjut</h4> -->
                Pilih Kategori Forward
                <select class="form-control select2" name="KategoriId">
                <?php 
                $sess = $_SESSION['desktik'];
                foreach($kategori as $data){
                    if($data->KategoriSeksi != $sess['kdlokasi']){
                    ?>
                <option value="<?= $data->KategoriId?>"><?= $data->KategoriNama?></option>
                <?php } } ?>
                </select>
                Pesan Forward
                <input type="text" name="forward" class="form-control" />
            </div>
            <input type="hidden" name="AduanId" value="<?= $_POST['id']; ?>">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
</form>

<script src="<?= base_url('template/backend/'); ?>vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="<?= base_url('template/backend/'); ?>vendors/summernote/dist/summernote-bs4.min.js"></script>
<script src="<?= base_url('template/backend/'); ?>vendors/tinymce/tinymce.min.js"></script>
<script src="<?= base_url('template/backend/'); ?>vendors/quill/quill.min.js"></script>
<script src="<?= base_url('template/backend/'); ?>vendors/simplemde/simplemde.min.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?= base_url('template/backend/'); ?>js/off-canvas.js"></script>
<script src="<?= base_url('template/backend/'); ?>js/hoverable-collapse.js"></script>
<script src="<?= base_url('template/backend/'); ?>js/misc.js"></script>
<script src="<?= base_url('template/backend/'); ?>js/settings.js"></script>
<script src="<?= base_url('template/backend/'); ?>js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= base_url('template/backend/'); ?>js/editorDemo.js"></script>