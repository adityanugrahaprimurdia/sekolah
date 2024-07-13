<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Tambah Guru - SMK N 1 PLUPUH";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = "";
}

$alert = '';

if ($msg == 'cancel') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" id="cancel" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i>Tambah guru gagal, NIP sudah ada.. 
  </div>';
}
if ($msg == 'notimage') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" id="notimage" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i>Tambah guru gagal, file yang anda upload bukan gambar.. 
  </div>';
}
if ($msg == 'oversieze') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" id="oversieze" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i>Tambah guru gagal, maximal ukuran gambar 1 MB.. 
  </div>';
}
if ($msg == 'added') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" id="added" role="alert">
    <i class="fa-solid fa-circle-check"></i>Tambah guru berhasil
  </div>';
}

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Guru</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a>
                <li class="breadcrumb-item"><a href="guru.php">Guru</a>
                </li>
                <li class="breadcrumb-item active">Tambah Guru</li>
            </ol>
            <form action="proses-guru.php" method="POST" enctype="multipart/form-data">
                <?php
                if ($msg != '') {
                    echo $alert;
                } ?>
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah Guru</span>
                        <button type="reset" name="reset" class="btn btn-danger float-end"><i class="fa-solid fa-circle-exclamation"></i> Reset</button>
                        <button type="submit" name="simpan" class="btn btn-primary float-end me-1"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3 row">
                                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                    <label for="nip" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="nip" pattern="[0-9]{15,}" title="minimal 15 angka" class="form-control ps-2 border-0 border-bottom" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <label for="nama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="nama" class="form-control ps-2 border-0 border-bottom" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="telpon" class="col-sm-2 col-form-label">Telpon</label>
                                    <label for="telpon" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="tel" name="telpon" pattern="[0-9]{5,}" title="minimal 5 angka" class="form-control ps-2 border-0 border-bottom" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                    <label for="agama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="agama" id="agama" class="form-select border-0 border-bottom" required>
                                            <option value="" selected>-- Pilih Agama --</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katholik">Katholik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="alamat" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4 text-center px-5">
                                <img src="../asset/image/default.png" class="mb-3" width="70%" alt="">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih foto PNG, JPG, JPEG dengan ukuran 1MB</small>
                                <div><small class="text-secondary">width = height</small></div>
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
                $('#added').fadeIn('slow');
                $('#cancel').fadeIn('slow');
                $('#oversieze').fadeIn('slow');
                $('#notimage').fadeIn('slow');
            }, 200)
            setTimeout(function() {
                $('#added').fadeOut('slow');
                $('#cancel').fadeOut('slow');
                $('#oversieze').fadeOut('slow');
                $('#notimage').fadeOut('slow');
            }, 2000)
        })
    </script>

    <?php
    require_once "../template/footer.php";
    ?>