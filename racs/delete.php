<?php
	include('../layouts/header.php');
	eval(file_get_contents('../layouts/header.php'));
?>

<? 
include('../config.php'); 
$id = (int) $_GET['id']; 
mysql_query("DELETE FROM `clientes` WHERE `id` = '$id' ") ; 
echo (mysql_affected_rows()) ? "<h3>Registro Removido!</h3><br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='index.php'>Voltar</a>

<?php
	include('../layouts/footer.php');
	eval(file_get_contents('../layouts/footer.php'));
?>
