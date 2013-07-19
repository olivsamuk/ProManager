<?php
	include('../../layouts/header_.php');
	eval(file_get_contents('../../layouts/header_.php'));

include('../../config.php'); 
$id = (int) $_GET['id']; 
$projeto = mysql_fetch_array ( mysql_query("SELECT * FROM `projetos` WHERE `id` = '$id'")); 
?>

<ul class="breadcrumb">
	<li><a href="../../">Início</a> <span class="divider">|</span></li>
	<li><a href="../index.php">Projetos</a> <span class="divider">|</span></li>
	<li class="active"><? echo $projeto['titulo']; ?> → RAC's</li>
</ul>

<h3>Relatórios de Atendimento (RAC's)</h3>

<? 
echo "<table class='table table-bordered table-hover'>"; 
echo "<tr>"; 
echo "<td><b>Identificação</b></td>"; 
echo "<td><b>Cliente</b></td>"; 
echo "<td><b>Solicitante</b></td>"; 
echo "<td><b>Projeto</b></td>"; 
echo "<td><b>Motivo</b></td>"; 
echo "<td><b>Etapa</b></td>"; 
echo "<td><b>Data de criação</b></td>"; 
echo "<td><b>Ações</b></td>";
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `rac`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'><a href='show.php?id=" . $row['id'] . "'>" . nl2br( $row['identificacao']) . "</a></td>";  

$cliente_id = $row['cliente_id'];
$cliente = mysql_fetch_array ( mysql_query("SELECT * FROM `clientes` WHERE `id` = '$cliente_id'")); 
echo "<td valign='top'>" . $cliente['nome'] . "</td>";  

$solicitante_id = $row['solicitante_id'];
$solicitante = mysql_fetch_array ( mysql_query("SELECT * FROM `solicitantes` WHERE `id` = '$solicitante_id'"));
echo "<td valign='top'>" . nl2br( $solicitante['nome']) . "</td>";   

echo "<td valign='top'>" . nl2br( $projeto['titulo']) . "</td>";  

echo "<td valign='top'>" . nl2br( $row['motivo']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['etapa']) . "</td>";  

echo "<td valign='top'>" . nl2br( $row['criado_em']) . "</td>";  
echo "<td valign='top'><a href=edit.php?id={$row['id']}>Editar</a> | <a href=delete.php?id={$row['id']}&id_=$id>Remover</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php?id=$id class='btn btn-primary'>Novo RAC</a>"; 
?>

<?php
	include('../../layouts/footer_.php');
	eval(file_get_contents('../layouts/footer_.php'));
?>

