<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Aplikasi Desk TIK</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(''); ?>img/logo_circle.png" rel="icon">
    <!-- <link href="<?= base_url(''); ?>/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('data modul/Regna/'); ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('data modul/Regna/'); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('data modul/Regna/'); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('data modul/Regna/'); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('data modul/Regna/'); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('data modul/Regna/'); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('data modul/Regna/'); ?>assets/css/style.css" rel="stylesheet">

    <!-- js should be placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?= base_url("template/backend/js/jquery.js") ?>"></script>

    <!-- =======================================================
  * Template Name: Regna - v4.1.0
  * Template URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style type="text/css">
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            /*background-color: #fff;*/
            background-color: #0072ff;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }
    </style>
</head>


<body>
    <!-- loader -->
    <div class="preloader">
        <div class="loading">
            <img width="150" src="<?= base_url('img/logo_circle.png'); ?>">
            <div class="jumping-dots-loader">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex justify-content-between align-items-center">

            <div id="logo">
                <a href="index.html"><img src="assets/img/logo.png" alt=""></a>
                <!-- Uncomment below if you prefer to use a text logo -->
                <!--<h1><a href="index.html">Regna</a></h1>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="#portfolio">Layanan</a></li>
                    <!-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li> -->
                    <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>

                    <li><a class="rounded" href="<?= base_url('home/dashboard'); ?>">Login</a></li>
                    <!-- <li><a class="rounded" href="<?= base_url('home/dashboard'); ?>">Registrasi</a></li> -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <video autoplay muted loop id="myVideo" style="width: 100%;">
            <source src="<?= base_url() ?>img/video_pati.mp4" type="video/mp4">
        </video>
        <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
            <h1>Selamat Datang, di Desk TIK</h1>
            <h2>Sistem permohonan layanan TIK ini diperuntukkan bagi OPD yang akan mengajukan permohonan layanan TIK secara online.</h2>
            <a href="#about" class="btn-get-started">Get Started</a>
        </div>


    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about">
            <div class="container" data-aos="fade-up">
                <div class="row about-container">

                    <div class="col-lg-6 content order-lg-1 order-2">
                        <h2 class="title">Tentang Aplikasi Desk TIK</h2>
                        <p>
                            Sistem permohonan layanan TIK ini diperuntukkan bagi OPD yang akan mengajukan permohonan layanan TIK secara online.
                        </p>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bi bi-briefcase"></i></div>
                            <h4 class="title"><a href="">Layanan Backup</a></h4>
                            <p class="description">Ada banyak manfaat ketika Anda menggunakan layanan cloud storage sebagai tempat menyimpan file. Satu alasan utama dari banyak pengguna cloud storage adalah sebagai tempat yang aman untuk pencadangan (backup) file penting. Pertimbangannya adalah bila Anda menyimpan di hard drive, external hard drive atau flash drive, kapasitas drive akan cepat penuh, juga untuk mengantisipasi bila drive tersebut rusak, dicuri atau terbakar.</p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="bi bi-card-checklist"></i></div>
                            <h4 class="title"><a href="">Layanan Jaringan Internet dan Komunikasi</a></h4>
                            <p class="description">Dalam jaringan komputer, layanan jaringan adalah aplikasi yang berjalan pada lapisan aplikasi jaringan ke atas, yang menyediakan penyimpanan data, manipulasi, presentasi, komunikasi atau kemampuan lain yang sering diimplementasikan menggunakan arsitektur client-server atau peer-to-peer berdasarkan protokol jaringan lapisan aplikasi . </p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="bi bi-binoculars"></i></div>
                            <h4 class="title"><a href="">Layanan Hosting Aplikasi dan/atau Data Production</a></h4>
                            <p class="description">Web hosting adalah layanan online untuk mengonlinekan website atau aplikasi web di internet. Ketika Anda membeli dan mendaftar di suatu layanan hosting, pada dasarnya Anda sedang meminjam space di server, tempat menyimpan semua file dan data yang dibutuhkan oleh website agar dapat bekeja sepenuhnya.</p>
                        </div>

                    </div>

                    <div class="col-lg-6 background order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100" style=" background: url(<?= base_url() ?>img/layanan-01.jpg) center top no-repeat;"></div>
                </div>

            </div>
        </section><!-- End About Section -->


        <!-- ======= Services Section ======= -->
        <!-- <section id="services">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h3 class="section-title">Layanan</h3>
                    <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                        <div class="box">
                            <div class="icon"><a href=""><i class="bi bi-briefcase"></i></a></div>
                            <h4 class="title"><a href="">Pelaporan</a></h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                        <div class="box">
                            <div class="icon"><a href=""><i class="bi bi-card-checklist"></i></a></div>
                            <h4 class="title"><a href="">Pengaduan</a></h4>
                            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                        <div class="box">
                            <div class="icon"><a href=""><i class="bi bi-bar-chart"></i></a></div>
                            <h4 class="title"><a href="">Layanan Backup</a></h4>
                            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                        <div class="box">
                            <div class="icon"><a href=""><i class="bi bi-binoculars"></i></a></div>
                            <h4 class="title"><a href="">Layanan Hosting</a></h4>
                            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                        <div class="box">
                            <div class="icon"><a href=""><i class="bi bi-brightness-high"></i></a></div>
                            <h4 class="title"><a href="">Layanan Data Production</a></h4>
                            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                        <div class="box">
                            <div class="icon"><a href=""><i class="bi bi-calendar4-week"></i></a></div>
                            <h4 class="title"><a href="">Networking</a></h4>
                            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
                        </div>
                    </div>
                </div>

            </div>
        </section> -->
        <!-- End Services Section -->

        <!-- ======= Call To Action Section ======= -->
        <section id="call-to-action">
            <div class="container">
                <div class="row" data-aos="zoom-in">
                    <div class="col-lg-9 text-center text-lg-start">
                        <h3 class="cta-title">HUBUNGI KAMI</h3>
                        <p class="cta-text"></p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="tel:+62295381127">Telpon Sekarang</a>
                    </div>
                </div>

            </div>
        </section><!-- End Call To Action Section -->
        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h3 class="section-title">Semua Layanan</h3>
                    <br><br>
                    <!-- <p class="section-description">
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accusantium doloremque
                    </p> -->
                </div>

                <!-- <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul>
                    </div>
                </div> -->

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <?php
                    $no = 1;
                    foreach ($kategori as $row) {
                    ?>
                        <div class="col-lg-3 col-md-4 portfolio-item filter-app">
                            <img src="<?= base_url('img/layanan/'); ?>portfolio-1-01.jpg" class="img-fluid" alt="" />
                            <div class="portfolio-info">
                                <!-- <h4>Layanan <?= $no++ ?></h4> -->
                                <p><?= $row->KategoriNama; ?></p>
                                <a href="<?= base_url('img/layanan/'); ?>portfolio-1-01.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $row->KategoriNama ?>"><i class="bx bx-plus"></i></a>
                                <!-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> -->
                            </div>
                        </div>

                    <?php } ?>



                </div>
            </div>
        </section>
        <!-- End Portfolio Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact">
            <div class="container">
                <div class="section-header">
                    <h3 class="section-title">Kontak</h3><br><br>
                    <!-- <p class="section-description">Kontak</p> -->
                </div>
            </div>

            <!-- Uncomment below if you wan to use dynamic maps -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7924.332659348014!2d111.03329284044617!3d-6.749559318479907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d251577cad41%3A0x85d22c03c3efe378!2sAplikasi%20Smartcity%20Pati!5e0!3m2!1sid!2sid!4v1617159544864!5m2!1sid!2sid" style="border:0; width:100%; Height:500px" allowfullscreen="" loading="lazy"></iframe>
            <div class="container mt-5">
                <div class="row justify-content-center">

                    <div class="col-lg-8 col-md-6">

                        <div class="info">
                            <div>
                                <i class="bi bi-geo-alt"></i>
                                <p>Jl. R. A. Kartini No.1A, Kaborongan, Pati Lor, Kec. Pati, Kabupaten Pati, Jawa Tengah 59111</p>
                            </div>

                            <div>
                                <i class="bi bi-envelope"></i>
                                <p>http://diskominfo.patikab.go.id/</p>
                            </div>

                            <div>
                                <i class="bi bi-phone"></i>
                                <p>++62295381127</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright 2021 Dinas Komunikasi dan Informatika Kabupaten Pati. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('data modul/Regna/'); ?>assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url('data modul/Regna/'); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('data modul/Regna/'); ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('data modul/Regna/'); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('data modul/Regna/'); ?>assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url('data modul/Regna/'); ?>assets/vendor/purecounter/purecounter.js"></script>
    <script src="<?= base_url('data modul/Regna/'); ?>assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('data modul/Regna/'); ?>assets/js/main.js"></script>

    <script>
        $(document).ready(function() {
            $(".preloader").fadeOut();
        })
    </script>

</body>

</html>