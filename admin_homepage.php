<?php require_once('../Connections/applestore.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "admin_index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO product (Model_Name, Storage, Color, Price_Selling) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['Model_Name'], "text"),
                       GetSQLValueString($_POST['Storage'], "text"),
                       GetSQLValueString($_POST['Color'], "text"),
                       GetSQLValueString($_POST['Price_Selling'], "double"));

  mysql_select_db($database_applestore, $applestore);
  $Result1 = mysql_query($insertSQL, $applestore) or die(mysql_error());

  $insertGoTo = "admin_homepage.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Homepage of Admin</title>
<style type="text/css">
</style>
<link href="admin.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #FFFFFF;
}
</style>
</head>

<body>
<div id="container">
	<ul>
		<li><a href="admin_homepage.php">Home</a></li>
		<li><a href="admin_productadd.php">Add Product</a></li>
		<li><a href="admin_productview.php">View Product</a></li>
        <li><a href="admin_orderview.php">View Order</a></li>
        <li><a href="<?php echo $logoutAction ?>">Logout</a></li>
	</ul>
</div>
<div id="body"><a href="" class="logo">
  <div class="logo-roundel">
    <span class="logo-site-name">senicam</span>
    <span class="left-n">s</span>
    <span class="right-n">m</span>
  </div>
</a></div>
<div id="footer"><ul>
    <li>
    <div align="center">
      <table width="900" border="0">
        <tr>
          <td colspan="2" rowspan="3"><div align="center" class="footerstyle">senicam</div></td>
          <td width="591" class="footerfontname"><div align="center">MOHAMED YUSSUF      </div></td>
          <td width="2"><p>&nbsp;</p></td>
          <td width="2"><p>&nbsp;</p></td>
          <td width="2"><p>&nbsp;</p></td>
        </tr>
        <tr>
          <td class="footerfontname"><div align="center">LOW VI VIEN</div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"><div align="center"><span class="stylelightfooter">Copyright@2015 - senicam - All rights reserved</span></div></td>
        </tr>
      </table>
    </div>
    </li>
  </ul></div>
</body>
</html>