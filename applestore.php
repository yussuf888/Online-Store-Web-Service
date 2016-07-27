<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_applestore = "localhost";
$database_applestore = "applestore";
$username_applestore = "root";
$password_applestore = "";
$applestore = mysql_pconnect($hostname_applestore, $username_applestore, $password_applestore) or trigger_error(mysql_error(),E_USER_ERROR); 
?>