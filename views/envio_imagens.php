<?php
    require_once ('../classes/conexaobd.class.php');
    $con = new ConexaoBD();
    $objConexao = $con->criaConexao();
    
    $img = $_FILES['file'];//retorna um array com as características da imagem, tamanho, fonte, arquivo temporário gerado, nome da imagem, etc.
    $tipoImg = $img['type'];
    $codCliente = $_POST['codCliente'];
    
    if ($img != NULL) {//se a imagem for carregada corretamente
        
        $nomeFinal = date('YmdHis').'.png';//cria uma string com o nomeFinal da imagem
        if(move_uploaded_file($img['tmp_name'], $nomeFinal)){//move a imagem para a pasta do sistema com o nome predefinido anteriormente (nomeFinal)
            $tamanhoImg = filesize($nomeFinal);//tamanho da imagem cadastrada
            $mysqlImg = addslashes(fread(fopen($nomeFinal, 'r'), $tamanhoImg));
            
            $query = "insert into cenario (codcliente, imagem, tipo_imagem) values ($codCliente, '$mysqlImg', '$tipoImg')";
            $retorno = $objConexao->exec($query);

            unlink($nomeFinal);
            
            if($retorno){
                echo 'Inserido com sucesso!';
            }else{
                echo 'Erro ao tentar inserir a imagem.';
            }

        }
    }
//var_dump($_FILES);
