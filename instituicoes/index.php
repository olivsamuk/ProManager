<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');

	if (!$_SESSION['permissao'] == 1) {
		echo "<div class='alert'><strong>Atenção!</strong> Você não tem as permissões necessárias para acessar esta página.</div>";
		echo "<meta http-equiv='refresh' content='2; url=../projetos/index.php' />";
	}else{

?>

<link rel="stylesheet" type="text/css" href="../assets/css/base-admin.css">

<ul class="breadcrumb">
	<li><a href="../index.php">Início</a> <span class="divider">|</span></li>
	<li class="active">Instituições</li>
</ul>

<div class="widget widget-table action-table">
		
	<div class="widget-header">
		<i class="icon-th-list"></i>
		<h3>Instituições</h3>
	</div> <!-- /widget-header -->
	
	<div class="widget-content">
		
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Criado Em</th>
					<th class="td-actions"></th>
				</tr>
			</thead>
			<tbody>
			<?php 
			include('../config.php'); 
			$result = mysql_query("SELECT * FROM `instituicoes`") or trigger_error(mysql_error()); 
			while($row = mysql_fetch_array($result)){ 
			foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
			echo "<tr>";  
			echo "<td>" . "<b><a href='show.php?id=" . $row['id'] . "'>" . nl2br( $row['nome']) . "</a></b></td>";  
			echo "<td>" . nl2br( $row['desc']) . "</td>";  
			echo "<td>" . nl2br( $row['criado_em']) . "</td>";  
			echo "<td><a class='btn btn-primary' title='Editar' href=edit.php?id={$row['id']}><i class='btn-icon-only icon-edit'></i></a> <a title='Remover' class='btn btn-danger' href=delete.php?id={$row['id']}><i class='btn-icon-only icon-remove'></i></a></td> "; 
			echo "</tr>"; 
			} 
			echo "</tbody>";
			echo "</table>"; 
			?>
	</div> <!-- /widget-content -->	
</div> <!-- /widget -->

<br />

<a href=new.php class='btn btn-primary'>Criar nova Instituição</a>


<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>
<?php } ?>