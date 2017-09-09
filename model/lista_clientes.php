<?php
	require_once "../classes/ClienteBD.php";
	$clientes = new ClienteBD();

	$clientes->listaClientes();
?>