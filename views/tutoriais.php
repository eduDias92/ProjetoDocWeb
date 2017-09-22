<?php
	include_once 'header.php';
?>

	<div class="container conteudo principal">
		<div class="row">
			
			<div class="col-md-4 wells">
				<a href="principal.php" class="well btn btn-danger">
					Lista de Clientes
				</a>
				<a href="tutoriais.php" class="well btn btn-danger active">
					Tutoriais
				</a>
				<a href="ver_scripts.php" class="well btn btn-danger">
					Scripts
				</a>
			</div><!--Fim primeira seção-->
			<div class="col-md-7 conteudo-clientes">
				<h3>Tutoriais Cadastrados:</h3>
				<button type="button" name="incluir" id="btn_inclui_cliente" class="btn btn-success btn-lg" style="font-size: 25px;">+</button>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<td>Titulo</td>
							<td>Data Modificação</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><a href="#">Instalação SQL Server</a></td>
							<td>27/08/2017</td>
						</tr>
						<tr>
							<td><a href="#">Configuração Cobian</a></td>
							<td>27/08/2017</td>
						</tr>
						<tr>
							<td><a href="#">Configurar Terminal Server</a></td>
							<td>27/08/2017</td>
						</tr>
						<tr>
							<td><a href="#">Instalação NG</a></td>
							<td>27/08/2017</td>
						</tr>
						<tr>
							<td><a href="#">Instalação SQL Server</a></td>
							<td>27/08/2017</td>
						</tr>
						<tr>
							<td><a href="#">Instalação SQL Server</a></td>
							<td>27/08/2017</td>
						</tr>

						
					</tbody>

				</table>
			</div><!--Fim segunda seção-->

		</div><!-- Fim row-->
	</div><!-- Segundo container -->


<?php 
    include_once 'footer.php';
?>
