<?php
$q=$_GET["q"];

include('../config.php');

$result = mysql_query("SELECT * FROM solicitantes WHERE cliente_id = $q ");

echo "<table class='table table-bordered'>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td><input type='radio' value='" . $row['id'] ."'>" . $row['nome'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

?> 
