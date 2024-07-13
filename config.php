<?php


$koneksi = mysqli_connect("localhost", "root", "", "db_sekolah");

// if (!$koneksi) {
//     die("Koneksi gagal : " . mysql_connect_error());
// }
$main_url = "http://localhost/sekolah/";


// fungsinya dari upload gambar
function uploadimg($url)
{
    $namafile   = $_FILES['image']['name'];
    $ukuran     = $_FILES['image']['size'];
    $error      = $_FILES['image']['error'];
    $tmp        = $_FILES['image']['tmp_name'];

    // cek file yg diupload
    $validExtension = ['jpg', 'jpeg', 'png'];
    $fileExtension  = explode('.', $namafile);
    $fileExtension  = strtolower(end($fileExtension));

    // mencocokan extensi file yang diupload sama yang diperbolehkan
    if (!in_array($fileExtension, $validExtension)) {
        header("location:" . $url . '?msg=notimage');
        die;
    }

    // cek ukuran gambar
    if ($ukuran > 1000000) {
        header("location:" . $url . '?msg=oversize');
        die;
    }


    // generete name file gambar
    if ($url == 'profile-sekolah.php') {
        $namafilebaru = rand(0, 50) . '-bgLogin.' . $fileExtension;
    } else {
        $namafilebaru = rand(10, 1000) . '-' . $namafile;
    }


    // upload gambar
    move_uploaded_file($tmp, "../asset/image/" . $namafilebaru);
    return $namafilebaru;
}
