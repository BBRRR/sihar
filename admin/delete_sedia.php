<?PHP

   include "../koneksi.php";
 @$AutoID = $_GET['Id'];
    $dlt=mysql_query("DELETE FROM sedia WHERE Id='".$_GET['Id']."' ");

	if ($dlt){
 	echo "<script>alert('Data Berhasil di Hapus'); window.location = 'http://localhost/info1/admin/index.php?menu=sedia&delete_sedia=ok';</script>";
 }
 else {
 	echo "<script>alert('Gagal di Hapus'); window.location = 'http://localhost/info1/admin/index.php?menu=sedia';</script>";
 }
	
    
   

