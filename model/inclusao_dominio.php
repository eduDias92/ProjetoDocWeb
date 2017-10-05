<?php
	include_once '../classes/ClienteBD.php';

	$cliente = new ClienteBD();

	$dados = json_decode($_GET['dados']);
	$codCliente = $_GET['codCliente'];

	echo $dados->nomeDominio, $dados->ipControlador, $codCliente;

?>