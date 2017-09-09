<?php

	$logado = !isset($_GET['logado']) ? '' : $_GET['logado'];


?>


<!doctype html>
<html lang="pt-br">
<head>
	<title> DocWeb - Documentação de clientes </title>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	

	<!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>

<body>

	<div class="container">
		<div class="row">
		
			<section class="col-md-4 col-md-offset-4 capa">
				<h2>Doc<span class="vermelho">Web</span> <small>Documentação de clientes</small></h2>
			
				<form class="form-login" action="model/valida_login.php" method="post">
					<label for="login">Login:</label>
					<input type="text" name="login" class="form-control" required/><br>
					<label for="senha">Senha: </label>
					<input type="password" name="senha" class="form-control" required/><br>
					<center><button class="btn btn-primary form-control" type="submit" id="botao_login">Entrar</button></center>
					<strong style="color:red; text-align: center"><?php if($logado == '0'){ echo "Dados inválidos";}?></strong>
				</form>
				
			</section>
		</div>
	</div>

	
    <script type="text/javascript" src="js/jquery-2.2.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
