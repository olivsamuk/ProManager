<?php
	include('../../layouts/header_.php');
	eval(file_get_contents('../../layouts/header_.php'));

include('../../config.php'); 
$id = (int) $_GET['id']; 
?>

<h3>Novo Setor</h3>

<? 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `setores` ( `nome` ,  `desc` ,  `criado_em` , `instituicao_id`  ) VALUES(  '{$_POST['nome']}' ,  '{$_POST['desc']}' ,  NOW() , '{$_POST['instituicao_id']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Registro efetuado com sucesso.<br />"; 
echo "<a href='../show.php?id=$id'>Voltar</a>"; 
}
?>

<form action='' id='InfroText' method='POST'> 
<input type='hidden' name='instituicao_id' value='<? echo $id; ?>' /> 
<p><b>Nome:</b><br /><input type='text' id='nome' name='nome'/> 
<p><b>Desc:</b><br /><input type='text' name='desc'/> 
<p><input type='submit' value='Salvar' /><input type='hidden' value='1' name='submitted' /> 
</form> 

<?php
	include('../../layouts/footer_.php');
	eval(file_get_contents('../../layouts/footer_.php'));
?>

