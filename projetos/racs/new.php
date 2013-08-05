<?php
	include('../../layouts/header_.php');
	eval(file_get_contents('../../layouts/header_.php'));

include('../../config.php'); 
$id = (int) $_GET['id'];
$projeto = mysql_fetch_array ( mysql_query("SELECT * FROM `projetos` WHERE `id` = '$id'")); 
?>

<ul class="breadcrumb">
	<li><a href="../../">Início</a> <span class="divider">|</span></li>
	<li><a href="../index.php">Projetos</a> <span class="divider">|</span></li>
	<li><a href="index.php?id=<? echo $id; ?>"><? echo $projeto['titulo']; ?> → RAC's</a> <span class="divider">|</span></li>
	<li class="active">Novo Rac</li>
</ul>

<h3>Cadastro de RAC's</h3>

<? 
$identificacao = date("Ymd");
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `rac` (`cliente_id` , `solicitante_id` , `projeto_id` , `colaborador_id` , `motivo` , `etapa` , `criado_em` , `identificacao` ) VALUES(  '{$projeto['cliente_id']}' , '{$projeto['solicitante_id']}' , '{$id}' , '{$_POST['colaborador_id']}' , '{$_POST['motivo']}' , '{$_POST['etapa']}' , NOW() , '{$identificacao}' ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Registro efetuado com sucesso.<br />"; 
echo "<a href='index.php'>Voltar</a>"; 
} 
?>

<form action='' method='POST'> 

<b>Motivo:</b><br /><textarea name='motivo'></textarea> <br/>
<b>Etapa:</b><br /><input type='text' name='etapa'/> <br/>
<input type='submit' value='Salvar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 

</form> 


<?php
	include('../../layouts/footer_.php');
	eval(file_get_contents('../layouts/footer_.php'));
?>
