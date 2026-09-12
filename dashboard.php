<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$total = mysqli_query($koneksi, "SELECT * FROM siswa");
$jumlah = mysqli_num_rows($total);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container">
    <h2>Dashboard</h2>
    <p>Total Siswa : <?= $jumlah; ?></p>

    <a href="tambah.php">Tambah Siswa</a> | <a href="logout.php">Logout</a>
    <br><br>

    <table>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM siswa");
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['nis']; ?></td>
            <td><?= $d['nama']; ?></td>
            <td><?= $d['jurusan']; ?></td>
            <td><?= $d['alamat']; ?></td>
            <td>
                <a href="edit.php?id=<?= $d['id_siswa']; ?>">Edit</a> | 
                <a href="hapus.php?id=<?= $d['id_siswa']; ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>

</body>
</html>