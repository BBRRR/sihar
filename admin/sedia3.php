<?php
include ('../koneksi.php');
@$sim = $_GET['simpan'];
@$sat="Kg";
if($sim=="ok") {
$tanggal=date('Y-m-d');
$tgl2=$_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
$jml=$_POST['Produksi']-$_POST['Konsumsi'];

        $cek=mysql_query("select count(*) as total, Konsumsi,Produksi, Id from sedia where IdKomoditi='".$_POST['IdKomoditi']."' and month(Tanggal)='".$_POST['bln']."' and year(Tanggal)='".$_POST['thn']."' GROUP BY Id");
	 $ko=mysql_fetch_object($cek);
        @$total=$ko->total;
		@$Produksii=$ko->Produksi;
	    @$Konsumsii=$ko->Konsumsi;
	 @$Id=$ko->Id;
	 if ($total=="0" || $total=="" ) {
	
		$save=mysql_query("insert into sedia(IdKomoditi,NamaKomoditi,Satuan,Tanggal,Produksi,Konsumsi,Jumlah)values('$_POST[IdKomoditi]','$_POST[NamaKomoditi]','$sat','$tgl2','$_POST[Produksi]','$_POST[Konsumsi]','$jml')");
		}else {
		$save=mysql_query("update sedia set Produksi='$_POST[Produksi]' ,Konsumsi='$_POST[Konsumsi]',Jumlah='$jml' where Id='".$Id."'");
		}
}


?>

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
							  Daftar Sembako dan Komoditi Lainnya <?php  $tanggal=date('Y-m-d'); echo 'Tanggal '.date('Y-m-d'); ?>
							</div>
							<div class="panel-body">
							  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                              <thead>
								<tr>
                                  <th scope="row">Nomer</th>
                                  <td>Nama Sembako / Komoditi Lainnya</td>
                                  <td>##</td>
                                </tr>
                              </thead>  
							  <?php $sedia=mysql_query("Select * from tm_komoditi where jenis_komoditi='3' order by NamaKomoditi asc"); $no=0; ?>
							  <tbody>
							  <?php while ($s=mysql_fetch_object($sedia)) { $no++; ?>  
							  
							 

							  
								<tr>
                                  <th scope="row"><?php echo $no;  ?></th>
                                  <td><?php echo $s->NamaKomoditi;  ?></td>
                                  <td><a href="#" class="btn btn-default" data-toggle="modal" data-target="#<?php echo $s->AutoID; ?>">Update <?php echo $s->AutoID; ?></a></td>
                                </tr>
								
								
                            <form action="index.php?menu=sedia&simpan=ok" method="post">
                            <div class="modal fade" id="<?php echo $s->AutoID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <?php $rec=mysql_query("select * from sedia where MONTH(tanggal) < MONTH(CURDATE()) AND IdKomoditi='".$s->AutoID."' order by Tanggal desc"); 
							  
							 $d=mysql_fetch_object($rec);
								
								?>
								<div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                                            <h4 class="modal-title" id="myModalLabel">Update Ketersediaan</h4>
                                        </div>
                                        <div class="modal-body">
										
										<h5><?php @$NamaKomoditi =  $s->NamaKomoditi; echo $NamaKomoditi; ?></h5>
										<h5><?php @$Produksi = $d->Produksi; echo 'Produksi Bulan Sebelumnya '.$Produksi.' Ton'; ?></h5>
										<h5><?php @$Konsumsi = $d->Konsumsi; echo 'Konsumsi Bulan Sebelumnya '.$Konsumsi.' Ton'; ?></h5>
										<input name="tanggal" type="hidden" value="<?php echo $tanggal; ?>"><input name="AutoID" type="hidden" value="<?php echo $s->AutoID; ?>"><input name="IdKomoditi" type="hidden" value="<?php echo $s->AutoID; ?>"><input name="NamaKomoditi" type="hidden" value="<?php echo $s->NamaKomoditi; ?>">
                                        <div class="modal-header">
                                        </div>
										
										<h5>Tanggal</h5>
										
										<select name="tgl"  id="tgl">
										<option value="01">01</option>
										<option value="02">02</option>
										<option value="03">03</option>
										<option value="04">04</option>
										<option value="05">05</option>
										<option value="06">06</option>
										<option value="07">07</option>
										<option value="08">08</option>
										<option value="09">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
										<option value="21">21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>
										</select>-
										<select name="bln"   id="bln">
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
										</select> - <input name="thn" type="text" value="2015">
											
										  

										<h5>Produksi</h5>
										<input name="Produksi" class="form-control" type="text" id="Produksi" value="<?php echo $Produksii;  ?>">
										<h5>Konsumsi</h5>
										<input name="Konsumsi" class="form-control" type="text" id="Konsumsi" value="<?php echo $Konsumsii;  ?>">
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

					</div>
			</div>

 <script src="../assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../assets/js/bootstrap.js"></script>
