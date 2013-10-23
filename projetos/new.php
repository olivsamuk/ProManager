<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');
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
	<li><a href="../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="index.php">Seus Projetos</a> <span class="divider">|</span></li>
	<li class="active">Novo Projeto</li>
</ul>

<?php 
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `projetos` ( `titulo` ,  `desc` , `cliente_id` , `solicitante_id` ,  `criado_em` ,  `colaborador_id`  ) VALUES(  '{$_POST['titulo']}' ,  '{$_POST['desc']}' , '{$_POST['cliente_id']}' ,  '{$_POST['solicitante_id']}' ,  NOW() ,  '{$_POST['colaborador_id']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Registro efetuado com sucesso.<br />";
echo "<meta http-equiv='refresh' content='0; url=index.php' />";
} 
?>

<div class="row">
  <div class="span12">
    <div class="widget">
        
      <div class="widget-header">
        <i class="icon-th-list"></i>
        <h3>Novo Projeto</h3>
      </div> <!-- /widget-header -->
      
      <div class="widget-content">
        <form action='' method='POST'> 
        <input type='hidden' name='colaborador_id' value='<?php echo $_SESSION['id_usuario']; ?>'>

        <b>Titulo:</b><br /><input type='text' name='titulo'/> <br/>
        <b>Descrição:</b><br /><textarea name='desc'/></textarea><br />
        <b>Cliente:</b><br />

        <select name='cliente_id' onchange="showUser(this.value)">
        <option>--</option>

        <?php
        $find_clientes = mysql_query("SELECT * FROM `clientes`") or trigger_error(mysql_error()); 
        while($cliente = mysql_fetch_array($find_clientes)){ ?>

        <option value="<?php echo $cliente['id'] ?>"><?php echo $cliente['nome'] ?></option>

        <?php } ?>
        </select><br />
        <div id="txtHint"></div>


        <input type='submit' value='Salvar' class='btn btn-primary' /><input type='hidden' value='1' name='submitted' /> 

        </form> 
      </div>
    </div>
  </div>
</div>

<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>
