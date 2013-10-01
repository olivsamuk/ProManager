<?php
$q=$_GET["q"];
$id=$_GET["id"];

include('../config.php');

$result = mysql_query("SELECT * FROM colaboradores WHERE setor_id = $q ");
?>
<table class='table table-striped table-bordered'>
	<tr>
		<th>Nome</th>
		<th colspan=2>Ações</th>
	</tr>

<?
while($row = mysql_fetch_array($result))
  {
?>
  <tr>
  	<td><? echo $row['nome']; ?></td>
		<td><a href="colaboradores/edit.php?id=<? echo $row['id']; ?>&id_=<? echo $id; ?>">Editar</a></td>
		<td><a href="colaboradores/delete.php?id=<? echo $row['id']; ?>&id_=<? echo $id; ?>">Remover</a></td>
  </tr>
<?
  }
echo "</table>";

?> 
