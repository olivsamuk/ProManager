<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Intranet - Concept</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="assets/stylesheets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/stylesheets/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="assets/stylesheets/estilos.css" media="screen" rel="stylesheet" type="text/css">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

<body>

<div class="content">

<div class='row' style='margin-top:180px'>
  <div class='span4'>&nbsp;
  </div>
  <div class='span4'>
		<img src='assets/images/promanager.png' />
		<form class='form-horizontal' action='auth.php' method='POST'> 
    <legend style='text-align:center'>Entrar no Sistema</legend>
		<div class="control-group">
			<label class="control-label">E-mail</label>
			<div class="controls">
				<input type='text' name='email' placeholder="Informe seu e-mail" /> 
			</div>
		</div>

		<div class="control-group">
			<label class="control-label">Senha</label>
			<div class="controls">
				<input type="password" name='senha' placeholder="Informe sua senha">
			</div>
		</div>

    <div class="control-group">
      <div class="controls">
    		<input class='btn btn-primary' type='submit' value='Enviar dados' />
      </div>
    </div>
		</form> 
  </div>
  <div class='span4'>&nbsp;
  </div>


</div>

</BODY></HTML>
