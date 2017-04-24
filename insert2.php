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
$query_Recordset1 = "SELECT * FROM billcustomers";
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
<form action="<?php echo $editFormAction; ?>" method="post" onSubmit="return check()" name="form1" id="form1">
  <form id="form1" name="form1" method="post" action="<?php echo $editFormAction; ?>">
    <table align="center">
      <tr valign="baseline">
        <td width="78" align="right" nowrap="nowrap">Type_Item:</td>
        <td width="188"><input type="text" name="Type_Item" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Customer_Name:</td>
        <td><input type="text" name="Customer_Name" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Customer_Lname:</td>
        <td><input type="text" name="Customer_Lname" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Name_Item:</td>
        <td><input type="text" name="Name_Item" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Count_Item:</td>
        <td><input type="text" name="Count_Item" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Pice_Item:</td>
        <td><input type="text" name="Pice_Item" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Date_Item:</td>
        <td><input type="text" name="Date_Item" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td height="26" align="right" nowrap="nowrap">&nbsp;</td>
        <td><input name="summit" type="submit" id="summit" value="Insert record" /></td>
      </tr>
    </table>
</form>
<script language="javascript">
  function check(){
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
</form>


<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
