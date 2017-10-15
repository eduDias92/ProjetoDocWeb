<?php
?>
<body>
<div id="cadastra_dominio" class="modal fade in">
		<div class="modal-dialog modal-sm" >
			<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    				<h4 class="modal-title">Cadastra Domínio:</h4>
    				<span class="codigo" hidden><?= $_GET['codCliente'] ?></span>
    			</div>
			
    			<form class="modal-body form_dominio">
    				
    				<div class="form-group">
    					<label for="nome_dominio">Nome Domínio:</label>
    					<input type="text" class="form-control" id="nome_dominio" required>
    				</div>
    				<div class="form-group">
    					<label for="ip_controlador">Controlador do Domínio (IP):</label>
    					<input type="text" class="form-control" id="ip_controlador" required>
    				</div>
    			</form>
    			<div class="modal-footer">
    				<button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
    				<button class="btn btn-primary" id="btn_inclui_dominio">Confirmar</button>
    			</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cadastra_dominio').modal('show');
	});

	$('#btn_inclui_dominio').click(function(){
		if($('#nome_dominio').val() != ''){
			var json = {'nomeDominio' : $('#nome_dominio').val(), 'ipControlador' : $('#ip_controlador').val() }
			var dados = JSON.stringify(json);
			var codigo = $('.codigo').text();

			$.ajax({
				url: '../model/inclusao_dominio.php?dados='+dados+'&codCliente='+codigo,
				method: 'post',

				success: function(resultado){
					var result = $.trim(resultado);
					if(result == 1){
						$('.modal-body').html('<h4>Domínio cadastrado com sucesso.</h4>');
						$('.modal-footer').html('<button class="btn btn-primary" data-dismiss="modal" id="btn_voltar">Voltar</button>');
					}
					
				}
			});
		}else{
			alert('Dados vazios!');
			return false;
		}
	});

	$('#btn_voltar').click(function(){
			window.location.reload();
		});
</script>
</body>