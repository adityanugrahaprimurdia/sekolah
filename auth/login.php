<?php


session_start();



if (isset($_SESSION["ssLogin"])) {
    header("location:../index.php");
    exit;
}

require_once "../config.php";


$sekolah = mysqli_query($koneksi, "SELECT * FROM tbl_sekolah WHERE id = 1");
$data = mysqli_fetch_array($sekolah);
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SMK N 1 PLUPUH</title>
    <link href="<?= $main_url ?>asset/sb-admin/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="<?= $main_url ?>asset/image/toga.png">

    <style>
        #bglogin {
            background-image: url("../asset/image/<?= $data['gambar'] ?>");
            background-size: cover;
            background-position: center center;
        }
    </style>
</head>

<body id="bglogin">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container mt-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login - SMK N 1 PLUPUH</h3>

                                </div>
                                <div class="card-body">
                                    <form action="proses-login.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="username" name="username" type="text" pattern="[A-Z-a-z-0-9]{3,}" title="kombinasi angka dan huruf minimal 3 karakter" placeholder="username" autocapitalize="off" required />
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" required />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary col-12 rounded-pill my-2">Login</button>
                                    </form>
                                    <!-- <p class="text-center">Belum memiliki akun? <a href="register.php">Register</a></p> -->
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="text muted small">SMK N 1 PLUPUH <?= date("Y") ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= $main_url ?>asset/sb-admin/js/scripts.js"></script>
</body>

</html>