<? 
include('../../config.php'); 

if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `setores` SET  `nome` =  '{$_POST['nome']}' ,  `desc` =  '{$_POST['desc']}' ,  `criado_em` =  '{$_POST['criado_em']}'   WHERE `id` = '$tela' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='index.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `setores` WHERE `id` = '$tela' ")); 
?>

<form action='' method='POST'> 
<p><b>Nome:</b><br /><input type='text' name='nome' value='<?= stripslashes($row['nome']) ?>' /> 
<p><b>Desc:</b><br /><input type='text' name='desc' value='<?= stripslashes($row['desc']) ?>' /> 
<p><b>Criado Em:</b><br /><input type='text' name='criado_em' value='<?= stripslashes($row['criado_em']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 

