<?php
	include('../layouts/header.php');
	eval(file_get_contents('../layouts/header.php'));
?>

<h3>Instituições</h3>

<? 
include('../config.php'); 
echo "<table class='table table-bordered' >"; 
echo "<tr>"; 
echo "<td><b>Nome</b></td>"; 
echo "<td><b>Desc</b></td>"; 
echo "<td><b>Criado Em</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `instituicoes`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . "<a href='show.php?id=" . $row['id'] . "'>" . nl2br( $row['nome']) . "</a></td>";  
echo "<td valign='top'>" . nl2br( $row['desc']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['criado_em']) . "</td>";  
echo "<td valign='top'><a href=edit.php?id={$row['id']}>Edit</a></td><td><a href=remover.php?id={$row['id']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php>Criar nova Instituição</a>"; 
?>

<?php
	include('../layouts/footer.php');
	eval(file_get_contents('../layouts/footer.php'));
?>
