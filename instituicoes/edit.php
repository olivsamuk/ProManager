<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');
?>

<ul class="breadcrumb">
	<li><a href="../">Início</a> <span class="divider">|</span></li>
	<li><a href="index.php">Instituições</a> <span class="divider">|</span></li>
	<li class="active">Editar dados da Instituição</li>
</ul>

<h3>Editar dados da Instituição</h3>

<? 
include('../config.php'); 
if (isset($_GET['id']) ) { 
$id = (int) $_GET['id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `instituicoes` SET  `nome` =  '{$_POST['nome']}' ,  `desc` =  '{$_POST['desc']}' ,  `criado_em` =  '{$_POST['criado_em']}'   WHERE `id` = '$id' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='index.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `instituicoes` WHERE `id` = '$id' ")); 
?>

<form action='' method='POST'> 
<p><b>Nome:</b><br /><input type='text' name='nome' value='<?= stripslashes($row['nome']) ?>' /> 
<p><b>Descrição:</b><br /><input type='text' name='desc' value='<?= stripslashes($row['desc']) ?>' /> 
<p><b>Criado Em:</b><br /><input type='text' name='criado_em' value='<?= stripslashes($row['criado_em']) ?>' /> 
<p><input type='submit' value='Editar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<? } ?> 

<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>
