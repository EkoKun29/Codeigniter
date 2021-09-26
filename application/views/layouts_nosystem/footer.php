
					<!-- partial:<?=base_url('template/backend/')?>partials/_footer.html -->
					<footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 <a href="https://diskominfo.patikab.go.id/">Diskominfo</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Dibuat oleh team Diskominfo Pati <i class="mdi mdi-heart text-danger"></i></span>
            </div>
          </footer>
					<!-- partial -->
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?=base_url('template/backend/')?>vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?=base_url('template/backend/')?>vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <script src="<?=base_url('template/backend/')?>vendors/chart.js/Chart.min.js"></script>
  <script src="<?=base_url('template/backend/')?>vendors/raphael/raphael.min.js"></script>
  <script src="<?=base_url('template/backend/')?>vendors/morris.js/morris.min.js"></script>
  <script src="<?=base_url('template/backend/')?>vendors/jquery-sparkline/jquery.sparkline.min.js"></script>    
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?=base_url('template/backend/')?>js/off-canvas.js"></script>
  <script src="<?=base_url('template/backend/')?>js/hoverable-collapse.js"></script>
  <script src="<?=base_url('template/backend/')?>js/misc.js"></script>
  <script src="<?=base_url('template/backend/')?>js/settings.js"></script>
  <script src="<?=base_url('template/backend/')?>js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?=base_url('template/backend/')?>js/dashboard.js"></script>
  <script src="<?=base_url('template/backend/')?>js/script.js"></script>

  <script src="<?=base_url('template/backend/')?>vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
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
  <!-- Custom js for this page-->
  <script src="<?=base_url('template/backend/')?>js/wizard.js"></script>
  
  <script src="<?=base_url('template/backend')?>/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?=base_url('template/backend')?>/vendors/select2/select2.min.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?=base_url('template/backend')?>/js/off-canvas.js"></script>
  <script src="<?=base_url('template/backend')?>/js/hoverable-collapse.js"></script>
  <script src="<?=base_url('template/backend')?>/js/misc.js"></script>
  <script src="<?=base_url('template/backend')?>/js/settings.js"></script>
  <script src="<?=base_url('template/backend')?>/js/todolist.js"></script>
  <!-- endinject -->
  <script src="<?=base_url('template/backend')?>/js/select2.js"></script>
  
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url("template/backend/js/jquery.js")?>"></script>
    <script src="<?=base_url("template/backend/js/jquery.form.min.js"); ?>"></script>
    <script src="<?=base_url("template/backend/js/bootstrap.min.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("template/backend/vendors/gritter/js/jquery.gritter.js")?>"></script>
<!-- <script src="<?=base_url('template/backend/')?>vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"> -->
    <script type="text/javascript">
        $(function() {
            $('#form-login').ajaxForm({
                dataType: 'json',
                success: function(data){
                    if(data.success) {
                        location.href = '<?=base_url('home/dashboard')?>';
                    } else{
                        $.gritter.add({
                            title: 'Login Gagal',
                            text: data.msg,
                            class_name: 'gritter-error gritter-center'
                        });
                    }
                }
            });
            $('#form-register').ajaxForm({
                dataType: 'json',
                success: function(data){
                    if(data.success) {
                        location.href = '<?=base_url('public/auth')?>';
                    } else{
                        $.gritter.add({
                            title: 'Register Gagal',
                            text: data.msg,
                            class_name: 'gritter-error gritter-center'
                        });
                    }
                }
            });
    
          
        });

    </script>


  <!-- End custom js for this page-->
</body>

</html>
