<?php
	require_once ('conexaobd.class.php');

	$con = new ConexaoBD();

	$objConexao = $con->criaConexao();

	if (isset($_FILES['imagem'])) {
		# code...

		$img = $_FILES['imagem'];//retorna um array com as características da imagem, tamanho, fonte, arquivo temporário gerado, nome da imagem, etc.

		if ($img != NULL) {//se a imagem for carregada corretamente
			
			$nomeFinal = date('YmdHis').'.png';//cria uma string com o nomeFinal da imagem

			if(move_uploaded_file($img['tmp_name'], $nomeFinal)){//move a imagem para a pasta do sistema com o nome predefinido anteriormente (nomeFinal)

				$tamanhoImg = filesize($nomeFinal);//tamanho da imagem cadastrada

				$mysqlImg = addslashes(fread(fopen($nomeFinal, 'r'), $tamanhoImg));

				$query = "insert into cenario (codcliente, imgCenario) values (106045, '$mysqlImg')";

				$retorno = $objConexao->exec($query);

				unlink($nomeFinal);

				echo "Retorno da inserção: $retorno <br><br>";
			}

		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Envio de imagens</title>
</head>
<body>
<form action="envioImagem.php" method="post" enctype="multipart/form-data">
	<label for='imagem'>Imagem:</label>
	<input type="file" name="imagem">
	<br>
	<input type="submit" value="Enviar">

</form>
</body>
</html>