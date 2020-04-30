<?php 
   @$cari = $_GET['cari'];
   @$IdKecamatan = $_POST['IdKecamatan'];
   @$jenis_komoditi = $_POST['jenis_komoditi'];
   @$NamaKomoditi = str_replace("'","",$_POST['NamaKomoditi']);
   $no=0;
   $jenis=array('','','');

?>

<div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>Daftar Harga Pasar Mantung</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Komoditi</th>
                  <th>Harga Lama(Rp)</th>
                  <th>Harga Baru(Rp)</th>
                  <th>Selisih</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <?php 

   @$StrSQL = "select Kecamatan,IdKecamatan,IdKomoditi, NamaKomoditi,Harga_bef, Harga_aft,Satuan, DATE_FORMAT(DATE(Tanggal),'%d %M %Y') AS Tanggal,jenis_komoditi,perubahan_harga,status_perubahan from view_komoditi3";
   if ($cari=="") {
    $query=mysql_query($StrSQL." where IdKecamatan='34' and jenis_komoditi='sayuran'");
    } else {
    $StrSQL = $StrSQL." where kecamatan = '".$IdKecamatan."' and jenis_komoditi = '".$jenis_komoditi."' ";
    if ($NamaKomoditi<>"") {
    $StrSQL = $StrSQL." and NamaKomoditi like '%".$NamaKomoditi."%'"; 
    }
    $query=mysql_query($StrSQL);
   }
  while ($c=mysql_fetch_object($query)){
  $no++;
  ?>
              <tbody>
              <tr>
                <td><div align="center"><?php echo $no; ?></div></td>
      <td><a href="pages/chartmantung.php?IdKomoditi=<?php echo $c->IdKomoditi;?>"><?php echo $c->NamaKomoditi; ?></td>
      <td><div align="right"><?php echo "Rp ".number_format ($c->Harga_bef, 2, ',', '.') ;?> / <?php echo $c->Satuan;?></a></div></td> 
    <td><div align="right"><?php echo "Rp ".number_format ($c->Harga_aft, 2, ',', '.') ;?> / <?php echo $c->Satuan;?></div></td>
    <td><div align="right"><img src="asset/img/<?php echo $c->status_perubahan.".png";?>" width="20" height="10">  <?php echo "Rp ".number_format ($c->perubahan_harga, 2, ',', '.') ;?> | <?php $sisa=($c->perubahan_harga!=0)?($c->perubahan_harga/$c->Harga_bef) * 100:0; echo number_format ($sisa, 2, ',', '.')."%"; ?></div></td>
      <td><div align="right"><?php echo $c->Tanggal; ?> </div></td>
              </tr>
              </tbody>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>