<?php
	session_start();

	if (!isset($_SESSION['login'])) {
    # code...
    header("Location: ../index.php?logado=0");
}
?>
<body>
<div id="cadastra_adms" class="modal fade in">
		<div class="modal-dialog modal-sm" >
			<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    				<h4 class="modal-title">Cadastrar Usuários Adms:</h4>
    				<span class="codigo" hidden><?php echo $_GET['codCliente'] ?></span>
    			</div>
			
    			<form class="modal-body" id="form_adms">
                    
                    <div class="form-group">
                        <label for="nome_dominio">Nome de usuário:</label>
                        <input type="text" class="form-control" id="nome_usuario">
                    </div>
                    <div class="form-group">
                        <label for="ip_controlador">Senha:</label>
                        <input type="text" class="form-control" id="senha">
                    </div>
                </form>
    			<div class="modal-footer">
    				<button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
    				<button class="btn btn-primary" id="btn_confirma">Confirmar</button>
    			</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cadastra_adms').modal('show');

		$('#btn_confirma').click(function(){
			var nome = $('#nome_usuario').val();
			var senha = $('#senha').val();
			var json = {'nome' : nome, 'senha' : senha};

			var dados = JSON.stringify(json);
			var codigo = $('.codigo').text();
			
			$.ajax({
				url: '../model/cadastro_adms.php?dados='+dados+'&codCliente='+codigo,
				method: 'post',

				success:function(resultado){
					resultado = $.trim(resultado);
					if(resultado == 1){
						$('.modal-body').html('<strong>Usuário cadastrado com sucesso!</strong>');
						$('.modal-footer').html('<button class="btn btn-primary" data-dismiss="modal" id="btn_voltar" onclick="window.location.reload()">Voltar</button>');
					}
				}, 

				error:function(x, y, z){
					alert(x+y+z);
				}
			});
			
		});
	});


</script>
</body>