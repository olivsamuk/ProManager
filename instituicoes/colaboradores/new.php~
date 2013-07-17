<?php
	include('../../layouts/header_.php');
	eval(file_get_contents('../../layouts/header_.php'));

include('../../config.php'); 
$id = (int) $_GET['id']; 
?>

<h3>Cadastro de Colaboradores</h3>

<? 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `colaboradores` ( `nome` ,  `setor_id` ,  `criado_em`  ) VALUES(  '{$_POST['nome']}' ,  '{$_POST['setor_id']}' ,  NOW()  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Registro efetuado com sucesso.<br />"; 
echo "<a href='../show.php?id=$id'>Voltar</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Nome:</b><br /><input type='text' name='nome'/> 
<p><b>Setor:</b><br />
<select name='setor_id'>
<?
$find_setores = mysql_query("SELECT * FROM `setores`") or trigger_error(mysql_error()); 
while($setor = mysql_fetch_array($find_setores)){
?>
<option value="<? echo $setor['id']; ?>"><? echo $setor['nome']; ?></option>
<?}?>
</select>
<p><input type='submit' value='Salvar'><input type='hidden' value='1' name='submitted' /> 

</form> 
