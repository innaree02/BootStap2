<?php require_once('Connections/MyConnecting.php'); ?>
<?php include("dw-upload.inc.php"); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO billcustomers (Type_Item, Customer_Name, Customer_Lname, Name_Item, Count_Item, Pice_Item, picture) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Type_Item'], "text"),
                       GetSQLValueString($_POST['Customer_Name'], "text"),
                       GetSQLValueString($_POST['Customer_Lname'], "text"),
                       GetSQLValueString($_POST['Name_Item'], "text"),
                       GetSQLValueString($_POST['Count_Item'], "int"),
                       GetSQLValueString($_POST['Pice_Item'], "int"),
                       GetSQLValueString(dwUpload($_FILES['img']), "text"));

  mysql_select_db($database_MyConnecting, $MyConnecting);
  $Result1 = mysql_query($insertSQL, $MyConnecting) or die(mysql_error());

  $insertGoTo = "bill2.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_MyConnecting, $MyConnecting);
$query_MyShow = "SELECT * FROM billcustomers";
$MyShow = mysql_query($query_MyShow, $MyConnecting) or die(mysql_error());
$row_MyShow = mysql_fetch_assoc($MyShow);
$totalRows_MyShow = mysql_num_rows($MyShow);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return check()">
  <table align="center">
    <tr valign="baseline">
      <td width="64" align="right" nowrap="nowrap">&nbsp;  </td>
      <td width="199">เพิ่มข้อมูลใหม่</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ประเภทสินค้า:</td>
      <td><input type="text" name="Type_Item" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ชื่อลูกค้า</td>
      <td><input type="text" name="Customer_Name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">นามสกุลลูกค้า:</td>
      <td><input type="text" name="Customer_Lname" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ชื่อสินค้า:</td>
      <td><input type="text" name="Name_Item" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">จำนวนสินค้า:</td>
      <td><input type="text" name="Count_Item" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ราคาสินค้า:</td>
      <td><input type="text" name="Pice_Item" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><label for="img">รูปภาพ</label>
    <input type="file" name="img"  id="img"  />      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="บันทึกข้อมูล" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
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
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($MyShow);
?>
