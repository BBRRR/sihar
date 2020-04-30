<?php 
include ('../koneksi.php');

	$username = stripslashes($_POST['username']);
	$pass = stripslashes($_POST['password']);
	$hak = stripslashes($_POST['hak']);
	$kecamatan = stripslashes($_POST['kecamatan']);
	$cekuser = mysql_query("select * from tbl_user where username = '$username'");
	if(mysql_num_rows($cekuser) > 0)
		{
			echo "<script>alert ('Username Sudah Terdaftar'); window.location = 'http://localhost/siharkepo/admin/tambah_akun.php';</script>";
		}
	else
		{
			$akun = "INSERT INTO tbl_user (Username,Password,hak,idKecamatan) VALUES ('$username', '$pass', '$hak', '$kecamatan')";
			if (mysql_query($akun))
			{
				echo "<script>alert ('Data berhasil disimpan'); window.location = 'http://localhost/siharkepo/admin/tambah_akun.php';</script>";
			}
			else
			{
				echo "<script>alert ('Data gagal disimpan'); window.location = 'http://localhost/siharkepo/admin/tambah_akun.php';</script>";
				
			}
		}

?>