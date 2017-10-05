<?php
?>
<body>
<div id="cadastra_adms" class="modal fade in">
		<div class="modal-dialog modal-sm" >
			<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    				<h4 class="modal-title">Cadastrar Usuários Adms:</h4>
    			</div>
			
    			<form class="modal-body" id="form_dominio">
                    
                    <div class="form-group">
                        <label for="nome_dominio">Nome de usuário:</label>
                        <input type="text" class="form-control" name="nome_dominio">
                    </div>
                    <div class="form-group">
                        <label for="ip_controlador">Senha:</label>
                        <input type="text" class="form-control" name="ip_controlador">
                    </div>
                </form>
    			<div class="modal-footer">
    				<button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
    				<button class="btn btn-primary" id="btn_confirma_exclusao">Confirmar</button>
    			</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cadastra_adms').modal('show');
	});
</script>
</body>