<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');
?>

<? 
include('../config.php'); 
if (isset($_GET['id']) ) { 
$id = (int) $_GET['id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `projetos` SET  `titulo` =  '{$_POST['titulo']}' ,  `desc` =  '{$_POST['desc']}' ,  `criado_em` =  '{$_POST['criado_em']}' ,  `atualizado_em` =  '{$_POST['atualizado_em']}'   WHERE `id` = '$id' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='index.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `projetos` WHERE `id` = '$id' ")); 
?>

<form action='' method='POST'> 
<p><b>Titulo:</b><br /><input type='text' name='titulo' value='<?= stripslashes($row['titulo']) ?>' /> 
<p><b>Desc:</b><br /><input type='text' name='desc' value='<?= stripslashes($row['desc']) ?>' /> 
<p><b>Criado Em:</b><br /><input type='text' name='criado_em' value='<?= stripslashes($row['criado_em']) ?>' /> 
<p><b>Atualizado Em:</b><br /><input type='text' name='atualizado_em' value='<?= stripslashes($row['atualizado_em']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<? } ?> 


<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>
