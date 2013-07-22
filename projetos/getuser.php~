<?php
$q=$_GET["q"];

include('../config.php');

$result = mysql_query("SELECT * FROM solicitantes WHERE cliente_id = $q ");


while($row = mysql_fetch_array($result))
  {
	echo "<br /><b>Solicitante:</b><br />";
  echo "<input type='radio' name='solicitante_id' value='" . $row['id'] ."'>&nbsp;" . $row['nome'] . "<br /><br />";
  }


?> 
