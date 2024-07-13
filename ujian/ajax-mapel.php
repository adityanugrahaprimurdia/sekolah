<?php

require_once "../config.php";

$jurusan = $_GET['jurusan'];

$no = 1;
$queryPelajaran = mysqli_query($koneksi, "SELECT * FROM tbl_pelajaran WHERE jurusan = 'Umum' or jurusan = '$jurusan'");
while ($data = mysqli_fetch_array($queryPelajaran)) { ?>

    <tr>
        <td align="center"><?= $no++ ?></td>
        <td align="center"><input type="text" name="mapel[]" value="<?= $data['pelajaran'] ?>" class="border-0 bg-transparent col-12" readonly></td>
        <td align="center"><input type="text" name="jurus[]" value="<?= $data['jurusan'] ?>" class="border-0 bg-transparent col-12" readonly></td>
        <td align="center"><input type="number" name="nilai[]" value="0" min="0" max="100" step="5" class="form-control nilai text-center" onchange="fnhitung()"></td>
    </tr>

<?php
}
