<body>

<div id="content">
  <div class="container-fluid">
    <div class="row-fluid">
    <div class="span3">
      
    </div>
      <div class="span6">
        <div class="widget-box" style="text-align: center">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Update Harga</h5>
          </div>
          <div class="widget-content nopadding">
            <form name="form1" method="post" class="form-horizontal addbako" action="index.php?menu=trx_update">
              <div class="control-group">
                <label class="control-label">Pilih Pasar</label>
                <div class="controls">
                  <?php 
                    $pasar=mysql_query("Select * from kecamatan where status=1 order by Kecamatan asc"); 
                    ?>
                    <select name="IdKecamatan"  class="form-control" id="IdKecamatan">
                    <?php while($p=mysql_fetch_object($pasar)) {  ?>
                    <option value=<?php echo $p->AutoID; ?>><?php echo $p->Kecamatan; ?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-success">Cari</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div><hr>
  </div>
</div>
</body>