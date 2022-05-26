<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
// Local
$hostname_jourJ = "localhost";
$database_jourJ = "jourj";
$username_jourJ = "root";
$password_jourJ = "";

// Distant
//$hostname_jourJ = "10.0.233.59";
//$database_jourJ = "jourjv4";
//$username_jourJ = "root";
//$password_jourJ = "Foy5aenx";

$jourJ = mysql_pconnect($hostname_jourJ, $username_jourJ, $password_jourJ) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_jourJ, $jourJ);
mysql_query("SET NAMES UTF8"); 
?>