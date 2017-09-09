$(document).ready(function(){

	
	$('#form-inclusao-cliente').submit(function(){
		var dados = $('#form-inclusao-cliente').serialize();
		var op = confirm("Confirma a inserção dos dados?");
		
		if (op) {
			$.ajax({
				url: '../model/confirmaInclusao.php',
				method: 'post',
				data: dados,
				
				success: function(result){
					if (result!='1') {
						alert("Erro ao inserir o Cliente, contate o administrador do site.");
					}else{
						alert("Cliente Adicionado com sucesso! ");
						//reseta os valores do formulário
						$('#form-inclusao-cliente').each(function(){//para cada filho do formulário
							this.reset();//reseta o valor
						});
					}
					
				},
				error:function(erro){
					alert("Erro ao carregar a página\n"+erro.statusText);

				}

			});

		}else{
			return false;//retorna ao preenchimento do formulário com os dados preenchidos
		}

		return false;//cancela a ação de envio do submit
	})

});