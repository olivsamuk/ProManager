<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');
	include('../config.php');
?>

<style type="text/css">
  .hiddenRow {
    padding: 0 !important;
}
  .org {
    padding:10px;
  }
  .well {
    padding:5px;
  }
</style>

<ul class="breadcrumb">
	<li><a href="../index.php">Início</a> <span class="divider">|</span></li>
	<li class="active">Lista de Projetos</li>
</ul>

<div class="widget widget-table action-table">
		
	<div class="widget-header">
		<i class="icon-th-list"></i>
		<h3>Lista de Projetos <small> - Esta lista exibirá todos os projetos cadastrados no ProManager</small></h3>
	</div> <!-- /widget-header -->
	
	<div class="widget-content">
		
		<table class="table table-striped table-bordered" style="border-collapse:collapse;">
			<thead>
				<tr>
					<th>Titulo</th>
					<th>Descrição</th>
					<th>Cliente</th>
          <th>Colaborador</th>
					<th>Criado Em</th>
          <th>Demandas<br /><span class="label label-important">Não Iniciadas</span> <span class="label label-warning">Iniciadas</span> <span class="label label-success">Finalizadas</span></th>
				</tr>
			</thead>
			<tbody>
      <?php
        $counter = 1;
				$result = mysql_query("SELECT * FROM `projetos`") or trigger_error(mysql_error()); 
				while($row = mysql_fetch_array($result)){ 
        $FindDemandasStatus1 = mysql_query("SELECT * FROM promanager.demandas where projeto_id = {$row['id']} AND status = 1");
        $FindDemandasStatus2 = mysql_query("SELECT * FROM promanager.demandas where projeto_id = {$row['id']} AND status = 2");
        $FindDemandasStatus3 = mysql_query("SELECT * FROM promanager.demandas where projeto_id = {$row['id']} AND status = 3");
        $QtdStatus1 = mysql_num_rows($FindDemandasStatus1);
        $QtdStatus2 = mysql_num_rows($FindDemandasStatus2);
        $QtdStatus3 = mysql_num_rows($FindDemandasStatus3);
        $QtdTotal = $QtdStatus1 + $QtdStatus2 + $QtdStatus3;
      ?>
      
				<tr data-toggle="collapse" data-target="#demo<?php echo $counter; ?>" class="accordion-toggle">
					<td><b><?php echo $row["titulo"]; ?></b></td>
					<td><?php echo $row["desc"]; ?></td>
          <?php
					$cliente = mysql_fetch_array(mysql_query("SELECT * FROM `clientes` where id={$row['cliente_id']};"));
					$colaborador = mysql_fetch_array(mysql_query("SELECT * FROM `colaboradores` where id={$row['colaborador_id']}"));
					?>
					<td><?php echo $cliente['nome']; ?></td>
          <td><?php echo $colaborador['nome']; ?></td>
					<td><?php echo $row['criado_em'] ?></td>
          <td>
            <div class="progress" style="width:300px;">
              <div class="bar bar-success" style="width: <?php echo (($QtdStatus3 / $QtdTotal) * 100) . "%" ?>;"></div>
              <div class="bar bar-warning" style="width: <?php echo (($QtdStatus2 / $QtdTotal) * 100) . "%" ?>;"></div>
              <div class="bar bar-danger" style="width: <?php echo (($QtdStatus1 / $QtdTotal) * 100) . "%" ?>;"></div>
            </div>
          </td>            
        </tr>
        <tr >
          <td colspan="6" class="hiddenRow">
            <div class="accordian-body collapse" id="demo<?php echo $counter; ?>">
              <div class="org">
                <div class="row-fluid">
                  <div class="span6">
                    <h3>RAC's Registrados</h3>
                  </div>  
                  <div class="span6">
                    <h3>Demandas deste Projeto</h3>
                  </div>
                </div>
                
                <div class="row-fluid">
                  <div class="span6">
                    Racs
                  </div>
                  <div class="span2 well">
                    <span class="label label-important">Não Iniciadas</span><br /><br />
                    <ul>
                      <?php while ($demanda = mysql_fetch_array($FindDemandasStatus1)) { 
                        echo "<li>{$demanda['titulo']}</li>";
                      } ?>
                    </ul>
                  </div>
                  <div class="span2 well">
                    <ul>
                      <span class="label label-warning">Iniciadas</span><br /><br />
                      <?php while ($demanda2 = mysql_fetch_array($FindDemandasStatus2)) { 
                        echo "<li>{$demanda2['titulo']}</li>";
                      } ?>
                    </ul>
                  </div>
                  <div class="span2 well">
                    <ul>
                      <span class="label label-success">Finalizadas</span><br /><br />
                      <?php while ($demanda3 = mysql_fetch_array($FindDemandasStatus3)) { 
                        echo "<li>{$demanda3['titulo']}</li>";
                      } ?>   
                    </ul>
                  </div>
                </div>
              </div>
            </div> 
          </td>
        </tr>
        <?php $counter++; }?>
        </tbody>
			</table>





	</div> <!-- /widget-content -->

</div> <!-- /widget -->


<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>
<script src="../assets/javascripts/bootstrap.min.js"></script>
  

