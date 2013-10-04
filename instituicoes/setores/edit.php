<?
include('../../layouts/header_.php');
file_get_contents('../../layouts/header_.php');

include('../../config.php'); 
$id = (int) $_GET['id']; 
$id_ = (int) $_GET['id_']; 

$instituicao = mysql_fetch_array ( mysql_query("SELECT * FROM `instituicoes` WHERE `id` = '$id_'")); 

	if (!$_SESSION['permissao'] == 1) {
		echo "<div class='alert'><strong>Atenção!</strong> Você não tem as permissões necessárias para acessar esta página.</div>";
		echo "<meta http-equiv='refresh' content='2; url=../../projetos/index.php' />";
	}else{
?>

<ul class="breadcrumb">
	<li><a href="../../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="../index.php">Instituições</a> <span class="divider">|</span></li>
	<li><a href="../show.php?id=<? echo $id_; ?>"><? echo $instituicao['nome']; ?></a> <span class="divider">|</span></li>
	<li class="active">Editar Setor</li>
</ul>

<div class="row">
	<div class="span12">

	<div class="widget">
		
		<div class="widget-header">
			<i class="icon-th-list"></i>
			<h3>Colaboradores</h3>
		</div> <!-- /widget-header -->
	
		<div class="widget-content">

			<h3>Editar Setor</h3>
			<?
			if (isset($_POST['submitted'])) { 
			foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
			$sql = "UPDATE `setores` SET  `nome` =  '{$_POST['nome']}' ,  `desc` =  '{$_POST['desc']}' ,  `criado_em` =  '{$_POST['criado_em']}'   WHERE `id` = '$id' "; 
			mysql_query($sql) or die(mysql_error()); 
			echo (mysql_affected_rows()) ? "Edição Cncluída.<br />" : "Nothing changed. <br />"; 
			echo "<a href='../show.php?id=$id_'>Voltar</a><br />"; 
			} 
			$row = mysql_fetch_array ( mysql_query("SELECT * FROM `setores` WHERE `id` = '$id' ")); 
			?>


			<form action='' method='POST'> 
			<b>Nome:</b><br /><input type='text' name='nome' value='<?= stripslashes($row['nome']) ?>' /> <br />
			<b>Desc:</b><br /><input type='text' name='desc' value='<?= stripslashes($row['desc']) ?>' /> <br />			
			<input type='submit' value='Editar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 
			</form> 
		</div>
	</div>
</div>


<?
	include('../../layouts/footer_.php');
	file_get_contents('../../layouts/footer_.php');
?>
<?php } ?>