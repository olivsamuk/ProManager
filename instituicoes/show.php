<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');

	include('../config.php'); 

	$id = (int) $_GET['id']; 
	$instituicao = mysql_fetch_array ( mysql_query("SELECT * FROM `instituicoes` WHERE `id` = '$id'")); 

	if (!$_SESSION['permissao'] == 1) {
		echo "<div class='alert'><strong>Atenção!</strong> Você não tem as permissões necessárias para acessar esta página.</div>";
		echo "<meta http-equiv='refresh' content='2; url=../projetos/index.php' />";
	}else{

	
?>

<link rel="stylesheet" type="text/css" href="../assets/css/base-admin.css">

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
xmlhttp.open("GET","getuser.php?id=<?php echo $id; ?>&q="+str,true);
xmlhttp.send();
}
</script>

<ul class="breadcrumb">
	<li><a href="../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="index.php">Instituições</a> <span class="divider">|</span></li>
	<li class="active"><?php echo $instituicao['nome']; ?></li>
</ul>

<div class="row">
	<div class="span4">
		<div class="widget">
			<div class="widget-header">
				<i class="icon-th-list"></i>
				<h3><?php echo $instituicao['nome']; ?></h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">
				<b>Descrição:</b>
				<?php echo $instituicao['desc']; ?><br />
				<b>Data de Criação:</b>
				<?php echo $instituicao['criado_em']; ?>
				<br /><br />
			</div>
			<br />
			<a href="edit.php?id=<?php echo $id; ?>" class="btn btn-primary">Editar dados</a>
		</div>
	</div>

	<div class="span4">
		<div class="widget widget-table action-table">
				
			<div class="widget-header">
				<i class="icon-th-list"></i>
				<h3>Setores</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
				
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Nome</th>
							<th class="td-actions"></th>
						</tr>
					</thead>
					<tbody>
					<?php
					$counter=0;
					$find_setores = mysql_query("SELECT * FROM `setores` where instituicao_id = $id") or trigger_error(mysql_error()); 
					while($setor = mysql_fetch_array($find_setores)){
					?>
						<tr>
							<td><?php echo $setor['nome']; ?></td>
							<td> 
								<a class="btn btn-primary" title="Editar" href="setores/edit.php?id=<?php echo $setor['id']; ?>&id_=<?php echo $id; ?>" ><i class='btn-icon-only icon-edit'></i></a>
								<a class="btn btn-danger" title="Remover" href="setores/delete.php?id=<?php echo $setor['id']; ?>&id_=<?php echo $id; ?>" ><i class='btn-icon-only icon-remove'></i></a>
							</td>
						</tr>
						<?php $counter++;} ?>
					</tbody>
				</table>
			</div> <!-- /widget-content -->	
		</div> <!-- /widget -->

		  

		<!-- Button to trigger modal -->
		<a href="setores/new.php?id=<?php echo $id; ?>" class="btn btn-primary">Novo Setor</a>
	</div>

	<div class="span4">

		<div class="widget">
			
			<div class="widget-header">
				<i class="icon-th-list"></i>
				<h3>Colaboradores</h3>
			</div> <!-- /widget-header -->
		
			<div class="widget-content">
				Filtro:
				<form>
				<select name="users" onchange="showUser(this.value)">
				<option value="">Todos</option>
				<?php 
				$find_setores = mysql_query("SELECT * FROM `setores` where instituicao_id = $id") or trigger_error(mysql_error()); 			
				while($setores = mysql_fetch_array($find_setores)){ ?>
				<option value="<?php echo $setores['id']; ?>"><?php echo $setores['nome']; ?></option>
				<?php } ?>		
				</select>
				</form>
				<div id="txtHint">
					<?php
					$result = mysql_query("SELECT * FROM colaboradores ");
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
				</div>
			</div>
		</div>
		<a href="colaboradores/new.php?id=<?php echo $id; ?>" class="btn btn-primary">Novo Colaborador</a><br /><br /><br />
	</div>


</div>

<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
	
?>

<?php } ?>
