<?php
	session_start();

	if (!isset($_SESSION['login'])) {
    	# code...
    	header("Location: ../index.php?logado=0");
	}
    require_once '../classes/ClienteBD.php';
    
    $dados      = isset($_GET['dados']) ? json_decode($_GET['dados']) : 0;
    $codCliente = isset($_GET['codCliente']) ? $_GET['codCliente'] : 0;
    
    $cliente    = new ClienteBD();
    
    $resultado  = $cliente->cadastraAdms($codCliente, $dados);
    echo $resultado;
    
    
?>