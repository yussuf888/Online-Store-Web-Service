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

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE product SET Model_Name=%s, Storage=%s, Color=%s, Price_Selling=%s WHERE ProductID=%s",
                       GetSQLValueString($_POST['Model_Name'], "text"),
                       GetSQLValueString($_POST['Storage'], "text"),
                       GetSQLValueString($_POST['Color'], "text"),
                       GetSQLValueString($_POST['Price_Selling'], "double"),
                       GetSQLValueString($_POST['ProductID'], "int"));

  mysql_select_db($database_applestore, $applestore);
  $Result1 = mysql_query($updateSQL, $applestore) or die(mysql_error());

  $updateGoTo = "admin_productupdate.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$maxRows_Recordset1 = 1;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_applestore, $applestore);
$query_Recordset1 = "SELECT * FROM product";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $applestore) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Product</title>
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
<div id="body"><form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <div align="center"></div>
  <div align="center"></div>
  <div align="center">
    <table width="345" height="54" border="0">
      <tr>
        <td><div align="center">
          <?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>"><img src="First.gif" width="35" height="25" /></a>
            <?php } // Show if not first page ?>
          </div></td>
        <td><div align="center">
          <?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"><img src="Previous.gif" width="27" height="25" /></a>
            <?php } // Show if not first page ?>
          </div></td>
        <td><div align="center">
          <?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"><img src="Next.gif" width="27" height="25" /></a>
            <?php } // Show if not last page ?>
          </div></td>
        <td><div align="center">
          <?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>"><img src="Last.gif" width="35" height="25" /></a>
            <?php } // Show if not last page ?>
          </div></td>
        </tr>
    </table>
    </p>
    
    <table width="609" height="366" align="center">
      <tr valign="baseline">
        <td width="159" height="58" align="right" nowrap="nowrap" class="checkout_titleorder">ProductID</td>
        <td width="364" class="ordertitle"><div align="center"><?php echo $row_Recordset1['ProductID']; ?></div></td>
        <td width="70" class="ordertitle"><div align="center"><a href="admin_productdelete.php?ProductID=<?php echo $row_Recordset1['ProductID']; ?>"><img src="Model/delete.png" width="50" height="50" /></a></div></td>
        </tr>
      <tr valign="baseline">
        <td height="58" align="right" nowrap="nowrap" class="checkout_titleorder">Model</td>
        <td><div align="center">
          <input name="Model_Name" type="text" class="textfield_Login" value="<?php echo htmlentities($row_Recordset1['Model_Name'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
          </div></td>
        <td>&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td height="60" align="right" nowrap="nowrap" class="checkout_titleorder">Storage</td>
        <td><div align="center">
          <input name="Storage" type="text" class="textfield_Login" value="<?php echo htmlentities($row_Recordset1['Storage'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
          </div></td>
        <td>&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td height="57" align="right" nowrap="nowrap" class="checkout_titleorder">Color</td>
        <td><div align="center">
          <input name="Color" type="text" class="textfield_Login" value="<?php echo htmlentities($row_Recordset1['Color'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
          </div></td>
        <td>&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td height="62" align="right" nowrap="nowrap" class="checkout_titleorder">Price</td>
        <td><div align="center">
          <input name="Price_Selling" type="text" class="textfield_Login" value="<?php echo htmlentities($row_Recordset1['Price_Selling'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
          </div></td>
        <td>&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td align="right" nowrap="nowrap" class="checkout_titleorder">&nbsp;</td>
        <td><div align="center">
          <input type="submit" class="button_function" value="Update Product" />
          </div></td>
        <td>&nbsp;</td>
        </tr>
    </table>
    <input type="hidden" name="MM_update" value="form1" />
    <input type="hidden" name="ProductID" value="<?php echo $row_Recordset1['ProductID']; ?>" />
  </div>
        </form></div>
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
<?php
mysql_free_result($Recordset1);
?>
