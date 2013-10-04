<?php
	include('../../layouts/header_.php');
	file_get_contents('../../layouts/header_.php');

include('../../config.php'); 
$id = (int) $_GET['id']; 

$instituicao = mysql_fetch_array ( mysql_query("SELECT * FROM `instituicoes` WHERE `id` = '$id'")); 

	if (!$_SESSION['permissao'] == 1) {
		echo "<div class='alert'><strong>Atenção!</strong> Você não tem as permissões necessárias para acessar esta página.</div>";
		echo "<meta http-equiv='refresh' content='2; url=../../projetos/index.php' />";
	}else{
?>

<ul class="breadcrumb">
	<li><a href="../../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="../index.php">Instituições</a> <span class="divider">|</span></li>
	<li><a href="../show.php?id=<? echo $id; ?>"><? echo $instituicao['nome']; ?></a> <span class="divider">|</span></li>
	<li class="active">Novo Colaborador</li>
</ul>

<div class="row">
	<div class="span12">

	<div class="widget">
		
		<div class="widget-header">
			<i class="icon-th-list"></i>
			<h3>Cadastro de Colaboradores</h3>
		</div> <!-- /widget-header -->
	
		<div class="widget-content">



			<? 

			$senhapura = $_POST['senha'];
			$cript_senha = md5($senhapura);

			if (isset($_POST['submitted'])) { 
			foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
			$sql = "INSERT INTO `colaboradores` ( `nome` ,  `setor_id` ,  `criado_em` , `email` ,  `senha` ,  `permissao`  ) VALUES(  '{$_POST['nome']}' ,  '{$_POST['setor_id']}' ,  NOW() ,  '{$_POST['email']}' ,  '$cript_senha' ,  '{$_POST['permissao']}'  ) "; 
			mysql_query($sql) or die(mysql_error()); 
			echo "Registro efetuado com sucesso.<br />"; 
			echo "<a href='../show.php?id=$id'>Voltar</a>"; 
			} 
			?>

			<form action='' method='POST'> 
			<b>Nome:</b><br /><input type='text' name='nome'/> <br />
			<b>Setor:</b><br />
			<select name='setor_id'>
			<option>--</option>
			<?
			$find_setores = mysql_query("SELECT * FROM `setores` where instituicao_id = $id") or trigger_error(mysql_error()); 
			while($setor = mysql_fetch_array($find_setores)){
			?>
			<option value="<? echo $setor['id']; ?>"><? echo $setor['nome']; ?></option>
			<?}?>
			</select><br />
			<b>Email:</b><br /><input type='text' name='email'/><br /> 
			<b>Senha:</b><br /><input type='password' name='senha'/> <br />
			<b>Permissão:</b><br />
			<select name='permissao'>
				<option>--</option>
				<option value=0>Colaborador</option>
				<option value=1>Administrador</option>
			</select><br />
			<input type='submit' value='Salvar' class='btn'><input type='hidden' value='1' name='submitted' /> 

			</form> 
		</div>
	</div>
</div>
<?php } ?>
