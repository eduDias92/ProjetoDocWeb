<?php

	require_once '../classes/politicaBackup.php';
	require_once '../classes/politicaBackupBD.php';

	$politica = new PoliticaBackup();

	$codCliente = $_POST['codCliente'];
	$politica->setTipoBackup($_POST['tipo_backup']);
	$politica->setOrigem($_POST['unidade_origem'].':\\'.$_POST['pasta_origem']);
	$politica->setDestino($_POST['unidade_destino'].':\\'.$_POST['pasta_destino']);
	$politica->setServidorOrigem($_POST['servidor_origem']);
	$politica->setServidorDestino($_POST['servidor_destino']);
	$politica->setAgendamento($_POST['dias_backup'].', às '.$_POST['horario_backup'].'hrs');
	$politica->setSoftwareBackup($_POST['software_backup']);
	$politica->setTipoSincronizacao($_POST['tipo_sincronizacao']);
	$politica->setLocalSincronizacao($_POST['pasta_sincronizacao']);
	$politica->setAgendamentoSinc($_POST['dias_sinc'].', às '.$_POST['horario_sinc'].'hrs');
	$politica->setRetencao($_POST['retencao']);
	$politica->setObs($_POST['observacoes']);

	/*$polBD = new PoliticaBackupBD();

	$polBD->cadastraRotina($codCliente, $politica);*/

	echo $politica->getRetencao();
?>