<?
// Verificador de sessão
include("../check.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Projetos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site Profissional">
    <meta name="author" content="Samuel de Oliveira">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
    <![endif]-->


    <link href="../assets/stylesheets/bootstrap.css" rel="stylesheet">
    <link href="../assets/stylesheets/bootstrap-responsive.css" media="all" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <link href="../assets/stylesheets/estilos.css" media="screen" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="../assets/css/base-admin.css">
    <!-- Le fav and touch icons -->

    <link href="http://prodap.ap.gov.br/images/favicon.ico" rel="shortcut icon">
    <link href="http://prodap.ap.gov.br/images/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="http://prodap.ap.gov.br/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="http://prodap.ap.gov.br/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">



</head>

<body data-spy="scroll" data-target=".subnav" data-offset="50" style="padding-top:40px;">

    <div class="navbar navbar-fixed-top">
		  <div class="navbar-inner">
				<div class="container">
					<ul class="nav">
						<li><a href="">Olá, <? echo $_SESSION['nome_usuario'] ?></a></li>
						<li class="divider-vertical"></li>
						<li><a href="../instituicoes/colaboradores/mudar_senha.php">Alterar Senha</a></li>
						<li class="divider-vertical"></li>
						<li><a href="../sair.php">Sair</a></li>
					</ul>
					<form class="navbar-search pull-right">
						<input type="text" class="search-query" placeholder="Pesquisa...">
					</form>
				</div>
		  </div>
    </div>


  <div class="container">

    <div class="row">
      <div class="span12" style="padding:20px 0">
          <a class="title" href="index.php"><img src='../assets/images/promanager.png' width=350/></a> &nbsp;
					Uma solução livre para Acompanhamento de Projetos
      </div>
    </div>

		<div class="row">
			<div class="span12">
				<div class="navbar">
					<div class="navbar-inner">
						<ul class="nav">
							<li><a href="../instituicoes/index.php"><i class='icon-building'></i> Instituições</a></li>
							<li class="divider-vertical"></li>
							<li><a href="../clientes/index.php"><i class='icon-group'></i> Clientes</a></li>
							<li class="divider-vertical"></li>
							<li><a href="../projetos/index.php"><i class='icon-tags'></i> Projetos</a></li>	
							<li class="divider-vertical"></li>							
							<li><a href="../relatorios/"><i class='icon-bar-chart'></i> Relatórios</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
