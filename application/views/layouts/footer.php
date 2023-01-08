    <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
                  Kominfo &copy;  <?= date('Y') ?><?=" Kabupaten Pati"?></span>
            </div>
    </footer>
    </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <script src="<?=base_url('template/backend/')?>vendors/jquery-validation/jquery.validate.min.js"></script>
  

  <!-- Custom js for this page-->
  <script src="<?=base_url('template/backend/')?>js/form-validation.js"></script>
  <script src="<?=base_url('template/backend/')?>vendors/js/vendor.bundle.base.js"></script>
  
 
  <!-- Plugin js for this page-->
 
  <script src="<?=base_url('template/backend/')?>vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <script src="<?=base_url('template/backend/')?>vendors/chart.js/Chart.min.js"></script>
  <script src="<?=base_url('template/backend/')?>vendors/raphael/raphael.min.js"></script>
  <script src="<?=base_url('template/backend/')?>vendors/morris.js/morris.min.js"></script>
  <script src="<?=base_url('template/backend/')?>vendors/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="<?=base_url('template/backend/')?>vendors/icheck/icheck.min.js"></script>

  <!-- End plugin js for this page-->
  <script src="<?=base_url('template/backend/')?>/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?=base_url('template/backend/')?>/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?=base_url('template/backend/')?>vendors/select2/select2.min.js"></script>
  <!-- bootbox modal-->
  <script src="<?=base_url('template/backend/')?>vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
  <script type="text/javascript" src="<?=base_url('template/backend/')?>js/bootbox.min.js" ></script>  
  <!-- DatePicker -->
  <!-- form + gritter js-->
  <script src="<?=base_url("template/backend/js/jquery.form.min.js"); ?>"></script>
  <script type="text/javascript" src="<?=base_url('template/backend/')?>vendors/gritter/js/jquery.gritter.js"></script>
  <!-- Datatable for Sistem-->
  <script type="text/javascript" src="<?=base_url('template/backend/')?>datatable/js/jquery.nicescroll.js"></script>
  <script type="text/javascript" src="<?=base_url('template/backend/')?>datatable/js/common-scripts.js"></script>
  <script src="<?=base_url('template/backend/')?>js/data-table.js"></script>
  <!-- Plugin js for this page-->
  <script src="<?=base_url('template/backend/')?>vendors/jquery-steps/jquery.steps.min.js"></script>
  <script src="<?=base_url('template/backend/')?>vendors/jquery-validation/jquery.validate.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?=base_url('template/backend/')?>js/off-canvas.js"></script>
  <script src="<?=base_url('template/backend/')?>js/hoverable-collapse.js"></script>
  <script src="<?=base_url('template/backend/')?>js/misc.js"></script>
  <script src="<?=base_url('template/backend/')?>js/settings.js"></script>
  <script src="<?=base_url('template/backend/')?>js/todolist.js"></script>
  <!-- endinject -->
  <script type="text/javascript" src="<?=base_url('template/backend/')?>js/bsn.AutoSuggest_2.1.4_comp.js"></script>             
  <script src="<?=base_url('template/backend/')?>js/toastDemo.js"></script>
  <script src="<?=base_url('template/backend/')?>js/select2.js"></script>
  <script src="<?=base_url('template/backend/')?>js/iCheck.js"></script>
  <script src="<?=base_url('template/backend/')?>js/dashboard.js"></script>
  <!-- End custom js for this page-->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url("template/backend/");?>dist/js/demo.js"></script>
<script src="<?php echo base_url("template/backend/");?>dist/js/jquery.mask.min.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?=base_url('template/backend/')?>js/wizard.js"></script>

  <script src="<?=base_url('template/backend/')?>vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

  <script>
$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
    $('#simple').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
    });
});

$(document).ready(function(){
    //Initialize Select2 Elements
    
    $('.select2').select2();
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
    $(document).ready(function(){
      $(".preloader").fadeOut();
    })
    </script>
</body>

</html>
