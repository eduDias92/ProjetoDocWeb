<?php
    class ConexaoBD{

        function criaConexao(){
            $dsn = "mysql:dbname=docwebDB;host:localhost";//passa os parâmetros da conexão pelo driver do mysql
            $usuario = "root";//usuario
            $senha = "Tirano17@";//senha

            try {
                $conexao = new PDO($dsn, $usuario, $senha);//cria uma nova instancia da class PDO passando os parametros informados acima para o driver;

                return $conexao;
                
            }catch(PDOException $e){
                echo "Erro ao conectar com o banco de dados:<br><h4 style='color:red'>$e</h4>";

            }
            
        }

        //será excluído:

    }
?>