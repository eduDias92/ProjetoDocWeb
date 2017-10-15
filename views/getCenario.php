<?php
	require_once '../classes/conexaobd.class.php';
	$con = new ConexaoBD();
	$obj = $con->criaConexao();
	
	$codCliente = $_GET['codCliente'];
	$sql = "select codcliente, tipo_imagem, imagem from cenario where codCliente = $codCliente";

    $resultado = $obj->query($sql)->fetchAll();
    //var_dump($resultado);
 	Header('Content-type: '.$resultado[0]['tipo_imagem']);
 	echo ($resultado[0]['imagem']);
?>