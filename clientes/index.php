<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');
?>

<link rel="stylesheet" type="text/css" href="../assets/css/base-admin.css">

<ul class="breadcrumb">
	<li><a href="../index.php">Início</a> <span class="divider">|</span></li>
	<li class="active">Clientes</li>
</ul>


<div class="widget widget-table action-table">
		
	<div class="widget-header">
		<i class="icon-th-list"></i>
		<h3>Clientes</h3>
	</div> <!-- /widget-header -->
	
	<div class="widget-content">
		
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Data de Criação</th>
					<th class="td-actions"></th>
				</tr>
			</thead>
			<tbody>
			<?
			include("../config.php");
			$result = mysql_query("SELECT * FROM `clientes`") or trigger_error(mysql_error()); 
			while($row = mysql_fetch_array($result)){ 
			?>
				<tr>
					<td><b><a href="show.php?id=<?php echo $row['id']; ?>"><? echo $row['nome']; ?></a></b></td>
					<td><?php echo $row['desc']; ?></td>
					<td><?php echo $row['criado_em']; ?></td>
					<td> 
						<a class="btn btn-primary" title="Editar" href="edit.php?id=<? echo $row['id']; ?>"><i class='btn-icon-only icon-edit'></i></a>
						<a class="btn btn-danger" title="Remover" href="delete.php?id=<? echo $row['id']; ?>"><i class='btn-icon-only icon-remove'></i></a>
					</td>
				</tr>
				<?$counter++;}?>
			</tbody>
		</table>
	</div> <!-- /widget-content -->	
</div> <!-- /widget -->


<a class="btn btn-primary" href="new.php">Novo Cliente</a>

<br /><br />

<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>


