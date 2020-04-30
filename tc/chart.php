<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="chart.css" />
</head>
<body>
<figure class="highcharts-figure">
    <div id="lc"></div>
</figure>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="chart.js"></script> 
 <?php
 include ("../koneksi.php");

if (isset($_POST['2019'])){
     $IdKomoditi=$_POST['BE142'];
     $IdKecamatan=$_POST['27'];
     //$Bulan=$_POST['Bulan'];
     $Tahun=$_POST['2015'];

} else

{
     $IdKomoditi='BE142';
     $IdKecamatan='27';
    // $Bulan='01';
     $Tahun='2015';
}
$query_dates ="SELECT Kecamatan, NamaKomoditi, Harga_aft, date_format(Tanggal, '%d-%m-%y') as
 date,date_format(Tanggal, '%M') as bln FROM trx_komoditi WHERE IdKomoditi='$IdKomoditi' and 
 IdKecamatan='$IdKecamatan' and year(Tanggal)='$Tahun' order by Tanggal asc";
// echo "SELECT Kecamatan, NamaKomoditi, Harga_aft, date_format(Tanggal, '%d-%m-%y') as
//  date,date_format(Tanggal, '%M') as bln FROM trx_komoditi WHERE IdKomoditi='$IdKomoditi' and IdKecamatan='$IdKecamatan' and year(Tanggal)='$Tahun' order by Tanggal asc";
//$query_dates ="SELECT Kecamatan, NamaKomoditi, Harga_aft, date_format(Tanggal, '%d-%m-%y') as date,date_format(Tanggal, '%M') as bln FROM trx_komoditi WHERE IdKomoditi='$IdKomoditi' and IdKecamatan='$IdKecamatan' and month(Tanggal)='$Bulan' and year(Tanggal)='$Tahun' order by Tanggal asc";
$result = mysql_query($query_dates);
$head = mysql_query($query_dates);
$header=mysql_fetch_object($head);
while($row_dates = mysql_fetch_object($result)) {
    print_r($row_dates);
$harga=number_format($row_dates->Harga_aft,2,',','.');
}

?>

</body>

</html>