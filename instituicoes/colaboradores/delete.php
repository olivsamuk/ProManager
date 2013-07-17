<link href="../../assets/stylesheets/bootstrap.css" rel="stylesheet">
<link href="../../assets/stylesheets/bootstrap-responsive.css" media="all" rel="stylesheet" type="text/css">

<? 
include('../../config.php'); 
$id = (int) $_GET['id']; 
mysql_query("DELETE FROM `setores` WHERE `id` = '$id' ") ; 
echo (mysql_affected_rows()) ? "<h3>Dados removidos com sucesso</h3><br /><a href='' onclick='history.go(-1)'>Voltar</a> " : "Nothing deleted.<br /> "; 
?> 
