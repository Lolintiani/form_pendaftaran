<?php
include 'koneksi.php';

if (isset($_POST['daftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $cek = mysqli_query($conn, "SELECT * FROM warga WHERE nik='$nik'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('NIK sudah terdaftar');</script>";
    } else {
        mysqli_query($conn, "INSERT INTO warga (nik, nama, password) VALUES ('$nik', '$nama', '$password')");
        echo "<script>alert('Pendaftaran berhasil'); window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Warga RT 25</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #007bff, #66b2ff);
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-box {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 350px;
        }
        .form-box h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #007bff;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        input[type="submit"] {
            width: 100%;
            background: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        p {
            text-align: center;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <form class="form-box" method="POST">
        <h2>Pendaftaran Warga</h2>
        <input type="text" name="nik" placeholder="Masukkan NIK" required>
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="password" name="password" placeholder="Buat Password" required>
        <input type="submit" name="daftar" value="Daftar">
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </form>
</div>
</body>
</html>
