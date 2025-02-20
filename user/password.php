<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}


require_once "../config.php";
$title = "Ganti Password";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

$alert = '';
if ($msg == 'updated') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" id="updated" role="alert">
    <i class="fa-solid fa-circle-check"></i>Ubah Kata Sandi berhasil !
  </div>';
}
if ($msg == 'err1') {
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-xmark"></i>Gagal Ganti Kata Sandi, konfirmasi kata sandi tidak sama !
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'err2') {
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-xmark"></i>Gagal ganti kata sandi, kata sandi lama tidak cocok  !
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Password</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a>
                </li>
                <li class="breadcrumb-item active">Ganti Password</li>
            </ol>
            <form action="proses-password.php" method="POST">
                <?php
                if ($msg !== '') {
                    echo $alert;
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Ganti Password</span>
                        <button type="reset" name="reset" class="btn btn-danger float-end "><i class="fa-solid fa-circle-exclamation"></i>Reset</button>
                        <button type="submit" name="simpan" class="btn btn-primary float-end me-1"><i class="fa-solid fa-floppy-disk"></i>Simpan</button>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-7">
                                <label for="curPass" class="form-label">Password Lama</label>
                                <input type="password" class="form-control" name="curPass" id="curPass" placeholder="Masukkan password anda saat ini !" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-7">
                                <label for="newPass" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" name="newPass" minlength="4" maxlength="20" id="newPass" placeholder="Masukkan password baru anda !" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-7">
                                <label for="confPass" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="confPass" minlength="4" maxlength="20" id="confPass" placeholder="konfirmasi password anda saat ini !" required>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#updated').fadeOut('slow');
            }, 2000)
        })
    </script>
    
    <?php

    require_once "../template/footer.php";

    ?>