<?php
	require_once 'conexaobd.class.php';

	$con = new ConexaoBD();
	$obj = $con->criaConexao();

	$id = $_GET['pic'];


	$sql = "select * from cenario where id = $id";
	$resultado = $obj->query($sql)->fetchAll();

	Header("Content-type: ".$resultado[0]['tipo_img']);
	echo $resultado[0]['imgCenario'], '<br>';


?>