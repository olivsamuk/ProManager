<?php
// Conecta-se com o MySQL
$conect = mysql_connect("localhost", "root", "masterinfo");
// Caso a conexão seja reprovada, exibe na tela uma mensagem de erro
if (!$conect) die ("<h1>Falha na conexão com o Banco de Dados!</h1>");
// Seleciona banco de dados
mysql_select_db("promanager");

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

?>
