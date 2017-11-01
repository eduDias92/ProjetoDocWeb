<?php
	session_start();

	if (!isset($_SESSION['login'])) {
    	# code...
    	header("Location: ../index.php?logado=0");
	}
	include_once '../classes/ClienteBD.php';
	if (isset($_GET['codCliente']) && isset($_GET['dados']) && $_GET['dados'] != '{}') {
		
		$cliente = new ClienteBD();
		$dados = json_decode($_GET['dados']);
		$codCliente = $_GET['codCliente'];
		
		
		$resultado = $cliente->insereDominio($codCliente, $dados);

		echo $resultado;
	}else{
		return false;
	}
?>