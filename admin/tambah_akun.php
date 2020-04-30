
<?php
include ('../koneksi.php');
include('index.php'); 
?>

<div id="content">
			<div id="content-header">
                <h1>Form Pendaftaran Admin</h1>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
				<div class="span4"></div>
					<div class="span4">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-pencil"></i>
								</span>
								<h5>FORM TAMBAH AKUN OPERATOR</h5>
							</div>
							<div class="widget-content nopadding">
								<form id="form-wizard" class="form-horizontal" method="post" action="input_akun.php">
									<div id="form-wizard-1" class="step">
										<div class="control-group">
											<label class="control-label">Username</label>
											<div class="controls">
												<input id="username" type="text" name="username" />
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Password</label>
											<div class="controls">
												<input id="password" type="password" name="password" />
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Hak Akses</label>
											<div class="controls">
												<select name="hak"  class="form-control" id="hak">
												<option value="admin">Admin</option>
												<option value="persediaan">Ketersediaan</option>
              									<option value="sembako">Sembako</option>
              									<option value="mantung">Mantung</option>
											</select>
											</div>
											</div>
										<div class="control-group">
											<label class="control-label">Kecamatan</label>
											<div class="controls">
												<select name="kecamatan"  class="form-control" id="kecamatan">
												<?php
													$query = "select * from kecamatan"; //tabel yang dipilih
													$result = mysql_query($query);
													while($row = mysql_fetch_array($result)) {
												?>
												<option value="<?php echo $row['AutoID']?>"> <?php echo $row['Kecamatan']?> </option>
												<?php } ?>
											</select>
											</div>
											</div>
										</div>
									</div>
									<div class="form-actions">
											<input id="next" class="btn btn-primary" type="submit" value="Next" />
											<div id="status"></div>
									</div>
								</form>
                                </div>
							</div>
						</div>
					<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Static table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  	<th>ID User</th>
        			<th>Username</th>                    
        			<th>Password</th>
					<th>Hak</th>                    
        			<th>Kecamatan</th>
                </tr>
              </thead>
              <tbody>
                <?php
		
		
		$q = mysql_query("SELECT tbl_user.IdUser, tbl_user.Username, tbl_user.Password, tbl_user.hak, kecamatan.Kecamatan from tbl_user inner join kecamatan on tbl_user.idKecamatan = kecamatan.AutoID ") or die(mysql_error('Error'));
		
		while($row = mysql_fetch_row($q))
		{
		
		print"
			<tr>
						
			<td align=center>".$row[0]."
			</td>
			<td align=center>".$row[1]."
			</td>
			<td align=center>".$row[2]."
			</td>
			<td align=center>".$row[3]."
			</td>
			<td align=center>".$row[4]."
			</td>
			";
		}
		
?>
              </tbody>
            </table>
          </div>
        </div>
        
					</div>
				</div>
				
				
			</div>
		</div>
		