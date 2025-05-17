<?php
session_start();
session_unset();
session_destroy();
header("Location: daftar.php"); // Arahkan ke halaman login
exit();
