<?php
	
	session_start();
	
	if (!isset($_SESSION['login'])) {
		# code...
		header("Location: index.php?logado=0");
	}
?>

<html lang="pt-br">
<head>
<!--
	Criado Por Eduardo Dias.
	Data: 24/08/2017

-->
	<title> DocWeb - Inclusão de clientes </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">

	<link rel="icon" href="img/favicon.png">
	
	
</head>

<body>
	<!-- Barra de navegação  -->
	<nav class="navbar navbar-default navbar-fixed-top barra">
		<div class="container">
			<div class="navbar-header" style="padding-top:10px;">
				
				<a href="principal.php" class="navbar-brand" >
					<span class="img-logo"></span>

					<h2>Doc<span class="vermelho">Web</span> <small>Documentação de clientes</small></h2>
				</a>
			</div><!--Fim navbar-header -->
				<ul class="nav navbar-nav navbar-right icone-usuario">
					<li>
						<a href="" class="dropdown-toggle" style="padding: 5px;margin-top:10px;  " data-toggle="dropdown">
							Olá, <?php echo $_SESSION['login'] ?>! 
							<span class="glyphicon glyphicon-user icone-user" style="text-align: center;"></span>
						</a>
						<ul class="dropdown-menu" style="padding: 0;">
							<li><a href="#">Minha conta</a></li>
							<li><a href="../model/saidaSistema.php">Sair</a></li>
						</ul>
					</li>
				</ul>
		</div><!-- Fim container-->
	</nav><!-- Fim navbar -->
	
	<div class="container conteudo">
		<div class="page-header"> 
			<h3>Inclusão de clientes </h3>
		</div>
		<div class="row">

			<div class="col-md-6" style="padding-bottom: 20px;">
				
				<form id="form-inclusao-cliente">
						<div class="form-group">
							<label>Código Cliente:</label>
							<input class="form-control" type="text" name="cod_cliente" required>
						</div>

						<div class="form-group">
							<label>Nome Cliente:</label>
							<input class="form-control" type="text" name="nome_cliente" required>
						</div>
						<div class="form-group row">
							<div class="col-md-4">
								<label>Telefone:</label>
								<input class="form-control" type="text" name="telefone" required>
							</div>
							<div class="col-md-8">
								<label>E-mail:</label>
								<input class="form-control" type="text" name="email" required>
							</div>
						</div>
						<div class="form-group">
							<label>Caminho dos compartilhamentos:</label>
							<input class="" type="text" name="compartilhamentos">
						</div>
						<div class="form-group">
							<label>Caminho do Cenário:</label>
							<input class="" type="text" name="cenario">
						</div>
						<div class="form-group">
							<label>Quantidade de computadores:</label>
							<input class="form-control" type="text" name="qtde_pcs" required>
						</div>
						<br>
						<center>
							<button class="btn btn-default btn-lg" type="reset">Limpar</button>
							<button class="btn btn-primary btn-lg" type="submit">Enviar</button>
						</center>

				</form>
			
			</div><!-- col-md-6 -->
					
		</div><!-- Fim row-->
	</div><!-- Segundo container -->



<footer style="background: white;">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img src="img/logo_mastermaq.png">
				<h2>Doc<span class="vermelho">Web</span> <small>Documentação de clientes</small></h2>
			</div>
			<div class="col-md-4" style="display:table-cell;vertical-align: middle; margin: 50px auto;">
				Criado por Eduardo Dias - 2017 - All Rights Reserved
			</div>
		</div>
	</div>
</footer>


    <script type="text/javascript" src="../js/jquery-2.2.1.js"></script>
    <script type="text/javascript" src="../js/scriptsClientes.js" >
	</script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../js/tela_principal.js">
	</script>
	
</body>
</html>
