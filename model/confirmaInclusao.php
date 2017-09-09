<?php
	include '../classes/clienteBD.php';
	include '../classes/cliente.php';
	include '../classes/contato.php';
	include '../classes/contatoBD.php';

	//recebendo valores de 
	$cod_cliente = $_POST['cod_cliente'];
	$nome_cliente = $_POST['nome_cliente'];
	$compartilhamentos = $_POST['compartilhamentos'];
	$cenario = $_POST['cenario'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$qtde_pcs = $_POST['qtde_pcs'];

	$cliente = new Cliente();//cria a instancia da classe cliente
	
	//Passando os valores recebidos da página inclusao_cliente.php para a instância
	$cliente->setCod_cliente($cod_cliente);
	$cliente->setNome_cliente($nome_cliente);
	$cliente->setCompartilhamentos($compartilhamentos);
	$cliente->setCenario($cenario);
	$cliente->setQtde_pcs($qtde_pcs);

	$cliente_bd = new ClienteBD(); //instancia da classe que faz a conexão com o banco de dados

	$sucesso = $cliente_bd->insereClienteBD($cliente); //chama o método de inserção no banco de dados passando o objeto cliente como parâmetro.

	$contato = new Contato();
	$contato->setEmail($email);
	$contato->setTelefone1($telefone);
	$contato->setTelefone2('123654');

	$contatoBD = new ContatoBD();
	$sucesso = $contatoBD->insereContatoBD($contato, $cod_cliente);

	

	echo $sucesso;

?>