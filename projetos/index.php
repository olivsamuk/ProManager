<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');
?>

<ul class="breadcrumb">
	<li><a href="../">Início</a> <span class="divider">|</span></li>
	<li class="active">Seus Projetos</li>
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
echo "<th>Ações</th>";
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `projetos` where colaborador_id = {$_SESSION['id_usuario']}") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'><b>" . nl2br( $row['titulo']) . "</b></td>";  
echo "<td valign='top'>" . nl2br( $row['desc']) . "</td>";  
$cliente_id = $row['cliente_id'];
$cliente = mysql_fetch_array(mysql_query("SELECT * FROM `clientes` where id=$cliente_id"));
echo "<td valign='top'>" . nl2br( $cliente['nome']) . "</td>";  
$row_id = $row['solicitante_id'];
$solicitante = mysql_fetch_array(mysql_query("SELECT * FROM `solicitantes` where id=$row_id"));
echo "<td valign='top'>{$solicitante['nome']} - {$solicitante['email']}</td>";  
echo "<td valign='top'>" . nl2br( $row['criado_em']) . "</td>"; 

$findRacs = mysql_query("SELECT * FROM rac where projeto_id = {$row['id']}");
$num_racs = mysql_num_rows($findRacs);

if($num_racs > 0){

echo "<td valign='top'>
				<div class='btn-group'>
					<button class='btn'>Escolha uma ação</button>
					<button class='btn dropdown-toggle' data-toggle='dropdown'>
						<span class='caret'></span>
					</button>
					<ul class='dropdown-menu'>
						<li><a href=edit.php?id={$row['id']}>Editar</a></li>
						<li><a href=delete.php?id={$row['id']}>Remover</a></li>
						<li><a href=racs/new.php?id={$row['id']}>Criar novo Relatório</a></li>
						<li><a href=racs/index.php?id={$row['id']}>Ver Relatórios</a></li>
						<li><a href=show.php?id={$row['id']}>Acompanhar Demandas</a></li>
					</ul>
				</div>
			</td> "; 
}else{
echo "<td valign='top'>
				<div class='btn-group'>
					<button class='btn'>Escolha uma ação</button>
					<button class='btn dropdown-toggle' data-toggle='dropdown'>
						<span class='caret'></span>
					</button>
					<ul class='dropdown-menu'>
						<li><a href=edit.php?id={$row['id']}>Editar</a></li>
						<li><a href=delete.php?id={$row['id']}>Remover</a></li>
						<li><a href=racs/new.php?id={$row['id']}>Criar novo Relatório</a></li>
					</ul>
				</div>
			</td> "; 
}


echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php class='btn btn-primary'>Novo Projeto</a>"; 
?>

<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>

