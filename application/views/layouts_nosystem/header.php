<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Desk TIK</title>
  <!-- plugins:css -->
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
  <!-- <link rel="stylesheet" href="<?= base_url('template/backend/') ?>vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" /> -->
  <link rel="shortcut icon" href="<?= base_url('template/backend/') ?>images/logo-kominfo.png" />
</head>

<body class="sidebar-toggle-display sidebar-hidden">
  <div class="container-scroller">
    <!-- partial:<?= base_url('template/backend/') ?>partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <img width="60px" src="<?= base_url("template/backend/images/logo-kominfo.png"); ?>">
        <a class="navbar-brand brand-logo" href="#"><span style="color:#000"> DISKOMINFO</span></a>
        <a class="navbar-brand brand-logo-mini" href="#"><span style="color:#000">D</span></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">



        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:<?= base_url('template/backend/') ?>partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme">
              <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
              <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles primary"></div>
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles pink"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default"></div>
            </div>
          </div>
        </div>

        <!-- partial -->
        <!-- partial:<?= base_url('template/backend/') ?>partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">

            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('public/auth') ?>">
                <i class="icon-rocket menu-icon"></i>
                <span class="menu-title">Masuk</span>
              </a>
            </li>
          </ul>
        </nav>