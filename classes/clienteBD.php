<?php


require_once "conexaobd.class.php";

class ClienteBD{

	public function insereClienteBD($cliente){
		$conexao = new ConexaoBD();//instancia o objeto de conexao
		$objConexao = $conexao->criaConexao(); //retorna o objeto PDO para execução de queries de banco de dados

		$nome = $cliente->getNome_cliente();
		$codigo = $cliente->getCod_cliente();
		$compartilhamentos = $cliente->getCompartilhamentos();
		$cenario = $cliente->getCenario();
		$qtde_pcs = $cliente->getQtde_pcs();

		//Armazena o comando de inserção do cliente;
		$query = "insert into cliente (codcliente, nome, cenario, compartilhamentos, qtdecomputadores) values ($codigo, '$nome', '$compartilhamentos', '$cenario', $qtde_pcs)";
		//Variável consulta recebe o retorno da função exec() do objeto PDO objConexao, se tudo der certo ele retornará 
		$linha = $objConexao->exec($query);

		return $linha;
	}

	function listaClientes(){
		$conexao = new ConexaoBD();//instancia o objeto de conexao
		$objConexao = $conexao->criaConexao(); //retorna o objeto PDO para execução de queries de banco de dados

		$query = "select cliente.nome, cliente.codcliente, contato.telefone1, contato.email from cliente left join contato on cliente.codcliente = contato.codcliente order by cliente.nome";
		$resultado = $objConexao->query($query);
		$total = $resultado->fetchAll();
		
		// var_dump($total);
		foreach ($total as $linha) {
			# code...
			echo "<tr><td><a href='clientes.php?cliente=".$linha['nome']."'>".$linha['nome']."</a></td><td>".$linha['codcliente']."</td><td>".$linha['telefone1']."</td><td>".$linha['email']."</td></tr>";
		}
		
	}

	function detalhaCliente($nome){//mostra os dados do cliente detalhadamente.
		$conexao = new ConexaoBD();
		$objConexao = $conexao->criaConexao();

		$query = "select cliente.nome, cliente.codcliente, qtdecomputadores, contato.telefone1, contato.email from cliente, contato where cliente.codcliente = contato.codcliente AND nome like '$nome'";

		$resultado = $objConexao->query($query);
		$dados_cliente = $resultado->fetchAll();

		return $dados_cliente;

	}

}

?>

