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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE billcustomers SET Type_Item=%s, Customer_Name=%s, Customer_Lname=%s, Name_Item=%s, Count_Item=%s, Pice_Item=%s, Date_Item=%s WHERE Code_Item=%s",
                       GetSQLValueString($_POST['Type_Item'], "text"),
                       GetSQLValueString($_POST['Customer_Name'], "text"),
                       GetSQLValueString($_POST['Customer_Lname'], "text"),
                       GetSQLValueString($_POST['Name_Item'], "text"),
                       GetSQLValueString($_POST['Count_Item'], "int"),
                       GetSQLValueString($_POST['Pice_Item'], "double"),
                       GetSQLValueString($_POST['Date_Item'], "date"),
                       GetSQLValueString($_POST['Code_Item'], "int"));

  mysql_select_db($database_MyConnecting, $MyConnecting);
  $Result1 = mysql_query($updateSQL, $MyConnecting) or die(mysql_error());

  $updateGoTo = "bill.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['Code_Item'])) {
  $colname_Recordset1 = $_GET['Code_Item'];
}
mysql_select_db($database_MyConnecting, $MyConnecting);
$query_Recordset1 = sprintf("SELECT * FROM billcustomers WHERE Code_Item = %d", GetSQLValueString($colname_Recordset1, "int"));
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
<form action="<?php echo $editFormAction; ?>" method="post" onSubmit="return checkupdate()" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ประเภทสินค้า:</td>
      <td><input type="text" name="Type_Item" value="<?php echo htmlentities($row_Recordset1['Type_Item'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ชื่อลูกค้า:</td>
      <td><input type="text" name="Customer_Name" value="<?php echo htmlentities($row_Recordset1['Customer_Name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">นามสกุลลูกค้า:</td>
      <td><input type="text" name="Customer_Lname" value="<?php echo htmlentities($row_Recordset1['Customer_Lname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ชื่อสินค้า:</td>
      <td><input type="text" name="Name_Item" value="<?php echo htmlentities($row_Recordset1['Name_Item'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">จำนวนสินค้า:</td>
      <td><input type="text" name="Count_Item" value="<?php echo htmlentities($row_Recordset1['Count_Item'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ราคาสินค้า:</td>
      <td><input type="text" name="Pice_Item" value="<?php echo htmlentities($row_Recordset1['Pice_Item'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="Code_Item" value="<?php echo $row_Recordset1['Code_Item']; ?>" />
</form>
<script language="javascript">
  function checkupdate(){
	  if(document.form1.Type_Item.value=="")
	  {
		  alert("!!!! กรุณากรอกประเภทสินค้า"); 
		  document.form1.Type_Item.focus();
		return false;
		}
		else if(document.form1.Customer_Name.value=="")
		{
			alert("!!! กรุณากกรอกชื่อลูกค้า"); 
			document.form1.Customer_Name.focus();
			return false;
		}
			else if(document.form1.Customer_Lname.value=="")
		{
			alert("!!! กรุณากกรอกนามสกุลขอลลูกค้า"); 
			document.form1.Customer_Lname.focus();
			return false;
		}
			else if(document.form1.Name_Item.value=="")
		{
			alert("!!! กรุณากกรอกชื่อของสินค้า"); 
			document.form1.Name_Item.focus();
			return false;
		}
					else if(document.form1.Count_Item.value=="")
		{
			alert("!!! กรุณากกรอกจำนวนของสินค้า (เป็นตัวเลข!! เท่านั้น)"); 
			document.form1.Count_Item.focus();
			return false;
		}
				else if(isNaN(document.form1.Count_Item.value))
		{
			alert("!!! กรุณากกรอกจำนวนของสินค้า (เป็นตัวเลข!! เท่านั้น)"); 
			document.form1.Count_Item.focus();
			return false;
		}
			else if(document.form1.Pice_Item.value=="")
		{
			alert("!!! กรุณากกรอกราคาของสินค้า (ป็นตัวเลข!! เท่านั้น)"); 
			document.form1.Pice_Item.focus();
			return false;
		}
					else if(isNaN(document.form1.Pice_Item.value))
		{
			alert("!!! กรุณากกรอกราคาของสินค้า (ป็นตัวเลข!! เท่านั้น)"); 
			document.form1.Pice_Item.focus();
			return false;
		}
		else
		return true;  ;mysql_select_db("item");
}
</script>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
