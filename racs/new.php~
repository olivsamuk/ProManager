<?php
	include('../layouts/header.php');
	eval(file_get_contents('../layouts/header.php'));
?>

<h3>Cadastro de Clientes</h3>

<? 
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `rac` ( `id` , `cliente_id` , `solicitante_id` , `projeto_id` , `colaborador_id` , `motivo` , `etapa` , `criado_em` , `identificacao` ) VALUES(  '{$_POST['id']}' , '{$_POST['cliente_id']}' , '{$_POST['solicitante_id']}' , '{$_POST['projeto_id']}' , '{$_POST['colaborador_id']}' , '{$_POST['motivo']}' , '{$_POST['etapa']}' , NOW() , '{$_POST['identificacao']}' ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Added row.<br />"; 
echo "<a href='index.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 

<b>Cliente:</b><br /><input type='text' name='cliente_id'/> <br/>
<b>Solicitante:</b><br /><input type='text' name='solicitante_id'/> <br/>
<b>Projeto:</b><br /><input type='text' name='projeto_id'/> <br/>
<b>Colaborador:</b><br /><input type='text' name='colaborador_id'/> <br/>
<b>Motivo:</b><br /><input type='text' name='motivo'/> <br/>
<b>Etapa:</b><br /><input type='text' name='etapa'/> <br/>
<b>Identificação:</b><br /><input type='text' name='identificacao'/> <br/>
<input type='submit' value='Salvar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 

</form> 


<?php
	include('../layouts/footer.php');
	eval(file_get_contents('../layouts/footer.php'));
?>
