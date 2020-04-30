<?php 
   @$cari = $_GET['cari'];
   @$IdKecamatan = $_POST['IdKecamatan'];
   @$jenis_komoditi = $_POST['jenis_komoditi'];
   @$NamaKomoditi = str_replace("'","",$_POST['NamaKomoditi']);
   $no=0;
   $jenis=array('','','');

?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Kecamatan</a></div>
    <h1>Informasi Harga Bahan Pokok Kab Malang</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span3">
        
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Cari</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="index.php?hal=kab&cari=ok" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Pilih Kecamatan</label>
                <div class="controls">
                  <select id="IdKecamatan" name="IdKecamatan"  class="span5">
               <option value="Kepanjen"><?php if ($cari=="ok") { echo $IdKecamatan ;} else { echo "--Pilih Kecamatan--"; }?></option>
             <option value="Bantur">Bantur</option>
             <option value="Bululawang">Bululawang</option>
             <option value="Dampit">Dampit</option>
             <option value="Donomulyo">Donomulyo</option>
             <option value="Gondanglegi">Gondanglegi</option>
             <option value="Jabung">Jabung</option>
             <option value="Karangploso">Karangploso</option>
                       <option  value="Kepanjen">Kepanjen</option>
             <option value="Lawang">Lawang</option>
             <option value="Pakis">Pakis</option>
             <option value="Pakisaji">Pakisaji</option>
                       <option  value="Poncokusumo">Poncokusumo</option>
             <option value="Pujon">Pujon</option>
             <option value="Singosari">Singosari</option>
             <option value="Sumberpucung">Sumberpucung</option>
                       <option  value="Tajinan">Tajinan</option>
             <option value="Tumpang">Tumpang</option>
             <option value="Turen">Turen</option>
                       <option  value="Wajak">Wajak</option>
                    
  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Pilih Komoditi</label>
                <div class="controls">
                  <select id="jenis_komoditi" name="jenis_komoditi"  class="span5">
      <option  value="sembako"><?php if ($cari=="ok") { echo $jenis_komoditi ;} else { echo "--Pilih Komoditi--"; }?></option>
   
      
      
      
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
              <div class="control-group">
                <label class="control-label">Nama Komomuditi</label>
                <div class="controls">
                  <input type="text" name="NamaKomoditi" id="NamaKomoditi" placeholder="ketik nama komoditi ..." class="span5" />
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-success">Cari</button>
              </div>
            </form>
          </div>
          </div>
          </div>
          <div class="row-fluid">
          <div class="span12">  
          <div class="widget-box">
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
    $query=mysql_query($StrSQL." where IdKecamatan='1' and jenis_komoditi='sembako'");
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
      <td><?php echo $c->NamaKomoditi; ?></td>
      <td><div align="right"><?php echo "Rp ".number_format ($c->Harga_bef, 2, ',', '.') ;?> / <?php echo $c->Satuan;?></div></td> 
    <td><div align="right"><?php echo "Rp ".number_format ($c->Harga_aft, 2, ',', '.') ;?> / <?php echo $c->Satuan;?></div></td>
    <td><div align="right"><img src="asset/img/<?php echo $c->status_perubahan.".png";?>" width="20" height="10">  <?php echo "Rp ".number_format ($c->perubahan_harga, 2, ',', '.') ;?> | <?php $sisa=($c->perubahan_harga!=0)?($c->perubahan_harga/$c->Harga_bef) * 100:0; echo number_format ($sisa, 2, ',', '.')."%"; ?></div></td>
      <td><div align="right"><?php echo $c->Tanggal; ?> </div></td>
   <!--     <td><div align="right"><?php echo $c->jenis_komoditi; ?> </div></td> -->
  <!--   <td><div align="center"><a href="#grafik/{{val.IdKomoditi}}/{{val.IdKecamatan}}"><i class="fa fa-shield"></i> Graph </a></div></td> -->
     </tr>  
              </tr>
              </tbody>
              <?php } ?>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div><hr>
    </div>
</div>