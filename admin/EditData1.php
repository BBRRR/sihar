<?php 
include ('../koneksi.php');
@$sim = $_GET['simpan'];


   if($sim=="ok") {
   
   $tanggal=date('Y-m-d');
   $tgl2=$_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
   
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


<body>
<div class="content-wrapper">
 <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line"><?php
					 $pas=mysql_query("Select * from Kecamatan where AutoId='".$_POST['IdKecamatan']."'"); 
					 $pp=mysql_fetch_object($pas);
					 echo 'Daftar Komoditi Pasar :'.$pp->Kecamatan; ?></h4>
                </div>
            </div>
                          <div class="table-responsive">
					  <form action="index.php?menu=trx_update&simpan=ok" method="post">
					  <h5>&nbsp;</h5>
										
						<div align="right">
						  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <th width="15%" scope="row">&nbsp;</th>
                                            <td width="50%"><div align="right">Tanggal </div></td>
                                            <td width="35%">										       <div align="right">
  <select name="tgl"  id="tgl">
 <?php if($sim=="ok") { ?>
                    <option value="<?php echo $_POST['tgl']; ?>"><?php echo $_POST['tgl']; ?></option>
				<?php	} ?>

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
                    </select>
  -
  <select name="bln"   id="bln">
   <?php if($sim=="ok") { ?>
                    <option value="<?php echo $_POST['bln']; ?>"><?php switch ($_POST['bln']){case '01': echo "Januari";break;case '02': echo "Februari";break;case '03': echo "Maret";break;case '04': echo "April";break;case '05': echo "Mei";break;case '06': echo "Juni";break;case '07': echo "Juli";break;case '08': echo "Agustus";break;case '09': echo "September";break;case '10': echo "Oktober";break;case '11': echo "November";break;case '12': echo "Desember";break;} ?></option>
				<?php	} ?>
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
  </select>
  -
  <input name="thn" type="text" value="2015">
                                            </div></td>
                                          </tr>
                                        </table>
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
									   $query=mysql_query("select * from komoditi where IdKecamatan='".$_POST['IdKecamatan']."' order by jenis_komoditi, NamaKomoditi asc");
										//echo      "select * from komoditi where IdKecamatan='".$_POST['IdKecamatan']."' order by jenis_komoditi, NamaKomoditi asc";     
												   while ($x=mysql_fetch_object($query)) {
										$no++;
										 ?>
                                        <tr> 
                                            <td># <?php echo $no;  ?></td>
                                            <td><?php echo $x->NamaKomoditi;  ?> </td>
											<td>
                                                <label class="label label-danger"><?php echo number_format($x->Harga_bef,2,',','.')." /".$x->Satuan;  ?> </label>
                                            </td>
                                            <td>                                              
                                                <input name="Harga<?php echo $no;  ?>" type="text" value="<?php echo $x->Harga_aft;  ?>">
                                                <?php echo $x->Satuan;  ?> 
												<input name="maks" type="hidden" value="<?php echo $no;  ?>">
												<input name="Harga_aft<?php echo $no;  ?>" type="hidden" value="<?php echo $x->Harga_aft; ?>"><input name="AutoID<?php echo $no;  ?>" type="hidden" value="<?php echo $x->AutoID; ?>"><input name="NamaKomoditi<?php echo $no;  ?>" type="hidden" value="<?php echo $x->NamaKomoditi; ?>"><input name="Kecamatan" type="hidden" value="<?php echo $x->Kecamatan; ?>"><input name="IdKecamatan" type="hidden" value="<?php echo $x->IdKecamatan; ?>"><input name="IdKomoditi<?php echo $no;  ?>" type="hidden" value="<?php echo $x->IdKomoditi; ?>">
                                            </td>
                                            <td> <?php if($x->status_perubahan=='Up') { ?><i class="fa fa-angle-up"></i> <?php }else{ ?><i class="fa fa-angle-down"></i> <?php  } ?>  <?php echo number_format($x->perubahan_harga,2,',','.');  ?></td>
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
							</form>
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
</body>

