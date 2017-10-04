<?php
// include_once 'Servidor.php';
include_once '../classes/servidorBD.php';

$dados = json_decode($_GET['dados']);

$servidorBD = new ServidorBD();

$resultado = $servidorBD->deletaServidor($dados);
//if($resultado)
echo $resultado;

 