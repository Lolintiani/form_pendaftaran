<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['nik'])) {
    header("Location: login.php");
    exit;
}

$nik = $_SESSION['nik'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM warga WHERE nik='$nik'"));
$semua = mysqli_query($conn, "SELECT * FROM warga");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Warga RT 25</title>
    <style>
        body { background: #f0f8ff; font-family: Arial; }
        .box { background: #ffffff; padding: 20px; margin: 20px auto; width: 90%; border-radius: 10px; }
        h2 { color: #007bff; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; }
        th { background: #cce5ff; }
        a { color: #007bff; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Selamat datang, <?= $_SESSION['nama'] ?></h2>
        <p><strong>NIK:</strong> <?= $data['nik'] ?></p>
        <h3>Informasi Bantuan</h3>
        <ul>
            <li>Bantuan Sembako Tahap 1 - April 2025</li>
            <li>Bantuan Kesehatan Gratis - Mei 2025</li>
        </ul>

        <h3>Daftar Warga Terdaftar</h3>
        <table>
            <tr><th>No</th><th>NIK</th><th>Nama</th></tr>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($semua)) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nik'] ?></td>
                    <td><?= $row['nama'] ?></td>
                </tr>
            <?php } ?>
        </table>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
