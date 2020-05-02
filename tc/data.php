<?php
include("../koneksi.php");
if (isset($_POST['2019'])) {
    $IdKomoditi = $_POST['BE142'];
    $IdKecamatan = $_POST['27'];
    //$Bulan=$_POST['Bulan'];
    $Tahun = $_POST['2015'];
} else {
    $IdKomoditi = 'BE142';
    $IdKecamatan = '27';
    // $Bulan='01';
    $Tahun = '2015';
}
$query_dates = "SELECT NamaKomoditi, Harga_aft, date_format(Tanggal, '%d-%m-%y') as
date FROM trx_komoditi WHERE IdKomoditi='$IdKomoditi' and 
IdKecamatan='$IdKecamatan' and year(Tanggal)='$Tahun' order by Tanggal asc";
// echo "SELECT Kecamatan, NamaKomoditi, Harga_aft, date_format(Tanggal, '%d-%m-%y') as
//  date,date_format(Tanggal, '%M') as bln FROM trx_komoditi WHERE IdKomoditi='$IdKomoditi' and IdKecamatan='$IdKecamatan' and year(Tanggal)='$Tahun' order by Tanggal asc";
//$query_dates ="SELECT Kecamatan, NamaKomoditi, Harga_aft, date_format(Tanggal, '%d-%m-%y') as date,date_format(Tanggal, '%M') as bln FROM trx_komoditi WHERE IdKomoditi='$IdKomoditi' and IdKecamatan='$IdKecamatan' and month(Tanggal)='$Bulan' and year(Tanggal)='$Tahun' order by Tanggal asc";
$result = mysql_query($query_dates);
$head = mysql_query($query_dates);
$header = mysql_fetch_array($head);
$res = [];
while ($row = mysql_fetch_assoc($result)) {
    // print_r($row_dates);
    $res[] = $row;
    $harga = number_format($row_dates->Harga_aft, 2, ',', '.');
}

$res_json = json_encode($res);

function jsonToCSV($json, $cfilename)
{
    $data = json_decode($json, true);
    $fp = fopen($cfilename, 'w');
    foreach ($data as $row) {
        if (empty($header))
        {
            $header = array_keys($row);
            fputcsv($fp, $header);
            $header = array_flip($header);
        }
        fputcsv($fp, array_merge($header, $row));
    }
    fclose($fp);
    return;
}

$csv_filename = 'data.csv';

jsonToCSV($res_json, $csv_filename);
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'data.csv';
header("Location: http://$host$uri/$extra");

