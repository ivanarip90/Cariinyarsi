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

$id=$_GET['kategori'];
$barang = query("SELECT * FROM hilang WHERE status !='Menunggu Konfirmasi' AND kategori ='$id'");
$getnotif_hilang=mysqli_query($conn, "SELECT * FROM hilang WHERE status = 'Menunggu Konfirmasi'");
$getnotif_temuan=mysqli_query($conn, "SELECT * FROM temuan WHERE status = 'Menunggu Konfirmasi'");
$notif=mysqli_num_rows($getnotif_hilang);
$notif_temuan=mysqli_num_rows($getnotif_temuan);
$kategori=query("SELECT * FROM kategori");

if (isset($_POST["cari"])) {
    $keyword = $_POST["keyword"];
    $query = "SELECT * FROM hilang WHERE 
    judul LIKE '%$keyword%' OR 
    detail LIKE '%$keyword%'
    ";
    $cari = mysqli_query($conn, $query);
    $barang = query($query);
    $hasil=mysqli_num_rows($cari);
    $pencarian=true;
    if( $hasil < 1){
        $keyword='Tidak ditemukan';
    }
    
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kategori Kehilangan</title>
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
                <a class="navbar-brand fw-bold" href="index.php">CariIn by Yarsi</a>
            </div>
            <div class="col text-end">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  
                    <i class="bi-list"></i>
                </button>
            </div>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item "><a class="nav-link me-lg-3 " href="index.php">Beranda</a></li>
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
        <!-- Default dropend button -->

<section>
    <div class="container">
        <div class="row mb-5 mt-3">
            <div class="col">
                <form class="form-floating" method="POST">
                <input type="text" class="form-control"  name="keyword" id="keyword" placeholder="Cari" required autocomplete="off">
                <label for="keyword" class="bi-search"></label>
                <button class="btn btn-primary mt-3" name="cari" hidden>Cari hilang</button>
                </form>
            </div>
        </div>
        <div class="container">
        <div class="row mb-2 mt-3">
            <div class="col">
                <h2 class="display-4 lh-1 mb-2">Data Barang Hilang</h2>
            </div>
        </div>
        <div class="row">
        <?php if(isset($pencarian)):?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
        Hasil Pencarian
        <strong>
        <?= $keyword;?>
        </strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif;?>
</div>
        <div class="row">
            <?php 
            foreach ($barang as $hilang):?>
            <div class="col-md-4 gx-3 mt-3">
                <div class="card">
                <img src="assets/img/<?= $hilang['foto'];?>" class="card-img-top" alt="..." width="auto" height="300px">
                <div class="card-body">
                    <h5 class="card-title mb-0"><?= $hilang['judul'];?></h5>
                    
                    <div class="d-flex bd-highlight">
                    <div class="p-2 pt-0 ps-0 flex-grow-1 bd-highlight">
                    <small class="p-0 mb-2"><?= $hilang['tanggal'];?></small>
                    </div>
                    <div class="p-2 pt-0 bd-highlight">
                    <span  class="badge bg-primary">
                    <small class="p-0 mb-2"><?= $hilang['tempat'];?></small>
                    </span></div>
                    </div>
                    <p class="card-text mt-3 mb-0"><b>Detail Barang</b></p>
                    <small class="p-0 mb-2">
                    <?php 
                    $isi=$hilang['judul'];
                    if (str_word_count($isi)>=60){
                        echo substr($isi,0,200)." [....]";
                    }else{
                        echo $isi; 
                    }?>    
                    
                </small>
                    <div class="d-flex bd-highlight mt-3">
                    <div class="p-2 pt-0 ps-0 flex-grow-1 bd-highlight"><span  class="badge bg-success"  ><?= $hilang['kategori'];?></span></div>
                    </div>
                    <div class="d-flex bd-highlight mt-0">
                    <div class="p-2 pt-0 ps-0 flex-grow-1 bd-highlight"><i class="bi bi-person-fill text-success me-2"></i><small><?= $hilang['pengguna'];?></small></div>
                    <div class="p-2 pt-0 bd-highlight">
                    
                    <?php 
                    if($hilang['status']=="Diklaim"):
                    ?>
                    <span class="badge bg-danger p-1 ps-2 pe-2"><?=$hilang['status'];?></span>
                    <?php endif;?>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<!-- Split dropend button -->

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
                                    <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                                        <span class="d-flex align-items-center">
                                            <i class="text-fill me-2"></i>
                                            <span class="small">Umumkan Temuan</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                                        <span class="d-flex align-items-center">
                                            <i class="-text-fill me-2"></i>
                                            <span class="small">Umumkan Kehilangan</span>
                                        </span>
                                    </button>
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
