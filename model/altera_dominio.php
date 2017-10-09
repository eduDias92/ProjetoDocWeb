<?php
?>
<body>
<div id="altera_dominio" class="modal fade in">
		<div class="modal-dialog modal-sm" >
			<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    				<h4 class="modal-title">Altera Domínio:</h4>
    				<span class="codigo" hidden><?php echo $_GET['codCliente'] ?></span>
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
    				<button class="btn btn-primary" id="btn_altera_dominio">Confirmar</button>
    			</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#altera_dominio').modal('show');
	});

	$('#btn_altera_dominio').click(function(){
		if($('#nome_dominio').val() != ''){
			var json = {'nomeDominio' : $('#nome_dominio').val(), 'ipControlador' : $('#ip_controlador').val() }
			var dados = JSON.stringify(json);
			var codigo = $('.codigo').text();

			$.ajax({
				url: '../model/alteracao_dominio.php?dados='+dados+'&codCliente='+codigo,
				method: 'post',

				success: function(resultado){
					$('.modal-body').html(resultado);
				}
			});
		}else{
			alert('Dados vazios!');
			return false;
		}
	});
</script>
</body>