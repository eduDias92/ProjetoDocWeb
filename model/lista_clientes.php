<?php
	session_start();

	if (!isset($_SESSION['login'])) {
    	# code...
    	header("Location: ../index.php?logado=0");
	}
	require_once "../classes/ClienteBD.php";
	$clientes = new ClienteBD();

	$clientes->listaClientes();
?>