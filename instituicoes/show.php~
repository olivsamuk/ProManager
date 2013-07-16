<?php
	include('../layouts/header.php');
	eval(file_get_contents('../layouts/header.php'));

	include('../config.php'); 

	$id = (int) $_GET['id']; 
	$instituicao = mysql_fetch_array ( mysql_query("SELECT * FROM `instituicoes` WHERE `id` = '$id'")); 
?>

<div class="row">
	<div class="span4">
		<h3><? echo $instituicao['nome']; ?></h3>
		<b>Descrição:</b>
		<? echo $instituicao['desc']; ?><br />
		<b>Data de Criação:</b>
		<? echo $instituicao['criado_em']; ?>
	</div>

	<div class="span4">
		<h3>Setores</h3>
		<table class="table table-bordered">
			<tr>
				<th>Nome</th>
				<th>Ações</th>
			<tr>
			<?
			$counter=0;
			$find_setores = mysql_query("SELECT * FROM `setores`") or trigger_error(mysql_error()); 
			while($setor = mysql_fetch_array($find_setores)){ 
			?>
				<tr>
					<td><a href=""><? echo $setor['nome']; ?></a></td>
					<td>
						<a href="#myModalEdit<? echo $counter; ?>" role="button" class="btn" data-toggle="modal">Editar</a> |
						<a href="setores/delete.php?id=<? echo $setor['id']; ?>">Remover</a>
						<!-- Modal Setores/Edit -->
						<div id="myModalEdit<? echo $counter; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 id="myModalLabel">Modal header</h3>
						</div>
						<div class="modal-body">
						<?
						$tela = $setor['id'];
						//include('setores/edit.php'); //PROBLEMAAAAAA
						?>
						</div>
						<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						<button class="btn btn-primary">Save changes</button>
						</div>
						</div>
				
					</td>
				</tr>
			<?$counter++;}?>
		</table>
    <!-- Button to trigger modal -->
    <a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal">Novo Setor</a>
     
	</div>

	<div class="span4">
		<h3>Colaboradores</h3>
		Filtro:
		<select>
			<option>Todos</option>
			<option>Getec</option>
			<option>Geprod</option>
			<option>Gesist</option>
			<option>Gafin</option>		
		</select>
		<br />
		<ul class="nav nav-tabs nav-stacked">
			<li><a href="">Samuel Silva de Oliveira</a></li>
			<li><a href="">Bruno Garcia</a></li>
			<li><a href="">Pedro Moutinho</a></li>
			<li><a href="">Márcio Brasil</a></li>
			<li><a href="">Célio COnrado</a></li>
			<li><a href="">Ronaldo Miranda</a></li>
		</ul>
		<a href="" class="btn btn-primary">Novo Colaborador</a>
	</div>

</div>

<div class="row">
	<div class="span12">
		<br/><br/>
		<a href='index.php'>Voltar</a>
	</div>
</div>

<!-- Modal Setores/New -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Modal header</h3>
</div>
<div class="modal-body">
<?include('setores/new.php');?>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button class="btn btn-primary">Save changes</button>
</div>
</div>




<?
	include('../layouts/footer.php');
	eval(file_get_contents('../layouts/footer.php'));
?>
