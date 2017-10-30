<?php
	/**
	* 29/10/2017 - Eduardo Dias
	*/
	require_once 'conexaobd.class.php';
	
	class PoliticaBackupBD{
		function cadastraRotina($codCliente, $politica){
			$con = new ConexaoBD();
			$link = $con->criaConexao();

			$sql = sprintf("INSERT INTO politica_backup(codCliente, tipo_backup, servidor_origem, local_origem,
										servidor_destino, local_destino, agendamento, software_backup, tipo_sincronizacao,
										local_sincronizacao, agendamento_sinc, retencao, observacoes) 
							VALUES (%d, '%s', '%s', '%s', '%s', '%s','%s', '%s', '%s', '%s', '%s', %d, '%s')", 
							$codCliente, $politica->getTipoBackup(), $politica->getServidorOrigem(),
							$politica->getOrigem(), $politica->getServidorDestino(), $politica->getDestino(), 
							$politica->getAgendamento(), $politica->getSoftwareBackup(), $politica->getTipoSincronizacao(),
							$politica->getLocalSincronizacao(), $politica->getAgendamentoSinc(), $politica->getRetencao(), 
							$politica->getObs());

			$resultado = $link->exec($sql);

			return $resultado;
		}
		function listaRotinas($codCliente){
			$con = new ConexaoBD();
			$link = $con->criaConexao();

			$sql = "SELECT * FROM politica_backup where codCliente = $codCliente";

			$resultado = $link->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			echo $resultado;
		}
		
	}

?>