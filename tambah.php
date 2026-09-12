<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Stylings khusus untuk dropdown select agar sesuai tema Aquatic */
        select[name="jurusan"] {
            width: 100%;
            padding: 10px 14px;
            margin-bottom: 15px;
            background: rgba(4, 20, 36, 0.8);
            border: 1px solid var(--glass-border, rgba(0, 212, 255, 0.25));
            border-radius: 6px;
            color: #ffffff;
            font-size: 1rem;
            outline: none;
            cursor: pointer;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        select[name="jurusan"]:focus {
            border-color: var(--accent-cyan, #00d4ff);
            box-shadow: 0 0 10px var(--glow-color, rgba(0, 212, 255, 0.4));
        }

        select[name="jurusan"] option {
            background-color: #051d33;
            color: #ffffff;
            padding: 8px;
        }
    </style>
</head>
<body>

<form action="simpan.php" method="POST">
    <h2>Tambah Data Siswa</h2>

    <label>NIS</label>
    <input type="text" name="nis" required>

    <label>Nama</label>
    <input type="text" name="nama" required>

    <label>Jurusan</label>
    <select name="jurusan" required>
        <option value="" disabled selected>-- Pilih Jurusan --</option>
        <option value="RPL">RPL</option>
        <option value="TKJ 1">TKJ 1</option>
        <option value="TKJ 2">TKJ 2</option>
        <option value="BR 1">BR 1</option>
        <option value="BR 2">BR 2</option>
        <option value="AK 1">AK 1</option>
        <option value="AK 2">AK 2</option>
        <option value="MP 1">MP 1</option>
        <option value="MP 2">MP 2</option>
    </select>

    <label>Alamat</label>
    <textarea name="alamat" required></textarea>

    <button type="submit">Simpan</button>
    <br><br>
    <a href="dashboard.php">← Kembali ke Dashboard</a>
</form>

<!-- Gelembung Background Aquatic -->
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>

</body>
</html>