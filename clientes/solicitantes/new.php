<?php
	include('../../layouts/header_.php');
	eval(file_get_contents('../../layouts/header_.php'));

include('../../config.php'); 
$id = (int) $_GET['id']; 

$cliente = mysql_fetch_array ( mysql_query("SELECT * FROM `clientes` WHERE `id` = '$id'")); 
?>

<ul class="breadcrumb">
	<li><a href="../../">Início</a> <span class="divider">|</span></li>
	<li><a href="../index.php">Clientes</a> <span class="divider">|</span></li>
	<li><a href="../show.php?id=<? echo $id; ?>"><? echo $cliente['nome']; ?></a> <span class="divider">|</span></li>
	<li class="active">Novo Solicitante</li>
</ul>

<h3>Novo Solicitante</h3>

<? 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `solicitantes` ( `nome` , `cargo` , `email`, `telefone` , `cliente_id` ,  `criado_em`  ) VALUES(  '{$_POST['nome']}' , '{$_POST['cargo']}' , '{$_POST['email']}' , '{$_POST['telefone']}' ,   '{$_POST['cliente_id']}' ,  NOW()  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Registro efetuado com sucesso.<br />"; 
echo "<a href='../show.php?id=$id'>Voltar</a>"; 
} 
?>

<form action='' method='POST'> 
<input type='hidden' name='cliente_id' value='<? echo $id; ?>'>
<p><b>Nome:</b><br /><input type='text' name='nome'/> 
<p><b>Cargo:</b><br /><input type='text' name='cargo'/> 
<p><b>Email:</b><br /><input type='text' name='email'/> 
<p><b>Telefone:</b><br /><input type='text' name='telefone'/> 

<p><input type='submit' value='Salvar' class='btn btn-primary'><input type='hidden' value='1' name='submitted' /> 

</form> 
