<?php
session_start();

if (isset($_SESSION["admin"])) {
    header("Location:admin/index.php");
}
elseif (isset($_SESSION["user"])) {
    header("Location:admin/index.php");
}
require 'admin/config/conn.php';
require 'admin/config/function.php';
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND status='1'");
    $pass=mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) === 1) {
        if (password_verify($password, $pass['password'])){
            if($pass['role']!= 'user'){
            $_SESSION["admin"] = $pass['id_user'];
            header('Location:index.php');
            exit;
            }else{
            $_SESSION["user"] = $pass['id_user'];
            header('Location:index.php');
            }
        }
        $error = true;
    }
$error1 = true;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - CariIn</title>
        <link href="admin/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <?php if (isset($error)):?>
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <div>
                                            Password Anda Salah
                                        </div>
                                        </div>
                                        <?php endif;?>
                                    <?php if (isset($error1)):?>
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <div>
                                            Username Salah atau segera lakukan aktivasi
                                        </div>
                                        </div>
                                        <?php endif;?>
                                    <?php if (isset($invalid)):?>
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <div>
                                            Username belum di aktivasi
                                        </div>
                                        </div>
                                        <?php endif;?>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" name="email" type="text" placeholder="name@example.com" autocomplete="off"/>
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1 mb-4">
                                                <a class="small" href="ubahpassword.php">Lupa Password?</a>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1 mb-4">
                                                <a class="small" href="index.php">Akun Guest</a>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <button class="btn btn-primary btn-block px-4" name="login">Login</button>
                                            </div>
                                            <!-- <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div> -->
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Belum punya Akun? Daftar Disini!</a></div>
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
                            <div class="text-muted">Copyright &copy; CariIn 2023</div>
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
