<?
	include('../../layouts/header_.php');
	file_get_contents('../../layouts/header_.php');


include('../../config.php'); 
$id = (int) $_GET['id']; 
$id_ = (int) $_GET['id_']; 

$projeto = mysql_fetch_array ( mysql_query("SELECT * FROM `projetos` WHERE `id` = '$id_'")); 
$rac = mysql_fetch_array ( mysql_query("SELECT * FROM `rac` WHERE `id` = '$id'")); 
$cliente_id = $rac['cliente_id'];
$cliente = mysql_fetch_array ( mysql_query("SELECT * FROM `clientes` WHERE `id` = '$cliente_id'")); 
$solicitante_id = $rac['solicitante_id'];
$solicitante = mysql_fetch_array ( mysql_query("SELECT * FROM `solicitantes` WHERE `id` = '$solicitante_id'")); 
?>

<ul class="breadcrumb">
	<li><a href="../../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="../index.php">Projetos</a> <span class="divider">|</span></li>
	<li><a href=""><? echo $projeto['titulo']; ?></a> <span class="divider">|</span></li>
	<li><a href="">RAC-<? echo $rac['identificacao']; ?></a> <span class="divider">|</span></li>
	<li class="active">Informações do Relatório - Demandas</li>
</ul>

<div class="row">
	<div class="span12">

		<? 
		if (isset($_POST['finalizado'])) { 
		foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }  
		$finalizar = "UPDATE `rac` SET  `finalizado` =  '{$_POST['finalizado']}' WHERE `id` = '$id' "; 
		mysql_query($finalizar) or die(mysql_error()); 
		//echo "Registro efetuado com sucesso.<br />"; 

		echo "<meta http-equiv='refresh' content='1; url=rac.php?id={$rac['id']}&id_={$projeto['id']}' />";
		}
		?>


		<h4>Informações do RAC</h4>

		<?
		$status = $rac['finalizado'];
		if($status == 1){
		?>
			<span class="label label-success">Relatório Finalizado</span><br /><br />
		<?}else{echo "<br />";}?>
		
		<b>Identificação:</b> <? echo $rac['identificacao']; ?><br /><br />
		<b>Cliente:</b> <? echo $cliente['nome']; ?><br /><br />
		<b>Solicitante:</b> <? echo $solicitante['nome']; ?><br /><br />
		<b>Diagnóstico:</b> <? echo $rac['diagnostico']; ?><br /><br />

		<?
		if($status == 0){
		?>
		<form action='' method='POST' />
			<input type='hidden' name='finalizado' value='1'>
			<input type='submit' class='btn btn-large btn-primary' value='Finalizar Relatório' />
		</form>
		<a class='btn btn-large' href="edit.php?id=<?php echo $id;?>&projeto_id=<?php echo $id_;?> ">Editar Informações</a>
		<?}?>
	</div>
</div>
