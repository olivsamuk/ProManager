<?php
	include('../layouts/header.php');
	eval(file_get_contents('../layouts/header.php'));

	include('../config.php'); 

	$id = (int) $_GET['id']; 
	$instituicao = mysql_fetch_array ( mysql_query("SELECT * FROM `instituicoes` WHERE `id` = '$id'")); 
	
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

<div class="row">
	<div class="span4">
		<h3><? echo $instituicao['nome']; ?></h3>
		<b>Descrição:</b>
		<? echo $instituicao['desc']; ?><br />
		<b>Data de Criação:</b>
		<? echo $instituicao['criado_em']; ?>
	</div>

	<div class="span4">
		<h3>Setores</h3>
		<table class="table table-bordered">
			<tr>
				<th>Nome</th>
				<th>Ações</th>
			<tr>
			<?
			$counter=0;
			$find_setores = mysql_query("SELECT * FROM `setores`") or trigger_error(mysql_error()); 
			while($setor = mysql_fetch_array($find_setores)){
			?>
				<tr>
					<td><a href=""><? echo $setor['nome']; ?></a></td>
					<td> 
						<a href="setores/edit.php?id=<? echo $setor['id']; ?>&id_=<? echo $id; ?>" class="btn">Editar</a>
						<a href="setores/delete.php?id=<? echo $setor['id']; ?>" class="btn">Remover</a>
					</td>
				</tr>
			<?$counter++;}?>
		</table>
    <!-- Button to trigger modal -->
    <a href="setores/new.php?id=<? echo $id; ?>" class="btn btn-primary">Novo Setor</a>
     
	</div>

	<div class="span4">
		<h3>Colaboradores</h3>
		Filtro:

		<form>
		<select name="users" onchange="showUser(this.value)">
		<option value="">Todos</option>
		<? 
		$find_setores = mysql_query("SELECT * FROM `setores`") or trigger_error(mysql_error()); 			
		while($setores = mysql_fetch_array($find_setores)){ ?>
		<option value="<? echo $setores['id']; ?>"><? echo $setores['nome']; ?></option>
		<?}?>		
		</select>
		</form>
		<br>
		<div id="txtHint">
			<?
			$result = mysql_query("SELECT * FROM colaboradores ");

			echo "<table class='table table-bordered'>
			<tr>
			<th>Nome</th>
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
			echo "</table>";?>
		</div>

		<a href="colaboradores/new.php?id=<? echo $id; ?>" class="btn btn-primary">Novo Colaborador</a>
	</div>

</div>

<div class="row">
	<div class="span12">
		<br/><br/>
		<a href='index.php'>Voltar</a>
	</div>
</div>

<?php
	include('../layouts/footer.php');
	eval(file_get_contents('../layouts/footer.php'));
	
?>


