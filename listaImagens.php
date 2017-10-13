<?php
	require_once ('conexaobd.class.php');
	
	
	$con = new ConexaoBD();
	$obj = $con->criaConexao();

	$sql = 'select * from cenario';

	$resultado = $obj->query($sql)->fetchAll();

	foreach ($resultado as $imagem) {
		# code...

		echo '<img src="getImagem.php?pic='.$imagem['id'].'">';
	}


?>