<?php 
include ('../koneksi.php');

@$sim = $_GET['simpan'];


   if($sim=="ok") {
   
  $tgl2=date('Y-m-d');
   //$tgl2=$_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
   
   for($i=1;$i<=$_POST["maks"];$i++)
   {
   $IdKecamatan=$_POST["IdKecamatan"];
   $kecamatan=$_POST["Kecamatan"];
   $IdKomoditi=$_POST["IdKomoditi$i"];
   $NamaKomoditi=$_POST["NamaKomoditi$i"];
   $Harga=$_POST["Harga$i"];
   $AutoID=$_POST["AutoID$i"];
   $Harga_baru= $Harga;
   $harga_lama=$_POST["Harga_aft$i"];
   $simpan=mysql_query("insert into trx_komoditi(IdKecamatan,Kecamatan,IdKomoditi,NamaKomoditi,Harga_aft,Tanggal)values('$IdKecamatan','$kecamatan','$IdKomoditi','$NamaKomoditi','$Harga','$tgl2')");
   //echo "Id".$IdKecamatan;
    //echo "insert into trx_komoditi(IdKecamatan,Kecamatan,IdKomoditi,NamaKomoditi,Harga_aft,Tanggal)values('$IdKecamatan','$kecamatan','$IdKomoditi','$NamaKomoditi','$Harga','$tgl2')";

   if($Harga_baru==$harga_lama){
   $status_perubahan = '-';
   $selisih =0;
   }
   if($Harga_baru>$harga_lama){
   $status_perubahan = 'Up';
   $selisih = $Harga_baru - $harga_lama;
   }
   if($Harga_baru<$harga_lama){
   $status_perubahan = 'Down';
   $selisih =  $harga_lama - $Harga_baru;
   }
     $ubah=mysql_query("update komoditi set harga_aft=$Harga_baru,tanggal='".$tgl2."', Harga_bef=$harga_lama,perubahan_harga=$selisih,status_perubahan='".$status_perubahan."' where AutoID='$AutoID'"); 
     //echo $tgl2;
     // echo "update komoditi set harga_aft=$Harga_baru,tanggal='".$tgl2."', Harga_bef=$harga_lama,perubahan_harga=$selisih,status_perubahan='".$status_perubahan."' where AutoID='$AutoID'";
   }	
   }
?>

<div class="content-wrapper">
 <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line"><?php
							
					$pas=mysql_query("Select * from Kecamatan  INNER JOIN tbl_user ON tbl_user.idKecamatan = kecamatan.AutoID WHERE tbl_user.Username = '". $_COOKIE['Username']."'"); 
					 $pp=mysql_fetch_object($pas);
					 echo 'Update Harga Komoditi Pasar :'.$pp->Kecamatan; ?></h4>
                </div>
            </div>
                          <div class="table-responsive">
					  <form action="index.php?menu=update&simpan=ok" method="post">
					  <h5>&nbsp;</h5>
										
						<div align="right">
						  <?php 
										$tanggal=date('d');
										$bulan= date('m');
										$thn= date('Y');
										?>
										Tanggal <select name="tgl"  id="tgl">
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
										
										<select name="bln"   id="bln" >
										
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
										<input name="thn" type="text" value="<?php echo $thn;?>"  >
                          </div>
										<table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nomer</th>
                                            <th>Nama Komoditas</th>
											<th>Harga Sebelumnya</th>
                                            <th>Harga Sekarang</th>
											<th># #</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
									   $no=0;
									   
									   $query=mysql_query("SELECT * FROM komoditi INNER JOIN tbl_user ON tbl_user.idKecamatan      = komoditi.IdKecamatan WHERE tbl_user.Username = '". $_COOKIE['Username']."' and jenis_komoditi <> '3' order by jenis_komoditi, NamaKomoditi asc ");
										//echo      "select * from komoditi where IdKecamatan='".$_POST['IdKecamatan']."' order by jenis_komoditi, NamaKomoditi asc";     
												   while ($x=mysql_fetch_object($query)) {
										$no++;
										 ?>
                                        <tr> 
                                            <td># <?php echo $no;  ?></td>
                                            <td><?php echo $x->NamaKomoditi;  ?> </td>
											<td>
                                                <label class="label label-danger"><?php echo $x->Harga_bef." /".$x->Satuan;  ?> </label>
                                            </td>
                                            <td>                                              
                                                <input name="Harga<?php echo $no;  ?>" type="text" value="<?php echo $x->Harga_aft;  ?>">
                                                <?php //echo $x->Satuan;  ?> 
												 
												<input name="maks" type="hidden" value="<?php echo $no;  ?>">
												<input name="Harga_aft<?php echo $no;  ?>" type="hidden" value="<?php echo $x->Harga_aft; ?>"><input name="AutoID<?php echo $no;  ?>" type="hidden" value="<?php echo $x->AutoID; ?>"><input name="NamaKomoditi<?php echo $no;  ?>" type="hidden" value="<?php echo $x->NamaKomoditi; ?>"><input name="Kecamatan" type="hidden" value="<?php echo $x->Kecamatan; ?>"><input name="IdKecamatan" type="hidden" value="<?php echo $x->IdKecamatan; ?>"><input name="IdKomoditi<?php echo $no;  ?>" type="hidden" value="<?php echo $x->IdKomoditi; ?>">
                                            </td>
                                            <td> <?php if($x->status_perubahan=='Up') { ?><i class="fa fa-angle-up"></i> <?php }else{ ?><i class="fa fa-angle-down"></i> <?php  } ?>  <?php echo $x->perubahan_harga;  ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
								<table width="100%"  border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <th scope="row"><div align="right">
                                      <input type="submit" value="Simpan Semua">
                                    </div></th>
                                  </tr>
                                </table>
							</form >
								<div class="row">
                                   <div class="col-md-12">
                                       <a href="index.php?menu=update"  class="btn btn-xs btn-primary">Kembali</a>
			                       </div>
            </div>
    </div>
  </div>
</div>			
							
 <script src="../assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../assets/js/bootstrap.js"></script>
	

