<? 
include('../../layouts/header_.php');
file_get_contents('../../layouts/header_.php');

include('../../config.php'); 
$id = (int) $_GET['id']; 
$id_ = (int) $_GET['id_'];
mysql_query("DELETE FROM `solicitantes` WHERE `id` = '$id' ") ; 
echo (mysql_affected_rows()) ? "<h3>Dados removidos com sucesso</h3><br /><a href='../show.php?id=$id_' class='btn btn-primary'>Voltar</a> " : "Nothing deleted.<br /> "; 
?> 
