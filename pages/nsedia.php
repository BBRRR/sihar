<?php 
   @$cari = $_GET['cari'];
$n=1;
$bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
if ($cari=='ok') {
@$n=$_POST['bln'];
@$digit=strlen($_POST['bln']);
if ($digit=='1') { $blnn='0'.$_POST['bln'];}else{$blnn=$_POST['bln'];}
$query=mysql_query("select * from view_persediaan where show_komoditi='1' and bulan='".$blnn."' and tahun='".$_POST['thn']."'");
//echo "select * from view_persediaan where show_komoditi='1' and bulan='".$blnn."' and tahun='".$_POST['thn']."'";
}else
{
$query=mysql_query("select * from view_persediaan where show_komoditi='1' and bulan='05' and tahun='2016'");
}

?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Ketersediaan</a></div>
    <h1><center>Ketersediaan Kebutuhan Bahan Pokok</center></h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
    <div class="span3"></div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Cari</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="index.php?hal=sedia&cari=ok" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Pilih Bulan</label>
                <div class="controls">
                  <select id="bln" name="bln"  class="form-control">
               <option value=""><?php echo $bulan[$n]; ?></option>
                      <option value="1">Januari</option>
                    <option value="2">Februari</option>
                  <option value="3">Maret</option>
                    <option value="4">April</option>
                  <option value="5">Mei</option>
                    <option value="6">Juni</option>
                  <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                  <option value="9">September</option>
                  <option value="10">Oktober</option>
                    <option value="11">November</option>
                  <option value="12">Desember</option>
                 </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Pilih Tahun</label>
                <div class="controls">
                  <select id="thn" name="thn"  class="form-control">
      <option value="2020">2020</option>            
      <option value="2019">2019</option>
      <option value="2018">2018</option> 
      <option value="2017">2017</option>
      <option value="2016">2016</option>
      <option value="2015">2015</option>
    </select>
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
                  <th>Ketersediaan (Ton)</th>
                  <th>Kebutuhan(Ton)</th>
                  <th>Surplus/Minus (Ton)</th>
                </tr>
              </thead>
              <?php 
        $no=0; while ($s=mysql_fetch_object($query)) {$no++; 
  ?>
              <tbody>
              <tr>
                <td><div align="center"><?php echo $no; ?></div></td>
      <td><?php echo $s->NamaKomoditi; ?></td>
      <td><div align="right"><?php echo number_format ($s->Produksi, 2, ',', '.') ;?></div></td> 
    <td><div align="right"><?php echo number_format ($s->Konsumsi, 2, ',', '.') ;?></div></td>
    <td><div align="right"><?php echo number_format ($s->Jumlah, 2, ',', '.') ;?></div></td>
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
<div> <center>Data Konsumsi diambil dari data Survei Sosial Ekonomi Nasional (SUSENAS)  </center></div> </br>
   <div><center>Khusus data Konsumsi Ikan diambil dari data Dinas Perikanan Kabupaten Malang</center></div> </br>
