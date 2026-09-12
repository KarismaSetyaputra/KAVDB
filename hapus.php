<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$id = $_GET['id'];

// Mengambil data siswa untuk menampilkan nama di dialog konfirmasi
$data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa='$id'");
$d = mysqli_fetch_array($data);

// Jika tombol "Ya, Hapus" diklik
if (isset($_POST['confirm_delete'])) {
    mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa='$id'");
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Hapus Data</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Overlay khusus untuk kotak dialog di tengah layar */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .modal-box {
            max-width: 420px;
            width: 90%;
            padding: 30px;
            text-align: center;
            background: var(--glass-bg, rgba(10, 35, 60, 0.85));
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid var(--glass-border, rgba(0, 212, 255, 0.3));
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5),
                        0 0 20px rgba(214, 40, 40, 0.2);
            position: relative;
            z-index: 11;
        }

        .modal-icon {
            font-size: 45px;
            margin-bottom: 15px;
            display: inline-block;
        }

        .modal-box h3 {
            color: #ffffff;
            font-size: 1.3rem;
            margin-bottom: 10px;
            text-shadow: 0 0 10px rgba(214, 40, 40, 0.5);
        }

        .modal-box p {
            font-size: 0.95rem;
            color: #e0f7fc;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .student-info {
            background: rgba(0, 0, 0, 0.25);
            padding: 10px;
            border-radius: 8px;
            border: 1px solid rgba(0, 212, 255, 0.15);
            margin-bottom: 20px;
            font-weight: 600;
            color: #00d4ff;
        }

        .button-group {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .btn-delete {
            background: linear-gradient(135deg, #d62828, #f77f00);
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(214, 40, 40, 0.3);
            width: 100%;
        }

        .btn-delete:hover {
            background: linear-gradient(135deg, #e63946, #ffb703);
            box-shadow: 0 0 15px rgba(214, 40, 40, 0.6);
            transform: translateY(-2px);
        }

        .btn-cancel {
            background: rgba(255, 255, 255, 0.1);
            color: #e0f7fc;
            border: 1px solid rgba(0, 212, 255, 0.3);
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            display: inline-block;
            text-align: center;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-cancel:hover {
            background: rgba(0, 212, 255, 0.2);
            color: #ffffff;
            border-color: #00d4ff;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="modal-overlay">
    <div class="modal-box">
        <div class="modal-icon">⚠️</div>
        <h3>Konfirmasi Hapus</h3>
        <p>Apakah Anda yakin ingin menghapus data siswa ini?</p>

        <?php if ($d): ?>
        <div class="student-info">
            <?= htmlspecialchars($d['nis']); ?> - <?= htmlspecialchars($d['nama']); ?>
        </div>
        <?php endif; ?>

        <form method="POST" style="padding:0; margin:0; background:transparent; border:none; box-shadow:none;">
            <div class="button-group">
                <button type="submit" name="confirm_delete" class="btn-delete">Ya, Hapus</button>
                <a href="dashboard.php" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</div>

<!-- Animasi Gelembung Aquatic Background -->
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>

</body>
</html>