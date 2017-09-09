<?php
	//Script de saída do sistema.
	session_start();//é necessário iniciar a sessão para poder removê-la
	unset($_SESSION['login']);//remove a váriael login que está na sessão
	unset($_SESSION['senha']);

	header('location: ../index.php');//redireciona para a página de login
?>