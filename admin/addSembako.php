<?php 
include ('../koneksi.php');

@$sim = $_GET['simpan'];

if($sim=="ok") {
   
   if ($_POST['jenis']=="3") {
   $kode=mysql_query("Select count(NamaKomoditi) AS kde FROM tm_komoditi");
   $ko=mysql_fetch_object($kode);
   @$kde=$ko->kde+1;
   @$IdKomoditi=strtoupper(substr(trim($_POST['Barang']),0,2)).strlen($_POST['Barang']).$kde;   
   $tm_komoditi=mysql_query("insert into tm_komoditi (AutoID, NamaKomoditi,Satuan,jenis_komoditi,pasar)values('$IdKomoditi','$_POST[Barang]'
    ,'$_POST[Satuan]','3','$_POST[Pasar_Mantung]')");
   
   } else {
   
   $query=mysql_query("Select count(NamaKomoditi) AS kd FROM tm_komoditi");
   $k=mysql_fetch_object($query);
   @$kd=$k->kd+1;
   @$IdKomoditi=strtoupper(substr(trim($_POST['Barang']),0,2)).strlen($_POST['Barang']).$kd;   
   $kecamatan=mysql_query("Select * from kecamatan where status=1");
   $tm_komoditi=mysql_query("insert into tm_komoditi (AutoID, NamaKomoditi,Satuan,jenis_komoditi,pasar)values('$IdKomoditi','
    $_POST[Barang]','$_POST[Satuan]','$_POST[jenis]','$_POST[Pasar_Mantung]')");
    echo  "insert into tm_komoditi (AutoID, NamaKomoditi,Satuan,jenis_komoditi,pasar)values('$IdKomoditi','$_POST[Barang]',
      '$_POST[Satuan]','$_POST[jenis]','$_POST[Pasar_Mantung]')";


   while ($pasar=mysql_fetch_object($kecamatan)){
   @$IdKecamatan=$pasar->AutoID;
   @$NamaKecamatan=$pasar->Kecamatan;
   $komoditi=mysql_query("insert into komoditi(IdKecamatan, Kecamatan,IdKomoditi, NamaKomoditi,Satuan,
    Harga_aft,status_perubahan,perubahan_harga,harga_bef,jenis_komoditi)values('$IdKecamatan','$NamaKecamatan','$IdKomoditi',
    '$_POST[Barang]','$_POST[Satuan]','0','-','0','0','$_POST[jenis]')");  
  
   }
   }
   }

@$upd = $_GET['update_bako'];
@$AutoID = $_GET['IdKomomiditi'];

if ($upd=="ok") {
    $tm=mysql_query("update tm_komoditi set NamaKomoditi='$_POST[Barang]', Satuan='$_POST[Satuan]',jenis_komoditi= '$_POST[jenis]' where AutoID='".$_POST['IdKomoditi']."' ");
    $komo=mysql_query("update komoditi NamaKomoditi='$_POST[Barang]', Satuan='$_POST[Satuan]',jenis_komoditi= '$_POST[jenis]' where AutoID='".$_POST['IdKomoditi']."' ");
    
   //echo "update tm_komoditi set NamaKomoditi='$_POST[Barang]', Satuan='$_POST[Satuan]',jenis_komoditi= '$_POST[jenis]' where AutoID='".$_POST['IdKomoditi']."'" ;

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
  
  
  
  <script type="text/javascript" src="../assets/js/jquery-1.7.1.min.js"></script>
 <script>
 //Inisiasi awal penggunaan jQuery
 $(document).ready(function(){
  //Pertama sembunyikan elemen class gambar
        $('.gambar').hide();        

  //Ketika elemen class tampil di klik maka elemen class gambar tampil
        $('.tampil').click(function(){
   $('.gambar').show();
        });

 });
 </script>
</head>


<body>

<div id="content">
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <center><h4>menampilkan semua komoditi</h4></center>
        <?php include('view_bako.php'); ?>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
    <div class="span3">
      
    </div>
      <div class="span6">
        <div class="widget-box" style="text-align: center">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>INSERT DAFTAR SEMBAKO</h5>
          </div>
          <div class="widget-content nopadding">
            <form name="form1" method="post" class="form-horizontal addbako" action="index.php?menu=sembako&simpan=ok">
              <div class="control-group">
                <label class="control-label">Nama</label>
                <div class="controls">
                  <input name="Barang" class="form-control" type="text" id="Barang">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Satuan</label>
                <div class="controls">
                  <select name="Satuan"  class="form-control" id="Satuan">
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
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Jenis</label>
                <div class="controls">
                  <select name="jenis"  class="form-control" id="jenis">
                    <option value="sembako">Sembako</option>
                    <option value="bahan_Lainnya">Bahan Penting Lainnya</option>
                    <option value="Ketersediaan">Ketersediaan</option>
                    <option value="sayuran">sayuran</option>
                    <option value="Daging">Daging</option>
                    <option value="Ikan">Ikan</option>
                    <option value="Susu">Susu</option>
                    <option value="Bawang">Bawang</option>
                    <option value="Biji Bijian">Biji Bijian</option>
                  </select>
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div><hr>
  </div>
</div>
</body>
</html>
