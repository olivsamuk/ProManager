<?php
	include('../layouts/header.php');
	eval(file_get_contents('../layouts/header.php'));

	include('../config.php'); 

	$id = (int) $_GET['id']; 
	$cliente = mysql_fetch_array ( mysql_query("SELECT * FROM `clientes` WHERE `id` = '$id'")); 
	
?>

<ul class="breadcrumb">
	<li><a href="../">Início</a> <span class="divider">|</span></li>
	<li><a href="index.php">Clientes</a> <span class="divider">|</span></li>
	<li class="active"><? echo $cliente['nome']; ?></li>
</ul>


<div class="row">
	<div class="span4">
		<h3><? echo $cliente['nome']; ?></h3>
		<b>Descrição:</b>
		<? echo $cliente['desc']; ?><br />
		<b>Data de Criação:</b>
		<? echo $cliente['criado_em']; ?>
		<br /><br />
		<a href="edit.php?id=<? echo $id; ?>" class="btn btn-primary">Editar</a>
	</div>

	<div class="span8">
		<h3>Solicitantes</h3>

		<div id="txtHint">
			<?
			$result = mysql_query("SELECT * FROM solicitantes where cliente_id=$id ");

			echo "<table class='table table-bordered'>";
			?>
	
			<tr>
				<th>Nome</th>
				<th>Cargo</th>
				<th>Ações</th>				
			<?

			while($row = mysql_fetch_array($result))
				{
				echo "<tr>";
				echo "<td>" . $row['nome'] . "</td>";
				echo "<td>" . $row['cargo'] . "</td>";
				echo "<td><a href='solicitantes/edit.php?id=" . $row['id'] . "&id_=" . $id ."'>Editar</a></td>";
				echo "<td><a href='solicitantes/delete.php?id=" . $row['id'] . "&id_=" . $id ."'>Remover</a></td>";
				echo "</tr>";
				}
			echo "</table>";?>
		</div>

		<a href="solicitantes/new.php?id=<? echo $id; ?>" class="btn btn-primary">Novo Solicitante</a>
	</div>

</div>

<?php
	include('../layouts/footer.php');
	eval(file_get_contents('../layouts/footer.php'));
	
?>


