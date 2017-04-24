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

mysql_select_db($database_MyConnecting, $MyConnecting);
$query_billtable = "SELECT * FROM billcustomers";
$billtable = mysql_query($query_billtable, $MyConnecting) or die(mysql_error());
$row_billtable = mysql_fetch_assoc($billtable);
$totalRows_billtable = mysql_num_rows($billtable);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="bill" name="bill" method="post" action="">
  <table border="1">
    <tr>
      <td>Code_Item</td>
      <td>Type_Item</td>
      <td>Customer_Name</td>
      <td>Customer_Lname</td>
      <td>Name_Item</td>
      <td>Count_Item</td>
      <td>Pice_Item</td>
      <td>Date_Item</td>
      <td>picture</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_billtable['Code_Item']; ?></td>
        <td><?php echo $row_billtable['Type_Item']; ?></td>
        <td><?php echo $row_billtable['Customer_Name']; ?></td>
        <td><?php echo $row_billtable['Customer_Lname']; ?></td>
        <td><?php echo $row_billtable['Name_Item']; ?></td>
        <td><?php echo $row_billtable['Count_Item']; ?></td>
        <td><?php echo $row_billtable['Pice_Item']; ?></td>
        <td><?php echo $row_billtable['Date_Item']; ?></td>
        <td><img src="<?php echo $row_billtable['picture']; ?>" /></td>
      </tr>
      <?php } while ($row_billtable = mysql_fetch_assoc($billtable)); ?>
  </table>
<p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><a href="Insert.php?Code_Item=<?php echo $row_billtable['Code_Item']; ?>">เพิ่มข้อมูลใหม่</a></p>
</form>
</body>
</html>
<?php
mysql_free_result($billtable);
?>
