<?php
	include('../../layouts/header_.php');
	file_get_contents('../../layouts/header_.php');
?>

<? 
include('../../config.php'); 
$id = (int) $_GET['id']; 
$id_rac = (int) $_GET['id_rac'];
$id_projeto = (int) $_GET['id_projeto'];

mysql_query("DELETE FROM `demandas` WHERE `id` = '$id' ") ; 

echo (mysql_affected_rows()) ? "<h3>Registro Removido!</h3><br /> " : "Nothing deleted.<br /> "; 
?> 

<a href="show.php?id=<? echo $id_rac; ?>&id_=<? echo $id_projeto; ?>">Voltar</a>

<?php
	include('../../layouts/footer_.php');
	file_get_contents('../../layouts/footer_.php');
?>
