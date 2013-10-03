<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');
?>

<ul class="breadcrumb">
	<li><a href="../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="index.php">Clientes</a> <span class="divider">|</span></li>
	<li class="active">Editar dados de Cliente</li>
</ul>


<div class="row">
	<div class="span12">

		<div class="widget">
				
			<div class="widget-header">
				<i class="icon-th-list"></i>
				<h3>Editar dados do Cliente</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">

				<? 
				include('../config.php'); 
				if (isset($_GET['id']) ) { 
				$id = (int) $_GET['id']; 
				if (isset($_POST['submitted'])) { 
				foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
				$sql = "UPDATE `clientes` SET  `nome` =  '{$_POST['nome']}' ,  `desc` =  '{$_POST['desc']}'   WHERE `id` = '$id' "; 
				mysql_query($sql) or die(mysql_error()); 
				echo (mysql_affected_rows()) ? "Edição concluída.<br />" : "Nothing changed. <br />"; 
				echo "<a href='index.php'>Voltar</a>"; 
				} 
				$row = mysql_fetch_array ( mysql_query("SELECT * FROM `clientes` WHERE `id` = '$id' ")); 
				?>

				<form action='' method='POST'> 
				<b>Titulo:</b><br /><input type='text' name='nome' value='<?= stripslashes($row['nome']) ?>' /> <br />
				<b>Desc:</b><br /><input type='text' name='desc' value='<?= stripslashes($row['desc']) ?>' /> <br />
				<input type='submit' value='Editar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 
				</form> 
				<? } ?> 

			</div>
		</div>
	</div>
</div>


<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>
