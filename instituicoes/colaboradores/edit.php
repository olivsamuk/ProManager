<?
include('../../layouts/header_.php');
eval(file_get_contents('../../layouts/header_.php'));

include('../../config.php'); 
$id = (int) $_GET['id']; 
$id_ = (int) $_GET['id_']; 

$instituicao = mysql_fetch_array ( mysql_query("SELECT * FROM `instituicoes` WHERE `id` = '$id_'")); 
?>

<ul class="breadcrumb">
	<li><a href="../../">Início</a> <span class="divider">|</span></li>
	<li><a href="../index.php">Instituições</a> <span class="divider">|</span></li>
	<li><a href="../show.php?id=<? echo $id_; ?>"><? echo $instituicao['nome']; ?></a> <span class="divider">|</span></li>
	<li class="active">Editar Colaborador</li>
</ul>


<h3>Editar Colaborador</h3>
<?
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `colaboradores` SET  `nome` =  '{$_POST['nome']}' ,  `setor_id` =  '{$_POST['setor_id']}' WHERE `id` = '$id' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edição Cncluída.<br />" : "Nothing changed. <br />"; 
echo "<a href='../show.php?id=$id_'>Voltar</a><br />"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `colaboradores` WHERE `id` = '$id' ")); 
?>


<form action='' method='POST'> 
<p><b>Nome:</b><br /><input type='text' name='nome' value='<?= stripslashes($row['nome']) ?>' /> 
<p><b>Setor:</b><br />
<select name='setor_id'>
<option>--</option>
<?
$find_setores = mysql_query("SELECT * FROM `setores`") or trigger_error(mysql_error()); 
while($setor = mysql_fetch_array($find_setores)){
?>
<option value="<? echo $setor['id']; ?>"><? echo $setor['nome']; ?></option>
<?}?>
</select>
<p><input type='submit' value='Editar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 
</form> 


<?
	include('../../layouts/footer_.php');
	eval(file_get_contents('../../layouts/footer_.php'));
?>