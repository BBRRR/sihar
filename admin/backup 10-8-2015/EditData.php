<?php 
include ('../koneksi.php');

   if($_GET['simpan']=="ok") {
   $tanggal=date('Y-m-d');
   $tgl2=$_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
   $simpan=mysql_query("insert into trx_komoditi(Kecamatan,IdKomoditi,NamaKomoditi,Harga_aft,Tanggal)values('$_POST[Kecamatan]','$_POST[IdKomoditi]','$_POST[NamaKomoditi]','$_POST[Harga]','$tgl2')");
 
   
   //$data=mysql_fetch_object($x);
   $Harga_baru = $_POST['Harga'];
   $harga_lama=$_POST['Harga_aft'];
   //$Harga_aft = $data->Harga_aft;
   
   
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
     $ubah=mysql_query("update komoditi set harga_aft=$Harga_baru,tanggal=CURDATE(), Harga_bef=$harga_lama,perubahan_harga=$selisih,status_perubahan='".$status_perubahan."' where AutoID='".$_POST['AutoID']."'"); 
   }
?>


<body>
<div class="content-wrapper">
 <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line"><?php echo 'Daftar Komoditi Pasar :'.$_POST['Kecamatan']; ?></h4>
                </div>
            </div>
                          <div class="table-responsive">
					 
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nomer</th>
                                            <th>Nama Komoditas</th>
											<th>Harga Sebelumnya</th>
                                            <th>Harga Sekarang</th>
											<th># #</th>
                                            <th>edit</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
									   $no=0;
									   $query=mysql_query("select * from komoditi where Kecamatan='".$_POST['Kecamatan']."'");
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
                                                <label class="label label-info"><?php echo $x->Harga_aft." /".$x->Satuan;  ?> </label>
                                            </td>
                                            <td> <?php if($x->status_perubahan=='Up') { ?><i class="fa fa-angle-up"></i> <?php }else{ ?><i class="fa fa-angle-down"></i> <?php  } ?>  <?php echo $x->perubahan_harga;  ?></td>
                                            <td><a href="#" class="btn btn-default" data-toggle="modal" data-target="#<?php echo $x->AutoID; ?>">Update Harga</a></td>
                                             
                                        </tr>
										
                
                            <form action="index.php?menu=trx_update&simpan=ok" method="post">
                            <div class="modal fade" id="<?php echo $x->AutoID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel"><?php echo $x->NamaKomoditi;  ?></h4>
                                        </div>
                                        <div class="modal-body">
										<h4>Harga Lama</h4>
										<h4><?php echo $x->Harga_aft; ?></h4>
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
											
										<h4>Harga Baru</h4><input name="Harga_aft" type="hidden" value="<?php echo $x->Harga_aft; ?>"><input name="AutoID" type="hidden" value="<?php echo $x->AutoID; ?>"><input name="NamaKomoditi" type="hidden" value="<?php echo $x->NamaKomoditi; ?>"><input name="Kecamatan" type="hidden" value="<?php echo $x->Kecamatan; ?>"><input name="IdKomoditi" type="hidden" value="<?php echo $x->IdKomoditi; ?>">
										<input name="Harga" class="form-control" type="text" id="Harga">
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

