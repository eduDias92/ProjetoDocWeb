<?php 
    include_once 'header.php';

?>
	
	<div class="container conteudo principal">
		<div class="row">
			
			<div class="col-md-4 wells">
				<a href="principal.php" class="well btn btn-danger active">
					Lista de Clientes
				</a>
				<a href="tutoriais.php" class="well btn btn-danger">
					Tutoriais
				</a>
				<a href="ver_scripts.php" class="well btn btn-danger">
					Scripts
				</a>
			</div><!--Fim primeira seção-->
			<div class="col-md-8 conteudo-clientes">
				<h3>Clientes Cadastrados:</h3>
				<button type="button" name="incluir" id="btn_inclui_cliente" class="btn btn-success btn-lg" style="font-size: 25px;">+</button>
				<table class="table table-striped table-bordered" id="tabela_principal">
					<thead>
						<tr>
							<td>Cliente</td>
							<td>Código</td>
							<td>Telefone</td>
							<td>E-mail</td>
						</tr>
					</thead>
					<tbody id="tabela_clientes">
						<!-- Conteúdo gerado dinâmicamente pelo código PHP -->
					</tbody>

				</table>
			</div><!--Fim segunda seção-->

		</div><!-- Fim row-->
	</div><!-- Segundo container -->
	
<?php 
    include_once 'footer.php';
?>
