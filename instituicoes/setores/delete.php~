<? 
include('../../config.php'); 
$id = (int) $_GET['id']; 
mysql_query("DELETE FROM `setores` WHERE `id` = '$id' ") ; 
echo (mysql_affected_rows()) ? "<h3>Dados removidos com sucesso</h3><br /> " : "Nothing deleted.<br /> "; 
?> 
