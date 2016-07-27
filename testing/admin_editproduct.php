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

  $updateGoTo = "../customer_homepage.php";
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
    <p>&nbsp;
    <div align="center">
      <table border="0">
        <tr>
          <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>"><img src="First.gif" /></a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"><img src="Previous.gif" /></a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"><img src="Next.gif" /></a>
          <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>"><img src="Last.gif" /></a>
          <?php } // Show if not last page ?></td>
        </tr>
      </table>
      </p>
    </div>
    <table width="480" align="center">
      <tr valign="baseline">
        <td width="142" align="right" nowrap="nowrap">ProductID:</td>
        <td width="232"><?php echo $row_Recordset1['ProductID']; ?></td>
        <td width="90"><a href="admin_delete.php?ProductID=<?php echo $row_Recordset1['ProductID']; ?>"><img src="../Model/delete.png" width="51" height="50" /></a></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Model_Name:</td>
        <td><input type="text" name="Model_Name" value="<?php echo htmlentities($row_Recordset1['Model_Name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Storage:</td>
        <td><input type="text" name="Storage" value="<?php echo htmlentities($row_Recordset1['Storage'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Color:</td>
        <td><input type="text" name="Color" value="<?php echo htmlentities($row_Recordset1['Color'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Price_Selling:</td>
        <td><input type="text" name="Price_Selling" value="<?php echo htmlentities($row_Recordset1['Price_Selling'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" value="Update record" /></td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <input type="hidden" name="MM_update" value="form1" />
    <input type="hidden" name="ProductID" value="<?php echo $row_Recordset1['ProductID']; ?>" />
  </form>
  <p>&nbsp;</p>
</div>
<div id="apDiv3">
  <div align="center">All Copy Right Served</div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
