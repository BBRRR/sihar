<?php 
include ('../koneksi.php');


	$username = $_POST['username'];
	$password = $_POST['password'];
	$pass_lama = $_POST['password_lama'];
	
	$query = mysql_query("select * from tbl_user where Username='". $_COOKIE['Username']."'");
	$dt= mysql_fetch_array($query);
	if ($pass_lama==$dt['Password'])
	{
	

		$up = "UPDATE tbl_user SET Username = '$username',  Password= '$password' WHERE IdUser = '". $dt['IdUser']."' ";
		$updt= mysql_query($up);
	
	if ($updt==1)
			{
	
				echo "<script>alert ('Data berhasil diupdate'); window.location = 'http://localhost/siharkepo/admin/';</script>";
			}
			else
			{
			
				echo "<script>alert ('Data gagal diupdate'); window.location = 'http://localhost/siharkepo/admin/edit_akun.php';</script>";
			}
	}
	else
	{
	echo "<script>alert ('Password Lama yang anda Masukkan Salah, Mohon Ulangi lagi!'); window.location = 'http://localhost/siharkepo/admin/edit_akun.php';</script>";
	}

?>