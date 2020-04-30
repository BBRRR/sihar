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

<div id="content">
  <div class="container-fluid">
    <div class="row-fluid">
    <h4>
    	Update Ketersediaan Pangan Kabupaten Malang
    </h4>
    <div class="span3"></div>
      <div class="span6">
		<div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Daftar Ketersediaan Kabupaten Malang <?php  $tanggal=date('Y-m-d'); echo 'Tanggal '.date('Y-m-d'); ?></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nomer</th>
                  <th>Data Ketersediaan</th>
				   <th># #</th>
                </tr>
              </thead>
              <tbody>
               <?php $sedia=mysql_query("Select * from tm_komoditi where jenis_komoditi='3' and show_komoditi='1' order by NamaKomoditi asc"); $no=0; ?>
                    <tr>
                     <?php while ($s=mysql_fetch_object($sedia)) { $no++; ?>   
                        <td># <?php echo $no;  ?></td>
                        <td><?php echo $s->NamaKomoditi;  ?> </td>
                        <td>
                        	<center>
                        		<a href="#" class="btn btn-default" data-toggle="modal" data-target="#<?php echo $s->AutoID; ?>">Update</a>
                        	</center>
                        </td>
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
										<?php 
										$tanggal=date('d');
										$bulan= date('m');
										$thn= date('Y');
										?>
										<h5>Tanggal</h5>
										
										<select name="tgl"  id="tgl" class="form-control"   >
										
										<option <?php if ($tanggal=='1'){ echo "selected";}?> value="01">01</option>
										<option <?php if ($tanggal=='2'){ echo "selected";}?> value="02">02</option>
										<option <?php if ($tanggal=='3'){ echo "selected";}?> value="03">03</option>
										<option <?php if ($tanggal=='4'){ echo "selected";}?> value="04">04</option>
										<option <?php if ($tanggal=='5'){ echo "selected";}?> value="05">05</option>
										<option <?php if ($tanggal=='6'){ echo "selected";}?> value="06">06</option>
										<option <?php if ($tanggal=='7'){ echo "selected";}?> value="07">07</option>
										<option <?php if ($tanggal=='8'){ echo "selected";}?> value="08">08</option>
										<option <?php if ($tanggal=='9'){ echo "selected";}?> value="09">09</option>
										<option <?php if ($tanggal=='10'){ echo "selected";}?> value="10">10</option>
										<option <?php if ($tanggal=='11'){ echo "selected";}?> value="11">11</option>
										<option <?php if ($tanggal=='12'){ echo "selected";}?> value="12">12</option>
										<option <?php if ($tanggal=='13'){ echo "selected";}?> value="13">13</option>
										<option <?php if ($tanggal=='14'){ echo "selected";}?> value="14">14</option>
										<option <?php if ($tanggal=='15'){ echo "selected";}?> value="15">15</option>
										<option <?php if ($tanggal=='16'){ echo "selected";}?> value="16">16</option>
										<option <?php if ($tanggal=='17'){ echo "selected";}?> value="17">17</option>
										<option <?php if ($tanggal=='18'){ echo "selected";}?> value="18">18</option>
										<option <?php if ($tanggal=='19'){ echo "selected";}?> value="19">19</option>
										<option <?php if ($tanggal=='20'){ echo "selected";}?> value="20">20</option>
										<option <?php if ($tanggal=='21'){ echo "selected";}?> value="21">21</option>
										<option <?php if ($tanggal=='22'){ echo "selected";}?> value="22">22</option>
										<option <?php if ($tanggal=='23'){ echo "selected";}?> value="23">23</option>
										<option <?php if ($tanggal=='24'){ echo "selected";}?> value="24">24</option>
										<option <?php if ($tanggal=='25'){ echo "selected";}?> value="25">25</option>
										<option <?php if ($tanggal=='26'){ echo "selected";}?> value="26">26</option>
										<option <?php if ($tanggal=='27'){ echo "selected";}?> value="27">27</option>
										<option <?php if ($tanggal=='28'){ echo "selected";}?> value="28">28</option>
										<option <?php if ($tanggal=='29'){ echo "selected";}?> value="29">29</option>
										<option <?php if ($tanggal=='30'){ echo "selected";}?> value="30">30</option>
										<option <?php if ($tanggal=='31'){ echo "selected";}?> value="31">31</option>
										</select>

										<h5>Bulan</h5>
										<select name="bln"   id="bln" class="form-control">
										
										<option <?php if ($bulan=='1'){ echo "selected";}?> value="01">Januari</option>
										<option <?php if ($bulan=='2'){ echo "selected";}?> value="02">Februari</option>
										<option <?php if ($bulan=='3'){ echo "selected";}?> value="03">Maret</option>
										<option <?php if ($bulan=='4'){ echo "selected";}?> value="04">April</option>
										<option <?php if ($bulan=='5'){ echo "selected";}?> value="05">Mei</option>
										<option <?php if ($bulan=='6'){ echo "selected";}?> value="06">Juni</option>
										<option <?php if ($bulan=='7'){ echo "selected";}?> value="07">Juli</option>
										<option <?php if ($bulan=='8'){ echo "selected";}?> value="08">Agustus</option>
										<option <?php if ($bulan=='9'){ echo "selected";}?> value="09">September</option>
										<option <?php if ($bulan=='10'){ echo "selected";}?> value="10">Oktober</option>
										<option <?php if ($bulan=='11'){ echo "selected";}?> value="11">November</option>
										<option <?php if ($bulan=='12'){ echo "selected";}?> value="12">Desember</option>
										</select> 
										<h5>Tahun</h5> <input name="thn" type="text" value="<?php echo $thn;?>" class="form-control" >
											
										  

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
        </form>
        
         </div>
 	 </div>
 	 </div>
   </div>

 <script src="../assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../assets/js/bootstrap.js"></script>
