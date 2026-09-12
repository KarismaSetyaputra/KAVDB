<?php

include "koneksi.php";

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];

mysqli_query($koneksi, "
    INSERT INTO siswa
    VALUES (
        '',
        '$nis',
        '$nama',
        '$jurusan',
        '$alamat'
    )
");

header("Location: dashboard.php");

?>