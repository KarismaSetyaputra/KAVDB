<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi, "
    SELECT * FROM siswa
    WHERE id_siswa='$id'
");

$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
    <!-- Menghubungkan ke file CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<form action="update.php" method="POST">
    <h2>Edit Data Siswa</h2>

    <input type="hidden" name="id" value="<?= $d['id_siswa']; ?>">

    <label>NIS</label>
    <input type="text" name="nis" value="<?= $d['nis']; ?>">

    <label>Nama</label>
    <input type="text" name="nama" value="<?= $d['nama']; ?>">

    <label>Jurusan</label>
    <input type="text" name="jurusan" value="<?= $d['jurusan']; ?>">

    <label>Alamat</label>
    <textarea name="alamat"><?= $d['alamat']; ?></textarea>

    <button type="submit">Update</button>
    <br><br>
    <a href="dashboard.php">← Batal / Kembali</a>
</form>

<!-- Gelembung Background Aquatic -->
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>

</body>
</html>