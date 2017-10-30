<?php
	/**
	* 29/10/2017
	*/
	class PoliticaBackup
	{
		private $tipo_backup, $servidorOrigem, $origem, $servidorDestino, $destino, $agendamento, $software_backup,
				$tipo_sincronizacao, $local_sincronizacao, $agendamento_sinc, $retencao, $obs;

		public function setTipoBackup($tipo_backup){
			$this->tipo_backup = $tipo_backup;
		}

		public function setServidorOrigem($servidorOrigem){
			$this->servidorOrigem = $servidorOrigem;
		}
		
		public function setOrigem($origem){
			$this->origem = $origem;
		}

		public function setServidorDestino($servidorDestino){
			$this->servidorDestino = $servidorDestino;
		}

		public function setDestino($destino){
			$this->destino = $destino;
		}

		public function setAgendamento($agendamento){
			$this->agendamento = $agendamento;
		}

		public function setSoftwareBackup($software_backup){
			$this->software_backup = $software_backup;
		}

		public function setTipoSincronizacao($tipo_sincronizacao){
			$this->tipo_sincronizacao = $tipo_sincronizacao;
		}

		public function setLocalSincronizacao($local_sincronizacao){
			$this->local_sincronizacao = $local_sincronizacao;
		}

		public function setAgendamentoSinc($agendamento_sinc){
			$this->agendamento_sinc = $agendamento_sinc;
		}
		public function setRetencao($retencao){
			$this->retencao = $retencao;
		}
		public function setObs($obs){
			$this->obs = $obs;
		}



		public function getTipoBackup(){
			return $this->tipo_backup;
		}
		public function getServidorOrigem(){
			return $this->servidorOrigem;
		}
		public function getOrigem(){
			return $this->origem;
		}
		public function getServidorDestino(){
			return $this->servidorDestino;
		}
		public function getDestino(){
			return $this->destino;
		}
		public function getAgendamento(){
			return $this->agendamento;
		}
		public function getSoftwareBackup(){
			return $this->software_backup;
		}
		public function getTipoSincronizacao(){
			return $this->tipo_sincronizacao;
		}
		public function getLocalSincronizacao(){
			return $this->local_sincronizacao;
		}
		public function getAgendamentoSinc(){
			return $this->agendamento_sinc;
		}
		public function getRetencao(){
			return $this->retencao;
		}
		public function getObs(){
			return $this->obs;
		}

	}


?>