<?php
  session_start();

	if (!isset($_SESSION['login'])) {
    	# code...
    	header("Location: ../index.php?logado=0");
	}
  include_once '../classes/servidorBD.php';
  $dados = json_decode($_GET['dados']);
  
  $servidor = new ServidorBD();
  $resultado = $servidor->validaNome($dados->nomeServ, $dados->codCliente);
  
  if(!empty($resultado)){
      echo true;
  }else{
      echo false;
  };