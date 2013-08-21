<?php
	include('layouts/header.php');
	file_get_contents('layouts/header.php');

	$id = $_SESSION["id_usuario"];
?>

<ul class="breadcrumb">
	<li><a href="index.php">Início</a> <span class="divider">|</span></li>
	<li class="active">Seus Projetos</li>
</ul>

<div class="row">
	<div class="span12">

		<h3>Mudar Senha</h3>
		<? 
		include('config.php'); 

		$senhapura = $_POST['senha'];
		$cript_senha = md5($senhapura);  

		if (isset($_POST['submitted'])) { 
		foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
		$sql = "UPDATE `solicitantes` SET  `nome` =  '{$_POST['nome']}' ,  `email` =  '{$_POST['email']}' ,  `senha` =  '$cript_senha' WHERE `id` = '$id' "; 
		mysql_query($sql) or die(mysql_error()); 
		echo (mysql_affected_rows()) ? "Usuario Atualizado com Sucesso!<br />" : "Erro. <br />"; 
		echo "<meta http-equiv='refresh' content='1; url=projetos/index.php' />";
		} 
		$row = mysql_fetch_array ( mysql_query("SELECT * FROM `usuarios` WHERE `id` = '$id' ")); 
		?>

		<form action='' method='POST'> 
		<p><b>Nome:</b><br /><input type='text' name='nome' value='<?= stripslashes($row['nome']) ?>' /> 
		<p><b>Email:</b><br /><input type='text' name='email' value='<?= stripslashes($row['email']) ?>'>
		<p><b>Senha:</b><br /><input type='password' name='senha' /> 
		<p><input type='submit' value='Salvar' /><input type='hidden' value='1' name='submitted' /> 
		</form> 

	</div>
</div>


<?php
	include('layouts/footer.php');
	file_get_contents('layouts/footer.php');
?>

