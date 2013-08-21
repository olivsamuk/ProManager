<?php
	include('../../layouts/header_.php');
	file_get_contents('../../layouts/header_.php');
?>

<h3>Editar RAC</h3>

<? 
include('../../config.php'); 
if (isset($_GET['id']) ) { 
$id = (int) $_GET['id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `rac` SET  `motivo` =  '{$_POST['motivo']}' ,  `etapa` =  '{$_POST['etapa']}'   WHERE `id` = '$id' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='index.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `rac` WHERE `id` = '$id' ")); 
?>

<form action='' method='POST'> 
<p><b>Motivo:</b><br /><textarea name='motivo'><?= stripslashes($row['motivo']) ?></textarea> 
<p><b>Etapa:</b><br /><input type='text' name='etapa' value='<?= stripslashes($row['etapa']) ?>' /> 
<p><input type='submit' value='Ediar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<? } ?> 


<?php
	include('../../layouts/footer_.php');
	file_get_contents('../../layouts/footer_.php');
?>
