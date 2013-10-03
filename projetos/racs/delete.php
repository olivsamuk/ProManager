<?php
	include('../../layouts/header_.php');
	file_get_contents('../../layouts/header_.php');
?>

<? 
include('../../config.php'); 
$id = (int) $_GET['id']; 
$id_ = (int) $_GET['id_'];
mysql_query("DELETE rac.*, demandas.* FROM rac, demandas WHERE rac.id = '$id' AND demandas.rac_id = '$id' ") ; 

echo (mysql_affected_rows()) ? "<h3>Registro Removido!</h3><br /> " : "Nothing deleted.<br /> "; 
?> 

<a href="index.php?id=<? echo $id_; ?>">Voltar</a>

<?php
	include('../../layouts/footer_.php');
	file_get_contents('../../layouts/footer_.php');










	$sql = "DELETE produtos.*, fotos.*
        FROM produtos, fotos
        WHERE produtos.id_produto = '".$ID."'
        AND fotos.id_produto = '".$ID."'";
?>
