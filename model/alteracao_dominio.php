<?php
	include_once '../classes/ClienteBD.php';
	if (isset($_GET['codCliente']) && isset($_GET['dados']) && $_GET['dados'] != '{}') {
		
		$cliente = new ClienteBD();
		$dados = json_decode($_GET['dados']);
		$codCliente = $_GET['codCliente'];
		
		
		$resultado = $cliente->alteraDominio($codCliente, $dados);

		echo $resultado;
	}else{
		return false;
	}
?>