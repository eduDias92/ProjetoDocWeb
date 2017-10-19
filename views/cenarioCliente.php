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
		  echo '<br><br><img src="getCenario.php?codCliente='.$imagem['codCliente'].'" class="img-responsive" id="imagem" title="Cenário do cliente '.$imagem['codCliente'].'" value="imagem">';
		  echo '<br><br><center><button type="button" class="btn btn-danger" id="btn_apagar_cenario">Apagar Imagem</button></center>';
		  echo '<a href="#"><div id="pano"></div></a>';
		  echo '<div id="modal">
		  		<a href="#" class="btn_fechar">&times;</a>
		  		</div>';
       	}
    }else{
        echo '<h4>Nenhuma imagem para esse cliente.</h4>';
        echo '<form class="form-group" id="form_cenario">
                <span id="codCliente" hidden>'.$cliente.'</span>
                <label>Carregar Imagem</label>
                <input type="file" class="form-control" name="fileCenario" id="fileCenario" required><br>
                <button type="button" class="btn btn-default" id="btn_enviar_imagem">Enviar</button>
        </form>';

    }


?>
<script>
		// Modal cenários
    function posicionaPano(){
        var p = $('#imagem').position(); //armazena em uma variável o posicionamento da imagem
        $('#pano').css({top: p.top, left:p.left});//atribui o mesmo posicionamento da imagem ao pano que ficará em cima da imagem.
        $('#pano').css({width: $('#imagem').width(), height: $('#imagem').height()});


       };

    function fechaModal(){
        $('#imagem').css({zIndex: '0', width: '794px', height:'399px', top: '8px', left: '8px'});
        $('#modal').css({display : 'none'});
        $('#pano').css('display', 'block');
    };
    function abreModal(e){
        //$('body').append('<div id="modal"></div>');
        $('#imagem').css({position:'fixed', zIndex: '3', width: '85%', height:'85%'});
        var lateral = (window.innerWidth - $('#imagem').width())/2;
        var topo = (window.innerHeight - $('#imagem').height())/2;
        $('#imagem').css({left: lateral, top: topo});
        e.css('display', 'none');
        $('#modal').css({display : 'block', zIndex: '2'});
    };


	$(document).ready(function(){

		posicionaPano();
		window.onresize = function(){
			posicionaPano();
			alert('Executou posiciona pano.');
	    };

	    $(this).keyup(function(e){
	        if(e.which == 27 ){
	            fechaModal();
	        }
	    });
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
		$('#pano').click(function(){
			abreModal($(this));
		});
		    
		$('.btn_fechar').click(function(){
			fechaModal();

		});

	});
</script>