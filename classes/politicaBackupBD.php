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
			
			if(!$resultado){
				echo "<br>
					<h4>Nenhuma rotina cadastrada.</h4>
					<hr>";
			}else{
				foreach ($resultado as $linha){
		            echo '<div class="panel panel-info" role="tab" id="'.$linha['tipo_backup'].'">
		                    <div class="panel-heading">	
		                        <a role="button" data-toggle="collapse" data-parent="teste" href="#abre'.$linha['tipo_backup'].$linha['id'].'">Backup '.$linha['tipo_backup'].' </a>
							</div><!--fim-panel-heading-->
		                    <div id="abre'.$linha['tipo_backup'].$linha['id'].'" class="panel-collapse collapse" role="tabpanel">
		                <div class="panel-body" >
		                   	<h4>Backup completo do '.$linha['tipo_backup'].'</h4>
		                   	<p><strong>Agendamento:</strong> O backup é realizado '.$linha['Agendamento'].' via '.$linha['software_backup'].' </p>
		                   	<p><strong>Origem:</strong> '.$linha['local_origem'].' -- '.$linha['servidor_origem'].' </p>
		                    <p><strong>Armazenamento:</strong> '.$linha['local_destino'].' -- '.$linha['servidor_destino'].' </p>';
		            if ($linha['tipo_sincronizacao']) {
		            	echo '<p><strong>Sincronização:</strong> '.$linha['local_sincronizacao'].' '.$linha['agendamento_sinc'].' via '.$linha['tipo_sincronizacao'].' </p>
		                    <p><strong>Retenção:</strong> '.$linha['retencao'].' dias </p>';
		            }else{
			            echo '<p><strong>Sincronização:</strong> Não cadastrado. </p>
			                    <p><strong>Retenção:</strong> Não cadastrado. </p>';
			        	}
			        
			        echo $linha['observacoes'] == '' ? '<p><strong>Observações:</strong> Não há observações.</p>' : '<p><strong>Observações:</strong> '.$linha['observacoes'].'</p>';

			        echo  '</div><!--fim-panel-body-->
			                </div>
			                </div><!--fim-painel-->';
		        	}
				}
			}


		function relatorioPoliticas($codCliente){

			$con = new ConexaoBD();
			$link = $con->criaConexao();

			$sql = "SELECT c.codcliente, c.nome, p.tipo_backup, p.servidor_origem,
					p.local_origem, p.servidor_destino, p.local_destino, p.Agendamento,
					p.software_backup, p.tipo_sincronizacao, p.local_sincronizacao, p.agendamento_sinc,
					p.retencao,p.observacoes
					from politica_backup as p left join cliente as c 
					on p.codcliente = c.codCliente having codcliente = $codCliente;";

			$resultado = $link->query($sql)->fetchAll(PDO::FETCH_ASSOC);

			if($resultado){
				return $resultado;
			}else{
				echo "Não há políticas cadastradas.";
				return false;
			}

		}
		
	}

?>