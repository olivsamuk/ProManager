<?php
$q=$_GET["q"];

include('../config.php');

$result = mysql_query("SELECT * FROM colaboradores WHERE setor_id = $q ");

echo "<table class='table table-bordered'>
<tr>
<th>Nome $q</th>
<th>Setor</th>
<th>Data de Registro</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['nome'] . "</td>";
  echo "<td>" . $row['setor_id'] . "</td>";
  echo "<td>" . $row['criado_em'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

?> 
