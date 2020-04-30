<?php 
include ('../koneksi.php');

@$sim = $_GET['simpan'];
$upd=mysql_query("select * from tm_komoditi where AutoID='".$_GET['IdKomoditi']."'");
$x=mysql_fetch_object($upd);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<body>

<div id="content">
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box" style="text-align: center">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>UPDATE DAFTAR SEMBAKO</h5>
          </div>
          <div class="widget-content nopadding">
            <form name="form1" method="post" class="form-horizontal addbako" action="index.php?menu=sembako&update_bako=ok">
              <div class="control-group">
                <label class="control-label">Nama</label>
                <div class="controls">
                  <input name="IdKomoditi" type="hidden" value=<?php  echo $x->AutoID;?>><input name="Barang" class="form-control" type="text" id="Barang" value="<?php echo $x->NamaKomoditi ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Satuan</label>
                <div class="controls">
                  <select name="Satuan"  class="form-control" id="Satuan">
                    <option value="<?php  echo $x->Satuan;?>"><?php  echo $x->Satuan;?></option>
                    <option value="Biji">Biji</option>
                    <option value="Bungkus">Bungkus</option>
                    <option value="Ekor">Ekor</option>
                    <option value="Gram">Gram</option>
                    <option value="Kg">Kg</option> 
                    <option value="Kuintal">Kuintal</option>
                    <option value="Liter">Liter</option>
                    <option value="Lembar">Lembar</option>
                    <option value="Lonjor">Lonjor</option>
                    <option value="Meter">Meter</option>
                    <option value="Sak">Sak</option>
                    <option value="Ons">Ons</option>
                    <option value="Ton">Ton</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Jenis</label>
                <div class="controls">
                  <select name="jenis"  class="form-control" id="jenis">
                    <option value="sembako">Sembako</option>
                    <option value="bahan_Lainnya">Bahan Penting Lainnya</option>
                    <option value="Ketersediaan">Ketersediaan</option>
                    <option value="sayuran">sayuran</option>
                    <option value="Daging">Daging</option>
                    <option value="Ikan">Ikan</option>
                    <option value="Susu">Susu</option>
                    <option value="Bawang">Bawang</option>
                    <option value="Biji Bijian">Biji Bijian</option>
                  </select>
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div><hr>
  </div>
</div>
</body>
</html>
