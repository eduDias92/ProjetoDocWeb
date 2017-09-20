<?php
include_once '../classes/servidorBD.php';
include_once '../classes/servidor.php';

$codCliente = $_POST['codCliente'];
$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$ipInterno = $_POST['ipInterno'];
$antivirus = $_POST['antivirus'];
$sistema_op = $_POST['sistemaOP'];
$hardware = $_POST['hardware'];
$discos = $_POST['discos'];
$servicos = $_POST['servicos'];

$servidor = new Servidor();

$servidor->setNome($nome);
$servidor->setTipo($tipo);
$servidor->setIP_interno($ipInterno);
$servidor->setAntivirus($antivirus);
$servidor->setSistema_op($sistema_op);
$servidor->setHardware($hardware);
$servidor->setDiscos($discos);
$servidor->setServicos($servicos);

$servidorBD = new ServidorBD();
$resultado = $servidorBD->insereServidorBD($servidor, $codCliente);

echo $resultado;



