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
							<?php echo $this->Form->label('Paciente.nome', 'Nome', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->text('Paciente.nome', ['class' => 'form-control']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('CartaoSUS', 'Número Prontuário', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-2">
								<?php echo $this->Form->text('CartaoSUS', ['class' => 'form-control']); ?>
							</div>
							<?php echo $this->Form->label('CartaoSUS', 'Número Cartão SUS', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('CartaoSUS', ['class' => 'form-control', 'id' => 'CartaoSUS']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('estadoCivil', 'Estado Civil', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-2">
								<?php
									$options = ['1' => '', '2' => 'Solteiro', '3' => 'Casado', '4' => 'Divorciado'];
									echo $this->Form->select('estadoCivil', $options,[ 'class' => 'form-control']);		
								?>
							</div>
							<?php echo $this->Form->label('dataNascimento', 'Nascimento', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-5">
								<?php echo $this->Form->text('dataNascimento', ['class' => 'form-control', 'id' => 'dataNascimento']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('tipoSanguinio', 'Tipo Sanguinio', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-2">
								<?php
									$options = ['1' => '', '2' => 'A', '3' => 'B', '4' => 'AB', '5' => 'O'];
									echo $this->Form->select('tipoSanguinio', $options,[ 'class' => 'form-control']);		
								?>
							</div>
							<?php echo $this->Form->label('sexo', 'Sexo', ['class' => 'col-md-1 control-label']); ?>
							<div class="col-md-2">
								<?php
									$options = ['1' => '', '2' => 'Feminino', '3' => 'Masculino'];
									echo $this->Form->select('sexo', $options,[ 'class' => 'form-control']);		
								?>
							</div>
							<?php echo $this->Form->label('cor', 'Cor', ['class' => 'col-md-1 control-label']); ?>
							<div class="col-md-3">
								<?php
									$options = ['1' => '', '2' => 'cor 1', '3' => 'cor 2'];
									echo $this->Form->select('cor', $options,[ 'class' => 'form-control']);		
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('RG', 'RG', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-5">
								<?php echo $this->Form->text('RG', ['class' => 'form-control', 'id' => 'RG']); ?>
							</div>
							<?php echo $this->Form->label('CPF', 'CPF', ['class' => 'col-md-1 control-label']); ?>
							<div class="col-md-3">
								<?php echo $this->Form->text('CPF', ['class' => 'form-control', 'id' => 'CPF']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('ocupacao', 'Ocupação', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php
									$options = ['1' => '', '2' => 'Ocupação 1', '3' => 'Ocupação 2', '4' => 'Ocupação 3'];
									echo $this->Form->select('ocupacao', $options,[ 'class' => 'form-control']);		
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('escolaridade', 'Escolaridade', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php
									$options = ['1' => '', '2' => 'Escolaridade 1', '3' => 'Escolaridade 2', '4' => 'Escolaridade 3'];
									echo $this->Form->select('escolaridade', $options,[ 'class' => 'form-control']);		
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('nomeMae', 'Nome da Mãe', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->text('nomeMae', ['class' => 'form-control', 'id' => 'nomeMae']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('nomePai', 'Nome do Pai', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->text('nomePai', ['class' => 'form-control', 'id' => 'nomePai']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('naturalidade', 'Naturalidade', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-3">
								<?php
									$options = ['1' => '', '2' => 'Naturalidade', '3' => 'Naturalidade 2', '4' => 'Naturalidade 3'];
									echo $this->Form->select('naturalidade', $options,[ 'class' => 'form-control']);		
								?>
							</div>
							<?php echo $this->Form->label('nacionalidade', 'Nacionalidade', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-3">
								<?php
									$options = ['1' => '', '2' => 'Nacionalidade', '3' => 'Nacionalidade 2', '4' => 'Nacionalidade 3'];
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
							<label for="envioSMS" class="col-md-3 control-label">Envio SMS</label>
							<div class="col-md-8">
								<?php echo $this->Form->checkbox('sms', ['class' => 'form-control','options' => array('S' => 'Sim', 'N' => 'Não')]); ?>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-md-6">
					<h3>Dados de Contato</h3>
					<p>&nbsp;</p>
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('cep', 'CEP', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('cep', ['class' => 'form-control', 'id' => 'cep']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('endereco', 'Endereço', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-10">
								<?php echo $this->Form->text('endereco', ['class' => 'form-control', 'id' => 'endereco']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('numero', 'Número', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-2">
								<?php echo $this->Form->text('numero', ['class' => 'form-control', 'id' => 'numero']); ?>
							</div>
							<?php echo $this->Form->label('complemento', 'Complemento', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-6">
								<?php echo $this->Form->text('complemento', ['class' => 'form-control', 'id' => 'complemento']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('bairro', 'Bairro', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('bairro', ['class' => 'form-control', 'id' => 'bairro']); ?>
							</div>
							<?php echo $this->Form->label('cidade', 'Cidade', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('cidade', ['class' => 'form-control', 'id' => 'cidade']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('estado', 'Estado', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('estado', ['class' => 'form-control', 'id' => 'estado']); ?>
							</div>
							<?php echo $this->Form->label('pais', 'País', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('pais', ['class' => 'form-control', 'id' => 'pais']); ?>
							</div>
						</div>
						<hr />
						<div class="form-group required">
							<p class="col-md-2"><a href="" data-toggle="collapse" title="Cadastrar novo telefone" class="btn btn-danger btnTelefone"><span class="glyphicon glyphicon-plus"></span> Novo Telefone</a></p>
						</div>
						<div id="novoTelefone">
							<div class="form-group required">
								<?php echo $this->Form->label('tipo', 'Tipo', ['class' => 'col-md-2 control-label']); ?>
								<div class="col-md-4">
									<?php
										$options = ['1' => '', '2' => 'Residencial', '3' => 'Celular', '4' => 'Comercial'];
										echo $this->Form->select('tipo', $options,[ 'class' => 'form-control']);		
									?>
								</div>
							</div>
							<div class="form-group required">
								<?php echo $this->Form->label('telefone', 'Telefone', ['class' => 'col-md-2 control-label']); ?>
								<div class="col-md-4">
									<?php echo $this->Form->text('telefone', ['class' => 'form-control', 'id' => 'telefone']); ?>
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
