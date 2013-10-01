<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');
	include('../config.php');
?>

<link rel="stylesheet" type="text/css" href="../assets/css/base-admin.css">

<ul class="breadcrumb">
	<li><a href="../index.php">Início</a> <span class="divider">|</span></li>
	<li class="active">Seus Projetos</li>
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
              <?
								$result = mysql_query("SELECT * FROM `projetos` where colaborador_id = {$_SESSION['id_usuario']}") or trigger_error(mysql_error()); 
								while($row = mysql_fetch_array($result)){ 
              ?>


								<tr>
									<td><? echo $row["titulo"]; ?></td>
									<td><? echo $row["desc"]; ?></td>
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
																<li><a href=edit.php?id={$row['id']}>Editar</a></li>
																<li><a href=delete.php?id={$row['id']}>Remover</a></li>
																<li><a href=racs/new.php?id={$row['id']}>Criar novo Relatório</a></li>
																<li><a href=racs/index.php?id={$row['id']}>Ver Relatórios</a></li>
																<li><a href=show.php?id={$row['id']}>Acompanhar Demandas</a></li>
															</ul>
														</div>
													</td> "; 
										}else{
										echo "<td>
														<div class='btn-group'>
															<button class='btn'>Escolha uma ação</button>
															<button class='btn dropdown-toggle' data-toggle='dropdown'>
																<span class='caret'></span>
															</button>
															<ul class='dropdown-menu'>
																<li><a href=edit.php?id={$row['id']}>Editar</a></li>
																<li><a href=delete.php?id={$row['id']}>Remover</a></li>
																<li><a href=racs/new.php?id={$row['id']}>Criar novo Relatório</a></li>
															</ul>
														</div>
													</td> "; 
										}
										?>							
								</tr>

                <?}?>
								</tbody>
							</table>
						
					</div> <!-- /widget-content -->
				
				</div> <!-- /widget -->
















<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>

