<?
include('../../layouts/header_.php');
file_get_contents('../../layouts/header_.php');

include('../../config.php'); 
$id = (int) $_GET['id']; 
$id_ = (int) $_GET['id_']; 

$cliente = mysql_fetch_array ( mysql_query("SELECT * FROM `clientes` WHERE `id` = '$id_'")); 
?>

<ul class="breadcrumb">
	<li><a href="../../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="../index.php">Clientes</a> <span class="divider">|</span></li>
	<li><a href="../show.php?id=<? echo $id_; ?>"><? echo $cliente['nome']; ?></a> <span class="divider">|</span></li>
	<li class="active">Editar Solicitante</li>
</ul>


<div class="row">
	<div class="span12">

		<div class="widget">
				
			<div class="widget-header">
				<i class="icon-th-list"></i>
				<h3>Editar Solicitante</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">


				<?
				if (isset($_POST['submitted'])) { 
				foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
				$sql = "UPDATE `solicitantes` SET  `nome` =  '{$_POST['nome']}' ,  `cliente_id` =  '{$_POST['cliente_id']}' , `cargo` =  '{$_POST['cargo']}' , `telefone` =  '{$_POST['telefone']}' , `email` =  '{$_POST['email']}' , `criado_em` =  NOW()  WHERE `id` = '$id' "; 
				mysql_query($sql) or die(mysql_error()); 
				echo (mysql_affected_rows()) ? "Edição Cncluída.<br />" : "Nothing changed. <br />"; 
				echo "<a href='../show.php?id=$id_'>Voltar</a><br />"; 
				} 
				$row = mysql_fetch_array ( mysql_query("SELECT * FROM `solicitantes` WHERE `id` = '$id' ")); 
				?>


				<form action='' method='POST'>
				<input type='hidden' name='cliente_id' value='<? echo $id_ ?>' /> 
				<b>Nome:</b><br /><input type='text' name='nome' value='<?= stripslashes($row['nome']) ?>' /> <br />
				<b>Cargo:</b><br /><input type='text' name='cargo' value='<?= stripslashes($row['cargo']) ?>' /> <br />
				<b>Telefone:</b><br /><input type='text' name='telefone' value='<?= stripslashes($row['telefone']) ?>' /> <br />
				<b>Email:</b><br /><input type='text' name='email' value='<?= stripslashes($row['email']) ?>' /> <br />
				<input type='submit' value='Editar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 
				</form> 
			</div>
		</div>
	</div>
</div>


<?
	include('../../layouts/footer_.php');
	file_get_contents('../../layouts/footer_.php');
?>
