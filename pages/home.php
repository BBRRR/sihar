<?php $query=mysql_query("select Kecamatan,IdKecamatan,IdKomoditi,gambar, NamaKomoditi,Harga_bef, Harga_aft,Satuan, DATE_FORMAT(DATE(Tanggal),'%d %M %Y') AS Tanggal,jenis_komoditi,perubahan_harga,status_perubahan from view_komoditi3 where IdKecamatan=1
 and show_gb=1"); 
?>


<div id="content-header">
  <div class="container-fluid">
   	<div class="quick-actions_homepage">
    <ul class="quick-actions">
          <li> <a href="#"> <i class="icon-dashboard"></i> Home </a> </li>
          <li> <a href="#"> <i class="icon-shopping-bag"></i> Harga Terkini</a> </li>
          <li> <a href="#"> <i class="icon-web"></i> Stok Sembako </a> </li>
          <li> <a href="#"> <i class="icon-people"></i> Tentang Kami </a> </li>
          <li> <a href="#"> <i class="icon-calendar"></i> Jadwal Panen </a> </li>
        </ul>
   </div>
   <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
          <h5>Site Analytics</h5>
          <div class="buttons"><a href="#" class="btn btn-mini btn-success"><i class="icon-refresh"></i> Update stats</a></div>
        </div>
        <div class="widget-content">
          <div class="row-fluid">
            <div class="span8">
              <div class=""><iframe src="tc/chart.php" width="950" height="450"></iframe></div>
            </div>
            <div class="span4">
              <ul class="stat-boxes2">
                <li>
                  <div class="left peity_bar_neutral"><span><span style="display: none;">2,4,9,8,12,10,12</span>
                    <canvas width="50" height="24"></canvas>
                    </span>+10%</div>
                  <div class="right"> <strong>15598</strong> Visits </div>
                </li>
                <li>
                  <div class="left peity_line_good"><span><span style="display: none;">12,6,9,13,14,10,17</span>
                    <canvas width="50" height="24"></canvas>
                    </span>+60%</div>
                  <div class="right"> <strong>936</strong> Register </div>
                </li>
                <li>
                  <div class="left peity_line_neutral"><span><span style="display: none;">10,15,8,14,13,10,10,15</span>
                    <canvas width="50" height="24"></canvas>
                    </span>10%</div>
                  <div class="right"> <strong>150</strong> New Users </div>
                </li>
                <li>
                  <div class="left peity_bar_bad"><span><span style="display: none;">3,5,6,16,8,10,6</span>
                    <canvas width="50" height="24"></canvas>
                    </span>-40%</div>
                  <div class="right"> <strong>4560</strong> Orders</div>
                </li>
                <li>
                  <div class="left peity_line_good"><span><span style="display: none;">12,6,9,13,14,10,17</span>
                    <canvas width="50" height="24"></canvas>
                    </span>+60%</div>
                  <div class="right"> <strong>936</strong> Register </div>
                </li>
                <li>
                  <div class="left peity_line_neutral"><span><span style="display: none;">10,15,8,14,13,10,10,15</span>
                    <canvas width="50" height="24"></canvas>
                    </span>10%</div>
                  <div class="right"> <strong>150</strong> New Users </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
    <div class="widget-box widget-plain">
      <div class="center">
        <ul class="stat-boxes">
        <?php while ($x=mysql_fetch_object($query)) { ?>
          <li >
            <div class="left peity_bar_neutrali"><img src="asset/img2/<?php echo $x->gambar;?>" width="65" height="45"><span>
              </span><?php echo $x->NamaKomoditi; $tgl=$x->Tanggal;?></div>
            <div class="right"> <strong><?php echo "Rp ".number_format ($x->Harga_aft, 2, ',', '.') ;?> / <?php echo $x->Satuan;?></strong> <img src="asset/img/<?php echo $x->status_perubahan.".png";?>" width="34" height="13"> sebelumnya <?php echo "Rp ".number_format ($x->Harga_bef, 2, ',', '.') ;?>  </div>
          </li>
          <?php } ?>
        </ul>
      </div>
      <div class="12">
        Update tanggal :  <?php echo  $tgl;?>  </br> 
      </div>
    </div>
    </div>
   </div>
   </div>