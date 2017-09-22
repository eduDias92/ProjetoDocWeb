<?php
	require_once '../classes/ClienteBD.php';
	require_once '../classes/ServidorBD.php';
	include_once 'header.php';

	$nome_cliente = $_GET['cliente'];

	$clienteBD = new ClienteBD();
	$infos_cliente = $clienteBD->detalhaCliente($nome_cliente);

	
	

?>

	<div class="container conteudo principal">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Cliente: <?php echo $nome_cliente ?> <br> 
						Cod. Cliente: <span id='codCliente'><?php echo $infos_cliente[0]['codcliente'];?></span></h3>
					</div>
					<div class="panel-body">
						<h4>Contatos:</h4>
						<ul>
							<li>Telefones: <?php echo $infos_cliente[0]['telefone1']?></li>
							<li>Email:  <?php echo $infos_cliente[0]['email']?></li>
							<li>Computadores: <?php echo $infos_cliente[0]['qtdecomputadores']?></li>
						</ul>
					</div>
				</div>
			</div><!--Fim primeira seção-->
			<div class="col-md-7">
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="#servidores" role="tab" data-toggle="tab">Servidores</a></li>
					<li><a href="#backup" role="tab" data-toggle="tab">Política de Backup</a></li>
					<li><a href="#cenario" role="tab" data-toggle="tab">Cenário</a></li>
				</ul>
				
				<div class="tab-content">

					<div class="tab-pane active" role="tabpanel" id="servidores">

						<div class="panel-group" id="teste">
							<?php $servidor = new ServidorBD();
						      echo $servidor->listaServidores($infos_cliente[0]['codcliente']);
						?>
						</div>
						
						<button type="button" name="incluir" id="btn_inclui_servidor" class="btn btn-success" style="">+</button>
						
					</div>
					<div class="tab-pane" role="tabpanel" id="backup">
						<h2>Políticas de backup Aparecerão aqui:</h2>
						<ul>
							<li> <h5>Backup NG:</h5>
								<p>
									O backup é realizado no SRVNG do C:\MMQNG\ para o D:\BKPNG
								</p>
							</li>
							<li> <h5>Backup DOS:</h5>
								<p>
									O backup é realizado no SRVAD do C:\MMQC\ para o D:\Backup_DOS, via cobian.
								</p>
							</li>
							<li> <h5>Backup Dados:</h5>
								<p>
									O backup é realizado no SRVDB do E:\Dados para o D:\Backup_dados, via cobian.
								</p>
							</li>


						</ul>
					</div>
					
					<div class="tab-pane" role="tabpanel" id="cenario">
						<h2>Cenário aparecerá aqui:</h2>
						<img src="../img/cenario_exemplo.PNG" class="img-responsive" style="margin-top: 20px;" >
					</div>
				</div><!-- fim tab-content -->

			</div>
		</div><!-- Fim row-->
	</div><!-- Segundo container -->


<?php 
    include_once 'footer.php';
?>
