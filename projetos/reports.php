<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');

	include('../config.php'); 
	$id = $_POST['id']; 
	$projeto = mysql_fetch_array ( mysql_query("SELECT * FROM `projetos` WHERE `id` = '$id'")); 
?>

<link rel="stylesheet" type="text/css" href="../assets/css/base-admin.css">


<ul class="breadcrumb">
	<li><a href="../index.php">Início</a> <span class="divider">|</span></li>
	<li><a href="../projetos/index.php">Projetos</a> <span class="divider">|</span></li>
	<li><a href="../projetos/show.php?id=<?php echo $id; ?>"><?php echo $projeto['titulo']; ?></a> <span class="divider">|</span></li>
	<li class="active">Relatórios</li>
</ul>

<div class="row">
	<div class="span6">
		<canvas id="pie" width="400" height="400"></canvas>
	</div>
	<div class="span6">
		<div class="widget">
			<div class="widget-header">
				<i class="icon-th-list"></i>
				<h3>Informações</h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">
				<p>As cores dispostas nas etiquetas abaixo, são as mesmas exibidas no gráfico ao lado.</p>
				<?php echo "<span class='label label-important'>{$_POST['n_iniciados']} Demandas não iniciadas</span>"; ?><br />
				<?php echo "<span class='label label-info'>{$_POST['iniciados']} Demandas Iniciadas</span>"; ?><br />
				<?php echo "<span class='label label-success'>{$_POST['finalizados']} Demandas Finalizados</span>"; ?>
				<br /><br />
			</div>
		</div>
	</div>
</div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../assets/javascripts/bootstrap.min.js"></script>
    <script src="../assets/javascripts/Chart.min.js"></script>


  <script>

    var pieData = [
        {
          value: <?php echo $_POST['n_iniciados']; ?>,
          color:"#B94A48"
        },
        {
          value : <?php echo $_POST['iniciados']; ?>,
          color : "#3A87AD"
        },
        {
          value : <?php echo $_POST['finalizados']; ?>,
          color : "#468847"
        }
      
      ];
  new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
  
  </script>