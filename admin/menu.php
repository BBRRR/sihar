<?php include('../koneksi.php'); ?>
<body>
<!--Header-part-->
<div id="header">
  <h1><a href="#">Maruti Admin</a></h1>
</div>
<!--close-Header-part--> 
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
  <?php 
      $query = mysql_query("select * from tbl_user where Username='". $_COOKIE['Username']."'");
      $dt= mysql_fetch_array($query);
      if($dt['hak']<>'admin'){
    ?>
    <li class="" ><a><span class="text"><?php echo' Selamat Datang, '.$_COOKIE["Username"].'' ?></span></a></li>
    <li class=""><a title="" href="edit_akun.php"><i class="icon icon-cog"></i> <span class="text">Edit Akun</span></a></li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    <?php } ?>
    <?php
    if($dt['hak']=='admin'){
    ?>
    <li class="" ><a><span class="text"><?php echo' Selamat Datang, '.$_COOKIE["Username"].'' ?></span></a></li>
    <li class=""><a title="" href="tambah_akun.php"><i class="icon icon-plus"></i> <span class="text">Tambah Admin</span></a></li>
    <li class=""><a title="" href="edit_akun.php"><i class="icon icon-cog"></i> <span class="text">Edit Akun</span></a></li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    <?php } ?>
    </ul>
</div>
<!--close-top-Header-menu-->

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a><ul>
<?php  if($dt['hak']=='admin'){ ?>  
                            <li> <a href="index.php?menu=sembako"><i class="icon icon-signal"></i> <span>Daftar Komoditi</span></a> </li>
    <li> <a href="index.php?menu=update"><i class="icon icon-inbox"></i> <span>Update Harga</span></a> </li>
    <li><a href="index.php?menu=sedia"><i class="icon icon-th"></i> <span>Ketersediaan</span></a></li>
    <li><a href="index.php?menu=mantung"><i class="icon icon-fullscreen"></i> <span>STA Mantung</span></a></li>

                         <?php   } ?>
                         
                         <?php  if($dt['hak']=='persediaan'){ ?> 
    <li><a href="index.php?menu=sedia"><i class="icon icon-th"></i> <span>Ketersediaan</span></a></li>

                         <?php   } ?>

                         <?php  if($dt['hak']=='sembako'){ ?>  
                            <li> <a href="index.php?menu=sembako"><i class="icon icon-signal"></i> <span>Daftar Komoditi</span></a> </li>
    <li> <a href="index.php?menu=update"><i class="icon icon-inbox"></i> <span>Update Harga</span></a> </li>

                         <?php   } ?>

    <?php  if($dt['hak']=='mantung'){ ?>  
    <li><a href="index.php?menu=mantung"><i class="icon icon-fullscreen"></i> <span>STA Mantung</span></a></li>
                         <?php   } ?>
  </ul>
</div>
</div>
</div>
</body>