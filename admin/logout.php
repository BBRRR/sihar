<?php
session_start();
session_destroy();
setcookie("Username", "", time()-3600);
echo "<script>alert('Terima kasih, Anda Berhasil Logout')</script>";
echo "<meta http-equiv='refresh' content='1 url=login.php'>";
?>

Logout Sukses, Kembali ke <a href="http://komoditi.malangkab.go.id">Halaman Utama </a>