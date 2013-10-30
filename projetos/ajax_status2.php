<?php
$q=$_GET["q"];
$projeto_id=$_GET["projeto_id"];
$id = substr($q, 1);
$status = $q{0};

include('../config.php'); 

mysql_query("UPDATE `promanager`.`demandas` SET `status`=$status WHERE `id`='$id';");

echo "<div class='row-fluid'>";

$counter2=1;
$demandas_status2 = mysql_query("SELECT * FROM `demandas` where projeto_id=$projeto_id and status=2") or trigger_error(mysql_error()); 
while($registro2 = mysql_fetch_array($demandas_status2)){ 
foreach($registro2 AS $key => $value) { $registro2[$key] = stripslashes($value); }  
$resultado = $counter2%2; 

 if($resultado == 0){ ?>
	<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
		<div class="post" id="<? echo $registro2['id']; ?>" draggable="true" ondragstart="drag(event)">
			<? echo $registro2['titulo']; ?>
			<br />
			<small class='desc'><? echo substr ($registro2['desc'], 0, 20) . "..."; ?></small>
			<?php
			$find_problemas_i = mysql_query("SELECT * from `problemas` where demanda_id = {$registro2['id']}");
			while($problema = mysql_fetch_array($find_problemas_i)){			
				echo "<span class='label label-important' title='{$problema['titulo']} - {$problema['conteudo']}'>* Problema</span>";
			}								
			?>
		</div>
	</div>
</div>
<div class="row-fluid">
<?php }else{ ?>
	<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
		<div class="post" id="<? echo $registro2['id']; ?>" draggable="true" ondragstart="drag(event)">
			<?php echo $registro2['titulo']; ?>
			<br />
			<small class='desc'><?php echo substr ($registro2['desc'], 0, 20) . "..."; ?></small>
			<?php
			$find_problemas_i = mysql_query("SELECT * from `problemas` where demanda_id = {$registro2['id']}");
			while($problema = mysql_fetch_array($find_problemas_i)){			
				echo "<span class='label label-important' title='{$problema['titulo']} - {$problema['conteudo']}'>* Problema</span>";
			}								
			?>
		</div>
	</div>
<?php } ?>

<?php $counter2++;} ?>

	<div class='span6 prepost novademanda' id='2' ondrop='drop(event)' ondragover='allowDrop(event)'>Solte demandas aqui!</div>


