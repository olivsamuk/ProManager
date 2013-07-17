<? 
include('../../layouts/header_.php');
eval(file_get_contents('../../layouts/header_.php'));

include('../../config.php'); 
$id = (int) $_GET['id']; 
mysql_query("DELETE FROM `setores` WHERE `id` = '$id' ") ; 
echo (mysql_affected_rows()) ? "<h3>Dados removidos com sucesso</h3><br /><a href='' onclick='history.go(-1)'>Voltar</a> " : "Nothing deleted.<br /> "; 
?> 
