<?php
	session_start();

	if (!isset($_SESSION['login'])) {
    	# code...
    	header("Location: ../index.php?logado=0");
	}
	
	require_once '../classes/politicaBackup.php';
	require_once '../classes/politicaBackupBD.php';

	$polBD = new PoliticaBackupBD();

	return $polBD->listaRotinas($_POST['codCliente']);
?>