<?php
	require_once '../classes/ClienteBD.php';
	require_once '../classes/ServidorBD.php';
    include_once 'header.php';

	$nome_cliente = $_GET['cliente'];

	$clienteBD = new ClienteBD();
	$infos_cliente = $clienteBD->detalhaCliente($nome_cliente);
    
	$dominio = $clienteBD->descreveDominio($infos_cliente[0]['codcliente']);
	if(is_array($dominio)){
	   $usuariosADM = $clienteBD->ListaUsuarios($infos_cliente[0]['codcliente'], $dominio['nomeDominio']);
	}
	
     
?>
	<div class="container conteudo principal">
		<div class="row">
			<button type="button" name="incluir" id="btn_inclui_servidor" class="btn btn-success">+</button>
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
						<h4>Informações do Domínio:</h4>
						<ul>
							<?php echo is_array($dominio) ? '<li>Nome: '.$dominio['nomeDominio'].'</li>' : 'Não Cadastrado!<br><a href="#">Cadastrar?</a>'?></li>
							<?php echo is_array($dominio) ? '<li>Controlador: '.$dominio['ipServidor'].'</li>' : '' ?></li>
						</ul>
						<h4>Usuários Administradores:</h4>
						<ul>
							<?php 
							if(isset($usuariosADM) && is_array($usuariosADM)){
							     foreach ($usuariosADM as $usuario){
							         echo '<li>Usuario: '.$usuario['usuario'].'<ul>';
							         echo '<li>Senha: '.$usuario['senha'].'</li>';
							         echo '</ul></li>';
							         }
							     echo "<a href='#'>Cadastrar outro?</a>";
							}else{
							     echo "<li>Não há informações sobre os usuários</li>";
							     echo "<a href='#'>Cadastrar?</a>";
							}
							 
							
							?>
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
	<!-- Caixas de diálogo Modais -->
	
	<div id="dialogo_exclusao" class="modal fade">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    				<h4 class="modal-title">Exclusão servidor:</h4>
    			</div>
			
    			<div class="modal-body">
    				<h3>Confirma a exclusão do servidor <span class="nomeServidor"></span>?</h3>
    			</div>
    			<div class="modal-footer">
    				<button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
    				<button class="btn btn-primary" id="btn_confirma_exclusao">Confirmar</button>
    			</div>
			</div>
		</div>
	</div>
	<form class="modal fade" id="form_edicao_servidor">
    	<div class="modal-dialog modal-md">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    				<h3>Editar Servidor - <span class="nomeServidor"></span></h3>
    			</div>
    			<div class="modal-body">
            		<span class="codCliente" hidden="true"><?php echo $infos_cliente[0]['codcliente']?></span>
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
            		<button type="button" id="btn_voltar" class="btn btn-default" data-dismiss="modal">Voltar</button>
            		<button type="submit" id="btn_confirma_edicao_servidor" class="btn btn-primary">Enviar</button>
            	</div>
    		</div>
       	</div>
    </form>
	

<?php 
    include_once 'footer.php';
?>
