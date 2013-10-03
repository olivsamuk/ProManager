<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');

	include('../config.php'); 

	$id = (int) $_GET['id']; 
	$cliente = mysql_fetch_array ( mysql_query("SELECT * FROM `clientes` WHERE `id` = '$id'")); 
	
?>

<link rel="stylesheet" type="text/css" href="../assets/css/base-admin.css">

<ul class="breadcrumb">
	<li><a href="../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="index.php">Clientes</a> <span class="divider">|</span></li>
	<li class="active"><? echo $cliente['nome']; ?></li>
</ul>


<div class="row">
	<div class="span4">

		<div class="widget">
				
			<div class="widget-header">
				<i class="icon-th-list"></i>
				<h3><? echo $cliente['nome']; ?></h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
				<b>Descrição:</b>
				<? echo $cliente['desc']; ?><br />
				<b>Data de Criação:</b>
				<? echo $cliente['criado_em']; ?>
			</div>
		</div>
		<a href="edit.php?id=<? echo $id; ?>" class="btn btn-primary">Editar Informações</a>
	</div>

	<div class="span8">

		<div class="widget widget-table action-table">
				
			<div class="widget-header">
				<i class="icon-th-list"></i>
				<h3>Solicitantes</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
		

				<div id="txtHint">
					<?
					$result = mysql_query("SELECT * FROM solicitantes where cliente_id=$id ");

					echo "<table class='table table-bordered'>";
					?>
			
					<tr>
						<th>Nome</th>
						<th>Cargo</th>
						<th>Ações</th>
					</tr>				
					<?

					while($row = mysql_fetch_array($result))
						{
						echo "<tr>";
						echo "<td>" . $row['nome'] . "</td>";
						echo "<td>" . $row['cargo'] . "</td>";
						
						echo "<td>
							<a class='btn btn-small btn-primary' title='Editar' href=solicitantes/edit.php?id={$row['id']}&id_={$id}><i class='btn-icon-only icon-edit'></i></a>
							<a class='btn btn-small btn-danger' title='Remover' href=solicitantes/delete.php?id={$row['id']}&id_=$id><i class='btn-icon-only icon-remove'></i></a>
						</td>";
						echo "</tr>";
						}
					echo "</table>";?>
				</div>
			</div>
		</div>
		<a href="solicitantes/new.php?id=<? echo $id; ?>" class="btn btn-primary">Novo Solicitante</a>
	</div>
</div>

<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
	
?>
