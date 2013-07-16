<?php
	include('../layouts/header.php');
	eval(file_get_contents('../layouts/header.php'));

	include('../config.php'); 

	$id = (int) $_GET['id']; 
	$projeto = mysql_fetch_array ( mysql_query("SELECT * FROM `projetos` WHERE `id` = '$id'")); 
?>

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

function loaddemandas()
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
    document.getElementById("status4").innerHTML=xmlhttp.responseText;
    }
  }
sleep(1000);
xmlhttp.open("GET","ajax_status4.php?projeto_id=<? echo $id; ?>",true);
xmlhttp.send();
}

</script>

<div class="row">
	<div class="span12">
		<? echo "<h3>" . $projeto['titulo'] . "</h3>"; ?>
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
							<div class="post" id="<? echo $row['id']; ?>" draggable="true" ondragstart="drag(event)"><? echo $row['titulo'] . $row['id']; ?></div>
						</div>
					</div>
					<div class="row-fluid">
					<?}else{?>
						<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
							<div class="post" id="<? echo $row['id']; ?>" draggable="true" ondragstart="drag(event)"><? echo $row['titulo'] . $row['id']; ?></div>
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
							<div class="post" id="<? echo $registro2['id']; ?>" draggable="true" ondragstart="drag(event)"><? echo $registro2['titulo'] . $registro2['id']; ?></div>
						</div>
					</div>
					<div class="row-fluid">
					<?}else{?>
						<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
							<div class="post" id="<? echo $registro2['id']; ?>" draggable="true" ondragstart="drag(event)"><? echo $registro2['titulo'] . $registro2['id']; ?></div>
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
							<div class="post" id="<? echo $registro2['id']; ?>" draggable="true" ondragstart="drag(event)"><? echo $registro2['titulo'] . $registro2['id']; ?></div>
						</div>
					</div>
					<div class="row-fluid">
					<?}else{?>
						<div class="span6" ondrop="drop(event)" ondragover="allowDrop(event)">
							<div class="post" id="<? echo $registro2['id']; ?>" draggable="true" ondragstart="drag(event)"><? echo $registro2['titulo'] . $registro2['id']; ?></div>
						</div>
					<?}?>

					<?$counter2++;}?>

						<div class='span6 prepost novademanda' id='3' ondrop='drop(event)' ondragover='allowDrop(event)'>Solte demandas aqui!</div>
				</div>
			</div><!-- /texthint -->

		</div>
	</div>
</div> <!-- /row -->



<?php
	include('../layouts/footer.php');
	eval(file_get_contents('../layouts/footer.php'));
?>

