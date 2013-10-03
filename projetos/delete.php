<?php
	include('../layouts/header.php');
	file_get_contents('../layouts/header.php');
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

		<? 
		include('../config.php'); 
		$id = (int) $_GET['id']; 
		mysql_query("DELETE FROM `projetos` WHERE `id` = '$id' ") ; 
		echo (mysql_affected_rows()) ? "Projeto removido com sucesso!<br /> " : "Erro.<br /> "; 
		?> 
	</div>
  <div class="modal-footer">
  	<a href='index.php' class='btn btn-primary'>Voltar</a>
  </div>
</div>


<?php
	include('../layouts/footer.php');
	file_get_contents('../layouts/footer.php');
?>
