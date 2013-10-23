<?php
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
	<li><a href="../show.php?id=<?php echo $id_; ?>"><?php echo $instituicao['nome']; ?></a> <span class="divider">|</span></li>
	<li class="active">Editar Colaborador</li>
</ul>

<div class="row">
	<div class="span12">

	<div class="widget">
		
		<div class="widget-header">
			<i class="icon-th-list"></i>
			<h3>Editar Colaborador</h3>
		</div> <!-- /widget-header -->
	
		<div class="widget-content">

			<?php
			if (isset($_POST['submitted'])) { 
			foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
			$sql = "UPDATE `colaboradores` SET  `nome` =  '{$_POST['nome']}' ,  `setor_id` =  '{$_POST['setor_id']}' ,  `email` =  '{$_POST['email']}' ,  `permissao` =  '{$_POST['permissao']}' WHERE `id` = '$id' "; 
			mysql_query($sql) or die(mysql_error()); 
			echo (mysql_affected_rows()) ? "Edição Cncluída.<br />" : "Nothing changed. <br />"; 
			echo "<a href='../show.php?id=$id_'>Voltar</a><br />"; 
			} 
			$row = mysql_fetch_array ( mysql_query("SELECT * FROM `colaboradores` WHERE `id` = '$id' ")); 
			?>


			<form action='' method='POST'> 
			<b>Nome:</b><br /><input type='text' name='nome' value='<?= stripslashes($row['nome']) ?>' /> <br />
			<b>Setor:</b><br />
			<select name='setor_id'>
			<option>--</option>
			<?php
			$find_setores = mysql_query("SELECT * FROM `setores`") or trigger_error(mysql_error()); 
			while($setor = mysql_fetch_array($find_setores)){
			?>
			<option value="<?php echo $setor['id']; ?>"><?php echo $setor['nome']; ?></option>
			<?}?>
			</select><br />
			<b>Email:</b><br /><input type='text' name='email' value='<?php stripslashes($row['email']) ?>' /> <br />
			<b>Permissão:</b><br />
			<select name='permissao'>
				<option>--</option>
				<option value=0>Colaborador</option>
				<option value=1>Administrador</option>
			</select><br />
			<input type='submit' value='Editar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 
			</form> 
		</div>
	</div>
</div>


<?php
	include('../../layouts/footer_.php');
	file_get_contents('../../layouts/footer_.php');
?>
<?php } ?>