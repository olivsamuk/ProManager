<?
include('../../layouts/header_.php');
file_get_contents('../../layouts/header_.php');

include('../../config.php'); 
$id = (int) $_GET['id']; 
$id_ = (int) $_GET['id_']; 

$instituicao = mysql_fetch_array ( mysql_query("SELECT * FROM `instituicoes` WHERE `id` = '$id_'")); 
?>

<ul class="breadcrumb">
	<li><a href="../../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="../index.php">Instituições</a> <span class="divider">|</span></li>
	<li><a href="../show.php?id=<? echo $id_; ?>"><? echo $instituicao['nome']; ?></a> <span class="divider">|</span></li>
	<li class="active">Editar Setor</li>
</ul>


<h3>Editar Setor</h3>
<?
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `setores` SET  `nome` =  '{$_POST['nome']}' ,  `desc` =  '{$_POST['desc']}' ,  `criado_em` =  '{$_POST['criado_em']}'   WHERE `id` = '$id' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edição Cncluída.<br />" : "Nothing changed. <br />"; 
echo "<a href='../show.php?id=$id_'>Voltar</a><br />"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `setores` WHERE `id` = '$id' ")); 
?>


<form action='' method='POST'> 
<p><b>Nome:</b><br /><input type='text' name='nome' value='<?= stripslashes($row['nome']) ?>' /> 
<p><b>Desc:</b><br /><input type='text' name='desc' value='<?= stripslashes($row['desc']) ?>' /> 
<p><b>Criado Em:</b><br /><input type='text' name='criado_em' value='<?= stripslashes($row['criado_em']) ?>' /> 
<p><input type='submit' value='Editar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 
</form> 


<?
	include('../../layouts/footer_.php');
	file_get_contents('../../layouts/footer_.php');
?>
