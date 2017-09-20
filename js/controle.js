$(document).ready(function(){
	
	/***************Requisições por Ajax*******************/
	$.ajax({//função da tela principal para carregar os clientes já cadastrados
		url: '../model/lista_clientes.php',
		success:function(resultado){
			$('#tabela_clientes').html(resultado);//mostra o resultado da consulta na tabela de clientes.
		},
		error: function(){
			$('#tabela_clientes').text('Erro');
		}
	});

	$('#form-inclusao-cliente').submit(function(){
		
		var dados = $('#form-inclusao-cliente').serialize();
		var op = confirm("Confirma a inserção dos dados?");
		
		if (op) {
			$.ajax({
				url: '../model/confirmaInclusao.php',
				method: 'post',
				data: dados,
				
				success: function(result){
					var result = $.trim(result);//remove os espaços da resposta
					//alert(result);
					// location.reload();
					if (result != '1'){
						alert("Erro. "+result);
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
	});
	
	$('#form-inclusao-servidor').submit(function(){
		var dados = $(this).serialize();
		$.ajax({
			url: '../model/confirma_inclusao_servidor.php',
			method:'post',
			data: dados,
			
			success: function(resultado){
				var resultado = $.trim(resultado);
				if(resultado == 1){
					alert('Servidor adicionado com sucesso!');
					$('#form-inclusao-servidor').each(function(){
						this.reset;
					});
				}else{
					alert(resultado);
				}
				
			},
		})
		return false;
	});
	
	
	
	/*********************Redirecionamentos*********************/
	$('#btn_inclui_cliente').click(function(){
		location.href = 'inclusao_cliente.php';//direciona para a página de inclusão de cliente

	});
	
	$('#btn_inclui_servidor').click(function(){
		var codCliente = $('#codCliente').text();
		location.href = 'inclusao_servidor.php?codCliente='+codCliente;//direciona para a página de inclusão de servidor, do cliente desejado.
	});

	
	
	
	/******************Valiudação de formulários********************/
	
	
	$('.campo_telefone').keyup(function(){//mascara para formatar o valor do telefone para o correto

		$(this).val($(this).val().replace(/\D/ig, ''));
		$(this).val($(this).val().replace(/(\d{2})(\d)/, '($1)$2'));
		$(this).val($(this).val().replace(/(\d{4,5})(\d{4})/, '$1-$2'));


	}).attr('maxlength','14');

	$('#codCliente').keyup(function(){
		$(this).val($(this).val().replace(/\D/ig, ''));//impede de digitar letras no código do cliente
	});
	
	$('#nomeServidor').blur(function(){
		var nomeServ = $(this).val();
		var codCliente = $('#codCliente').val();
		var jsonDados = {'nomeServ': nomeServ, 'codCliente': codCliente};
		var dados = JSON.stringify(jsonDados);
		
		$.ajax({
			url: '../model/verifica_servidor.php?dados='+dados,
			success: function(result){
				if(result == 1){
					$('#btn_envio_servidor').attr('disabled');
					$('#servidorExiste').text('Servidor já existe para esse cliente').css('color', 'red');
				}else{
					$('#btn_envio_servidor').removeAttr('disabled');
					$('#servidorExiste').text('');
				}
			}
		})
		
	});

});