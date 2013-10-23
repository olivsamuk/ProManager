<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');

	if (!$_SESSION['permissao'] == 1) {
		echo "<div class='alert'><strong>Atenção!</strong> Você não tem as permissões necessárias para acessar esta página.</div>";
		echo "<meta http-equiv='refresh' content='2; url=../projetos/index.php' />";
	}else{

?>

<ul class="breadcrumb">
	<li><a href="../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="index.php">Instituições</a> <span class="divider">|</span></li>
	<li class="active">Cadastrar Nova Instituição</li>
</ul>

<div class="widget">
		
	<div class="widget-header">
		<i class="icon-th-list"></i>
		<h3>Cadastrar Nova Instituição</h3>
	</div> <!-- /widget-header -->
	
	<div class="widget-content">

		<?php 
		include('../config.php'); 
		if (isset($_POST['submitted'])) { 
		foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
		$sql = "INSERT INTO `instituicoes` ( `nome` ,  `desc` ,  `criado_em`  ) VALUES(  '{$_POST['nome']}' ,  '{$_POST['desc']}' ,  NOW()  ) "; 
		mysql_query($sql) or die(mysql_error()); 
		echo "Registro efetuado com sucesso.<br />";
		echo "<meta http-equiv='refresh' content='0; url=index.php' />";
		} 
		?>

		<form action='' method='POST'> 
		<b>Nome:</b><br /><input type='text' name='nome'/> <br />
		<b>Descrição:</b><br /><input type='text' name='desc'/> <br />
		<input type='submit' value='Salvar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 
		</form> 
	</div>
</div>

<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>
<?php } ?>
