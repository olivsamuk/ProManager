<html>

<head>

<title>Enviando formulário POST com PHP e AJAX</title>

<!-- Carrega o arquivo 'script.js' ao iniciar a página! //-->

<script language="javascript" src="script.js" type="text/javascript"></script>

</head>

<body>

<table cellpadding="2" cellspacing="0" width="50%">

//No evento 'onsubmit' (ao enviar), ele seta o valor dos campos na função setarCampos() e depois executa a função enviarForm() da página script.js. Caso o usuário não tenha Javascript instalado/habilitado no navegador, ele envia o formulário via ACTION.

<form action="processar.php" method="post" onsubmit="setarCampos(this); enviarForm('processar.php', campos, 'divResultado'); return false;"> 

<tr><td>Nome</td><td><input name="txtNome" id="txtNome" type="text"></td></tr>

<tr><td>Email</td><td><input name="txtEmail" id="txtEmail" type="text"></td></tr>

<tr><td></td><td><input type="submit" value="Enviar">&nbsp;<input type="reset" value="Limpar"></td></tr>

</form>

</table>

<div id="divResultado"/>


<script>

//Cria a função com os campos para envio via parâmetro

function setarCampos() {

campos = "txtNome="+encodeURI(document.getElementById('txtNome').value).
toUpperCase()+"&txtEmail="+encodeURI(document.getElementById('txtEmail').value);

}

</script>

</body>
</htm>
