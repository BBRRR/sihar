<?php 
include('koneksi.php'); 
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

?>
<?php $c=mysql_fetch_object($query); ?>
<script type="text/javascript" src="js/fusioncharts.js"></script>
<script type="text/javascript" src="js/themes/fusioncharts.theme.carbon.js"></script>

 <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Info Grafik </h4>
                </div>
            </div>
			<div class="row">
                <div class="col-md-12">
                <form action="stamantung.php" method="post">
					<table width="447" border="0" cellspacing="0" cellpadding="5">
					  <tr>
						<th width="207" scope="row"><div align="left">Perbandingan Harga</div></th>
						<td width="240"><div style="float:left "> <img src="../assets/img/<?php echo $c->status_perubahan.".png";?>" width="50" height="32"> 
				   </div></td>
					  </tr>
					  <tr>
					    <th scope="row"><div align="left">harga kemarin</div></th>
					    <td><?php echo "Rp ".number_format ($c->Harga_bef, 2, ',', '.') ;?> / <?php echo $c->Satuan;?></a></td>
				      </tr>
					  <tr>
					    <th scope="row"><div align="left">harga tekini</div></th>
					    <td><?php echo "Rp ".number_format ($c->Harga_aft, 2, ',', '.') ;?> / <?php echo $c->Satuan;?></td>
				      </tr>
                               
					  <tr>
						<th scope="row">&nbsp;</th>
						<td></td>
					  </tr>
					  <tr>
					    <th scope="row">&nbsp;</th>
					    <td>&nbsp;</td>
				      </tr>
					</table>
					</form>
                </div>
            </div>
				<script type="text/javascript">
				FusionCharts.ready(function () {
					var myChart = new FusionCharts({
					  "type": "line",
					  "renderAt": "chartContainer",
					  "width": "100%",
					  "height": "400",
					  "backgroundColor": "#29B0D0",
                    "borderColor": "#29B0D0",
                    "pointHoverBackgroundColor": "#ff0000",
                    "pointHoverBorderColor": "#00ff00",
					 
					  "dataFormat": "xml",
					  "dataSource": "<?php echo $xml; ?>"
					});
				
				  myChart.render();
				});
				</script>

  		<div id="chartContainer">FusionCharts XT will load here!</div>
  		&nbsp;
  		&nbsp;
  		<div class="row">
                <div class="col-md-12">
                <form action="stamantung.php" method="post">
					<table border="1px">
					  <tr>
						<th class="col-md-6">List Harga</th>
						<th class="col-md-6">Tanggal Perubahan</th>
					  </tr>
					  <?php 
					  	while($li = mysql_fetch_object($test)) {
					   ?>
					  <tr>
					    <td><?php echo "Rp ".number_format($li->Harga_aft); ?></a></td>
					    <td><?php echo "Tanggal  ".($li->date); ?></a></td>
				      </tr>
				      <?php 
				      		}
				       ?>
					</table>
					</form>
                </div>
            </div>
    </div>
</div>