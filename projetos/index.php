<?php
	include('../layouts/header.php');
	eval(file_get_contents('../layouts/header.php'));
?>

<ul class="breadcrumb">
	<li><a href="../">Início</a> <span class="divider">|</span></li>
	<li class="active">Projetos</li>
</ul>

<h3>Seus Projetos</h3>

<? 
include('../config.php'); 
echo "<table class='table table-bordered table-hover'>"; 
echo "<tr>"; 
echo "<th>Titulo</th>"; 
echo "<th>Descrição</th>"; 
echo "<th>Cliente</th>"; 
echo "<th>Solicitante</th>"; 
echo "<th>Criado Em</th>"; 
echo "<th colspan=3>Ações</th>";
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `projetos` where colaborador_id = {$_SESSION['id_usuario']}") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['titulo']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['desc']) . "</td>";  
$cliente_id = $row['cliente_id'];
$cliente = mysql_fetch_array(mysql_query("SELECT * FROM `clientes` where id=$cliente_id"));
echo "<td valign='top'>" . nl2br( $cliente['nome']) . "</td>";  
$row_id = $row['solicitante_id'];
$solicitante = mysql_fetch_array(mysql_query("SELECT * FROM `solicitantes` where id=$row_id"));
echo "<td valign='top'>" . nl2br( $solicitante['nome']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['criado_em']) . "</td>";   
echo "<td valign='top'><a href=edit.php?id={$row['id']}>Editar</a> </td><td> <a href=delete.php?id={$row['id']}>Remover</a></td> <td> <a href='racs/index.php?id={$row['id']}'>Ver RAC's</a></td> <td><a href='show.php?id=" . $row['id'] . "'>Acompanhar Demandas</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php class='btn btn-primary'>Novo Projeto</a>"; 
?>

<?php
	include('../layouts/footer.php');
	eval(file_get_contents('../layouts/footer.php'));
?>

