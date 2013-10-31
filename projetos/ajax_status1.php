<?php
$projeto_id=$_GET["projeto_id"];
include('../config.php'); 
?>

<div class="row-fluid">
	<div class='span6 prepost novademanda' id='1' ondrop='drop(event)' ondragover='allowDrop(event)'>Solte demandas aqui!</div>

	<?php
	$counter=1;
	$result = mysql_query("SELECT * FROM `demandas` where projeto_id=$projeto_id and status=1") or trigger_error(mysql_error()); 
	while($row = mysql_fetch_array($result)){ 
	foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }  
	$resultado = $counter%2; 

	 if(!$resultado == 0){ ?>

		<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
			<div class="post" id="<?php echo $row['id']; ?>" draggable="true" ondragstart="drag(event)">
				<?php echo $row['titulo']; ?>
				<br />
				<small class='desc'><?php echo substr ($row['desc'], 0, 20) . "..."; ?></small>
				<?php
				$find_problemas = mysql_query("SELECT * from `problemas` where demanda_id = {$row['id']}");
				while($problema = mysql_fetch_array($find_problemas)){			
					echo "<span class='label label-important' title='{$problema['titulo']} - {$problema['conteudo']}'>* Problema</span>";
				}								
				?>
			</div>
		</div>
	</div>
	<div class="row-fluid">
	<?php }else{ ?>
		<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
			<div class="post" id="<?php echo $row['id']; ?>" draggable="true" ondragstart="drag(event)">
				<?php echo $row['titulo']; ?>
				<br />
				<small class='desc'><?php echo substr ($row['desc'], 0, 20) . "..."; ?></small>
				<?php
				$find_problemas = mysql_query("SELECT * from `problemas` where demanda_id = {$row['id']}");
				while($problema = mysql_fetch_array($find_problemas)){			
					echo "<span class='label label-important' title='{$problema['titulo']} - {$problema['conteudo']}'>* Problema</span>";
				}								
				?>
			</div>
		</div>
	<?php } ?>

	<?php $counter++;} ?>


		

</div><!--/row-fluid-->
