<? 
include('../../layouts/header_.php');
file_get_contents('../../layouts/header_.php');
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
include('../../config.php'); 
$id = (int) $_GET['id']; 
$id_ = (int) $_GET['id_'];
mysql_query("DELETE FROM `colaboradores` WHERE `id` = '$id' ") ; 
echo (mysql_affected_rows()) ? "Dados removidos com sucesso!<br /> " : "Erro.<br /> "; 
		?> 
	</div>
  <div class="modal-footer">
  	<?php echo "<a href='../show.php?id=$id_' class='btn btn-primary'>Voltar</a>"; ?>
  </div>
 </div>

 <?php
	include('../../layouts/footer_.php');
	file_get_contents('../../layouts/footer_.php');
?>
