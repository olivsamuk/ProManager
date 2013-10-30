<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');
?>

<ul class="breadcrumb">
	<li><a href="../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="index.php">Seus Projetos</a> <span class="divider">|</span></li>
	<li class="active">Editar Projeto</li>
</ul>

<div class="row">
	<div class="span12">

    <div class="widget">
        
      <div class="widget-header">
        <i class="icon-th-list"></i>
        <h3>Editar Projeto</h3>
      </div> <!-- /widget-header -->
      
      <div class="widget-content">
				<?php
				include('../config.php'); 
				if (isset($_GET['id']) ) { 
				$id = (int) $_GET['id']; 
				if (isset($_POST['submitted'])) { 
				foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
				$sql = "UPDATE `projetos` SET  `titulo` =  '{$_POST['titulo']}' ,  `desc` =  '{$_POST['desc']}' ,  `criado_em` =  '{$_POST['criado_em']}' ,  `atualizado_em` =  '{$_POST['atualizado_em']}'   WHERE `id` = '$id' "; 
				mysql_query($sql) or die(mysql_error()); 
				echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
				echo "<a href='index.php'>Back To Listing</a>"; 
				} 
				$row = mysql_fetch_array ( mysql_query("SELECT * FROM `projetos` WHERE `id` = '$id' ")); 
				?>

				<form action='' method='POST'> 
				<b>Titulo:</b><br /><input type='text' name='titulo' value='<?= stripslashes($row['titulo']) ?>' /> <br />
				<b>Desc:</b><br /><textarea name='desc'><?= stripslashes($row['desc']) ?></textarea> <br />
				
				<input type='submit' class='btn btn-primary' value='Editar' /><input type='hidden' value='1' name='submitted' /> <br />
				</form> 
				<?php } ?> 
	</div>
</div>



<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>
