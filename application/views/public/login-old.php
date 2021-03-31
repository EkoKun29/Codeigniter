<?php $this->load->view('layouts_nosystem/header');?>
        <!-- partial -->




        <div class="content-wrapper">

          <div class="row">
            <div class="col-lg-6" style="margin:auto">
              <div class="card">
                <div class="card-body">
                  <center>
                    <h4 class="card-title">SILTAP</h4>
                  </center>
                 
                  <form id="form-login" action="<?=site_url('login_do/login')?>" method="POST">
                    <fieldset>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" name="username" type="text">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" class="form-control" name="password" type="password">
                      </div>
                      <center>
                      <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium" >Login </button>
                      
                     <!--  <input class="btn btn-primary" type="submit" value="Masuk">-->
                      </center>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>


<script>
        $('#form-login').submit(function(e){
          e.preventDefault()

          $('[type="submit"]').attr('disabled', 'disabled').html('<div class="loader loader-ellipsis"></div>')
          
          $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(data){
              if(data.success){
                Swal.fire({
                  title: '<span class="text-success">Berhasil Login</span>',
                  html: '<div class="alert alert-success">'+data.msg+'</div>',
                  icon: 'success',
                  showCancelButton: false,
                  showConfirmButton: false,
                })
                
                setTimeout(function(){
                  document.location.href = data.redirect
                }, 2000)
              }else{
                Swal.fire({
                  title: '<span class="text-danger">Gagal Login</span>',
                  html: '<ul class="alert alert-danger text-left">'+data.msg+'</ul>',
                  icon: 'error',
                  onClose: onClose
                })
                
              }
            }
          })
        });
</script>
           <?php $this->load->view('layouts_nosystem/footer');?>


