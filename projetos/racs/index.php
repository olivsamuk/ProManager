<?php
	include('../../layouts/header_.php');
	file_get_contents('../../layouts/header_.php');

include('../../config.php'); 
$id = (int) $_GET['id']; 
$projeto = mysql_fetch_array ( mysql_query("SELECT * FROM `projetos` WHERE `id` = '$id'")); 
?>

<link rel="stylesheet" type="text/css" href="../../assets/css/base-admin.css">

<ul class="breadcrumb">
	<li><a href="../../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="../index.php">Projetos</a> <span class="divider">|</span></li>
	<li><a href=""><?php echo $projeto['titulo']; ?></a> <span class="divider">|</span></li>
	<li class="active">Relatórios de Atendimento</li>
</ul>


<div class="widget widget-table action-table">
		
	<div class="widget-header">
		<i class="icon-th-list"></i>
		<h3>Relatórios de Atendimento (RAC's)</h3>
	</div> <!-- /widget-header -->
	
	<div class="widget-content">

		<?php 
		echo "<table class='table table-bordered table-hover'>"; 
		echo "<tr>"; 
		echo "<td><b>Identificação</b></td>"; 
		echo "<td><b>Status</b></td>"; 
		echo "<td><b>Cliente</b></td>"; 
		echo "<td><b>Solicitante</b></td>"; 
		echo "<td><b>Projeto</b></td>"; 
		echo "<td><b>Motivo</b></td>"; 
		echo "<td><b>Etapa</b></td>"; 
		echo "<td><b>Data de criação</b></td>"; 
		echo "<td><b>Ações</b></td>";
		echo "</tr>"; 
		$result = mysql_query("SELECT * FROM `rac` where projeto_id = $id") or trigger_error(mysql_error()); 
		$qtd = mysql_num_rows($result);
		if ($qtd == 0) {
			echo "<meta http-equiv='refresh' content='0; url=../index.php' />";
		}
		while($row = mysql_fetch_array($result)){ 
		foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
		$status = $row['finalizado'];
		echo "<tr>";  
		if($status == 1){
		echo "<td><b><a href='rac.php?id=" . $row['id'] . "&id_=$id'>" . nl2br( $row['identificacao']) . "</a></b></td>";  
		echo "<td valign='top'><span class='label label-success'>Relatório Finalizado</span><br /><br /></td>";  
		}else{
		echo "<td><b><a href='show.php?id=" . $row['id'] . "&id_=$id'>" . nl2br( $row['identificacao']) . "</a></b></td>";  
		echo "<td valign='top'><span class='label label-warning'>Relatório Não Finalizado</span></td>";  
		}

		$cliente_id = $row['cliente_id'];
		$cliente = mysql_fetch_array ( mysql_query("SELECT * FROM `clientes` WHERE `id` = '$cliente_id'")); 
		echo "<td valign='top'>" . $cliente['nome'] . "</td>";  

		$solicitante_id = $row['solicitante_id'];
		$solicitante = mysql_fetch_array ( mysql_query("SELECT * FROM `solicitantes` WHERE `id` = '$solicitante_id'"));
		echo "<td valign='top'>" . nl2br( $solicitante['nome']) . "</td>";   

		echo "<td valign='top'>" . nl2br( $projeto['titulo']) . "</td>";  

		echo "<td valign='top'>" . nl2br( $row['motivo']) . "</td>";  
		echo "<td valign='top'>" . nl2br( $row['etapa']) . "</td>";  

		echo "<td valign='top'>" . nl2br( $row['criado_em']) . "</td>";  

		if($status == 1){
		echo "<td><span class='label label-important'>Não existem ações disponíveis!</span></td>";
		}else{
		echo "<td><a class='btn btn-small btn-primary' title='Editar Relatório' href=edit.php?id={$row['id']}&projeto_id={$id}><i class='btn-icon-only icon-edit'></i></a> <a class='btn btn-small btn-danger' title='Remover Relatório' href=delete.php?id={$row['id']}&id_=$id><i class='btn-icon-only icon-remove'></i></a></td>"; 
		}


		echo "</tr>"; 
		} 
		echo "</table>"; 
		?>
		</div>
	</div>

<?php
	include('../../layouts/footer_.php');
	file_get_contents('../../layouts/footer_.php');
?>




