<?php 
include ('../koneksi.php');

   if($_GET['simpan']=="ok") {
   $tanggal=date('Y-m-d');
   $simpan=mysql_query("insert into trx_komoditi(Kecamatan,NamaKomoditi,Harga_aft,Tanggal)values('$_POST[Kecamatan]','$_POST[Barang]','$_POST[Harga]','$tanggal')");
   $x=mysql_query("select * from komoditi where Kecamatan='".$_POST[Kecamatan]."' and NamaKomoditi='".$_POST[Barang]."'");
  //echo "insert into trx_komoditi(Kecamatan,NamaKomoditi,Harga_aft,Tanggal)values('$_POST[Kecamatan]','$_POST[Barang]','$_POST[Harga]','$tanggal')";
 // echo "select * from komoditi where Kecamatan='".$_POST[Kecamatan]."' and NamaKomoditi='".$_POST[Barang]."'";
  
   $data=mysql_fetch_object($x);
   $Harga_bef = $data->Harga_bef;
   $Harga_aft = $data->Harga_aft;
   
   if($_POST[Harga]==$Harga_aft){
   $status_perubahan = '-';
   $selisih =0;
   }
   if($_POST[Harga]>$Harga_aft){
   $status_perubahan = 'Up';
   $selisih = $_POST[Harga] - $Harga_aft;
   }
   if($_POST[Harga]<$Harga_aft){
   $status_perubahan = 'Down';
   $selisih =  $Harga_aft - $_POST[Harga];
   }
  
  
   $ubah=mysql_query("update komoditi set harga_aft=$_POST[Harga],tanggal=$tanggal ,harga_bef=$Harga_aft,perubahan_harga=$selisih,status_perubahan='".$status_perubahan."' where Kecamatan='".$_POST[Kecamatan]."' and NamaKomoditi='".$_POST[Barang]."' ");
    echo  "update komoditi set harga_aft=$_POST[Harga],Tanggal=$tanggal,harga_bef=$Harga_aft,perubahan_harga=$selisih,status_perubahan='".$status_perubahan."' where Kecamatan='".$_POST[Kecamatan]."' and NamaKomoditi='".$_POST[Barang]."'";
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
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                         UPDATE HARGA SEMBAKO
                        </div>
                        <div class="panel-body">
<form name="form1" method="post" action="addData.php?simpan=ok">

  <table width="100%"  border="0" cellspacing="0" cellpadding="10">
    <tr>
      <th width="20%" height="35" scope="row"><div align="left">Pasar</div></th>
      <td width="80%">
      <?php include('../class/cb_pasar.php'); ?></td>
    </tr>
    <tr>
      <th scope="row" height="35"><div align="left">Sembako </div></th>
      <td><?php include('../class/cb_sembako.php'); ?></td>
    </tr>
    <tr>
      <th scope="row" height="35"><div align="left">Harga</div></th>
      <td><input name="Harga" class="form-control" type="text" id="Harga"></td>
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


<div class="table-responsive">
					 
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nomer</th>
                                            <th>Nama Komoditas</th>
											<th>Harga Sebelumnya</th>
                                            <th>Harga Sekarang</th>
											<th># #</th>
                                            <th>edit</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
									   $no=0;
									   $query=mysql_query("select * from komoditi where Kecamatan='Kepanjen'");
										           while ($x=mysql_fetch_object($query)) {
										$no++;
										 ?>
                                        <tr> 
                                            <td># <?php echo $no;  ?></td>
                                            <td><?php echo $x->NamaKomoditi;  ?> </td>
											<td>
                                                <label class="label label-danger"><?php echo $x->Harga_bef." /".$x->Satuan;  ?> </label>
                                            </td>
                                            <td>
                                                <label class="label label-info"><?php echo $x->Harga_aft." /".$x->Satuan;  ?> </label>
                                            </td>
                                            <td> <?php if($x->status_perubahan=='Up') { ?><i class="fa fa-angle-up"></i> <?php }else{ ?><i class="fa fa-angle-down"></i> <?php  } ?>  <?php echo $x->perubahan_harga;  ?></td>
                                            <td><?php echo $x->Tanggal;  ?></td>
                                             
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
 <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
