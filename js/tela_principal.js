$(document).ready(function(){
	$.ajax({
		url: '../model/lista_clientes.php',
		success:function(resultado){
			$('#tabela_clientes').html(resultado);
		},
		error: function(){
			$('#tabela_clientes').text('Erro');
		}
	});

	$('#btn_inclui_cliente').click(function(){
		location.href='inclusao_cliente.php';

	});



});