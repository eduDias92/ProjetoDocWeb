<?php
 include_once '../classes/Servidor.php';
 include_once '../classes/servidorBD.php';
 
 $dados = json_decode($_GET['dados']);
 $tipo = $_GET['tipo'];
 $ipInterno = $_GET['ipInterno'];
 $antivirus = $_GET['antivirus'];
 $sistema_op = $_GET['sistemaOP'];
 $hardware = $_GET['hardware'];
 $discos = $_GET['discos'];
 $servicos = $_GET['servicos'];
 
 $servidor = new Servidor();
 
 $servidor->setNome($dados->nome);
 $servidor->setTipo($tipo);
 $servidor->setIP_interno($ipInterno);
 $servidor->setAntivirus($antivirus);
 $servidor->setSistema_op($sistema_op);
 $servidor->setHardware($hardware);
 $servidor->setDiscos($discos);
 $servidor->setServicos($servicos);
 
 $servidorBD = new ServidorBD();
 
 echo $servidorBD->editaServidor($dados->codCliente, $servidor);