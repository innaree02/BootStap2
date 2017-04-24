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

$colname_Recordset1 = "-1";
if (isset($_POST['word'])) {
  $colname_Recordset1 = $_POST['word'];
}
$colname2_Recordset1 = "''";
if (isset($_POST['word'])) {
  $colname2_Recordset1 = $_POST['word'];
}
$colname3_Recordset1 = "''";
if (isset($_POST['word'])) {
  $colname3_Recordset1 = $_POST['word'];
}
mysql_select_db($database_MyConnecting, $MyConnecting);
$query_Recordset1 = sprintf("SELECT * FROM billcustomers WHERE Code_Item = %s or Customer_Name Like %s or Date_Item Like %s", GetSQLValueString($colname_Recordset1, "int"),GetSQLValueString("%" . $colname2_Recordset1 . "%", "text"),GetSQLValueString("%" . $colname3_Recordset1 . "%", "date"));
$Recordset1 = mysql_query($query_Recordset1, $MyConnecting) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = "-1";
if (isset($_POST['word'])) {
  $totalRows_Recordset1 = $_POST['word'];
}
$colname2_Recordset1 = "''";
if (isset($_POST['word'])) {
  $colname2_Recordset1 = $_POST['word'];
}
$colname3_Recordset1 = "''";
if (isset($_POST['word'])) {
  $colname3_Recordset1 = $_POST['word'];
}
$colname_Recordset1 = "-1";
if (isset($_POST['word'])) {
  $colname_Recordset1 = '';
}
mysql_select_db($database_MyConnecting, $MyConnecting);
$query_Recordset1 = sprintf("SELECT * FROM billcustomers WHERE Code_Item = %s or Customer_Name Like %s or Date_Item Like %s", GetSQLValueString($colname_Recordset1, "int"),GetSQLValueString("%" . $colname2_Recordset1 . "%", "text"),GetSQLValueString("%" . $colname3_Recordset1 . "%", "date"));
$Recordset1 = mysql_query($query_Recordset1, $MyConnecting) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = "''";
if (isset($_POST['word'])) {
  $totalRows_Recordset1 = $_POST['word'];
}
$colname3_Recordset1 = "''";
if (isset($_POST['word'])) {
  $colname3_Recordset1 = $_POST['word'];
}
$colname_Recordset1 = "-1";
if (isset($_POST['word'])) {
  $colname_Recordset1 = $_POST['word'];
}
$colname2_Recordset1 = "-1";
if (isset($_POST['word'])) {
  $colname2_Recordset1 ='' ;
}
mysql_select_db($database_MyConnecting, $MyConnecting);
$query_Recordset1 = sprintf("SELECT * FROM billcustomers WHERE Code_Item = %s or Type_Item Like %s or Date_Item Like %s", GetSQLValueString($colname_Recordset1, "int"),GetSQLValueString("%" . $colname2_Recordset1 . "%", "text"),GetSQLValueString("%" . $colname3_Recordset1 . "%", "date"));
$Recordset1 = mysql_query($query_Recordset1, $MyConnecting) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = "''";
if (isset($_POST['word'])) {
  $totalRows_Recordset1 = $_POST['word'];
}
$colname_Recordset1 = "-1";
if (isset($_POST['word'])) {
  $colname_Recordset1 = $_POST['word'];
}
$colname2_Recordset1 = "''";
if (isset($_POST['word'])) {
  $colname2_Recordset1 = $_POST['word'];
}
$colname3_Recordset1 = "-1";
if (isset($_POST['word'])) {
  $colname3_Recordset1 = '';
}
mysql_select_db($database_MyConnecting, $MyConnecting);
$query_Recordset1 = sprintf("SELECT * FROM billcustomers WHERE Code_Item = %s or Type_Item Like %s or Date_Item Like %s", GetSQLValueString($colname_Recordset1, "int"),GetSQLValueString("%" . $colname2_Recordset1 . "%", "text"),GetSQLValueString("%" . $colname3_Recordset1 . "%", "date"));
$Recordset1 = mysql_query($query_Recordset1, $MyConnecting) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);$colname_Recordset1 = "-1";
if (isset($_POST['word'])) {
  $colname_Recordset1 = $_POST['word'];
}
$colname2_Recordset1 = "''";
if (isset($_POST['word'])) {
  $colname2_Recordset1 = $_POST['word'];
}
$colname3_Recordset1 = "''";
if (isset($_POST['word'])) {
  $colname3_Recordset1 = $_POST['word'];
}
mysql_select_db($database_MyConnecting, $MyConnecting);
$query_Recordset1 = sprintf("SELECT * FROM billcustomers WHERE Code_Item = %s or Type_Item Like %s or Date_Item Like %s", GetSQLValueString($colname_Recordset1, "int"),GetSQLValueString("%" . $colname2_Recordset1 . "%", "text"),GetSQLValueString("%" . $colname3_Recordset1 . "%", "text"));
$Recordset1 = mysql_query($query_Recordset1, $MyConnecting) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table border="1">
  <tr>
    <td align="center">รหัสสินค้า</td>
    <td align="center">ประเภทสินค้า</td>
    <td align="center">ชื่อลูกค้า</td>
    <td align="center">นามสกุลลูกค้า</td>
    <td align="center">ชื่อสินค้า</td>
    <td align="center">จำนวนสินค้า</td>
    <td align="center">ราคาสินค้า</td>
    <td align="center">วันที่เพิ่มข้อมูล</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['Code_Item']; ?></td>
      <td><?php echo $row_Recordset1['Type_Item']; ?></td>
      <td><?php echo $row_Recordset1['Customer_Name']; ?></td>
      <td><?php echo $row_Recordset1['Customer_Lname']; ?></td>
      <td><?php echo $row_Recordset1['Name_Item']; ?></td>
      <td><?php echo $row_Recordset1['Count_Item']; ?></td>
      <td><?php echo $row_Recordset1['Pice_Item']; ?></td>
      <td><?php echo $row_Recordset1['Date_Item']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
