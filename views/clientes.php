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
	<script type="text/javascript" src="../js/tela_principal.js">
	</script>
	<script type="text/javascript" src="../js/requisitaClientes.js">
	</script>
	
</head>

<body>
	<!-- Barra de navegação  -->
	<nav class="navbar navbar-default navbar-fixed-top barra">
		<div class="container">
			<div class="navbar-header" style="padding-top:10px;">
				
				<a href="principal.php" class="navbar-brand">
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
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Nome do Cliente <br> Cod. Cliente:
					</div>
					<div class="panel-body">
						<h4>Contatos:</h4>
						<ul>
							<li>Telefones: 31 34506200</li>
							<li>Email: cliente@cliente.com</li>
							<li>Serial TI: 66031248</li>
						</ul>
					</div>
				</div>
			</div><!--Fim primeira seção-->
			<div class="col-md-7">
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="#servidores" role="tab" data-toggle="tab">Servidores</a></li>
					<li><a href="#backup" role="tab" data-toggle="tab">Política de Backup</a></li>
					<li><a href="#cenario" role="tab" data-toggle="tab">Cenário</a></li>
				</ul>
				
				<div class="tab-content">
					<div class="tab-pane active" role="tabpanel" id="servidores">
						<div class="panel-group" id="teste">
							<div class="panel panel-default" role="tab" id="srvng">
								<div class="panel-heading"> 
								
									<a role="button" data-toggle="collapse" data-parent="teste" href="#abreSrvng">	SRVNG </a>


								</div>

								<div id="abreSrvng" class="panel-collapse collapse in" role="tabpanel">
									<div class="panel-body" >
										<table class="table table-striped table-hover" >
											<tr>
												<td>IP</td>
												<td>192.168.0.254</td>
											</tr>
											<tr>
												<td>Sistema Operacional</td>
												<td>Windows Server 2008 R2 SP1</td>
											</tr>
											<tr>
												<td>Conf. Máquina</td>
												<td> Intel Xeon x5300, 12GB RAM</td>
											</tr>
											<tr>
												<td>HD</td>
												<td>1 Disco 1TB + SSD 250GB</td>
											</tr>
											<tr>
												<td>Serviços</td>
												<td>Aplicação NG - Instância: SRVNG\SQLNG, 49653</td>
											</tr>
										</table>
										<button class="btn btn-primary">Editar</button>
										<button class="btn btn-danger">Excluir</button>
									</div>
								</div>
							</div>
							<div class="panel panel-default" role="tab" id="srvdb">
								<div class="panel-heading"> 
								
									<a role="button" data-toggle="collapse" data-parent="teste" href="#abreSrvdb">	SRVDB </a>

								</div>

								<div id="abreSrvdb" class="panel-collapse collapse" role="tabpanel">
									<div class="panel-body" >
										<table class="table table-striped table-hover" >
											<tr>
												<td>IP</td>
												<td>192.168.0.250</td>
											</tr>
											<tr>
												<td>Sistema Operacional</td>
												<td>Windows Server 2008 R2 SP1</td>
											</tr>
											<tr>
												<td>Conf. Máquina</td>
												<td> Intel Xeon x5300, 12GB RAM</td>
											</tr>
											<tr>
												<td>HD</td>
												<td>1 Disco 1TB + SSD 250GB</td>
											</tr>
											<tr>
												<td>Serviços</td>
												<td>Banco de dados, Backup</td>
											</tr>
										</table>
										<button class="btn btn-primary">Editar</button>
										<button class="btn btn-danger">Excluir</button>
									</div>
								</div>
							</div>
							<div class="panel panel-default" role="tab" id="srvad">
								<div class="panel-heading"> 
								
									<a role="button" data-toggle="collapse" data-parent="teste" href="#abreSrvad">	SRVAD </a>

								</div>

								<div id="abreSrvad" class="panel-collapse collapse" role="tabpanel">
									<div class="panel-body" >
										<table class="table table-striped table-hover" >
											<tr>
												<td>IP</td>
												<td>192.168.0.253</td>
											</tr>
											<tr>
												<td>Sistema Operacional</td>
												<td>Windows Server 2008 R2 SP1</td>
											</tr>
											<tr>
												<td>Conf. Máquina</td>
												<td> Intel Xeon x5300, 12GB RAM</td>
											</tr>
											<tr>
												<td>HD</td>
												<td>1 Disco 1TB + SSD 250GB</td>
											</tr>
											<tr>
												<td>Serviços</td>
												<td>AD, DNS, DHCP</td>
											</tr>
										</table>
										<button class="btn btn-primary">Editar</button>
										<button class="btn btn-danger">Excluir</button>
									</div>
								</div>
							</div>
							

							
						</div>
					</div>
					<div class="tab-pane" role="tabpanel" id="backup">
						<h2>Políticas de backup Aparecerão aqui:</h2>
						<ul>
							<li> <h5>Backup NG:</h5>
								<p>
									O backup é realizado no SRVNG do C:\MMQNG\ para o D:\BKPNG
								</p>
							</li>
							<li> <h5>Backup DOS:</h5>
								<p>
									O backup é realizado no SRVAD do C:\MMQC\ para o D:\Backup_DOS, via cobian.
								</p>
							</li>
							<li> <h5>Backup Dados:</h5>
								<p>
									O backup é realizado no SRVDB do E:\Dados para o D:\Backup_dados, via cobian.
								</p>
							</li>


						</ul>
					</div>
					<div class="tab-pane" role="tabpanel" id="cenario">
						<h2>Cenário aparecerá aqui:</h2>
						<img src="../img/cenario_exemplo.PNG" >
					</div>
				</div><!-- fim tab-content -->

			</div>
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


    <script type="text/javascript" src="../js/jquery-2.2.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
