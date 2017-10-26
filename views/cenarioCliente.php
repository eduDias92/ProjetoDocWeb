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
		  echo '<br><br>
		  		<img src="getCenario.php?codCliente='.$imagem['codCliente'].'" class="img-responsive" id="imagem" title="Cenário do cliente '.$imagem['codCliente'].'" value="imagem">
		  		</a>';
		  
		  echo '<br><br>
		  		<center>
		  			<button type="button" class="btn btn-danger" id="btn_apagar_cenario">Apagar Imagem
		  			</button>
		  		</center>';
		  
		  echo '<div id="pano"></div>
		  
		  		<div id="modal">
		  			<a href="#" class="btn_fechar">&times;</a>
		  			<div class="caixa_imagem"></div>
		  		</div>';
		  }
    }else{
        echo '<h4>Nenhuma imagem para esse cliente.</h4>';
        echo "<hr>";
        echo '<form class="form-group" id="form_cenario">
                <span id="codCliente" hidden>'.$cliente.'</span>
                <label>Carregar Imagem</label>
                <input type="file" class="form-control" name="fileCenario" id="fileCenario" required><br>
                <button type="button" class="btn btn-default" id="btn_enviar_imagem">Enviar</button>
        </form>';

    }


?>
<script>
	window.resize = function(){
		var lado = ($(window).width() - $('.caixa_imagem').width())/2;
		var topo = ($(window).height() - $('.caixa_imagem').height())/2;
		
		$('.caixa_imagem').css({position : 'fixed', top : topo, left : lado});
	}

	$(document).ready(function(){

		$('#btn_enviar_imagem').click(function(){
			if($('#fileCenario').val() == ''){
				alert('Por favor, escolha uma imagem...');
				return false;
			}


			var dados = new FormData();//obejto para carregar as imagens do tipo form data.

			var imagem = document.getElementById('fileCenario').files[0];//recupera o elemento de imagem.
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

		$('#imagem').mouseover(function(){
			var largura = $(this).width();
			var altura = $(this).height();
			$('#pano').css({display: 'block', width : largura, height : altura, top : $(this).position().top, left : $(this).position().left });
		});
		
		$('#pano').click(function(){
			$('#modal').show();

			var lado = ($(window).width() - $('.caixa_imagem').width())/2;
			var topo = ($(window).height() - $('.caixa_imagem').height())/2;


			$('#imagem').clone().appendTo('.caixa_imagem');

			$('.caixa_imagem').css({position : 'fixed', top : topo, left : lado});

		});

		$('.btn_fechar').click(function(){
			$('.caixa_imagem').children('img').remove();
			$(this).parent().hide();
		});


		

	});
</script>