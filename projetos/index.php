<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');
	include('../config.php');
?>

<ul class="breadcrumb">
	<li class="active">Início</li>
</ul>

<div class="widget widget-table action-table">
		
	<div class="widget-header">
		<i class="icon-th-list"></i>
		<h3>Seus Projetos</h3>
	</div> <!-- /widget-header -->
	
	<div class="widget-content">
		
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Titulo</th>
					<th>Descrição</th>
					<th>Cliente</th>
					<th>Solicitante</th>
					<th>Criado Em</th>
					<th class="td-actions"></th>
				</tr>
			</thead>
			<tbody>
      <?php
        $counter = 1;
				$result = mysql_query("SELECT * FROM `projetos` where colaborador_id = {$_SESSION['id_usuario']}") or trigger_error(mysql_error()); 
				while($row = mysql_fetch_array($result)){ 
      ?>
      
        <!-- Modal para o tipo de Relatório -->
        <div id="myModal<?php echo $counter; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Tipo de RAC</h3>
          </div>
          <div class="modal-body">
            <p>O Relatório de Atendimento ao Cliente (RAC) pode ser emitido de duas formas:<br /> Com criação de demandas, ou sem criação de demandas.<br /> Que tipo de relatório deseja criar?</p>
          </div>
          <div class="modal-footer">
            <a href="racs/new.php?id=<?php echo $row['id']; ?>" class="btn"><i class="icon-check"></i> Relatório com demandas</a>
            <a href="racs/newRacKind2.php?id=<?php echo $row['id']; ?>" class="btn"><i class="icon-check-empty"></i> Relatório sem demandas</a>
          </div>
        </div>

				<tr>
					<td><?php echo $row["titulo"]; ?></td>
					<td><?php echo $row["desc"]; ?></td>
          <?php
          $cliente_id = $row['cliente_id'];
					$cliente = mysql_fetch_array(mysql_query("SELECT * FROM `clientes` where id=$cliente_id"));
					$row_id = $row['solicitante_id'];
					$solicitante = mysql_fetch_array(mysql_query("SELECT * FROM `solicitantes` where id=$row_id"));
						?>
						<td><?php echo $cliente['nome'] ?></td>
						<td><?php echo $solicitante['nome'] ?></td>
						<td><?php echo $row['criado_em'] ?></td>

          <?php 
            $findRacs = mysql_query("SELECT * FROM rac where projeto_id = {$row['id']}");
            $num_racs = mysql_num_rows($findRacs);

            if($num_racs > 0){

            echo "<td>
                    <div class='btn-group'>
                      <button class='btn'>Escolha uma ação</button>
                      <button class='btn dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                      </button>
                      <ul class='dropdown-menu'>
                        <li><a href=edit.php?id={$row['id']}><i class='icon-edit'></i> Editar</a></li>
                        <li><a href=delete.php?id={$row['id']}><i class='icon-remove'></i> Remover</a></li>
                        <li><a href='#myModal{$counter}' data-toggle='modal'><i class='icon-file-alt'></i> Criar novo Relatório</a></li>                        
                        <li><a href=racs/index.php?id={$row['id']}><i class='icon-copy'></i> Ver Relatórios</a></li>
                        <li><a href=show.php?id={$row['id']}><i class='icon-tag'></i> Acompanhar Demandas</a></li>
                      </ul>
                    </div>
                  </td> ";?>

            <?php 
            }else{
            echo "<td>
                    <div class='btn-group'>
                      <button class='btn'>Escolha uma ação</button>
                      <button class='btn dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                      </button>
                      <ul class='dropdown-menu'>
                        <li><a href=edit.php?id={$row['id']}><i class='icon-edit'></i> Editar</a></li>
                        <li><a href=delete.php?id={$row['id']}><i class='icon-remove'></i> Remover</a></li>
                        <li><a href='#myModal{$counter}' data-toggle='modal'><i class='icon-file-alt'></i> Criar novo Relatório</a></li>
                      </ul>
                    </div>
                  </td> "; 
            }
            ?>              
        </tr>

        <?php $counter++; }?> 				</tbody>
			</table>
		
	</div> <!-- /widget-content -->

</div> <!-- /widget -->

<a class="btn btn-primary" href="new.php">Novo Projeto</a>

<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>

