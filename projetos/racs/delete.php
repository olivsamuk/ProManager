<?php
	include('../../layouts/header_.php');
	file_get_contents('../../layouts/header_.php');


	include('../../config.php'); 
	$id = (int) $_GET['id']; 
	$id_ = (int) $_GET['id_'];

?> 

<script>
function abrirmodal()
{
 $('#myModal').modal('show');
}

</script>

<body onload="abrirmodal()">

<div class="modal hide fade" id="myModal">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>Exclusão</h3>
  </div>
  <div class="modal-body">
    <?php
    $FindRac = mysql_fetch_array( mysql_query("SELECT * from rac where id = $id"));

		if ($FindRac[tipo] == 1) {
			mysql_query("DELETE FROM rac WHERE id = '$id'") ; 
			echo (mysql_affected_rows()) ? "O RAC for removido com sucesso!<br /> " : "Nothing deleted.<br /> "; 
		}else{
			mysql_query("DELETE rac.*, demandas.* FROM rac, demandas WHERE rac.id = '$id' AND demandas.rac_id = '$id' ") ; 
			echo (mysql_affected_rows()) ? "O RAC e suas demandas foram removidas com sucesso!<br /> " : "Nothing deleted.<br /> "; 
		} 
		?>
  </div>
  <div class="modal-footer">
  	<a class="btn btn-primary" href="index.php?id=<? echo $id_; ?>">Voltar</a>
  </div>
</div>


<?php
	include('../../layouts/footer_.php');
	file_get_contents('../../layouts/footer_.php');
?>
