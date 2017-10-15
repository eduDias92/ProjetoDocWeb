<?php
	require_once ('../classes/conexaobd.class.php');
		
	$con       = new ConexaoBD();
	$obj       = $con->criaConexao();
	
	$cliente   = $_GET['codCliente'];
	$sql       = "select * from cenario where codCliente = '$cliente'";
	$resultado = $obj->query($sql)->fetchAll();
	
	if($resultado){
	   //echo 'Tem imagem';
	   foreach ($resultado as $imagem) {
		  echo '<br><br><img src="getCenario.php?codCliente='.$imagem['codCliente'].'" class="img-responsive">';
		  echo '<br><br><button type="button" class="btn btn-danger" id="btn_apagar_cenario">Apagar Imagem</button>';
       	}
    }else{
        echo '<h4>Nenhuma imagem para esse cliente.</h4>';
        echo '<form class="form-group" id="form_cenario">
                <span id="codCliente" hidden>'.$cliente.'</span>
                <label>Carregar Imagem</label>
                <input type="file" class="form-control" name="imgCenario" id="imgCenario" required><br>
                <button type="button" class="btn btn-default" id="btn_enviar_imagem">Enviar</button>
        </form>';
    }


?>
<script>
	$('#btn_enviar_imagem').click(function(){
		if($('#imgCenario').val() == ''){
			alert('Por favor, escolha uma imagem...');
			return false;
		}


		var dados = new FormData();//obejto para carregar as imagens do tipo form data.

		var imagem = document.getElementById('imgCenario').files[0];//recupera o elemento de imagem.
		dados.append('file', imagem);//adiciona o elemento ao objeto formdata para enviar
		dados.append('codCliente', $('#codCliente').text());
		$.ajax({
			url:'envio_imagens.php',
			method: 'post',
			type: 'post',
			data: dados,//envia os dados como formdata para ser compreendido como arquivo(Files)
			processData: false,  
		    contentType: false,

		    success: function(resultado){
				alert(resultado);
				window.location.reload();
			}
		});
	});

	$('#btn_apagar_cenario').click(function(){
		if(confirm('Deseja realmente deletar essa imagem?')){
			$.ajax({
				url: '../model/apaga_cenario.php?codCliente='+$('#codCliente').text(),
				success: function(resultado){
					resultado = $.trim(resultado);
					if(resultado){
						alert('Removido com sucesso!');
						window.location.reload();
					}else{
						alert('Erro ao tentar remover a imagem.');
					}
				}
			});

		}
		
	});
</script>