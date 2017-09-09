<?php
	/**
	* criado em 03/09/2017
	*@author Eduardo Dias
	*/
	class Cliente{

		private $cod_cliente, $nome_cliente, $serial_ti, $serial_ng, $serial_dos, $qtde_pcs, $cenario, $compartilhamentos;

		//getters
		public function getCod_cliente(){
			return $this->cod_cliente;
		}
		
		public function getNome_cliente(){
			return $this->nome_cliente;
		}

		public function getQtde_pcs(){
			return $this->qtde_pcs;
		}
		public function getCenario(){
			return $this->cenario;
		}
		public function getCompartilhamentos(){
			return $this->compartilhamentos;
		}

		//setters
		public function setCod_cliente($cod_cliente){
			$this->cod_cliente = $cod_cliente;
		}

		public function setNome_cliente($nome_cliente){
			$this->nome_cliente = $nome_cliente;
		}

		public function setQtde_pcs($qtde_pcs){
			$this->qtde_pcs = $qtde_pcs;
		}

		public function setCenario($cenario){
			$this->cenario = $cenario;
		}

		public function setCompartilhamentos($compartilhamentos){
			$this->compartilhamentos = $compartilhamentos;
		}


	}


?>