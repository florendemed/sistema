<?php
	echo $this->Html->scriptBlock("
		$(document).ready(function() {
			$('div#novoTelefone').hide();
			$('.btnTelefone').click(function(){
				$('#novoTelefone').show();
			});
		});
	");
?>
<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Pacientes</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/Pacientes/adicionar">Novo</a></li>
			<li><a href="/Pacientes/index">Listar</a></li>
			<li><a href="/Pacientes/index">Listar</a></li>
		</ul>
		<?php echo $this->Form->create('Paciente', ['class' => 'form-horizontal']); ?>
			<div class="row">
				<div class="col-md-6">
					<h3>Dados Pessoais</h3>
					<p>&nbsp;</p>
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('nome', 'Nome', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->text('nome', ['class' => 'form-control']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('numero_prontuario', 'Número Prontuário', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-2">
								<?php echo $this->Form->text('numero_prontuario', ['class' => 'form-control']); ?>
							</div>
							<?php echo $this->Form->label('numero_sus', 'Número Cartão SUS', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('numero_sus', ['class' => 'form-control', 'id' => 'CartaoSUS']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('estado_civil', 'Estado Civil', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-2">
								<?php
									$options = ['' => '', 'Solteiro' => 'Solteiro', 'Casado' => 'Casado', 'Divorciado' => 'Divorciado'];
									echo $this->Form->select('estado_civil', $options,[ 'class' => 'form-control']);		
								?>
							</div>
							<?php echo $this->Form->label('data_nascimento', 'Nascimento', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-5">
								<?php echo $this->Form->text('data_nascimento', ['class' => 'form-control', 'id' => 'dataNascimento']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('tipo_sanguinio', 'Tipo Sanguinio', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-2">
								<?php
									$options = ['' => '', 'A' => 'A', 'B' => 'B', 'AB' => 'AB', 'O' => 'O'];
									echo $this->Form->select('tipo_sanguinio', $options,[ 'class' => 'form-control']);		
								?>
							</div>
							<?php echo $this->Form->label('sexo', 'Sexo', ['class' => 'col-md-1 control-label']); ?>
							<div class="col-md-2">
								<?php
									$options = ['' => '', 'Feminino' => 'Feminino', 'Masculino' => 'Masculino'];
									echo $this->Form->select('sexo', $options,[ 'class' => 'form-control']);		
								?>
							</div>
							<?php echo $this->Form->label('cor', 'Cor', ['class' => 'col-md-1 control-label']); ?>
							<div class="col-md-3">
								<?php
									$options = ['' => '', 'cor 1' => 'cor 1', 'cor 2' => 'cor 2'];
									echo $this->Form->select('cor', $options,[ 'class' => 'form-control']);		
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('rg', 'RG', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-5">
								<?php echo $this->Form->text('rg', ['class' => 'form-control', 'id' => 'RG']); ?>
							</div>
							<?php echo $this->Form->label('cpf', 'CPF', ['class' => 'col-md-1 control-label']); ?>
							<div class="col-md-3">
								<?php echo $this->Form->text('cpf', ['class' => 'form-control', 'id' => 'CPF']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('ocupacao', 'Ocupação', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php
									$options = ['' => '', 'Ocupação 1' => 'Ocupação 1', 'Ocupação 2' => 'Ocupação 2', 'Ocupação 3' => 'Ocupação 3'];
									echo $this->Form->select('ocupacao', $options,[ 'class' => 'form-control']);		
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('escolaridade', 'Escolaridade', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php
									$options = ['' => '', 'Escolaridade 1' => 'Escolaridade 1', 'Escolaridade 2' => 'Escolaridade 2', 'Escolaridade 3' => 'Escolaridade 3'];
									echo $this->Form->select('escolaridade', $options,[ 'class' => 'form-control']);		
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('nome_mae', 'Nome da Mãe', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->text('nome_mae', ['class' => 'form-control', 'id' => 'nomeMae']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('nome_pai', 'Nome do Pai', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->text('nome_pai', ['class' => 'form-control', 'id' => 'nomePai']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('naturalidade', 'Naturalidade', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-3">
								<?php
									$options = ['' => '', 'Naturalidade 1' => 'Naturalidade 1', 'Naturalidade 2' => 'Naturalidade 2', 'Naturalidade 3' => 'Naturalidade 3'];
									echo $this->Form->select('naturalidade', $options,[ 'class' => 'form-control']);		
								?>
							</div>
							<?php echo $this->Form->label('nacionalidade', 'Nacionalidade', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-3">
								<?php
									$options = ['' => '', 'Nacionalidade 1' => 'Nacionalidade 1', 'Nacionalidade 2' => 'Nacionalidade 2', 'Nacionalidade 3' => 'Nacionalidade 3'];
									echo $this->Form->select('nacionalidade', $options,[ 'class' => 'form-control']);		
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('email', 'E-mail', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->text('email', ['class' => 'form-control', 'id' => 'email']); ?>
							</div>
						</div>	
						<div class="form-group">
							<?php echo $this->Form->label('envio_sms', 'Envio SMS', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->checkbox('envio_sms', ['class' => 'form-control','options' => array('S' => 'Sim', 'N' => 'Não')]); ?>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-md-6">
					<h3>Dados de Contato</h3>
					<p>&nbsp;</p>
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('Endereco.cep', 'CEP', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('Endereco.cep', ['class' => 'form-control', 'id' => 'cep']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('Endereco.endereco', 'Endereço', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-10">
								<?php echo $this->Form->text('Endereco.endereco', ['class' => 'form-control', 'id' => 'endereco']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('Endereco.numero', 'Número', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-2">
								<?php echo $this->Form->text('Endereco.numero', ['class' => 'form-control', 'id' => 'numero']); ?>
							</div>
							<?php echo $this->Form->label('Endereco.complemento', 'Complemento', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-6">
								<?php echo $this->Form->text('Endereco.complemento', ['class' => 'form-control', 'id' => 'complemento']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('Endereco.bairro', 'Bairro', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('Endereco.bairro', ['class' => 'form-control', 'id' => 'bairro']); ?>
							</div>
							<?php echo $this->Form->label('Endereco.cidade', 'Cidade', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('Endereco.cidade', ['class' => 'form-control', 'id' => 'cidade']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('Endereco.estado', 'Estado', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('Endereco.estado', ['class' => 'form-control', 'id' => 'estado']); ?>
							</div>
							<?php echo $this->Form->label('Endereco.pais', 'País', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('Endereco.pais', ['class' => 'form-control', 'id' => 'pais']); ?>
							</div>
						</div>
						<hr />
						<div class="form-group required">
							<p class="col-md-2"><a href="" data-toggle="collapse" title="Cadastrar novo telefone" class="btn btn-danger btnTelefone"><span class="glyphicon glyphicon-plus"></span> Novo Telefone</a></p>
						</div>
						<div id="novoTelefone">
							<div class="form-group required">
								<?php echo $this->Form->label('Telefone.tipo', 'Tipo', ['class' => 'col-md-2 control-label']); ?>
								<div class="col-md-4">
									<?php
										$options = ['' => '', 'Residencial' => 'Residencial', 'Celular' => 'Celular', 'Comercial' => 'Comercial'];
										echo $this->Form->select('Telefone.tipo', $options,[ 'class' => 'form-control']);		
									?>
								</div>
							</div>
							<div class="form-group required">
								<?php echo $this->Form->label('Telefone.numero', 'Telefone', ['class' => 'col-md-2 control-label']); ?>
								<div class="col-md-4">
									<?php echo $this->Form->text('Telefone.numero', ['class' => 'form-control', 'id' => 'telefone']); ?>
								</div>
							</div>
							<div class="form-group required">
								<div class="col-md-2 text-right">
									<?php echo $this->Form->submit('Inserir', ['class' => 'btn-sm btn btn-danger salvar-telefone btn', 'value' => 'Inserir']); ?>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>			
			<hr />
			<div class="row">
				<div class="col-md-12">
					<?php echo $this->Form->submit('Salvar', ['class' => 'btn btn-lg btn-primary btn', 'value' => 'Salvar']); ?>
				</div>
			</div>
		<?php echo $this->Form->end();?>
	</div>
</div>
