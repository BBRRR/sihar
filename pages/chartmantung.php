<?php 
include('../koneksi.php'); 
if (isset($_POST['Tahun'])){
	$IdKomoditi=$_POST['IdKomoditi'];
	 $IdKecamatan=$_POST['Kecamatan'];
	 //$Bulan=$_POST['Bulan'];
	 $Tahun=$_POST['Tahun'];

} else

{
     $IdKomoditi=$_GET['IdKomoditi'];
	 $IdKecamatan='34';
	// $Bulan='01';
	 $Tahun='2020';
}
$query_dates ="SELECT Kecamatan, NamaKomoditi, Harga_aft, date_format(Tanggal, '%d-%m-%y') as
 date,date_format(Tanggal, '%M') as bln FROM trx_komoditi WHERE IdKomoditi='$IdKomoditi' and IdKecamatan='$IdKecamatan' 
 and year(Tanggal)='$Tahun' order by Tanggal asc";
$query=mysql_query("select Kecamatan,IdKecamatan,IdKomoditi, NamaKomoditi,Harga_bef, Harga_aft,Satuan, DATE_FORMAT(DATE(Tanggal),'%d %M %Y') 
	AS Tanggal,jenis_komoditi,perubahan_harga,status_perubahan from view_komoditi3 where IdKecamatan='$IdKecamatan' and IdKomoditi='$IdKomoditi'");
//$query_dates ="SELECT Kecamatan, NamaKomoditi, Harga_aft, date_format(Tanggal, '%d-%m-%y') as date,date_format(Tanggal, '%M') as bln FROM trx_komoditi WHERE IdKomoditi='$IdKomoditi' and IdKecamatan='$IdKecamatan' and month(Tanggal)='$Bulan' and year(Tanggal)='$Tahun' order by Tanggal asc";
$result = mysql_query($query_dates);
$head = mysql_query($query_dates);
$test = mysql_query($query_dates);
$header=mysql_fetch_object($head);
//echo "SELECT Kecamatan, NamaKomoditi, Harga_aft, date_format(Tanggal, '%d-%m-%y') as date,date_format(Tanggal, '%M') as bln FROM trx_komoditi WHERE IdKomoditi='".$_POST['Barang']."' and IdKecamatan='".$_POST['Kecamatan']."' and month(Tanggal)='".$_POST['Bulan']."' and year(Tanggal)='".$_POST['Tahun']."' order by Tanggal asc";
@$xml= "<chart caption='Riwayat Perubahan Harga $header->NamaKomoditi'
 subcaption='Pasar $header->Kecamatan, Tahun $Tahun' xaxisname='Tanggal' 
 yaxisname='Harga' yAxisMinValue='1000' numDivLines='9' numberPrefix='Rp '
  palettecolors='#008ee4' bgalpha='0' borderalpha='20' canvasborderalpha='0' 
  theme='fint' useplotgradientcolor='0' plotborderalpha='10' placevaluesinside='1' 
  rotatevalues='2' valuefontcolor='#00000' captionpadding='20' showaxislines='1' axislinealpha='25' divlinealpha='10' formatNumberScale='0'> ";
while($row_dates = mysql_fetch_object($result)) {
$harga=number_format($row_dates->Harga_aft,2,',','.');
$xml = $xml."<set label='$row_dates->date' value='$row_dates->Harga_aft' />"; 
}

$xml = $xml."</chart>";

$c=mysql_fetch_object($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Siharkepo</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../asset/css/bootstrap.min.css" />
<link rel="stylesheet" href="../asset/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../asset/css/fullcalendar.css" />
<link rel="stylesheet" href="../asset/css/maruti-style.css" />
<link rel="stylesheet" href="../asset/css/maruti-media.css" class="skin-color" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="../tc/chart.css" />
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Maruti Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-messaages-->
<div class="btn-group rightzero"> <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a> <a class="top_message tip-bottom" title="Manage Users"><i class="icon-user"></i></a> <a class="top_message tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a> <a class="top_message tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a> </div>
<!--close-top-Header-messaages--> 

<!--top-Header-menu-->

<!--close-top-Header-menu-->

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a><ul>
    <li class="active"><a href="index.php?hal="><i class="icon icon-home"></i> <span>Halaman Utama</span></a> </li>
    <li> <a href="index.php?hal=mantung"><i class="icon icon-signal"></i> <span>STA Mantung</span></a> </li>
    <li> <a href="index.php?hal=kecamatan"><i class="icon icon-inbox"></i> <span>Info Harga Di Kecamatan</span></a> </li>
    <li><a href="index.php?hal=grafik"><i class="icon icon-th"></i> <span>Grafik Harga</span></a></li>
    <li><a href="index.php?hal=sedia"><i class="icon icon-fullscreen"></i> <span>Info Ketersediaan</span></a></li>
    <li><a href="index.php?hal=sinopsis"><i class="icon icon-tint"></i> <span>Tentang Kami</span></a></li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <h1>Detail Harga Sayur<?php echo "$c->NamaKomoditi";  ?> </h1>
  </div>
  <div class="container-fluid">
    <div class="widget-box widget-plain">
      <div class="center">
        <ul class="stat-boxes">
          <li>
            <div class="left peity_line_neutral"><img src="../assets/img/<?php echo $c->status_perubahan.".png";?>" width="50" height="32">
              <span></span></div>
            <div class="right"> <strong><?php $sisa=($c->Harga_aft/$c->Harga_bef)*100;echo number_format ($sisa, 2, ',', '.')."%"; ?></strong></div>
          </li>
          <li>
            <div class="right"> <strong>Harga kemarin</strong> <?php echo "Rp ".number_format ($c->Harga_bef, 2, ',', '.') ;?> / <?php echo $c->Satuan;?></div>
          </li>
          <li>
            <div class="right"> <strong>Harga Terbaru</strong> <?php echo "Rp ".number_format ($c->Harga_aft, 2, ',', '.') ;?> / <?php echo $c->Satuan;?> </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
          <h5>Site Analytics</h5>
          <div class="buttons"><a href="#" class="btn btn-mini btn-success"><i class="icon-refresh"></i> Update stats</a></div>
        </div>
        <div class="widget-content">
          <div class="row-fluid">
            <div class="span8">
              <div class="chart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>Data Harga Sayur<?php echo "$c->NamaKomoditi";  ?> </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>List Harga</th>
                  <th>Tanggal Perubahan</th>
                </tr>
              </thead>
              <tbody>
              	<?php 
					  	while($li = mysql_fetch_object($test)) {
					   ?>
					  <tr>
					    <td><center><?php echo "Rp ".number_format($li->Harga_aft); ?></center></td>
					    <td><center><?php echo "Tanggal  ".($li->date); ?></center></td>
				      </tr>
				      <?php 
				      		}
				       ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<div class="row-fluid">
  <div id="footer" class="span12"> 
  <p><a href="index.php?hal=kab">Komoditi Lainnya</a>  <a href="http://malangkab.go.id/">Kabupaten Malang</a></p>
  <P>Copyright 2020 &copy; siharkepo.malangkab.go.id </P>
  </div>
</div>
<script src="../asset/js/excanvas.min.js"></script> 
<script src="../asset/js/jquery.min.js"></script> 
<script src="../asset/js/jquery.ui.custom.js"></script> 
<script src="../asset/js/bootstrap.min.js"></script> 
<script src="../asset/js/jquery.flot.min.js"></script> 
<script src="../asset/js/jquery.flot.resize.min.js"></script> 
<script src="../asset/js/jquery.peity.min.js"></script> 
<script src="../asset/js/fullcalendar.min.js"></script> 
<script src="../asset/js/maruti.js"></script> 
<script src="../asset/js/maruti.dashboard.js"></script> 
<script src="../asset/js/maruti.chat.js"></script> 
 

<script type="../asset/text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="../tc/chart.js"></script> 
</body>
</html>