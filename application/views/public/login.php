<!DOCTYPE html>
<html lang="en">

<head>
  <title>Aplikasi Desk TIK</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="<?= base_url('template/login/') ?>../../img/logo_circle.png" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('template/login/') ?>vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('template/login/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('template/login/') ?>vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('template/login/') ?>vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('template/login/') ?>vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('template/login/') ?>css/util.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('template/login/') ?>css/main.css">
  <!--===============================================================================================-->


  <link rel="stylesheet" href="<?= base_url('template/backend/') ?>vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url('template/backend/') ?>vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?= base_url('template/backend/') ?>vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?= base_url('template/backend/') ?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url('template/backend/') ?>vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?= base_url('template/backend/') ?>vendors/jquery-bar-rating/fontawesome-stars.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('template/backend/') ?>css/style.css">
  <!-- endinject -->
  <!-- gritter CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url("template/backend/vendors/gritter/css/jquery.gritter.css") ?>">
</head>

<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="<?= base_url(''); ?>img/layanan-02.jpg" alt="IMG">
        </div>

        <form id="form-login" class="login100-form validate-form" action="<?= site_url('login_do/login') ?>" method="POST">
          <span class="login100-form-title">
            APLIKASI DESK TIK
          </span>

          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="username" placeholder="Username">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn" style="background: linear-gradient(to right, #0072ff, #00c6ff);">
              Login
            </button>
          </div>
          <table>
            <tr>
              <!-- <td class="col-md-6"><a style="text-align: right;" href="<?= base_url() ?>">Registrasi</a></td> -->
              <td class="col-md-6"><a style="text-align: right;" href="<?= base_url() ?>">Kembali</a></td>
            </tr>
          </table>




          <div class="text-center p-t-136">
            <a class="txt2" href="#">

            </a>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!-- css login	 -->
  <!--===============================================================================================-->
  <!-- <script src="<?= base_url('template/login/') ?>vendor/jquery/jquery-3.2.1.min.js"></script> -->
  <!--===============================================================================================-->
  <script src="<?= base_url('template/login/') ?>vendor/bootstrap/js/popper.js"></script>
  <script src="<?= base_url('template/login/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?= base_url('template/login/') ?>vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?= base_url('template/login/') ?>vendor/tilt/tilt.jquery.min.js"></script>



  <!-- inject:js -->
  <script src="<?= base_url('template/backend/') ?>js/off-canvas.js"></script>
  <script src="<?= base_url('template/backend/') ?>js/hoverable-collapse.js"></script>
  <script src="<?= base_url('template/backend/') ?>js/misc.js"></script>
  <script src="<?= base_url('template/backend/') ?>js/settings.js"></script>
  <script src="<?= base_url('template/backend/') ?>js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url('template/backend/') ?>js/dashboard.js"></script>
  <script src="<?= base_url('template/backend/') ?>js/script.js"></script>

  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?= base_url('template/backend/') ?>vendors/jquery-steps/jquery.steps.min.js"></script>
  <script src="<?= base_url('template/backend/') ?>vendors/jquery-validation/jquery.validate.min.js"></script>
  <!-- End plugin js for this page-->

  <!-- Custom js for this page-->
  <script src="<?= base_url('template/backend/') ?>js/wizard.js"></script>

  <script src="<?= base_url('template/backend') ?>/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url('template/backend') ?>/vendors/select2/select2.min.js"></script>
  <!-- endinject -->

  <script src="<?= base_url('template/backend') ?>/js/select2.js"></script>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?= base_url("template/backend/js/jquery.js") ?>"></script>
  <script src="<?= base_url("template/backend/js/jquery.form.min.js"); ?>"></script>
  <script src="<?= base_url("template/backend/js/bootstrap.min.js") ?>"></script>
  <script type="text/javascript" src="<?= base_url("template/backend/vendors/gritter/js/jquery.gritter.js") ?>"></script>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <script>
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
  <!--===============================================================================================-->
  <script src="<?= base_url('template/login/') ?>js/main.js"></script>
  <script>
    $('#form-login').submit(function(e) {
      e.preventDefault()

      // $('[type="submit"]').attr('disabled', 'disabled').html('<div class="loader loader-ellipsis"></div>')

      $.ajax({
        url: $(this).attr('action'),
        method: $(this).attr('method'),
        data: $(this).serialize(),
        dataType: 'json',
        success: function(data) {
          if (data.success) {
            Swal.fire({
              title: '<span class="text-success">Berhasil Login</span>',
              html: '<div>' + data.msg + '</div>',
              icon: 'success',
              showCancelButton: false,
              showConfirmButton: false,
            })

            setTimeout(function() {
              document.location.href = data.redirect
            }, 1000)
          } else {
            Swal.fire({
              title: '<span class="text-danger">Gagal Login</span>',
              html: '<ul>' + data.msg + '</ul>',
              icon: 'error',
              showCancelButton: false,
              showConfirmButton: false,
            })

          }
        }
      })
    });
  </script>
</body>

</html>