<?php

session_start();

if (!isset($_SESSION['login'])) {
    # code...
    header("Location: ../index.php?logado=0");
}
?>

<html lang="pt-br">
<head>
<!--
	Criado Por Eduardo Dias.
	Data: 24/08/2017

-->
	<title> DocWeb - Documentação de clientes </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">

<!-- 	<link rel="icon" href="img/favicon.png"> -->



	
	
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
							Olá, <?php echo ucfirst($_SESSION['login']) ?>! 
							<span class="glyphicon glyphicon-user icone-user" style="text-align: center;"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Minha conta</a></li>
							<li><a href="../model/saidaSistema.php">Sair</a></li>
						</ul>
					</li>
				</ul>
		</div><!-- Fim container-->
	</nav><!-- Fim navbar -->
	