<?php 
include ('../koneksi.php');

?>

<div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Static table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="46">Nomer</th>
                  <th width="198">Nama Komoditas</th>
                  <th width="81">Satuan</th>
                  <th width="80"># #</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                 $no=0;
                 $query=mysql_query("select * from tm_komoditi order by NamaKomoditi");
                                      
                 while ($x=mysql_fetch_object($query)) {
                 $no++;
                 ?>
                    <tr> 
                        <td># <?php echo $no;  ?></td>
                        <td><?php echo $x->NamaKomoditi;  ?> </td>
                        <td>
                        <?php echo $x->Satuan;  ?> 
                        </td>
                        <td><a href="index.php?menu=update_bako&IdKomoditi=<?php echo $x->AutoID; ?>">Edit Data</a>|
                      | <a href="index.php?menu=delete_bako&IdKomoditi=<?php echo $x->AutoID; ?>">Hapus Data</a></td>
                    </tr>
                 <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

           
                          <div class="table-responsive">
                     
                      <h5>&nbsp;</h5>       
                        <div align="right"> </div>
                        <table width="835" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                        </table>
                                
                            
            </div>
    </div>
                            
                            
                            
                            
                            

