<?php require_once('Connections/MyConnecting.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO billcustomers (Code_Item, Type_Item, Customer_Name, Customer_Lname, Name_Item, Count_Item, Pice_Item, Date_Item, prd_img) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Code_Item'], "int"),
                       GetSQLValueString($_POST['Type_Item'], "text"),
                       GetSQLValueString($_POST['Customer_Name'], "text"),
                       GetSQLValueString($_POST['Customer_Lname'], "text"),
                       GetSQLValueString($_POST['Name_Item'], "text"),
                       GetSQLValueString($_POST['Count_Item'], "int"),
                       GetSQLValueString($_POST['Pice_Item'], "double"),
                       GetSQLValueString($_POST['Date_Item'], "date"),
                       GetSQLValueString($_POST['prd_img'], "text"));

  mysql_select_db($database_MyConnecting, $MyConnecting);
  $Result1 = mysql_query($insertSQL, $MyConnecting) or die(mysql_error());

  $insertGoTo = "file:///C|/AppServ/www/BootStap/insert.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_MyConnecting, $MyConnecting);
$query_MyConnect = "SELECT * FROM billcustomers";
$MyConnect = mysql_query($query_MyConnect, $MyConnecting) or die(mysql_error());
$row_MyConnect = mysql_fetch_assoc($MyConnect);
$totalRows_MyConnect = mysql_num_rows($MyConnect);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <a href="insert.php">ออกบิล
  </a>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($MyConnect);
?>
