<?php
include ('../koneksi.php');
include('index.php'); 
?>

<div id="content">
      <div id="content-header">
                <h1>Form Edit Akun</h1>
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
                <h5>FORM EDIT AKUN OPERATOR</h5>
              </div>
              <div class="widget-content nopadding">
                <form id="form-wizard" class="form-horizontal" method="post" action="update_akun.php ">
                <?php 
                  include ('../koneksi.php');
                  $query = mysql_query("select * from tbl_user where Username='". $_COOKIE['Username']."'");
                  $dt= mysql_fetch_array($query);    
                ?>
                  <div id="form-wizard-1" class="step">
                    <div class="control-group">
                      <label class="control-label">Username</label>
                      <div class="controls">
                        <input id="username" type="text" name="username" value="<?php echo $dt['Username']?>" />
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Password Lama</label>
                      <div class="controls">
                        <input id="password_lama" type="password" name="password_lama" />
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Password</label>
                      <div class="controls">
                        <input id="password" type="password" name="password" />
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
      </div>
    </div>
    