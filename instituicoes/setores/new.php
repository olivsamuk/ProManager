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
	<li class="active">Novo Setor</li>
</ul>

<div class="row">
	<div class="span12">

		<div class="widget">
			
			<div class="widget-header">
				<i class="icon-th-list"></i>
				<h3>Novo Setor</h3>
			</div> <!-- /widget-header -->
		
			<div class="widget-content">

				<? 
				if (isset($_POST['submitted'])) { 
				foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
				$sql = "INSERT INTO `setores` ( `nome` ,  `desc` ,  `criado_em` , `instituicao_id`  ) VALUES(  '{$_POST['nome']}' ,  '{$_POST['desc']}' ,  NOW() , '{$_POST['instituicao_id']}'  ) "; 
				mysql_query($sql) or die(mysql_error()); 
				echo "Registro efetuado com sucesso.<br />"; 
				echo "<a href='../show.php?id=$id'>Voltar</a>"; 
				}
				?>

				<form action='' id='InfroText' method='POST'> 
				<input type='hidden' name='instituicao_id' value='<? echo $id; ?>' /> 
				<b>Nome:</b><br /><input type='text' id='nome' name='nome'/> <br />
				<b>Descrição:</b><br /><input type='text' name='desc'/> <br />
				<input type='submit' value='Salvar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 
				</form> 
			</div>
		</div>
	</div>
</div>

<?php
	include('../../layouts/footer_.php');
	file_get_contents('../../layouts/footer_.php');
?>
<?php } ?>
