<?php
	include('../layouts/header.php');
	eval(file_get_contents('../layouts/header.php'));
?>

<h3>Clientes</h3>

<? 
include('../config.php'); 
echo "<table class='table table-bordered table-hover'>"; 
echo "<tr>"; 
echo "<td><b>Nome</b></td>"; 
echo "<td><b>Ações</b></td>";
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `clientes`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'><a href='show.php?id=" . $row['id'] . "'>" . nl2br( $row['nome']) . "</a></td>";  
echo "<td valign='top'><a href=edit.php?id={$row['id']}>Editar</a> | <a href=delete.php?id={$row['id']}>Remover</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php class='btn btn-primary'>Novo Cliente</a>"; 
?>

<br /><br />

<?php
	include('../layouts/footer.php');
	eval(file_get_contents('../layouts/footer.php'));
?>

