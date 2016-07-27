<?php require_once('../../Connections/applestore.php'); ?>
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

  $insertGoTo = "../admin_homepage.php";
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
<title>Untitled Document</title>
<style type="text/css">
#apDiv1 {
	width: 1000px;
	height: 100px;
	margin: auto;
}
#apDiv2 {
	width: 1000px;
	height: auto;
	margin: auto;
}
#apDiv3 {
	width: 1000px;
	height: auto;
	margin: auto;
	background-color: #663333;
	color: #FFFFFF;
}
</style>
<link href="menubar.css" rel="stylesheet" type="text/css" />
</head>

<body>
<nav>
  <ul>
    <li>
      <a href="admin_homepage.php">Home</a>
    </li>
    <li>
      <a href="admin_newproduct.php">New Product</a>
    </li>
    <li>
      <a href="admin_editproduct.php">Edit Product</a>
    </li>
    <li>
      <a href="admin_vieworder.php">View Order</a>
    </li>
    <li>
      <a href="">Logout</a>
    </li>
  </ul>
</nav>
<div id="apDiv2">
  <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Model_Name:</td>
        <td><input type="text" name="Model_Name" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Storage:</td>
        <td><input type="text" name="Storage" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Color:</td>
        <td><input type="text" name="Color" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Price_Selling:</td>
        <td><input type="text" name="Price_Selling" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" value="Insert record" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form1" />
  </form>
  <p>&nbsp;</p>
</div>
<div id="apDiv3">
  <div align="center">All Copy Right Served</div>
</div>
</body>
</html>