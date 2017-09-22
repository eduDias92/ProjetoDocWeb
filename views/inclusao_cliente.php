<?php
	include_once 'header.php';
	
?>

	<div class="container conteudo">
		<div class="page-header"> 
			<h3>Inclusão de clientes </h3>
		</div>
		<div class="row">

			<div class="col-md-6" style="padding-bottom: 20px;">
				
				<form id="form-inclusao-cliente">
						<div class="form-group">
							<label>Código Cliente:</label>
							<input class="form-control" id="codCliente" type="text" name="cod_cliente" required>
						</div>

						<div class="form-group">
							<label>Nome Cliente:</label>
							<input class="form-control" type="text" name="nome_cliente" required>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label>Telefone:</label>
								<input class="form-control campo_telefone" type="text" name="telefone" required>
							</div>
							<div class="col-md-6">
								<label>Telefone 2:</label>
								<input class="form-control campo_telefone" type="text" name="telefone2">
							</div>
							
						</div>
						<div class="form-group">
								<label>E-mail:</label>
								<input class="form-control" type="email" name="email" required>
						</div>
						<div class="form-group">
							<label>Quantidade de computadores:</label>
							<input class="form-control" type="number" min="1" max="100" name="qtde_pcs" required>
						</div>
						<br>
						<button class="btn btn-default btn-lg" type="reset">Limpar</button>
						<button class="btn btn-primary btn-lg" type="submit">Enviar</button>

				</form>
			
			</div><!-- col-md-6 -->
					
		</div><!-- Fim row-->
	</div><!-- Segundo container -->

<?php 
    include_once 'footer.php';
?>
