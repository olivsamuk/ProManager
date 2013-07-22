<?php

//Extrai os dados do formulário
extract($_GET); 

//Verifica se algum nome foi digitado
$titulo_ = ($titulo != "") ? $titulo : "desconhecido"; 
$desc_ = ($desc != "") ? $desc : "desconhecido";
$rac_id_ = ($rac_id != "") ? $rac_id : "desconhecido";
$projeto_id_ = ($projeto_id != "") ? $projeto_id : "desconhecido"; 
$status_ = ($status != "") ? $status : "desconhecido";


include('../../config.php'); 
$sql = "INSERT INTO `demandas` (`titulo` , `desc` , `criado_em` , `rac_id` , `projeto_id` , `status` ) VALUES(  '$titulo_' , '$desc_' , NOW() , '$rac_id_' , '$projeto_id_' , '$status_' ) "; 
mysql_query($sql) or die(mysql_error()); 


$find_demandas = mysql_query("SELECT * from `demandas` where rac_id = $rac_id_");


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
