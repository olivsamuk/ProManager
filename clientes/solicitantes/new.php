<?php
	include('../../layouts/header_.php');
	file_get_contents('../../layouts/header_.php');

include('../../config.php'); 
$id = (int) $_GET['id']; 

$cliente = mysql_fetch_array ( mysql_query("SELECT * FROM `clientes` WHERE `id` = '$id'")); 
?>

<ul class="breadcrumb">
	<li><a href="../../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="../index.php">Clientes</a> <span class="divider">|</span></li>
	<li><a href="../show.php?id=<?php echo $id; ?>"><?php echo $cliente['nome']; ?></a> <span class="divider">|</span></li>
	<li class="active">Novo Solicitante</li>
</ul>

<div class="widget">
		
	<div class="widget-header">
		<i class="icon-th-list"></i>
		<h3>Novo Solicitante <small> - Insira os dados do solicitante do cliente <?php echo $cliente['nome']; ?></small></h3>
	</div> <!-- /widget-header -->
	
	<div class="widget-content">
		<?php 
		if (isset($_POST['submitted'])) { 
		foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
		$sql = "INSERT INTO `solicitantes` ( `nome` , `cargo` , `email`, `telefone` , `cliente_id` ,  `criado_em`  ) VALUES(  '{$_POST['nome']}' , '{$_POST['cargo']}' , '{$_POST['email']}' , '{$_POST['telefone']}' ,   '{$_POST['cliente_id']}' ,  NOW()  ) "; 
		mysql_query($sql) or die(mysql_error()); 
		echo "Registro efetuado com sucesso.<br />"; 
		echo "<meta http-equiv='refresh' content='1; url=../show.php?id=$id' />";
		} 
		?>

		<form action='' method='POST'> 
			<input type='hidden' name='cliente_id' value='<?php echo $id; ?>'><br />
			<b>Nome:</b><br /><input type='text' name='nome'/> <br />
			<b>Cargo:</b><br /><input type='text' name='cargo'/> <br />
			<b>Email:</b><br /><input type='text' name='email'/> <br />
			<b>Telefone:</b><br /><input type='text' name='telefone'/> <br />

			<p><input type='submit' value='Salvar' class='btn btn-primary'><input type='hidden' value='1' name='submitted' /> 

		</form> 
	
	</div>
</div>
