<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');
?>

<ul class="breadcrumb">
	<li><a href="../">Início</a> <span class="divider">|</span></li>
	<li><a href="index.php">Clientes</a> <span class="divider">|</span></li>
	<li class="active">Cadastrar Novo Cliente</li>
</ul>

<h3>Cadastrar Novo Cliente</h3>

<? 
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `clientes` ( `nome` ,  `desc` ,  `criado_em` ) VALUES(  '{$_POST['nome']}' ,  '{$_POST['desc']}' ,  NOW() ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Registro efetuado com sucesso.<br />";
echo "<a href='index.php'>Voltar</a>"; 
} 
?>

<form action='' method='POST'> 

<b>Titulo:</b><br /><input type='text' name='nome'/> <br/>
<b>Descrição:</b><br /><textarea name='desc'/></textarea><br />
<input type='submit' value='Salvar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 

</form> 


<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>
