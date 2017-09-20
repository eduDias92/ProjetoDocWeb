<?php
	/**
	* criado em 16/09/2017
	*@author Eduardo Dias
	*/
	class Servidor{

		private $cod_cliente, $nome, $tipo, $ip_interno, $antivirus, $sistema_op, $hardware, $discos, $servicos;

		//getters
		public function getCod_cliente(){
			return $this->cod_cliente;
		}
		
		public function getNome(){
			return $this->nome;
		}

		public function getTipo(){
			return $this->tipo;
		}

		public function getIp_interno(){
			return $this->ip_interno;
		}

		public function getAntivirus(){
			return $this->antivirus;
		}

		public function getSistema_op(){
			return $this->sistema_op;
		}
		public function getHardware(){
			return $this->hardware;
		}
		public function getDiscos(){
			return $this->discos;
		}
		public function getServicos(){
			return $this->servicos;
		}

		//setters
		public function setCod_cliente($cod_cliente){
			$this->cod_cliente = $cod_cliente;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function setTipo($tipo){
			$this->tipo = $tipo;
		}

		public function setIP_interno($ip_interno){
			$this->ip_interno = $ip_interno;
		}

		public function setAntivirus($antivirus){
			$this->antivirus = $antivirus;
		}

		public function setSistema_op($sistema_op){
			$this->sistema_op = $sistema_op;
		}

		public function setHardware($hardware){
			$this->hardware = $hardware;
		}
		
		public function setDiscos($discos){
			$this->discos = $discos;
		}

		public function setServicos($servicos){
			$this->servicos = $servicos;
		}


	}


?>