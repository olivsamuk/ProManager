<?php
	include('../layouts/header.php');
	eval(file_get_contents('../layouts/header.php'));
?>


<? 
include('../config.php'); 
echo "<table class='table table-bordered table-hover'>"; 
echo "<tr>"; 
echo "<td><b>Titulo</b></td>"; 
echo "<td><b>Descrição</b></td>"; 
echo "<td><b>Criado Em</b></td>"; 
echo "<td><b>Atualizado Em</b></td>"; 
echo "<td><b>Ações</b></td>";
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `projetos`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'><a href='show.php?id=" . $row['id'] . "'>" . nl2br( $row['titulo']) . "</a></td>";  
echo "<td valign='top'>" . nl2br( $row['desc']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['criado_em']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['atualizado_em']) . "</td>";  
echo "<td valign='top'><a href=edit.php?id={$row['id']}>Editar</a> | <a href=delete.php?id={$row['id']}>Remover</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php class='btn btn-primary'>Novo Projeto</a>"; 
?>

<?php
	include('../layouts/footer.php');
	eval(file_get_contents('../layouts/footer.php'));
?>

