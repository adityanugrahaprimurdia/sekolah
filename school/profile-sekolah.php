<?php


session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Profile Sekolah - SMK N 1 PLUPUH";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

// menampilkan pesan error atau peringatan kepada pengguna jika terjadi kesalahan dalam proses tambah user. 

$alert = '';
if ($msg == 'notimage') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i> Update data sekolah gagal, file yang anda upload bukan gambar.. 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'oversize') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i> Update data sekolah gagal, maximal ukuran gambar 1 MB.. 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'updated') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Data sekolah berhasil diupdate 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

$sekolah = mysqli_query($koneksi, "SELECT * FROM tbl_sekolah WHERE id = 1");
$data    = mysqli_fetch_array($sekolah);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Sekolah</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a>
                </li>
                <li class="breadcrumb-item active">Profile Sekolah</li>
            </ol>


            <form action="proses-sekolah.php" method="POST" enctype="multipart/form-data">
                <?php
                if ($msg !== '') {
                    echo $alert;
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-pen-to-square"></i>Data Sekolah</span>
                        <button type="reset" name="reset" class="btn btn-danger float-end"><i class="fa-solid fa-circle-exclamation"></i> Reset</button>
                        <button type="submit" name="simpan" class="btn btn-primary float-end me-1"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 text-center px-5">
                                <input type="hidden" name="gbrLama" value="<?= $data['gambar'] ?>">
                                <img src="../asset/image/<?= $data['gambar'] ?>" alt=" gambar sekolah" class="mb-3" width="100%">
                                <input type="file" name="image" class="from-control from-control-sm">
                                <small class="text-secondary">Pilih gambar PNG, JPG, JPEG dengan ukuran maximal 1 MB</small>
                            </div>
                            <div class="col-8">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <label for="nama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" class="form-control border-0 border-bottom " id="nama" name="nama" value="<?= $data['nama'] ?>" placeholder="nama sekolah" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <label for="email" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="email" class="form-control border-0 border-bottom " id="email" name="email" value="<?= $data['email'] ?>" placeholder="email sekolah" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <label for="status" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="status" id="status" class="form-select border-0 border-bottom" required>
                                            <option value="Negeri">Negeri</option>
                                            <option value="Swasta">Swasta</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="akreditasi" class="col-sm-2 col-form-label">Akreditasi</label>
                                    <label for="akreditasi" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="akreditasi" id="akreditasi" class="form-select border-0 border-bottom" required>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="nama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -47px;">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" required><?= $data['alamat'] ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="visimisi" class="col-sm-2 col-form-label">Visi dan Misi</label>
                                    <label for="visimisi" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -47px;">
                                        <textarea name="visimisi" id="visimisi" cols="30" rows="3" class="form-control" required><?= $data['visimisi'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>



    <?php

    require_once "../template/footer.php";

    ?>