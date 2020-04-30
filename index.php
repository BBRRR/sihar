<?php include ("koneksi.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Siharkepo</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="asset/css/bootstrap.min.css" />
<link rel="stylesheet" href="asset/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="asset/css/fullcalendar.css" />
<link rel="stylesheet" href="asset/css/maruti-style.css" />
<link rel="stylesheet" href="asset/css/maruti-media.css" class="skin-color" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="tc/chart.css" />
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
    <?php 
    @$hal = $_GET['hal'];
    if ($hal=='') {include('pages/home.php');}
    if ($hal=='kecamatan') {include('pages/per_kecamatan.php');}
    if ($hal=='grafik') {include('chart/data_chart.php');}
    if ($hal=='sedia') {include('pages/nsedia.php');}
    if ($hal=='sinopsis') {include('pages/sinopsis.html');}
    if ($hal=='kab') {include('pages/kab_kategori.php');}
    if ($hal=='mantung') {include('pages/stamantung.php');}
    ?>
</div>
</div>
</div>
<div class="row-fluid">
  <div id="footer" class="span12"> 
  <p><a href="index.php?hal=kab">Komoditi Lainnya</a>  <a href="http://malangkab.go.id/">Kabupaten Malang</a></p>
  <P>Copyright 2020 &copy; siharkepo.malangkab.go.id </P>
  </div>
</div>
<script src="asset/js/excanvas.min.js"></script> 
<script src="asset/js/jquery.min.js"></script> 
<script src="asset/js/jquery.ui.custom.js"></script> 
<script src="asset/js/bootstrap.min.js"></script> 
<script src="asset/js/jquery.flot.min.js"></script> 
<script src="asset/js/jquery.flot.resize.min.js"></script> 
<script src="asset/js/jquery.peity.min.js"></script> 
<script src="asset/js/fullcalendar.min.js"></script> 
<script src="asset/js/maruti.js"></script> 
<script src="asset/js/maruti.dashboard.js"></script> 
<script src="asset/js/maruti.chat.js"></script> 
 

<script type="asset/text/javascript">
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
<script src="tc/chart.js"></script> 
</body>
</html>
