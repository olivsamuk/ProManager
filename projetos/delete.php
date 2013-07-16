<?php
	include('../layouts/header.php');
	eval(file_get_contents('../layouts/header.php'));
?>

<? 
include('../config.php'); 
$id = (int) $_GET['id']; 
mysql_query("DELETE FROM `projetos` WHERE `id` = '$id' ") ; 
echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='index.php'>Back To Listing</a>

<?php
	include('../layouts/footer.php');
	eval(file_get_contents('../layouts/footer.php'));
?>
