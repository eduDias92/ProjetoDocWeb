<?php 

	/**
	* criado em 03/09/2017
	*@author Eduardo Dias
	*/

	class Contato{
		private $idContato, $codCliente, $email, $telefone1, $telefone2;

		//getters
		public function getIdContato(){
			return $this->idContato;
		}
		public function getCodCliente(){
			return $this->codCliente;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getTelefone1(){
			return $this->telefone1;
		}
		public function getTelefone2(){
			return $this->telefone2;
		}

		//setters
		public function setIdContato($idContato){
			$this->idContato = $idContato;
		}
		public function setCodCliente($codCliente){
			$this->codCliente = $codCliente;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function setTelefone1($telefone1){
			$this->telefone1 = $telefone1;
		}
		public function setTelefone2($telefone2){
			$this->telefone2 = $telefone2;
		}
	}

 ?>