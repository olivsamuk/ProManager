<?
include('../../config.php'); 
$id = (int) $_GET['id']; 
$rac = mysql_fetch_array ( mysql_query("SELECT * FROM `rac` WHERE `id` = '$id'")); 
$cliente_id = $rac['cliente_id'];
$cliente = mysql_fetch_array ( mysql_query("SELECT * FROM `clientes` WHERE `id` = '$cliente_id'")); 

$solicitante_id = $rac['solicitante_id'];
$solicitante = mysql_fetch_array ( mysql_query("SELECT * FROM `solicitantes` WHERE `id` = '$solicitante_id'")); 
?>
<!DOCTYPE>
<html lang="pt-br">
   <head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../assets/stylesheets/bootstrap.css"/>
   <link rel="stylesheet" href="../../assets/stylesheets/bootstrap-responsive.css"/>
		<style>
		#cor {
			background:#ccc;
			border:solid #ccc 1px;
		}

		#borda {
			border:solid #ccc 1px;
		}
		</style>
   
   <title>RAC</title>
   </head>

   <body>
   <p align="center"><img src="../../assets/images/brazao.png" /><br />
Governo do Estado do Amapá<br />
Centro de Gestão de Tecnologia da Informação
<h2 align="center">RAC  Relatório de Atendimento ao Cliente</h2>
   <div class="container-fluid" style="width:60%; margin:auto;">
     <!-- LINHA 1 CLIENTE --------------------------------->
     <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                 <div class="span12" id="cor">Cliente</div>
            </div>   
            <div class="row-fluid">
                 <div class="span12" id="borda"> <? echo $cliente['nome'] ?></div>
            </div>  
        </div>
     </div><br>
     
     <!-- LINHA 2 SOLICITANTE E CARGO --------------------------------->
     <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                 <div class="span6" id="cor">Solicitante</div>
                 <div class="span6" id="cor">Cargo</div>
            </div>   
            <div class="row-fluid">
                 <div class="span6" id="borda"> <? echo $solicitante['nome']; ?></div>
                 <div class="span6" id="borda"> <? echo $solicitante['cargo']; ?></div>
            </div>  
        </div>
     </div><br>
     
     <!-- LINHA 3 MOTIVO DA SOLICITAÇAO --------------------------------->
     <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                 <div class="span12"id="cor">Motivo da Solicitação</div>
            </div>   
            <div class="row-fluid">
                 <div class="span12" id="borda"><? echo $rac['motivo']; ?></div>
            </div>  
        </div>
     </div><br>
     
     <!-- LINHA 4 DIAGNÓSTICO --------------------------------->
     <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                 <div class="span12"id="cor">Diagnóstico</div>
            </div>   
            <div class="row-fluid">
               <div class="span12" id="borda"><br />

																<?
																			$find_demandas = mysql_query("SELECT * from `demandas` where rac_id = $id");
																			echo "<ul>";
																			while($demanda = mysql_fetch_array($find_demandas)){ 
																			?>
																			<li><? echo $demanda['titulo']; ?> -
																			<? echo $demanda['desc']; ?></li>
																			<?}?>
																			</ul>
																<br />
               </div>  
        		</div>
				</div>
     </div><br>
     
     <!-- LINHA 5 ATENDIMENTO --------------------------------->
     <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                 <div class="span12" id="cor">Atendimento</div>
            </div> 
            <div class="row-fluid">
                 <div class="span6" id="borda">Data / Hora</div>
                 <div class="span6" id="borda">Etapa</div>
            </div>   
            <div class="row-fluid">
                 <div class="span6" id="borda"><? echo $rac['criado_em']; ?></div>
                 <div class="span6" id="borda"><? echo $rac['etapa']; ?></div>
            </div>  
        </div>
     </div><br>
     
      <!-- LINHA 6 RESPONSÁVEIS --------------------------------->
     <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                 <div class="span12" id="cor">Responsáveis</div>
            </div>   
            <div class="row-fluid">
                 <div class="span6" id="borda">
                    <div class="row-fluid">
                      <div class="span12" id="borda">Técnico  (nome do técnico)</div>
                    </div>
                    <div class="row-fluid">
                      <div class="span12" id="borda">Samuel Silva de Oliveira</div>
                    </div>
                    <div class="row-fluid">
                      <div class="span12" id="borda">Coordenador / Gerente</div>
                    </div>
                    <div class="row-fluid">
                      <div class="span12" id="borda"></div>
                    </div>
                 </div>
                 <div class="span6">
                    <div class="row-fluid">
                      <div class="span12" id="borda">Certifico que os serviços solicitados foram atendidos</div>
                    </div>
                    <div class="row-fluid">
                      <div class="span12" id="borda"></div>
                    </div>
                    <div class="row-fluid">
                      <div class="span12" id="borda">Atendimento do Solicitante.</div>
                    </div>
                    <div class="row-fluid">
                      <div class="span12" id="borda"></div>
                    </div>
                    
                 </div>
            </div>  
        </div>
     </div><br>
 </div>
     
</body>
</html>
