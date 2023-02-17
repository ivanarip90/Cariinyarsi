<?php 
session_start();
if (isset($_SESSION["admin"])) {
    $hide="hidden";
    $log="";
}
if (!isset($_SESSION["user"])) {
    $hide="hidden";
    $log="";
}
require 'admin/config/conn.php';
require 'admin/config/function.php';

if (isset($_SESSION["admin"])) {
    $log="hidden";
    $hide=" ";
    $userLogin=$_SESSION["admin"];
    $user=mysqli_query($conn,"SELECT * FROM users WHERE id_user = $userLogin");
    $nameLogin=mysqli_fetch_array($user);
}
if (isset($_SESSION["user"])) {
    $log="hidden";
    $hide=" ";
    $userLogin=$_SESSION["user"];
    $user=mysqli_query($conn,"SELECT * FROM users WHERE id_user = $userLogin");
    $nameLogin=mysqli_fetch_array($user);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="panel/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
            <div class="col">
                <a class="navbar-brand fw-bold" href="#page-top">CariIn by Yarsi</a>
            </div>
            <div class="col text-end">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  
                    <i class="bi-list"></i>
                </button>
            </div>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item "><a class="nav-link me-lg-3 " href="#kategori">Kategori</a></li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cari
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="caritemuan.php">Temuan Barang</a></li>
                            <li><a class="dropdown-item" href="caribaranghilang.php">Barang Hilang</a></li>
                        </ul>
                        </li>
                        <li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pasang Pengumuman
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="admin/pasangtemuan.php">Temuan Barang</a></li>
                            <li><a class="dropdown-item" href="admin/kehilanganbarang.php">Barang Hilang</a></li>
                        </ul>
                        </li>
                        <li>
                        <a class="btn btn-primary rounded-pill px-4 ms-1 mb-2 mb-lg-0" href="login.php" <?=$log?>>
                            <span class="d-flex align-items-center">
                                <span class="small">Login</span>
                            </span>
                        </a>
                        </li>
                        <li class="nav-item dropdown mx-3" <?=$hide?>>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $nameLogin['nama']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="admin/index.php">Dashboard</a></li>
                            <li><a class="dropdown-item" href="logout.php">logout</a></li>
                        </ul>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </nav>
        <!-- Mashead header-->
        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 class="display-1 lh-1 mb-3">Selamat Datang di CariIn by Yarsi</h1>
                            <p class="lead fw-normal text-muted mb-5">Cariin adalah situs yang membantu pengguna mengumumkan kehilangan barang maupun temuan barang</p>
                            <div class="d-flex flex-column flex-lg-row align-items-center"> 
                                <button
                                    class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal"
                                    data-bs-target="#feedbackModal">
                                    <span class="d-flex align-items-center">
                                        <span class="small py-2">Pasang Pengumuman</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Masthead device mockup feature-->
                        <div class="masthead-device-mockup">
                            <img src="panel/assets/Search Engine_Two Color (1).svg" width="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Quote/testimonial aside-->
        <aside class="text-center bg-gradient-primary-to-secondary">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xl-8">
                        <div class="h2 fs-1 text-white mb-4">"Wherever there is a human being, there is an opportunity for a kindness"</div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- App features section-->
        <section id="kategori">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg order-lg-1 mb-5 mb-lg-0">
                        <div class="container-fluid px-5">
                            
                        <div class="row gx-5 align-items-center">
                            <div class="row gx-5">
                                <div class="col">                                    
                                <h1 class="text-primary display-3 lh-1 mb-5 text-center">Cari Temuan</h1>
                                </div>
                            </div>
                            <div class="row gx-5">
                                <div class="col-md-4 mb-5">
                                    <!-- Feature item-->
                                    <a class="nav nav-link" href="kategoritemuan.php?kategori=Dokumen">
                                    <div class="text-center">
                                        <i class="bi-journal-bookmark icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Dokumen</h3>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-md-4 mb-5">
                                    <!-- Feature item-->
                                    <a class="nav nav-link" href="kategoritemuan.php?kategori=Aksesoris">
                                    <div class="text-center">
                                        <i class="bi-smartwatch icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Aksesoris</h3>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-md-4 mb-5">
                                    <!-- Feature item-->
                                    <a class="nav nav-link" href="kategoritemuan.php?kategori=Kendaraan">
                                    <div class="text-center">
                                        <i class="bi-bicycle icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Kendaraan</h3>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-5 mb-md-0">
                                    <!-- Feature item-->
                                    <a class="nav nav-link" href="kategoritemuan.php?kategori=Elektronik">
                                    <div class="text-center">
                                        <i class="bi-phone   icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Elektronik</h3>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <!-- Feature item-->
                                    <a class="nav nav-link" href="kategoritemuan.php?kategori=Uang/Perhiasan">
                                    <div class="text-center">
                                        <i class="bi-cash-coin icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Uang/Perhiasan</h3>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <!-- Feature item-->
                                    <a class="nav nav-link" href="kategoritemuan.php?kategori=Lain-lain">
                                    <div class="text-center">
                                        <i class="bi-patch-check icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Lain-lain</h3>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid px-5">
                        <div class="row gx-5 align-items-center">
                            <div class="row gx-5">
                                <div class="col">                                    
                                <h1 class="text-primary display-3 lh-1 mb-5 text-center">Cari Kehilangan</h1>
                                </div>
                            </div>
                            <div class="row gx-5">
                                <div class="col-md-4 mb-5">
                                    <!-- Feature item-->
                                    <a class="nav nav-link" href="kategorihilang.php?kategori=Dokumen">
                                    <div class="text-center">
                                        <i class="bi-journal-bookmark icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Dokumen</h3>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-md-4 mb-5">
                                    <!-- Feature item-->
                                    <a class="nav nav-link" href="kategorihilang.php?kategori=Aksesoris">
                                    <div class="text-center">
                                        <i class="bi-smartwatch icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Aksesoris</h3>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-md-4 mb-5">
                                    <!-- Feature item-->
                                    <a class="nav nav-link" href="kategorihilang.php?kategori=Kendaraan">
                                    <div class="text-center">
                                        <i class="bi-bicycle icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Kendaraan</h3>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-5 mb-md-0">
                                    <!-- Feature item-->
                                    <a class="nav nav-link" href="kategorihilang.php?kategori=Elektronik">
                                    <div class="text-center">
                                        <i class="bi-phone   icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Elektronik</h3>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <!-- Feature item-->
                                    <a class="nav nav-link" href="kategorihilang.php?kategori=Uang/Perhiasan">
                                    <div class="text-center">
                                        <i class="bi-cash-coin icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Uang/Perhiasan</h3>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <!-- Feature item-->
                                    <a class="nav nav-link" href="kategorihilang.php?kategori=Lain-lain">
                                    <div class="text-center">
                                        <i class="bi-patch-check icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Lain-lain</h3>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Basic features section-->
        <section class="bg-light">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                    <div class="col-12 col-lg-5">
                        <h2 class="display-4 lh-1 mb-4">Lebih mudah mencari barang</h2>
                        <p class="lead fw-normal text-muted mb-5 mb-lg-0">Dengan situs ini harapannya kami dapat membantu pengguna menemukan barang kehilangan. </p>
                    </div>
                    <div class="col-sm-8 col-md-6">
                        <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle" src="panel/assets/Online research_Two Color (1).svg" alt="..." /></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to action section-->
        <section class="cta">
            <div class="cta-content">
                <div class="container px-5">
                    <h2 class="text-white display-1 lh-1 mb-4">
                        Ada menemukan
                        <br />
                        Barang?
                    </h2>
                    <a class="btn btn-outline-light py-3 px-4 rounded-pill" href="https://startbootstrap.com/theme/new-age" target="_blank">Umumkan Sekarang</a>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">&copy; Cariin by Yarsi 2023. All Rights Reserved.</div>
                    <a href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">FAQ</a>
                </div>
            </div>
        </footer>
        <!-- Feedback Modal-->
        <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Pilih Jenis Pengumuman</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0 p-4">
                        <div class="row">
                            <div class="col-md-6">
                                    <a href="admin/pasangtemuan.php" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0">
                                        <span class="d-flex align-items-center">
                                            <i class="text-fill me-2"></i>
                                            <span class="small">Umumkan Temuan</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="admin/kehilanganbarang.php" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0">
                                        <span class="d-flex align-items-center">
                                            <i class="-text-fill me-2"></i>
                                            <span class="small">Umumkan Kehilangan</span>
                                        </span>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="panel/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
