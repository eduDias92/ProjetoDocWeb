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
			
			<div class="col-md-4">
			
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Cliente: <?= $nome_cliente ?> <br> 
						Cod. Cliente: <span id='codCliente'><?= $infos_cliente[0]['codcliente'];?></span></h3>
					</div>
					<div class="panel-body">
						<h4>Contatos:</h4>
						<ul>
							<li>Telefones: <?= $infos_cliente[0]['telefone1']?></li>
							<li>Email:  <?= $infos_cliente[0]['email']?></li>
							<li>Computadores: <?= $infos_cliente[0]['qtdecomputadores']?></li>
						</ul>
						<h4>Informações do Domínio:</h4>
						<ul>
							<?= is_array($dominio) ? '<li>Nome: <strong>'.$dominio['nomeDominio'].'</strong>' : 'Não Cadastrado!<br><a href="#" id="btn_cadastra_dominio" value='.$infos_cliente[0]['codcliente'].'>Cadastrar?</a>'?></li>
							<?= is_array($dominio) ? '<li>Controlador: <strong>'.$dominio['ipServidor'].'</strong></li><a href="#" id="btn_alterar_dominio">Alterar informações?</a>' : '' ?></li>
						</ul>
						<h4>Usuários Administradores:</h4>
						<ul>
							<?php 
							
							if(isset($usuariosADM) && is_array($usuariosADM) && !empty($usuariosADM[0]['usuario'])){
							     foreach ($usuariosADM as $usuario){
							         echo '<li>Usuario: <strong>'.$usuario['usuario'].'</strong><ul>';
							         echo '<li>Senha: <strong>'.$usuario['senha'].'</strong></li>';
							         echo '</ul></li>';
							         }
							     echo "<a href='#' id='btn_cadastra_adms' value='".$infos_cliente[0]['codcliente']."'>Cadastrar outro?</a>";
							}else{
							     echo "<li>Não há informações sobre os usuários</li>";
							     echo "<a href='#' id='btn_cadastra_adms'>Cadastrar?</a>";
							}
							 
							
							?>
						</ul>
					</div>
				</div>
			</div><!--Fim primeira seção-->
			<div class="col-md-7">
				<ul class="nav nav-tabs" role="tablist">
					<li class="active" ><a href="#servidores" role="tab" data-toggle="tab" title="Ver os servidores" >Servidores</a></li>
					<li ><a href="#backup" role="tab" data-toggle="tab" title="Ver as políticas de backup">Política de Backup</a></li>
					<li><a href="#cenario" role="tab" data-toggle="tab" title="Ver o cenário do cliente">Cenário</a></li>
				</ul>
				
				<div class="tab-content">

					<div class="tab-pane active" role="tabpanel" id="servidores">
						<button type="button" name="incluir" id="btn_inclui_servidor" class="btn btn-success" title="Adicionar Servidor">+</button>
						<div class="clearfix"></div>
						<div class="panel-group" id="teste">
							<?php $servidor = new ServidorBD();
						      echo $servidor->listaServidores($infos_cliente[0]['codcliente']);
						?>
						</div>
						
						
						
					</div>
					<div class="tab-pane" role="tabpanel" id="backup">
						<br>
						<h4>Nenhuma rotina cadastrada.</h4>
						<hr>
						<div class="col-md-12">
							<button type="button" class="btn btn-success" id="cadastra_rotina_backup">Cadastrar Rotina</button>

						</div>
						<br><br>
						<form class="form-inline" id="form_rotina_backup" hidden>
							<div class="form-group">
								<label for="tipo_backup">Tipo: </label>
								<select id="tipo_backup" class="form-control">
									<option value="">Selecione o tipo do backup...</option> 
									<option value="NG">NG</option>
									<option value="DOS">DOS</option>
									<option value="Dados">Dados</option>
									<option value="Outro">Outro...</option>
								</select>
							</div>
							<hr>
							<h4 style="color: red">Origem:</h4>
							<div class="form-group">
								<label for="servidor">Servidor: </label>
								<select id="servidor" class="form-control">
									<option value="">Servidor onde é feito.</option> 
									<option value="SRVNG">SRVNG</option>
									<option value="SRVDOS">SRVDOS</option>
									<option value="SRVFS">SRVFS</option>
								</select>
								<br>
								<br>
								<label for="unidade">Unidade: </label>
									<select id="unidade" class="form-control">
										<option value="C">C:</option> 
										<option value="D">D:</option>
										<option value="E">E:</option>
										<option value="F">F:</option>
										<option value="outro">Outro...</option>
									</select>
								<label for="pasta">Pasta: </label>
									<input type="text" name="pasta" id="pasta_origem" placeholder="Pasta de origem do backup..." class="form-control">
								

							</div>
							<hr>
							<h4 style="color: red">Destino:</h4>
							<div class="form-group">
							<label for="servidor">Servidor: </label>
								<select id="servidor" class="form-control">
									<option value="" >Servidor onde é feito.</option> 
									<option value="1">Servidores aparecerão aqui...</option>
								</select>
								<br>
								<br>
								<label for="unidade">Unidade: </label>
									<select id="unidade" class="form-control">
										<option value="1">C:</option> 
										<option value="1">D:</option>
										<option value="1">E:</option>
										<option value="1">F:</option>
										<option value="1">Outro...</option>
									</select>
								<label for="pasta">Pasta: </label>
									<input type="text" name="pasta" id="pasta_destino" placeholder="Pasta de destino do backup..." class="form-control">
							</div>
							<br>
							<br>
							<h4>Agendamento: </h4>
							<div class="form-group">
								<input type="checkbox" name="dias_backup" value="Seg">Seg 
								<input type="checkbox" name="dias_backup" value="Ter">Ter 
								<input type="checkbox" name="dias_backup" value="Qua">Qua 
								<input type="checkbox" name="dias_backup" value="Qui">Qui 
								<input type="checkbox" name="dias_backup" value="Sex">Sex
								<input type="checkbox" name="dias_backup" value="Sab">Sáb
								<input type="checkbox" name="dias_backup" value="Dom">Dom
								 | 
							</div>
							<label for="horario">Horário do backup: </label>
									<input type="time" name="horario" id="horario_backup" class="form-control">
							<hr>
							<h4>Software Utilizado: </h4>
							<div class="form-group">
								<input type="radio" name="software_backup" value="Cobian">Cobian<br>
								<input type="radio" name="software_backup" value="Arc Serve">Arc Serve<br>
								<input type="radio" name="software_backup" value="Backup Exec">Backup Exec<br>
								<input type="radio" name="software_backup" value="SQL">SQL Agent<br>
								<input type="radio" name="software_backup" value="Script">Script<br>
								<input type="radio" name="software_backup" value="Outro">Outro
							</div>
							<br>

							<hr>
							<div class="form-group">
								Realiza sincronização? <input type="checkbox" name="sincronizacao"><br>
								<label for="tipo_sincronizacao">Local da sincronização: </label>
									<select id="tipo_sincronizacao" class="form-control">
										<option value="hd">HD Externo</option> 
										<option value="software_nuvem">CrashPlan</option>
										<option value="outro">Outro...</option>
									</select>

								Qual:  <input type="text" name="pasta" id="pasta_destino" placeholder="Pasta de destino do backup..." class="form-control">
							</div>
							<br>
							<hr>
							<center>
								<button type="button" class="btn btn-primary" id="confirma_backup">Confirmar</button>
							</center>
						</form>
						<br>
						
					</div>
					
					<div class="tab-pane" role="tabpanel" id="cenario">
						<h2>Cenário aparecerá aqui:</h2>
						
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
            		<span class="codCliente" hidden="true"><?= $infos_cliente[0]['codcliente']?></span>
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
	
	<div id="box_dominio"></div>
	<div id="box_adms"></div>

<?php 
    include_once 'footer.php';
?>
