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
<script language="javascript" src="ajax.js" type="text/javascript"></script>

<ul class="breadcrumb">
	<li><a href="../../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="../index.php">Projetos</a> <span class="divider">|</span></li>
	<li><a href=""><? echo $projeto['titulo']; ?></a> <span class="divider">|</span></li>
	<li><a href="">RAC-<? echo $rac['identificacao']; ?></a> <span class="divider">|</span></li>
	<li class="active">Informações do Relatório - Demandas</li>
</ul>

<div class="row">
	<div class="span4">

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

		<?
		if($status == 0){
		?>
		<form action='' method='POST' />
			<input type='hidden' name='finalizado' value='1'>
			<input type='submit' class='btn btn-large btn-primary' value='Finalizar Relatório' />
		</form>
		<?}?>


	</div>

	<? if($status == 0){ ?>

	<div class="span4">
		<h4>Cadastrar Demandas</h4>
		<br />
		<form action="resultado.php" method="post" onsubmit="setarCampos(this); enviarForm('resultado.php', campos, 'divResultado'); return false;"> 
			<input type='hidden' name='rac_id' id='rac_id' value='<? echo $id; ?>' />
			<input type='hidden' name='projeto_id' id='projeto_id' value='<? echo $id_; ?>' />
			<input type='hidden' name='status' id='status' value='1' />

			<fieldset>
				<label>Titulo da Demanda</label>
				<input name="titulo" id="titulo" type="text">
				<span class="help-block">Defina um título para a Demanda.</span>
				<label>Descrição</label>
				<textarea name="desc" id="desc" /></textarea><br />
				<input type="submit" value="Enviar" class="btn btn-primary">&nbsp;<input type="reset" value="Limpar" class="btn">
			</fieldset>
		</form>
	</div>
	<div class='span4'>

		<div id="divResultado">		
			<?
			$find_demandas = mysql_query("SELECT * from `demandas` where rac_id = $id ORDER BY id DESC");
			echo "<table class='table table-bordered'>";
			echo "<tr><th>Titulo</th><th>Descrição</th><th>Ações</th></tr>";
			while($demanda = mysql_fetch_array($find_demandas)){ 
			?>
			<tr>
				<td><? echo $demanda['titulo']; ?></td>
				<td><? echo $demanda['desc']; ?></td>
				<td><a href="delete_demanda.php?id=<? echo $demanda['id']; ?>&id_rac=<? echo $id; ?>&id_projeto=<? echo $id_ ?>">Remover</a></td>
			</tr>
			<?}?>
		</div>

		<script>
		//Cria a função com os campos para envio via parâmetro
		function setarCampos() {

		campos = "titulo="+encodeURI(document.getElementById('titulo').value)+"&desc="+encodeURI(document.getElementById('desc').value)+"&rac_id="+encodeURI(document.getElementById('rac_id').value)+"&projeto_id="+encodeURI(document.getElementById('projeto_id').value)+"&status="+encodeURI(document.getElementById('status').value);

		}
		</script>

	</div>
	<?}else{?>
	<div class='span8'>
		<h4>Demandas</h4><br />
		<div id="divResultado">		
			<?
			$find_demandas = mysql_query("SELECT * from `demandas` where rac_id = $id ORDER BY id DESC");
			echo "<table class='table table-bordered'>";
			echo "<tr><th>Titulo</th><th>Descrição</th><th>Ações</th></tr>";
			while($demanda = mysql_fetch_array($find_demandas)){ 
			?>
			<tr>
				<td><? echo $demanda['titulo']; ?></td>
				<td><? echo $demanda['desc']; ?></td>
				<td><a href="delete_demanda.php?id=<? echo $demanda['id']; ?>&id_rac=<? echo $id; ?>&id_projeto=<? echo $id_ ?>">Remover</a></td>
			</tr>
			<?}?>
		</div>

		<script>
		//Cria a função com os campos para envio via parâmetro
		function setarCampos() {

		campos = "titulo="+encodeURI(document.getElementById('titulo').value)+"&desc="+encodeURI(document.getElementById('desc').value)+"&rac_id="+encodeURI(document.getElementById('rac_id').value)+"&projeto_id="+encodeURI(document.getElementById('projeto_id').value)+"&status="+encodeURI(document.getElementById('status').value);

		}
		</script>

	</div>
	<?}?>
</div>
