<?php
	include('../../layouts/header_.php');
	file_get_contents('../../layouts/header_.php');

	include('../../config.php'); 
	$projeto_id = (int) $_GET['projeto_id'];
	$projeto = mysql_fetch_array ( mysql_query("SELECT * FROM `projetos` WHERE `id` = '$projeto_id'"));
?>

<ul class="breadcrumb">
	<li><a href="../../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="../index.php">Projetos</a> <span class="divider">|</span></li>
	<li><a href=""><?php echo $projeto['titulo']; ?></a> <span class="divider">|</span></li>
	<li class="active">Editar RAC</li>
</ul>

<div class="row">
	<div class="span12">

	<div class="widget">
		
		<div class="widget-header">
			<i class="icon-th-list"></i>
			<h3>Editar RAC</h3>
		</div> <!-- /widget-header -->
	
		<div class="widget-content">

			<?php 
			if (isset($_GET['id']) ) { 
			$id = (int) $_GET['id']; 
			if (isset($_POST['submitted'])) { 
			foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
			$sql = "UPDATE `rac` SET  `motivo` =  '{$_POST['motivo']}' ,  `etapa` =  '{$_POST['etapa']}' , `solicitante_id` =  '{$_POST['solicitante_id']}'   WHERE `id` = '$id' "; 
			mysql_query($sql) or die(mysql_error()); 
			echo (mysql_affected_rows()) ? "Edição Concluída.<br />" : "Erro. <br />"; 
			echo "<a href='index.php?id={$projeto_id}'>Voltar</a>"; 
			} 
			$row = mysql_fetch_array ( mysql_query("SELECT * FROM `rac` WHERE `id` = '$id' ")); 
			?>

			<form action='' method='POST'> 
			<b>Motivo:</b><br /><textarea name='motivo'><?= stripslashes($row['motivo']) ?></textarea> <br/>
			<b>Etapa:</b><br /><input type='text' name='etapa' value='<?= stripslashes($row['etapa']) ?>' /> <br />
			<b>Solicitante:</b><br />
			<select name='solicitante_id'>
				<?php 
					$QuerySolicitantes = mysql_query("SELECT * from solicitantes where cliente_id={$projeto['cliente_id']}");
					while($solicitante = mysql_fetch_array($QuerySolicitantes)){
				?>
				<option value="<?php echo $solicitante['id']; ?>"><?php echo $solicitante['nome']; ?></option>
				<?php } ?>
			</select><br />
			<input type='submit' value='Editar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 
			</form> 
			<?php } ?> 

		</div>
	</div>
</div>


<?php
	include('../../layouts/footer_.php');
	file_get_contents('../../layouts/footer_.php');
?>
