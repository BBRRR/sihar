<?php 

if (isset($_COOKIE["Username"]))  
echo "";
else  
header('Location: login2.php?login=gagal');
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../asset/css/bootstrap.min.css" />
<link rel="stylesheet" href="../asset/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../asset/css/fullcalendar.css" />
<link rel="stylesheet" href="../asset/css/maruti-style.css" />
<link rel="stylesheet" href="../asset/css/maruti-media.css" class="skin-color" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<title>Admin Siharkepo</title>
</head>
<body>
<div id="content1">
    <?php
include('menu.php');

$query = mysql_query("select * from tbl_user where Username='". $_COOKIE['Username']."'");
$dt= mysql_fetch_array($query);
if($dt['hak']=='user'){

  include('EditData.php');

}


else if ($dt['hak']=='admin')
{
 
@$hal = $_GET['menu'];

if ($hal=='update') {include('update.php');}
if ($hal=='trx_update') {include('EditData_admin.php');}
if ($hal=='sembako') {include('addSembako.php');}
if ($hal=='sedia') {include('sedia.php');}
if ($hal=='update_bako') {include('update_bako.php');}
if ($hal=='delete_bako') {include('delete_bako.php');}
if ($hal=='delete_sedia') {include('delete_sedia.php');}
if ($hal=='mantung') {include('stamantung.php');}
}

else if ($dt['hak']=='persediaan')
{ 
@$hal = $_GET['menu'];

if ($hal=='update') {include('update.php');}
if ($hal=='trx_update') {include('EditData_admin.php');}
if ($hal=='sembako') {include('addSembako.php');}
if ($hal=='sedia') {include('sedia.php');}
if ($hal=='update_bako') {include('update_bako.php');}
if ($hal=='delete_bako') {include('delete_bako.php');}
if ($hal=='delete_sedia') {include('delete_sedia.php');}
}

else if ($dt['hak']=='sembako')
{
@$hal = $_GET['menu'];

if ($hal=='update') {include('update.php');}
if ($hal=='trx_update') {include('EditData_admin.php');}
if ($hal=='sembako') {include('addSembako.php');}
if ($hal=='sedia') {include('sedia.php');}
if ($hal=='update_bako') {include('update_bako.php');}
if ($hal=='delete_bako') {include('delete_bako.php');}
if ($hal=='delete_sedia') {include('delete_sedia.php');}
}
else if ($dt['hak']=='mantung')
{
 
@$hal = $_GET['menu'];

if ($hal=='update') {include('update.php');}
if ($hal=='trx_update') {include('EditData_admin.php');}
if ($hal=='sembako') {include('addSembako.php');}
if ($hal=='sedia') {include('sedia.php');}
if ($hal=='update_bako') {include('update_bako.php');}
if ($hal=='delete_bako') {include('delete_bako.php');}
if ($hal=='delete_sedia') {include('delete_sedia.php');}
if ($hal=='mantung') {include('stamantung.php');}
}

include('footer.php'); 


?>

</div>>

<script src="../asset/js/excanvas.min.js"></script> 
<script src="../asset/js/jquery.min.js"></script> 
<script src="../asset/js/jquery.ui.custom.js"></script> 
<script src="../asset/js/bootstrap.min.js"></script> 
<script src="../asset/js/jquery.flot.min.js"></script> 
<script src="../asset/js/jquery.flot.resize.min.js"></script> 
<script src="../asset/js/jquery.peity.min.js"></script> 
<script src="../asset/js/fullcalendar.min.js"></script> 
<script src="../asset/js/maruti.js"></script> 
<script src="../asset/js/maruti.dashboard.js"></script> 
<script src="../asset/js/maruti.chat.js"></script> 
 

<script type="../asset/text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
