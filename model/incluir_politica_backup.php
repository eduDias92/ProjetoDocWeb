<?php
	
	session_start();

	if (!isset($_SESSION['login'])) {
    	# code...
    	header("Location: ../index.php?logado=0");
	}
	
	require_once '../classes/politicaBackup.php';
	require_once '../classes/politicaBackupBD.php';

	$politica = new PoliticaBackup();

	define('SEG_A_SEX', 'Seg,Ter,Qua,Qui,Sex');
	define('SEG_A_SAB', 'Seg,Ter,Qua,Qui,Sex,Sab');
	define('TODO_DIA', 'Seg,Ter,Qua,Qui,Sex,Sab,Dom');

	$codCliente = $_POST['codCliente'];
	$politica->setTipoBackup($_POST['tipo_backup']);
	$politica->setOrigem($_POST['unidade_origem'].':\\'.$_POST['pasta_origem']);
	$politica->setDestino($_POST['unidade_destino'].':\\'.$_POST['pasta_destino']);
	$politica->setServidorOrigem($_POST['servidor_origem']);
	$politica->setServidorDestino($_POST['servidor_destino']);


	$array_dias = $_POST['dias_backup'];
	$dias_semana = implode(',', $array_dias);

	if ($dias_semana == SEG_A_SEX) {
		$dias_semana = 'Seg à Sex';
	}
	if($dias_semana == SEG_A_SAB){
		$dias_semana = 'Seg à Sáb';
	}
	if($dias_semana == TODO_DIA){
		$dias_semana = 'Diariamente';
	}

	$politica->setAgendamento($dias_semana.', às '.$_POST['horario_backup'].'hrs');
	$politica->setSoftwareBackup($_POST['software_backup']);

	$tipo_sincronizacao  = isset($_POST['tipo_sincronizacao']) ? $_POST['tipo_sincronizacao'] : '';
	$local_sincronizacao = isset($_POST['pasta_sincronizacao']) ? $_POST['pasta_sincronizacao'] : '';
	
	$agendamento_sinc = '';
	
	if (isset($_POST['dias_sinc'])) {
		$array_dias = $_POST['dias_sinc'];

		$agendamento_sinc = implode(',', $array_dias);
		if ($agendamento_sinc == SEG_A_SEX) {
			$agendamento_sinc = 'Seg à Sex';
		}
		if($agendamento_sinc == SEG_A_SAB){
			$agendamento_sinc = 'Seg à Sáb';
		}
		if($agendamento_sinc == TODO_DIA){
			$agendamento_sinc = 'Diariamente';
		}
	}

	$agendamento_sinc 	.= isset($_POST['horario_sinc']) && !empty($_POST['horario_sinc']) ? ', às '.$_POST['horario_sinc'].'hrs' : '';

	$retencao 			 = isset($_POST['retencao']) ? $_POST['retencao'] : 0;
	$obs 				 = isset($_POST['observacoes']) ? $_POST['observacoes'] : '';

	$politica->setTipoSincronizacao($tipo_sincronizacao);
	$politica->setLocalSincronizacao($local_sincronizacao);
	$politica->setAgendamentoSinc($agendamento_sinc);
	
	$politica->setRetencao($retencao);
	$politica->setObs($obs);

	//print_r($politica);
	$polBD = new PoliticaBackupBD();

	echo $polBD->cadastraRotina($codCliente, $politica);

?>