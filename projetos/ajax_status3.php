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
			<div class="post" id="<? echo $row['id']; ?>" draggable="true" ondragstart="drag(event)">
				<? echo $row['titulo']; ?>
				<br />
				<small class='desc'><? echo substr ($row['desc'], 0, 20) . "..."; ?></small>
				<?
				$find_problemas_ii = mysql_query("SELECT * from `problemas` where demanda_id = {$row['id']}");
				while($problema = mysql_fetch_array($find_problemas_ii)){			
					echo "<span class='label label-important' title='{$problema['titulo']} - {$problema['conteudo']}'>* Problema</span>";
				}								
				?>
			</div>
		</div>
	</div>
	<div class="row-fluid">
	<?}else{?>
		<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
			<div class="post" id="<? echo $row['id']; ?>" draggable="true" ondragstart="drag(event)">
				<? echo $row['titulo']; ?>
				<br />
				<small class='desc'><? echo substr ($row['desc'], 0, 20) . "..."; ?></small>
				<?
				$find_problemas_ii = mysql_query("SELECT * from `problemas` where demanda_id = {$row['id']}");
				while($problema = mysql_fetch_array($find_problemas_ii)){			
					echo "<span class='label label-important' title='{$problema['titulo']} - {$problema['conteudo']}'>* Problema</span>";
				}								
				?>
			</div>
		</div>
	<?}?>

	<?$counter2++;}?>

		<div class='span6 prepost novademanda' id='3' ondrop='drop(event)' ondragover='allowDrop(event)'>Solte demandas aqui!</div>
</div>
