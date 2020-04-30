<?PHP

   include "../koneksi.php";
   @$AutoID = $_GET['IdKomomiditi'];
    $dtl_tm=mysql_query("DELETE FROM tm_komoditi WHERE AutoID='".$_GET['IdKomoditi']."' ");
    $dlt_komo=mysql_query("DELETE FROM komoditi WHERE AutoID='".$_GET['IdKomoditi']."' ");
	if ($dtl_tm){
 	echo "<script>alert('Data Berhasil di Hapus'); window.location = 'http://localhost/siharkepo/admin/index.php?menu=sembako';</script>";
 }
 else {
 	echo "<script>alert('Gagal di Hapus'); window.location = 'http://localhost/siharkepo/admin/index.php?menu=sembako';</script>";
 }
	
    
   //echo "update tm_komoditi set NamaKomoditi='$_POST[Barang]', Satuan='$_POST[Satuan]',jenis_komoditi= '$_POST[jenis]' where AutoID='".$_POST['IdKomoditi']."'" ;

