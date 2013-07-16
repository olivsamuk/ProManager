<?
$projeto_id=$_GET["projeto_id"];
include('../config.php'); 
?>

<legend>Lista de Demandas!</legend>
<table class="table table-bordered">
	<tr>
		<th>Nome</th>
		<th>Descrição</th>
	</tr>
	<?
	$busca_demandas = mysql_query("SELECT * FROM `demandas` where projeto_id=$projeto_id") or trigger_error(mysql_error()); 
	while($demanda = mysql_fetch_array($busca_demandas)){ 
	?>
	<tr>
		<td><? echo $demanda['titulo']; ?></td>
		<td><? echo $demanda['desc']; ?></td>
	</tr>
	<?}?>

</table>

