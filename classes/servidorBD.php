<?php
require_once "conexaobd.class.php";

class ServidorBD
{

    public function insereServidorBD($servidor, $codCliente)
    { // recebe o objeto servidor e o código do cliente
        $conexao = new ConexaoBD(); // instancia o objeto de conexao
        $objConexao = $conexao->criaConexao(); // retorna o objeto PDO para execução de queries de banco de dados
                
        $nome = $servidor->getNome();
        $tipo = $servidor->getTipo();
        $ip_interno = $servidor->getIp_interno();
        $antivirus = $servidor->getAntivirus();
        $sistema_op = $servidor->getSistema_op();
        $hardware = $servidor->getHardware();
        $discos = $servidor->getDiscos();
        $servicos = $servidor->getServicos();
        
        $query = "insert into servidor (codcliente, nome, tipo, ipInterno, antivirus, so, hardware, discos, servicos) values ($codCliente, '$nome', '$tipo', '$ip_interno', '$antivirus', '$sistema_op', '$hardware', '$discos', '$servicos')";
        
        
        $linha = $objConexao->exec($query);//executa o insert acima retornando o valor para a variável  $linha. Se a inserção for bem-sucedida, a função retornará 1, se não, retornará FALSE 
        
        
        if ($linha != 1) {//se a variável não for 1, ou seja, se não inserir nada no bd
            $detalhes = $objConexao->errorInfo();
            return $detalhes[2];
        }
        return $linha;
    }
    
    public function listaServidores($codCliente){
        $conexao = new ConexaoBD();
        $objConexao = $conexao->criaConexao();
        
        $query = "select servidor.nome, tipo, ipinterno, antivirus, so, hardware, discos, servicos from servidor, cliente where cliente.codCliente = servidor.codCliente and servidor.codCliente = $codCliente";
        
        $resultado = $objConexao->query($query)->fetchAll();
        
        foreach ($resultado as $linha){
            echo '<div class="panel panel-default" role="tab" id="'.$linha['nome'].'">
                    <div class="panel-heading">	
                        <a role="button" data-toggle="collapse" data-parent="teste" href="#abre'.$linha['nome'].'">	'.$linha['nome'].' </a>
					</div><!--fim-panel-heading-->
                    <div id="abre'.$linha['nome'].'" class="panel-collapse collapse in" role="tabpanel">
                    <div class="panel-body" >
                    <table class="table table-striped table-hover" >
                    <tr>
    					<td>Tipo</td>
						<td>'.$linha['tipo'].'</td>
					</tr>
                    <tr>
    					<td>IP</td>
						<td>'.$linha['ipinterno'].'</td>
					</tr>
                    <tr>
    					<td>Antivírus</td>
						<td>'.$linha['antivirus'].'</td>
					</tr>
					<tr>
    					<td>Sistema Operacional</td>
						<td>'.$linha['so'].'</td>
					</tr>
					<tr>
    					<td>Conf. Máquina</td>
						<td> '.$linha['hardware'].'</td>
					</tr>
					<tr>
    					<td>Discos</td>
						<td>'.$linha['discos'].'</td>
					</tr>
					<tr>
						<td>Serviços</td>
						<td>'.$linha['servicos'].'</td>
					</tr>
</table>
            <button class="btn btn-primary">Editar</button>
			<button class="btn btn-danger">Excluir</button>
</div><!--fim-panel-body-->
</div>
</div><!--fim-painel-->';
        }
        
    } 
    
    public function validaNome($nome, $codcliente){
        $conexao = new ConexaoBD();
        $objConexao = $conexao->criaConexao();
        
        $query = "select nome from servidor where codcliente = $codcliente and nome = '$nome'";
        
        $resultado = $objConexao->query($query)->fetchAll();
        
        return $resultado;
    }
}

