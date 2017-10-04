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
	function descreveDominio($codCliente){
	    $conexao = new ConexaoBD();
	    $objConexao = $conexao->criaConexao();
	    
	    $query = "select c.codCliente, d.nomeDominio, d.ipServidor from Cliente as c INNER join Dominio as d on c.codcliente = d.codCliente having codcliente = $codCliente";
	    
	    $resultado = $objConexao->query($query)->fetchAll();
	    if(empty($resultado)){
	        return 'Não possui domínio cadastrado';
	    }
	    else {
	       return $resultado[0];
	    }
	    
	}
	function ListaUsuarios($codCliente, $nomeDominio){
	    $conexao = new ConexaoBD();
	    $objConexao = $conexao->criaConexao();
	    
	    $query = "select c.codcliente, d.nomeDominio, u.usuario, u.senha from Cliente as c left join Dominio as d on       c.codCliente = d.codCliente LEFT JOIN usuariosadms as u on u.nomeDominio = d.nomeDominio having c.codCliente = '$codCliente' or d.nomeDominio = '$nomeDominio'";
	   
	   $resultado = $objConexao->query($query)->fetchAll();
	   return $resultado;
	}

}

?>

