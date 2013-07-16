<?php
	include('../layouts/header.php');
	eval(file_get_contents('../layouts/header.php'));
?>

<? 
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `projetos` ( `titulo` ,  `desc` ,  `criado_em` ,  `atualizado_em`  ) VALUES(  '{$_POST['titulo']}' ,  '{$_POST['desc']}' ,  '{$_POST['criado_em']}' ,  '{$_POST['atualizado_em']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Added row.<br />"; 
echo "<a href='index.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 

<b>Titulo:</b><br /><input type='text' name='titulo'/> <br/>
<b>Descrição:</b><br /><textarea name='desc'/></textarea><br />
<input type='submit' value='Salvar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 

</form> 


<?php
	include('../layouts/footer.php');
	eval(file_get_contents('../layouts/footer.php'));
?>
