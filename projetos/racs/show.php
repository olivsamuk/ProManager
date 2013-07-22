<?
	include('../../layouts/header_.php');
	eval(file_get_contents('../../layouts/header_.php'));


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
	<li><a href="../../">Início</a> <span class="divider">|</span></li>
	<li><a href="../index.php">Projetos</a> <span class="divider">|</span></li>
	<li><a href="index.php?id=<? echo $id_; ?>"><? echo $projeto['titulo']; ?> → RAC's</a> <span class="divider">|</span></li>
	<li class="active">Informações</li>
</ul>

<div class="row">
	<div class="span6">
		<h4>Informações</h4>
	</div>
	<div class="span6">
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
				<input type="submit" value="Enviar">&nbsp;<input type="reset" value="Limpar">
			</fieldset>
		</form>

		<div id="divResultado">		
			<?
			$find_demandas = mysql_query("SELECT * from `demandas` where rac_id = $id");
			echo "<table class='table table-bordered'>";
			echo "<tr><th>Titulo</th><th>Descrição</th><th>Ações</th></tr>";
			while($demanda = mysql_fetch_array($find_demandas)){ 
			?>
			<tr>
				<td><? echo $demanda['titulo']; ?></td>
				<td><? echo $demanda['desc']; ?></td>
				<td><a href="delete.php?id=<? echo $rac_id_ ?>">Remover</a></td>
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
</div>
