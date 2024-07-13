<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit();
}
require_once "../config.php";


if (isset($_POST['simpan'])) {
    $pelajaran = htmlspecialchars($_POST['pelajaran']);
    $jurusan   = $_POST['jurusan'];
    $guru      = $_POST['guru'];

    // cek pelajaran kalau user input pelajaran dobel, kalau dobel akan dikemablikan

    $cekPelajaran = mysqli_query($koneksi, "SELECT * FROM tbl_pelajaran WHERE pelajaran = '$pelajaran'");

    // membuat query cek pelajaran yg dinput olh user di db
    if (mysqli_num_rows($cekPelajaran) > 0) {
        header("location:pelajaran.php?msg=cancel");
        return;
    }

    //simpan data di db
    mysqli_query($koneksi, "INSERT INTO tbl_pelajaran VALUES (null, '$pelajaran', '$jurusan', '$guru')");

    header("location:pelajaran.php?msg=added");
    return;
}

// fungsi pd tombol update

if (isset($_POST['update'])) {
    $id         = $_POST['id'];
    $pelajaran  = htmlspecialchars($_POST['pelajaran']);
    $jurusan    = $_POST['jurusan'];
    $guru       = $_POST['guru'];

    $queryPelajaran = mysqli_query($koneksi, "SELECT * FROM tbl_pelajaran WHERE id = $id");

    $data = mysqli_fetch_array($queryPelajaran);
    // untuk menyimpan pljrn lama curpljrn
    $curPelajaran = $data['pelajaran'];

    // query cek pelajaran yg baru diinpt olh user
    $cekPelajaran = mysqli_query($koneksi, "SELECT * FROM tbl_pelajaran WHERE pelajaran = '$pelajaran'");

    if ($pelajaran !== $curPelajaran) {
        if (mysqli_num_rows($cekPelajaran) > 0) {
            header("location:pelajaran.php?msg=cancelupdate");
            return;
        }
    }

    mysqli_query($koneksi, "UPDATE tbl_pelajaran SET pelajaran = '$pelajaran', jurusan = '$jurusan', guru = '$guru' WHERE id = $id");
    header("location:pelajaran.php?msg=updated");
}
