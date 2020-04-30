<?php 
include ('../koneksi.php');

   if($_GET['simpan']=="ok") {
   $query=mysql_query("Select count(NamaKomoditi) AS kd FROM tm_komoditi");
   $k=mysql_fetch_object($query);
   $kd=$k->kd+1;
   $IdKomoditi=strtoupper(substr(trim($_POST['Barang']),0,2)).strlen($_POST['Barang']).$kd;   
   $kecamatan=mysql_query("Select * from Kecamatan");
   $tm_komoditi=mysql_query("insert into tm_komoditi (AutoID, NamaKomoditi,Satuan,jenis_komoditi)values('$IdKomoditi','$_POST[Barang]','$_POST[Satuan]','$_POST[jenis]')");

   while ($pasar=mysql_fetch_object($kecamatan)){
   //$trx_komoditi=mysql_query("insert into trx_komoditi(Kecamatan,NamaKomoditi,Satuan,Harga_aft,jenis_komoditi)values('$pasar->Kecamatan','$_POST[Barang]','$_POST[Satuan]','$_POST[Harga]','$_POST[jenis]')");
   $komoditi=mysql_query("insert into komoditi(Kecamatan,IdKomoditi, NamaKomoditi,Satuan,Harga_aft,status_perubahan,perubahan_harga,harga_bef,jenis_komoditi)values('$pasar->Kecamatan','$IdKomoditi','$_POST[Barang]','$_POST[Satuan]','$_POST[Harga]','-','0','0','$_POST[jenis]')");
   
   }
  
   }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
 <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body>
<div class="content-wrapper">
 <div class="container">
 
    <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Update Ketersediaan Pangan Kabupaten Malang</h4>
                </div>
            </div>
 <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                         INSERT DAFTAR SEMBAKO
                        </div>
                        <div class="panel-body">
<form name="form1" method="post" action="index.php?menu=sembako&simpan=ok">

  <table width="100%"  border="0" cellspacing="0" cellpadding="10">
    <tr>
      <th height="35" scope="row">Nama</th>
      <td><input name="Barang" class="form-control" type="text" id="Barang"></td>
    </tr>
    <tr>
      <th width="20%" height="35" scope="row"><div align="left">Satuan</div></th>
      <td width="80%"><select name="Satuan"  class="form-control" id="Satuan">
	    <option value="Biji">Biji</option>
		<option value="Bungkus">Bungkus</option>
		<option value="Ekor">Ekor</option>
        <option value="Gram">Gram</option>
		<option value="Kg">Kg</option> 
		<option value="Kuintal">Kuintal</option>
		<option value="Liter">Liter</option>
		<option value="Lembar">Lembar</option>
		<option value="Lonjor">Lonjor</option>
		<option value="Meter">Meter</option>
	    <option value="Sak">Sak</option>
		<option value="Ons">Ons</option>
		<option value="Ton">Ton</option>



		
            </select></td>
    </tr>
  <!--  <tr>
      <th scope="row" height="35"><div align="left">Harga</div></th>
      <td><input name="Harga" class="form-control" type="text" id="Harga"></td>
    </tr>
	-->
	 <tr>
      <th scope="row" height="35"><div align="left">Jenis</div></th>
      <td><select name="jenis"  class="form-control" id="jenis">
        <option value="1">Sembako</option>
        <option value="2">Bahan Penting Lainnya</option>
            </select></td>
    </tr>
    <tr>
      <th scope="row" height="35">&nbsp;</th>
      <td><button type="submit" class="btn btn-default">Simpan</button></td>
    </tr>
  </table>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
 <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
