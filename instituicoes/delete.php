<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');
?>


<? 
include('../config.php'); 
$id = (int) $_GET['id']; 
mysql_query("DELETE FROM `instituicoes` WHERE `id` = '$id' ") ; 
echo (mysql_affected_rows()) ? "<h3>Dados removidos com sucesso</h3><br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='index.php' class='btn btn-primary'>Voltar</a>

<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>

