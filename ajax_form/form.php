<html>

<head>

<title>Enviando formul�rio POST com PHP e AJAX</title>

<!-- Carrega o arquivo 'script.js' ao iniciar a p�gina! //-->

<script language="javascript" src="script.js" type="text/javascript"></script>

</head>

<body>

<table cellpadding="2" cellspacing="0" width="50%">

//No evento 'onsubmit' (ao enviar), ele seta o valor dos campos na fun��o setarCampos() e depois executa a fun��o enviarForm() da p�gina script.js. Caso o usu�rio n�o tenha Javascript instalado/habilitado no navegador, ele envia o formul�rio via ACTION.

<form action="processar.php" method="post" onsubmit="setarCampos(this); enviarForm('processar.php', campos, 'divResultado'); return false;"> 

<tr><td>Nome</td><td><input name="txtNome" id="txtNome" type="text"></td></tr>

<tr><td>Email</td><td><input name="txtEmail" id="txtEmail" type="text"></td></tr>

<tr><td></td><td><input type="submit" value="Enviar">&nbsp;<input type="reset" value="Limpar"></td></tr>

</form>

</table>

<div id="divResultado"/>


<script>

//Cria a fun��o com os campos para envio via par�metro

function setarCampos() {

campos = "txtNome="+encodeURI(document.getElementById('txtNome').value).
toUpperCase()+"&txtEmail="+encodeURI(document.getElementById('txtEmail').value);

}

</script>

</body>
</htm>
