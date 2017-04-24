<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_MyConnecting = "localhost";
$database_MyConnecting = "item";
$username_MyConnecting = "root";
$password_MyConnecting = "123456789";
$MyConnecting = mysql_pconnect($hostname_MyConnecting, $username_MyConnecting, $password_MyConnecting) or trigger_error(mysql_error(),E_USER_ERROR); 
?>