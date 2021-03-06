$(document).ready(function(){
	function carregaServidores(){
		var servidor;
		$('.panel-heading a').each(function(){
			servidor = $(this).text();
			$('#servidor_origem').append('<option value="'+servidor+'" >'+servidor+'</option>');
			$('#servidor_destino').append('<option value="'+servidor+'" >'+servidor+'</option>');
		});
	}

	carregaServidores();
	
	$('input[name="sincronizacao"]').click(function(){
		$('#campos_sincronizacao').toggle(500);
		/*$('#campos_sincronizacao > input, select').each(function(){
			$(this).attr('required', 'true');
		});*/

	})
/********************************Requisições por Ajax*********************************************************/
	


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
	
	$('#btn_cadastra_dominio').click(function(){
		var codCliente = $('#codCliente').text();
			$.ajax({
				url: '../model/cadastra_dominio.php?codCliente='+codCliente,
				success: function(resultado){
					$('#box_dominio').html(resultado);
				},
				error: function(){
					alert('Erro ao carregar página.');
				}
			});
					
	});

	$('#btn_alterar_dominio').click(function(){
		var codCliente = $('#codCliente').text();
			$.ajax({
				url: '../model/altera_dominio.php?codCliente='+codCliente,
				success: function(resultado){
					$('#box_dominio').html(resultado);
				},
				error: function(){
					alert('Erro ao carregar página.');
				}
			});
					
	});

	$('#btn_cadastra_adms').click(function(){
		var codCliente = $('#codCliente').text();
		$.ajax({
			url: '../model/cadastra_usuariosAdms.php?codCliente='+codCliente,
			success: function(resultado){
				$('#box_adms').html(resultado);
			},
			error: function(){
			alert('Erro ao carregar página.');
			}
		});
	});

	$('#form_rotina_backup').on('submit', function(){
		var dados = $(this).serialize();
		
		$.ajax({
			url:'../model/incluir_politica_backup.php',
			method: 'post',
			data: dados,

			success: function(resultado){
				resultado = $.trim(resultado);
				
				if(resultado == 1 ){
					alert('Rotina Cadastrada com sucesso');
					window.location.reload();
				}else{
					alert('Erro ao gravar no banco de dados');
					
				}
			},
			error: function(){
				alert('erro ao carregar a página');
			}
		});

		return false;
	})

/****************************************Carregamento dos cenários******************************************/
	function carregaCenario(){
		$.ajax({
			url:'cenarioCliente.php?codCliente='+$('#codCliente').text(),
			success: function(resultado){
				$('#cenario').html(resultado);
			}
		});

	};
	carregaCenario();

    
    

/******************************************Inclusão de Servidores***************************************/
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
						this.reset();
					});
				}else{
					alert(resultado);
				}
				
			},
		})
		return false;
	});
/********************************************Dialogos Servidores**************************************/
	$('.btn_exclui_servidor').click(function(){//abre o dialog
		var servidor = $(this).val();
		$('.nomeServidor').text(servidor);
	});
	
	$('#btn_confirma_exclusao').click(function(){//confirma a exclusão do servidor selecionado
			var servidor = $('.nomeServidor').first().text();
			var jsonServer = {"nome" : servidor , "codCliente": $('#codCliente').html()};
			var dados = JSON.stringify(jsonServer);
			$.ajax({
				url: '../model/deleta_servidor.php?dados='+dados,
				method: 'post',
			
				success: function(result){
					result = $.trim(result);
					
					if(result!=1){
						alert('Erro ao excluir o servidor');
					}else{
						alert('Servidor removido com sucesso!');
						window.location.reload();
					}
				} 
			});
		});
	
	//botao de edição de servidores 
	$('.btn_edita_servidor').click(function(){
		var servidor = $(this).val();
		$('.nomeServidor').text(servidor);
		var dadosServidor = [];//array que armazenará os dados 
		$(this).parent().find('tbody td:odd').each(function(indice){
			dadosServidor[indice] = $(this).text();
		});
		$('#form_edicao_servidor input, #form_edicao_servidor select').each(function(indice){
			$(this).val(dadosServidor[indice]);
		});
	});
	
	$('#btn_confirma_edicao_servidor').click(function(){
		var nomeServidor = $('.nomeServidor').first().text();
		var codCliente = $('#codCliente').text();
		var jsonServidor = {'nome': nomeServidor, 'codCliente': codCliente};
		var dados = JSON.stringify(jsonServidor);
		dados += '&'+ $('#form_edicao_servidor').serialize();
		
		$.ajax({
			url: '../model/edita_servidores.php?dados='+dados,
			method: 'post',
			success: function(result){
				if(result!=1){
					alert('Não foi possível realizar a alteração.');
				}else{
					alert('Informações alteradas com sucesso!');
					window.location.reload();
				}
				window.location.reload();
			}
		});
		return false;//não dar submit
	});
	
	
/********************************************Redirecionamentos******************************************/
	$('#btn_inclui_cliente').click(function(){
		location.href = 'inclusao_cliente.php';//direciona para a página de inclusão de cliente

	});
	
	$('#btn_inclui_servidor').click(function(){
		var codCliente = $('#codCliente').text();
		location.href = 'inclusao_servidor.php?codCliente='+codCliente;//direciona para a página de inclusão de servidor, do cliente desejado.
	});

	
	
	
/*************************************Valiudação de formulários****************************************/
	
	
	$('.campo_telefone').keyup(function(){//mascara para formatar o valor do telefone para o correto

		$(this).val($(this).val().replace(/\D/ig, ''));
		$(this).val($(this).val().replace(/(\d{2})(\d)/, '($1)$2'));
		$(this).val($(this).val().replace(/(\d{4,5})(\d{4})/, '$1-$2'));


	}).attr('maxlength','14');

	$('#codCliente').keyup(function(){
		$(this).val($(this).val().replace(/\D/ig, ''));//impede de digitar letras no código do cliente
	});
	
	$('#nomeServidor').blur(function(){//verifica se já existe um servidor cadastrado com o nome passado
		var nomeServ = $(this).val();
		var codCliente = $('#codCliente').val();//recebe o valor digitado no campo de nome do servidor
		var jsonDados = {'nomeServ': nomeServ, 'codCliente': codCliente};//encapsula o nome do servidor e o código do cliente e passa para a função que irá pesquisar
		var dados = JSON.stringify(jsonDados);
		
		$.ajax({
			url: '../model/verifica_servidor.php?dados='+dados,
			success: function(result){
				if(result == 1){
					$('#btn_envio_servidor').attr('disabled', 'true');
					$('#servidorExiste').slideDown().text('Servidor já existe para esse cliente').css('color', 'red');
				}else{
					$('#btn_envio_servidor').removeAttr('disabled');
					$('#servidorExiste').text('');
				}
			}
		})
		
	});


/***************************************Rotinas de Backup*****************************************/
	$('#cadastra_rotina_backup').click(function(){
		$('#form_rotina_backup').fadeToggle('slow');
	});

	$('#confirma_backup').click(function(){
		/*var dados = $('#form_rotina_backup').serialize();
		alert(dados);*/
	});
	

/******************************************Pesquisa*******************************************/
	$('#btn_pesquisar').click(function(){
		var nomeCliente = $('#campo_pesquisa_cliente').val();

		$.ajax({
			url: '../model/pesquisa_clientes.php',
			method: 'post',
			data: {nome_cliente : nomeCliente},

			success: function(resultado){
				$('#tabela_clientes').html(resultado);
			}
		});
	});

/*******************************************Paginação******************************************************/
	
	
	
	
});

