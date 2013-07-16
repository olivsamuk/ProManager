<? 
include('../../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `setores` ( `nome` ,  `desc` ,  `criado_em`  ) VALUES(  '{$_POST['nome']}' ,  '{$_POST['desc']}' ,  NOW()  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Added row.<br />"; 
echo "<a href='index.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Nome:</b><br /><input type='text' name='nome'/> 
<p><b>Desc:</b><br /><input type='text' name='desc'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
