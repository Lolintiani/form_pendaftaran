<?php
include 'koneksi.php';
session_start();

if (isset($_POST['login'])) {
    $nik = $_POST['nik'];
    $password = $_POST['password'];

    $data = mysqli_query($conn, "SELECT * FROM warga WHERE nik='$nik'");
    if (mysqli_num_rows($data) == 1) {
        $row = mysqli_fetch_assoc($data);
        if (password_verify($password, $row['password'])) {
            $_SESSION['nik'] = $nik;
            $_SESSION['nama'] = $row['nama'];
            header("Location: dashboard.php");
        } else {
            echo "<script>alert('Password salah');</script>";
        }
    } else {
        echo "<script>alert('NIK tidak ditemukan');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Warga RT 25</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #0099ff, #66ccff);
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
        <h2>Login Warga</h2>
        <input type="text" name="nik" placeholder="Masukkan NIK" required>
        <input type="password" name="password" placeholder="Masukkan Password" required>
        <input type="submit" name="login" value="Login">
        <p>Belum punya akun? <a href="daftar.php">Daftar di sini</a></p>
    </form>
</div>
</body>
</html>
