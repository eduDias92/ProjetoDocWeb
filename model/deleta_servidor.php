<?php
// include_once 'Servidor.php';
	session_start();

	if (!isset($_SESSION['login'])) {
    	# code...
    	header("Location: ../index.php?logado=0");
	}

include_once '../classes/servidorBD.php';

$dados = json_decode($_GET['dados']);

$servidorBD = new ServidorBD();

$resultado = $servidorBD->deletaServidor($dados);
//if($resultado)
echo $resultado;

 