<?php

    abstract class Conexao extends PDO{

        public function __construct(){
            $this->dsn = 'mysql:dbname=docwebDB;host:localhost';
            $this->user = 'root';
            $this->password = '';

            try{
                parent::__construct($this->dsn, $this->user, $this->password);
            }catch(PDOException $e){
                die("Erro ao conectar com o banco de dados:<br><h4 style='color:red'>$e</h4>");
            }
        }

    }
    class ClienteBD extends Conexao{
        public function listaClientes(){
            $sql = "SELECT c.nome, c.codcliente, ct.telefone1 as Telefone FROM cliente as c left join contato as ct on c.codcliente = ct.codCliente ORDER BY c.nome";
            $resultado = parent::query($sql)->fetchAll(PDO::FETCH_ASSOC);

            //var_dump($resultado);
            foreach($resultado as $linha){
                echo '<tr>';
                echo '<td>'.$linha['nome'].'</td>';
                echo '<td>'.$linha['codcliente'].'</td>';
                echo '<td>'.$linha['Telefone'].'</td>';
                echo '</tr>';
            }
        }

        public function retornaClientes(){
            $sql = "SELECT c.nome, c.codcliente, ct.telefone1 as Telefone FROM cliente as c left join contato as ct on c.codcliente = ct.codCliente ORDER BY c.nome";
            $resultado = parent::query($sql)->fetchAll(PDO::FETCH_ASSOC);

            //var_dump($resultado);
            // $tabela = '<table>';
            // foreach($resultado as $linha){
            //     $tabela .= '<tr>';
            //     $tabela .= '<td>'.$linha['nome'].'</td>';
            //     $tabela .= '<td>'.$linha['codcliente'].'</td>';
            //     $tabela .= '<td>'.$linha['Telefone'].'</td>';
            //     $tabela .= '</tr>';
            // }
            // $tabela .= '</table>';

            return $resultado;
        }
    }


?>
