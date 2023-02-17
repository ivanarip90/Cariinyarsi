<?php
require 'admin/config/conn.php';
require 'admin/config/function.php';

$role=query("SELECT * FROM role");

// if (isset($_POST["regist"])) {

//     if (register($_POST) > 0) {
//         echo "<script>
//         alert('Register telah berhasil Silahkan Periksa email anda untuk melakukan aktivasi');
//         window.location.href = 'assets/kirim.php';
//         </script>";
//     } else {
//         echo "<script>
//         alert('Register Gagal, Silahkan Ulangi Kembali');
//         window.location.href = 'register.php';
//         </script>";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - CariIn</title>
        <link href="admin/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <?php if (isset($error_log)):?>
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <div>
                                            Registrasi Gagal
                                        </div>
                                        </div>
                                        <?php endif;?>
                                        <form method="POST" action="assets/PHPMailer/kirim.php" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="nama" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Full name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" name="username" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Username</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputNpm" type="text" name="npm" placeholder="enter Nomor Pokok Mahasiswa" />
                                                <label for="npm">NPM</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" name="password1" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3"  hidden>
                                                <textarea class="form-control" name="alamat" placeholder="Leave a comment here" id="alamat" style="height: 100px"></textarea>
                                                <label for="alamat">Alamat</label>
                                            
                                            <div class="input-group mb-3" hidden>
                                            <input type="text" class="form-control" name="foto" id="foto" value="defaultphoto.png">
                                            <label class="input-group-text" for="foto">Foto Temuan</label>
                                            </div>
                                            </div>
                                                <div class="form-floating mb-3 mb-md-0"  hidden>
                                                    <input class="form-control" name="no_hp" id="no_hp" type="number" placeholder="Enter your first name"/>
                                                    <label for="no_hp">No Handphone</label>
                                                </div>
                                             <div class="form-floating">
                                                    <select class="form-select" name="role" id="role" aria-label="Floating label select example" hidden>
                                                       <?php foreach($role as $role ):
                                                        
                                                            if($role['role']==$users['role']){
                                                            $select="selected";
                                                            }else{
                                                                $select="";
                                                            }
                                                        ?>
                                                            <option value="<?=$role['role'];?>" <?= $select;?>><?=$role['role'];?></option>
                                                        <?php 
                                                    endforeach;?>
                                                    </select>
                                                    </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary p-2" name="regist">register</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="admin/js/scripts.js"></script>
    </body>
</html>
