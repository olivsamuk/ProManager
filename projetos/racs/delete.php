<?php
	include('../../layouts/header_.php');
	eval(file_get_contents('../../layouts/header_.php'));
?>

<? 
include('../../config.php'); 
$id = (int) $_GET['id']; 
$id_ = (int) $_GET['id_'];
mysql_query("DELETE FROM `rac` WHERE `id` = '$id' ") ; 

echo (mysql_affected_rows()) ? "<h3>Registro Removido!</h3><br /> " : "Nothing deleted.<br /> "; 
?> 

<a href="index.php?id=<? echo $id_; ?>">Voltar</a>

<?php
	include('../../layouts/footer_.php');
	eval(file_get_contents('../layouts/footer_.php'));
?>
