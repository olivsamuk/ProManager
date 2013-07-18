<?php
	include('../layouts/header.php');
	eval(file_get_contents('../layouts/header.php'));

	include('../config.php'); 

	$id = (int) $_GET['id']; 
	$cliente = mysql_fetch_array ( mysql_query("SELECT * FROM `clientes` WHERE `id` = '$id'")); 
	
?>

<div class="row">
	<div class="span6">
		<h3><? echo $cliente['nome']; ?></h3>
		<b>Descrição:</b>
		<? echo $cliente['desc']; ?><br />
		<b>Data de Criação:</b>
		<? echo $cliente['criado_em']; ?>
	</div>

	<div class="span6">
		<h3>Solicitantes</h3>

		<div id="txtHint">
			<?
			$result = mysql_query("SELECT * FROM solicitantes where cliente_id=$id ");

			echo "<table class='table table-bordered'>";

			while($row = mysql_fetch_array($result))
				{
				echo "<tr>";
				echo "<td>" . $row['nome'] . "</td>";
				echo "</tr>";
				}
			echo "</table>";?>
		</div>

		<a href="solicitantes/new.php?id=<? echo $id; ?>" class="btn btn-primary">Novo Solicitante</a>
	</div>

</div>

<div class="row">
	<div class="span12">
		<br/><br/>
		<a href='index.php'>Voltar</a>
	</div>
</div>

<?php
	include('../layouts/footer.php');
	eval(file_get_contents('../layouts/footer.php'));
	
?>


