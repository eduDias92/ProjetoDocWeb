<?php
require_once "conexaobd.class.php";

class ContatoBD{

	public function insereContatoBD($contato, $codcliente){

		$conexao = new ConexaoBD();//instancia o objeto de conexao
		$objConexao = $conexao->criaConexao(); //retorna o objeto PDO para execução de queries de banco de dados

		$email = $contato->getEmail();
		$telefone1 = $contato->getTelefone1();

		//Armazena o comando de inserção do cliente;
		$query = "insert into contato (codcliente, email, telefone1) values ($codcliente, '$email', '$telefone1')";


		//Variável consulta recebe o retorno da função exec() do objeto PDO objConexao, se tudo der certo ele retornará 
		$linha = $objConexao->exec($query);

		return $linha;
	}

}

