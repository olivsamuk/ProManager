<?
$projeto_id=$_GET["projeto_id"];
include('../config.php'); 
?>



<div class="row-fluid">
	<?
	$counter=1;
	$result = mysql_query("SELECT * FROM `demandas` where projeto_id=$projeto_id and status=3") or trigger_error(mysql_error()); 
	while($row = mysql_fetch_array($result)){ 
	foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }  
	$resultado = $counter%2; 

	 if($resultado == 0){ ?>

		<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
			<div class="post" id="<? echo $row['id']; ?>" draggable="true" ondragstart="drag(event)"><? echo $row['titulo'] . $row['id']; ?></div>
		</div>
	</div>
	<div class="row-fluid">
	<?}else{?>
		<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
			<div class="post" id="<? echo $row['id']; ?>" draggable="true" ondragstart="drag(event)"><? echo $row['titulo'] . $row['id']; ?></div>
		</div>
	<?}?>

	<?$counter++;}?>


		<div class='span6 prepost novademanda' id='3' ondrop='drop(event)' ondragover='allowDrop(event)'>Solte demandas aqui!</div>

</div><!--/row-fluid-->
