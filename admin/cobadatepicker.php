
<?php
include ('../koneksi.php');
@$sim = $_GET['simpan'];
@$sat="Kg";
if($sim=="ok") {
$tanggal=date('Y-m-d');
$tgl2=$_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
$jml=$_POST['Produksi']-$_POST['Konsumsi'];

        $cek=mysql_query("select count(*) as total, Id from sedia where IdKomoditi='".$_POST['IdKomoditi']."' and month(Tanggal)='".$_POST['bln']."' and year(Tanggal)='".$_POST['thn']."' GROUP BY Id");
	 $ko=mysql_fetch_object($cek);
        @$total=$ko->total;
	 @$Id=$ko->Id;
	 if ($total=="0" || $total=="" ) {
	
		$save=mysql_query("insert into sedia(IdKomoditi,Satuan,Tanggal,Produksi,Konsumsi,Jumlah)values('$_POST[IdKomoditi]','$sat','$tgl2','$_POST[Produksi]','$_POST[Konsumsi]','$jml')");
		}else {
		$save=mysql_query("update sedia set Produksi='$_POST[Produksi]' ,Konsumsi='$_POST[Konsumsi]',Jumlah='$jml' where Id='".$Id."'");
		}
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
	
	<link rel="stylesheet" type="text/css" href="../assets/jquery-ui/jquery-ui.css">
<script src="../assets/jquery-ui/jquery.js"></script>
<script src="../assets/jquery-ui/jquery-ui.js"></script>
<script>
		$(function() {
		$( "#tanggal" ).datepicker();
		});
</script>
	
	
</head>

<body>
<div class="content-wrapper">
 <div class="container">
 
    
   <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Update Ketersediaan Pangan Kabupaten Malang</h4>
                </div>
            </div>
			
			 <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
							<div class="panel-heading">
							  Daftar Ketersediaan Kabupaten Malang <?php  $tanggal=date('Y-m-d'); echo 'Tanggal '.date('Y-m-d'); ?>
							
							</div>
							<div class="panel-body">
							  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                              <thead>
								<tr>
                                  <th scope="row">Nomer</th>
                                  <td>Data Ketersediaan</td>
                                  <td>##</td>
                                </tr>
                              </thead>  
							  <?php $sedia=mysql_query("Select * from tm_komoditi where jenis_komoditi='3' and show_komoditi='1' order by NamaKomoditi asc"); $no=0; ?>
							  <tbody>
							  <?php while ($s=mysql_fetch_object($sedia)) { $no++; ?>  
							  
							 

							  
								<tr>
                                  <th scope="row"><?php echo $no;  ?></th>
                                  <td><?php echo $s->NamaKomoditi;  ?></td>
                                  <td><a href="#" class="btn btn-default" data-toggle="modal" data-target="#<?php echo $s->AutoID; ?>">Update</a>  <a href="index.php?menu=delete_sedia&Id=<?php echo $s->AutoID; ?>" class="btn btn-default" >Delete</a></td>
                                </tr>
								
								
                            <form action="index.php?menu=sedia&simpan=ok" method="post">
                            <div class="modal fade" id="<?php echo $s->AutoID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <?php $rec=mysql_query("select * from sedia where MONTH(tanggal) < MONTH(CURDATE()) AND IdKomoditi='".$s->AutoID."' order by Tanggal desc"); 
							  
							 $d=mysql_fetch_object($rec);
								
								?>
								<div class="modal-dialog">
                                    <div class="modal-content">
									
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Update Ketersediaan</h4>
                                        </div>
                                        <div class="modal-body">
										
										<h5><?php @$NamaKomoditi =  $s->NamaKomoditi; echo $NamaKomoditi; ?></h5>
										<h5><?php @$Produksi = $d->Produksi; echo 'Produksi Bulan Sebelumnya '.$Produksi.' Kg'; ?></h5>
										<h5><?php @$Konsumsi = $d->Konsumsi; echo 'Konsumsi Bulan Sebelumnya '.$Konsumsi.' Kg'; ?></h5>
										<input name="tanggal" type="hidden" value="<?php echo $tanggal; ?>"><input name="AutoID" type="hidden" value="<?php echo $s->AutoID; ?>"><input name="IdKomoditi" type="hidden" value="<?php echo $s->AutoID; ?>"><input name="NamaKomoditi" type="hidden" value="<?php echo $s->NamaKomoditi; ?>">
                                        <div class="modal-header">
                                        </div>
										
										
										<h5>Tanggal</h5>
										<input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" required/>
										<h5>Produksi</h5>
										<input name="Produksi" class="form-control" type="text" id="Produksi" value="<?php echo $Produksi;  ?>">
										<h5>Konsumsi</h5>
										<input name="Konsumsi" class="form-control" type="text" id="Konsumsi" value="<?php echo $Konsumsi;  ?>">
										</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-default">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							</form>
                 
							  <?php } ?>
							  </tbody>
							  </table>
							</div>
						</div>
					</div>
			</div>





 <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
