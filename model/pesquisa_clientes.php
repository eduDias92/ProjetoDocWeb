<?php
	require_once('../classes/conexaobd.class.php');
	require_once('../classes/clientebd.php');

	$nome = $_POST['nome_cliente'];

	$cliente = new ClienteBD();
	$cliente->pesquisaClientes($nome);

	
?>