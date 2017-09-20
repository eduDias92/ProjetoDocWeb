<?php
	session_start();
	
	include "../classes/conexaobd.class.php";

	$login = $_POST['login'];
	$senha = $_POST['senha'];

	$conexao = new conexaoBD();
	$objCon = $conexao->criaConexao();
	$consulta = $objCon->query("select * from login where nomeuser = '$login' and senha = '$senha'");
	$retorno = $consulta->fetchAll();

	if (empty($retorno)) {
		# code...
		header('location: ../index.php?logado=0');
	}else{
		$_SESSION['login'] = $login;
		header('location: ../views/principal.php');
	}

	if (!isset($_SESSION['login'])) {
		# code...
		header("Location: ../index.php?logado=0");
	}


?>