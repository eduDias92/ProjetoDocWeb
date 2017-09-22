<?php
	
	include_once 'header.php';
?>

<div class="container conteudo principal">
	<div class="page-header">
		<h3>Inclusão de Novo Servidor</h3>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<form class="form" id="form-inclusao-servidor">
        		
        		<div class="form-group">
        			<label for="codCliente">CodCliente:</label>
        				<input type="text" class="form-control" name="codCliente" id="codCliente" value="<?php echo $_GET['codCliente']?>" readonly> 
        		</div>
        		<div class="form-group">
        			<label>Nome:</label>
        				<input type="text" class="form-control" name="nome" id="nomeServidor" required> 
        				<span id="servidorExiste"></span>
        		</div>
        		<div class="form-group">
        			<label>Tipo:</label>
        				<select class="form-control" name="tipo">
        					<option value="fisico">Físico</option>
        					<option value="Virtual">Virtual</option>
        				</select> 
        			
        		</div>
        		<div class="form-group">
        			<label>IP Interno:</label>
        				<input type="text" class="form-control" name="ipInterno" required > 
        			
        		</div>
        		<div class="form-group">
        			<label>Antivírus:</label>
        				<input type="text" class="form-control" name="antivirus" required > 
        			
        		</div>
        		<div class="form-group">
        			<label>Sistema Operacional:</label>
        				<input type="text" class="form-control" name="sistemaOP" required> 
        			
        		</div>
        		<div class="form-group">
        			<label>Hardware:</label>
        				<input type="text" class="form-control" name="hardware" required placeholder="Processador, memória..."> 
        			
        		</div>
        		<div class="form-group">
        			<label>Discos:</label>
        				<input type="text" class="form-control" name="discos" required placeholder="HDs ou partições encontradas..."> 
        				
        		</div>
        		<div class="form-group">
        			<label>Serviços:</label>
        				<input type="text" class="form-control" name="servicos" required placeholder="Serviços fornecidos pelo servidor"> 
        			
        		</div>
        		
        		<button type="submit" id="btn_envio_servidor" class="btn btn-primary">Enviar</button>
        	</form>
		</div>
	</div>
	
</div>

<?php 
    include_once 'footer.php';
?>
