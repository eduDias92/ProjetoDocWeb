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
						<ul class="dropdown-menu">
							<li><a href="#">Minha conta</a></li>
							<li><a href="../model/saidaSistema.php">Sair</a></li>
						</ul>
					</li>
				</ul>
		</div><!-- Fim container-->
	</nav><!-- Fim navbar -->
	
	<div class="container conteudo principal">
		<div class="row">
			
			<div class="col-md-4 wells">
				<a href="clientes.php" class="well btn btn-danger active">
					Lista Clientes
				</a>
				<a href="tutoriais.php" class="well btn btn-danger">
					Tutoriais
				</a>
				<a href="ver_scripts.php" class="well btn btn-danger">
					Scripts
				</a>
			</div><!--Fim primeira seção-->
			<div class="col-md-7 conteudo-clientes">
				<h3>Clientes Cadastrados:</h3>
				<button type="button" name="incluir" id="btn_inclui_cliente" class="btn btn-success btn-lg" style="font-size: 25px;">+</button>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<td>Cliente</td>
							<td>Código</td>
							<td>Telefone</td>
						</tr>
					</thead>
					<tbody id="tabela_clientes">
						
					</tbody>

				</table>
			</div><!--Fim segunda seção-->

		</div><!-- Fim row-->
	</div><!-- Segundo container -->



<footer style="background: white;">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img src="img/logo_mastermaq.png">
				<h2>Doc<span class="vermelho">Web</span> <small>Documentação de clientes</small></h2>
			</div>
			<div class="col-md-4" style="margin: 50px auto;">
				Criado por Eduardo Dias - 2017 - All Rights Reserved
			</div>
		</div>
	</div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="../js/jquery-2.2.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../js/tela_principal.js"></script>

    <script type="text/javascript" src="../js/requisitaClientes.js">
	</script>
</body>
</html>
