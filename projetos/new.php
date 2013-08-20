<?php
	include('../layouts/header.php');
	eval(file_get_contents('../layouts/header.php'));
?>

<script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuser.php?q="+str,true);
xmlhttp.send();
}
</script>

<ul class="breadcrumb">
	<li><a href="../">Início</a> <span class="divider">|</span></li>
	<li><a href="index.php">Seus Projetos</a> <span class="divider">|</span></li>
	<li class="active">Novo Projeto</li>
</ul>

<? 
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `projetos` ( `titulo` ,  `desc` , `cliente_id` , `solicitante_id` ,  `criado_em` ,  `colaborador_id`  ) VALUES(  '{$_POST['titulo']}' ,  '{$_POST['desc']}' , '{$_POST['cliente_id']}' ,  '{$_POST['solicitante_id']}' ,  NOW() ,  '{$_POST['colaborador_id']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Registro efetuado com sucesso.<br />";
echo "<a href='index.php'>Voltar</a>"; 
} 
?>

<form action='' method='POST'> 
<input type='hidden' name='colaborador_id' value='<? echo $_SESSION['id_usuario']; ?>'>

<b>Titulo:</b><br /><input type='text' name='titulo'/> <br/>
<b>Descrição:</b><br /><textarea name='desc'/></textarea><br />
<b>Cliente:</b><br />

<select name='cliente_id' onchange="showUser(this.value)">
<option>--</option>

<?
$find_clientes = mysql_query("SELECT * FROM `clientes`") or trigger_error(mysql_error()); 
while($cliente = mysql_fetch_array($find_clientes)){ ?>

<option value="<? echo $cliente['id'] ?>"><? echo $cliente['nome'] ?></option>

<?}?>
</select><br />
<div id="txtHint"></div>


<input type='submit' value='Salvar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 

</form> 


<?php
	include('../layouts/footer.php');
	eval(file_get_contents('../layouts/footer.php'));
?>
