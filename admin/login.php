<?php
ob_start();
include ('../koneksi.php');
session_start(); // Memulai Session
$error=''; // Variabel untuk menyimpan pesan error

$username=$_POST['username'];
$password=$_POST['password'];



$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);


$query = mysql_query("select * from tbl_user where Username='$username' AND Password='$password'");
echo "select * from tbl_user where password='$password' AND username='$username'";
$r = mysql_fetch_object($query);
$dt= mysql_fetch_array($query);
if ($r->Username==$username) {
setcookie("Username",$username, time()+3600); // Membuat Sesi/session

header("location: index.php"); // Mengarahkan ke halaman profil


} else {
header("location: login2.php");
}

?>