<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');
?>

<ul class="breadcrumb">
	<li><a href="../">Início</a> <span class="divider">|</span></li>
	<li class="active">Clientes</li>
</ul>


<h3>Clientes</h3>

<? 
include('../config.php'); 
echo "<table class='table table-bordered table-hover'>"; 
echo "<tr>"; 
echo "<th>Nome</th>"; 
echo "<th>Data de Criação</th>";
echo "<th colspan=2>Ações</th>";
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `clientes`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td><a href='show.php?id=" . $row['id'] . "'>" . nl2br( $row['nome']) . "</a></td>"; 
echo "<td>" . nl2br( $row['criado_em']) . "</a></td>";   
echo "<td><a href=edit.php?id={$row['id']}>Editar</a></td><td><a href=delete.php?id={$row['id']}>Remover</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php class='btn btn-primary'>Novo Cliente</a>"; 
?>

<br /><br />

<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>


