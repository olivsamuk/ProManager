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

<?php
while($row = mysql_fetch_array($result))
  {
?>
  <tr>
  	<td><?php echo $row['nome']; ?></td>
		<td><a class="btn btn-primary" title="Editar" href="colaboradores/edit.php?id=<?php echo $row['id']; ?>&id_=<?php echo $id; ?>"><i class='btn-icon-only icon-edit'></i></a>
		<a class="btn btn-danger" title="Remover" href="colaboradores/delete.php?id=<?php echo $row['id']; ?>&id_=<?php echo $id; ?>"><i class='btn-icon-only icon-remove'></i></a></td>
  </tr>
<?php
  }
echo "</table>";

?> 
