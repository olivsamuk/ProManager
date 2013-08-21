<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');

	include('../config.php'); 

	$id = (int) $_GET['id']; 
	$projeto = mysql_fetch_array ( mysql_query("SELECT * FROM `projetos` WHERE `id` = '$id'")); 
?>

<style>
.desc {
		font-style:italic;
		color:#606060;
}
</style>

<ul class="breadcrumb">
	<li><a href="../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="../projetos/index.php">Projetos</a> <span class="divider">|</span></li>
	<li class="active"><? echo $projeto['titulo']; ?></li>
</ul>

<div class="row">
	<div class="span12">
		<a href="#myModal" role="button" class="btn btn-danger" data-toggle="modal">Informar Problemas</a><br /><br />
	</div>
</div>

<div class="row">
	<div class="span4">
		<div class="well">
			<h4><a href="">Demandas não iniciadas</a></h4>
			<div id="status1">
				<div class="row-fluid">
					<?
					$counter=1;
					$result = mysql_query("SELECT * FROM `demandas` where projeto_id=$id and status=1") or trigger_error(mysql_error()); 
					while($row = mysql_fetch_array($result)){ 
					foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }  
					$resultado = $counter%2; 

					 if($resultado == 0){ ?>

						<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
							<div class="post" id="<? echo $row['id']; ?>" draggable="true" ondragstart="drag(event)">
								<? echo $row['titulo']; ?>
								<br />
								<small class='desc'><? echo substr ($row['desc'], 0, 20) . "..."; ?></small>
								<?
								$find_problemas = mysql_query("SELECT * from `problemas` where demanda_id = {$row['id']}");
								while($problema = mysql_fetch_array($find_problemas)){			
									echo "<span class='label label-important' title='{$problema['titulo']} - {$problema['conteudo']}'>* Problema</span>";
								}								
								?>
							</div>
						</div>
					</div>
					<div class="row-fluid">
					<?}else{?>
						<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
							<div class="post" id="<? echo $row['id']; ?>" draggable="true" ondragstart="drag(event)">
								<? echo $row['titulo']; ?>
								<br />
								<small class='desc'><? echo substr ($row['desc'], 0, 20) . "..."; ?></small>
								<?
								$find_problemas = mysql_query("SELECT * from `problemas` where demanda_id = {$row['id']}");
								while($problema = mysql_fetch_array($find_problemas)){			
									echo "<span class='label label-important' title='{$problema['titulo']} - {$problema['conteudo']}'>* Problema</span>";
								}								
								?>
							</div>
						</div>
					<?}?>

					<?$counter++;}?>

		
						<div class='span6 prepost novademanda' id='1' ondrop='drop(event)' ondragover='allowDrop(event)'>Solte demandas aqui!</div>

				</div><!--/row-fluid-->
			</div><!--/status1-->
		</div>
	</div>

	<div class="span4">
		<div class="well">
			<h4><a href="">Iniciado</a></h4>
			<div id="status2">
				<div class="row-fluid">

					<?
					$counter2=1;
					$demandas_status2 = mysql_query("SELECT * FROM `demandas` where projeto_id=$id and status=2") or trigger_error(mysql_error()); 
					while($registro2 = mysql_fetch_array($demandas_status2)){ 
					foreach($registro2 AS $key => $value) { $registro2[$key] = stripslashes($value); }  
					$resultado = $counter2%2; 

					 if($resultado == 0){ ?>

						<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
							<div class="post" id="<? echo $registro2['id']; ?>" draggable="true" ondragstart="drag(event)">
								<? echo $registro2['titulo']; ?>
								<br />
								<small class='desc'><? echo substr ($registro2['desc'], 0, 20) . "..."; ?></small>
								<?
								$find_problemas_i = mysql_query("SELECT * from `problemas` where demanda_id = {$registro2['id']}");
								while($problema = mysql_fetch_array($find_problemas_i)){			
									echo "<span class='label label-important' title='{$problema['titulo']} - {$problema['conteudo']}'>* Problema</span>";
								}								
								?>
							</div>
						</div>
					</div>
					<div class="row-fluid">
					<?}else{?>
						<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
							<div class="post" id="<? echo $registro2['id']; ?>" draggable="true" ondragstart="drag(event)">
								<? echo $registro2['titulo']; ?>
								<br />
								<small class='desc'><? echo substr ($registro2['desc'], 0, 20) . "..."; ?></small>
								<?
								$find_problemas_i = mysql_query("SELECT * from `problemas` where demanda_id = {$registro2['id']}");
								while($problema = mysql_fetch_array($find_problemas_i)){			
									echo "<span class='label label-important' title='{$problema['titulo']} - {$problema['conteudo']}'>* Problema</span>";
								}								
								?>
							</div>
						</div>
					<?}?>

					<?$counter2++;}?>

						<div class='span6 prepost novademanda' id='2' ondrop='drop(event)' ondragover='allowDrop(event)'>Solte demandas aqui!</div>
				</div>
			</div><!-- /texthint -->
		</div>
	</div>

	<div class="span4">
		<div class="well">
			<h4><a href="">Finalizado</a></h4>
			<div id="status3">
				<div class="row-fluid">

					<?
					$counter2=1;
					$demandas_status2 = mysql_query("SELECT * FROM `demandas` where projeto_id=$id and status=3") or trigger_error(mysql_error()); 
					while($registro2 = mysql_fetch_array($demandas_status2)){ 
					foreach($registro2 AS $key => $value) { $registro2[$key] = stripslashes($value); }  
					$resultado = $counter2%2; 

					 if($resultado == 0){ ?>

						<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
							<div class="post" id="<? echo $registro2['id']; ?>" draggable="true" ondragstart="drag(event)">
								<? echo $registro2['titulo']; ?>
								<br />
								<small class='desc'><? echo substr ($registro2['desc'], 0, 20) . "..."; ?></small>
								<?
								$find_problemas_ii = mysql_query("SELECT * from `problemas` where demanda_id = {$registro2['id']}");
								while($problema = mysql_fetch_array($find_problemas_ii)){			
									echo "<span class='label label-important' title='{$problema['titulo']} - {$problema['conteudo']}'>* Problema</span>";
								}								
								?>
							</div>
						</div>
					</div>
					<div class="row-fluid">
					<?}else{?>
						<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
							<div class="post" id="<? echo $registro2['id']; ?>" draggable="true" ondragstart="drag(event)">
								<? echo $registro2['titulo']; ?>
								<br />
								<small class='desc'><? echo substr ($registro2['desc'], 0, 20) . "..."; ?></small>
								<?
								$find_problemas_ii = mysql_query("SELECT * from `problemas` where demanda_id = {$registro2['id']}");
								while($problema = mysql_fetch_array($find_problemas_ii)){			
									echo "<span class='label label-important' title='{$problema['titulo']} - {$problema['conteudo']}'>* Problema</span>";
								}								
								?>
							</div>
						</div>
					<?}?>

					<?$counter2++;}?>

						<div class='span6 prepost novademanda' id='3' ondrop='drop(event)' ondragover='allowDrop(event)'>Solte demandas aqui!</div>
				</div>
			</div><!-- /texthint -->

		</div>
	</div>
</div> <!-- /row -->


<? 
if (isset($_POST['enviado'])) { 
$sql = "INSERT INTO `problemas` ( `titulo` ,  `conteudo` , `demanda_id`  ) VALUES(  '{$_POST['titulo']}' ,  '{$_POST['conteudo']}' , '{$_POST['demanda_id']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Registro efetuado com sucesso.<br />";
echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=show.php?id=$id'>";
} 
?>



<div id="myModal" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Registrar Problema</h3>
	</div>
	<div class="modal-body">
		<form action='' method='POST' />
			<input type='hidden' name='enviado' value='1' />

			<b>A qual demanda o problema se refere?</b><br />
			<?
			$FindDemmandToForm = mysql_query("SELECT * from `demandas` where projeto_id = $id");
			while($demmand = mysql_fetch_array($FindDemmandToForm)){
				echo "<input type='radio' name='demanda_id' value='{$demmand['id']}'> {$demmand['titulo']} <br />";	
			}
			?>
			<br />
			<b>Problema:</b><br />
			<input type='text' name='titulo' /><br />
			<b>Detalhes:</b><br />
			<textarea name='conteudo'></textarea><br />
			<br /><input type='submit' value='Salvar' class="btn" />
			
		</form>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn">Fechar</a>
	</div>
</div>



  </div>
</body>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="../assets/javascripts/jquery.js"></script>
    <script src="../assets/javascripts/bootstrap-transition.js"></script>
    <script src="../assets/javascripts/bootstrap-alert.js"></script>
    <script src="../assets/javascripts/bootstrap-modal.js"></script>
    <script src="../assets/javascripts/bootstrap-dropdown.js"></script>
    <script src="../assets/javascripts/bootstrap-scrollspy.js"></script>
    <script src="../assets/javascripts/bootstrap-tab.js"></script>
    <script src="../assets/javascripts/bootstrap-tooltip.js"></script>
    <script src="../assets/javascripts/bootstrap-popover.js"></script>
    <script src="../assets/javascripts/bootstrap-button.js"></script>
    <script src="../assets/javascripts/bootstrap-collapse.js"></script>
    <script src="../assets/javascripts/bootstrap-carousel.js"></script>
    <script src="../assets/javascripts/bootstrap-typeahead.js"></script>
    <script src="../assets/javascripts/bootstrap-affix.js"></script>

    <script src="../assets/javascripts/holder/holder.js"></script>
    <script src="../assets/javascripts/google-code-prettify/prettify.js"></script>

    <script src="../assets/javascripts/application.js"></script>

		<script type="text/javascript">
			function sleep(milliseconds) {
				var start = new Date().getTime();
				for (var i = 0; i < 1e7; i++) {
					if ((new Date().getTime() - start) > milliseconds){
						break;
					}
				}
			}

			function allowDrop(ev)
			{
			ev.preventDefault();
			}

			function drag(ev)
			{
			ev.dataTransfer.setData("Text",ev.target.id);
			}

			function drop(ev)
			{
			ev.preventDefault();
			var data=ev.dataTransfer.getData("Text");
			ev.target.appendChild(document.getElementById(data));
			var status=ev.target.id
			showStatus2(status+data);
			showStatus1();
			showStatus3();

			//alert(status);
			}  

			function showStatus2(str)
			{
			if (str=="")
				{
				document.getElementById("status2").innerHTML="";
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
					document.getElementById("status2").innerHTML=xmlhttp.responseText;
					}
				}
			xmlhttp.open("GET","ajax_status2.php?projeto_id=<? echo $id; ?>&q="+str,true);
			xmlhttp.send();
		}

		function showStatus1()
		{
		var xmlhttp;
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
				document.getElementById("status1").innerHTML=xmlhttp.responseText;
				}
			}
		sleep(1000);
		xmlhttp.open("GET","ajax_status1.php?projeto_id=<? echo $id; ?>",true);
		xmlhttp.send();
		}

		function showStatus3()
		{
		var xmlhttp;
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
				document.getElementById("status3").innerHTML=xmlhttp.responseText;
				}
			}
		sleep(1000);
		xmlhttp.open("GET","ajax_status3.php?projeto_id=<? echo $id; ?>",true);
		xmlhttp.send();
		}
		</script>
</html>

