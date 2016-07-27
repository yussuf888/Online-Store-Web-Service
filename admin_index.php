<?php require_once('../Connections/applestore.php'); ?>
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['1'])) {
  $loginUsername=$_POST['1'];
  $password=$_POST['2'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "admin_homepage.php";
  $MM_redirectLoginFailed = "admin_loginfail.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_applestore, $applestore);
  
  $LoginRS__query=sprintf("SELECT Admin_Username, Password FROM `admin` WHERE Admin_Username=%s AND Password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $applestore) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<link href="admin_login.css" rel="stylesheet" type="text/css">

<title>Login</title>

<div class="login-form">
<h1>Login</h1>
   <div class="form-group ">
    <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
      <p>
        <label for="1"></label>
      <input name="1" type="text" class="form-control" id="1" placeholder="Username">      
      <div class="form-group log-status">
      </p>
      <p>
        <label for="2"></label>
        <input name="2" type="text" class="form-control" id="2" placeholder="Password">
               <i class="fa fa-lock"></i>
     </div>
      </p>
      <p>
        <input name="submit" type="submit" class="log-btn" id="submit" value="Login">
      </p>
    </form>

    



<script src="jquery.min.js"></script>
<script src="login.js"></script>