<?php 
include('koneksi.php'); 

if (isset($_POST['Tahun'])){
     $IdKomoditi=$_POST['Barang'];
	 $IdKecamatan=$_POST['Kecamatan'];
	 //$Bulan=$_POST['Bulan'];
	 $Tahun=$_POST['Tahun'];

} else

{
     $IdKomoditi='BE142';
	 $IdKecamatan='1';
	// $Bulan='01';
	 $Tahun='2020';
}
$query_dates ="SELECT Kecamatan, NamaKomoditi, Harga_aft, date_format(Tanggal, '%d-%m-%y') as
 date,date_format(Tanggal, '%M') as bln FROM trx_komoditi WHERE IdKomoditi='$IdKomoditi' and IdKecamatan='$IdKecamatan' and year(Tanggal)='$Tahun' order by Tanggal asc";
echo "SELECT Kecamatan, NamaKomoditi, Harga_aft, date_format(Tanggal, '%d-%m-%y') as
 date,date_format(Tanggal, '%M') as bln FROM trx_komoditi WHERE IdKomoditi='$IdKomoditi' and IdKecamatan='$IdKecamatan' and year(Tanggal)='$Tahun' order by Tanggal asc";
//$query_dates ="SELECT Kecamatan, NamaKomoditi, Harga_aft, date_format(Tanggal, '%d-%m-%y') as date,date_format(Tanggal, '%M') as bln FROM trx_komoditi WHERE IdKomoditi='$IdKomoditi' and IdKecamatan='$IdKecamatan' and month(Tanggal)='$Bulan' and year(Tanggal)='$Tahun' order by Tanggal asc";
$result = mysql_query($query_dates);
$head = mysql_query($query_dates);
$header=mysql_fetch_object($head);
//echo "SELECT Kecamatan, NamaKomoditi, Harga_aft, date_format(Tanggal, '%d-%m-%y') as date,date_format(Tanggal, '%M') as bln FROM trx_komoditi WHERE IdKomoditi='".$_POST['Barang']."' and IdKecamatan='".$_POST['Kecamatan']."' and month(Tanggal)='".$_POST['Bulan']."' and year(Tanggal)='".$_POST['Tahun']."' order by Tanggal asc";
@$xml= "<chart caption='Riwayat Perubahan Harga $header->NamaKomoditi' subcaption='Pasar $header->Kecamatan, Tahun $Tahun' xaxisname='Tanggal' yaxisname='Harga' yAxisMinValue='1000' numDivLines='9' numberPrefix='Rp '  palettecolors='#008ee4' bgalpha='0' borderalpha='20' canvasborderalpha='0' theme='fint' useplotgradientcolor='0'   plotborderalpha='10' placevaluesinside='1' rotatevalues='2' valuefontcolor='#00000' captionpadding='20' showaxislines='1'   axislinealpha='25' divlinealpha='10' formatNumberScale='0'> ";
while($row_dates = mysql_fetch_object($result)) {
$harga=number_format($row_dates->Harga_aft,2,',','.');
$xml = $xml."<set label='$row_dates->date' value='$row_dates->Harga_aft' />"; 
}

$xml = $xml."</chart>";

?>


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
                    <form action="chart/data_chart.php" method="post">
					<table width="447" border="0" cellspacing="0" cellpadding="5">
					  <tr>
						<th width="207" scope="row"><div align="left">Pasar</div></th>
						<td width="240"><?php 
														$pasar=mysql_query("Select * from kecamatan where status=1 order by Kecamatan asc");
														?>
														<select name="Kecamatan"  class="form-control" id="Kecamatan">
														<?php while($p=mysql_fetch_object($pasar)) {  ?>
																<option value=<?php echo $p->AutoID; ?>><?php echo $p->Kecamatan; ?></option>
														<?php } ?>
														</select></td>
					  </tr>
					  <tr>
					    <th scope="row"><div align="left">Bahan Pokok/Lainnya</div></th>
					    <td><select name="Barang"  class="form-control" id="Barang">
                          <option value="-">Pilih</option>
                          <?php
 $bako=mysql_query("SELECT * from tm_komoditi order by NamaKomoditi asc");
 while($b=mysql_fetch_object($bako)) {  ?>
                          <option value=<?php echo $b->AutoID; ?>><?php echo $b->NamaKomoditi; ?></option>
                          <?php } ?>
                        </select></td>
				      </tr>
					<!--  <tr>
						<th scope="row"><div align="left">Bulan</div></th>
						<td><select class="form-control" name="Bulan">
						<option value="01">Januari</option>
						<option value="02">Februari</option>
						<option value="03">Maret</option>
						<option value="04">April</option>
						<option value="05">Mei</option>
						<option value="06">Juni</option>
						<option value="07">Juli</option>
						<option value="08">Agustus</option>
						<option value="09">September</option>
						<option value="10">Oktober</option>
						<option value="11">November</option>
						<option value="12">Desember</option>
						</select></td>
					  </tr> -->
					  <tr>
					    <th scope="row"><div align="left">Tahun</div></th>
					    <td><input name="Tahun" type="text" class="form-control" value="2019" size="3"></td>
				      </tr>
                               
					  <tr>
						<th scope="row">&nbsp;</th>
						<td><button type="submit" class="btn btn-default">Tampilkan Grafik</button></td>
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
					 
					  "dataFormat": "xml",
					  "dataSource": "<?php echo $xml; ?>"
					});
				
				  myChart.render();
				});
				</script>

  <div id="chartContainer">FusionCharts XT will load here!</div>
  
    </div>
</div>