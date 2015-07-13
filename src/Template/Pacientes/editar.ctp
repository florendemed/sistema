<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Pacientes</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/pacientes/adicionar">Novo</a></li>
			<li><a href="/pacientes/index">Listar</a></li>
		</ul>
		<form action="" class="form-horizontal" id="PacienteEditarForm" method="post" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-6">
					<h3>Dados Pessoais</h3>
					<p>&nbsp;</p>
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('PacienteNome', 'Nome', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->text('nome', ['class' => 'form-control', 'id' => 'PacienteNome', 'required' => 'required', value => 'Teste Teste Teste']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('CartaoSUS', 'Número Cartão SUS', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->text('CartaoSUS', ['class' => 'form-control', 'id' => 'CartaoSUS', 'required' => 'required', value => '123456']); ?>
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
								<?php echo $this->Form->text('dataNascimento', ['class' => 'form-control', 'id' => 'dataNascimento', 'required' => 'required']); ?>
							</div>
							
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('tipoSanguinio', 'Tipo Sanguinio', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-2">
								<?php
									$options = ['1' => '', '2' => 'A', '3' => 'B', '4' => 'AB', '5' => 'O'];
									echo $this->Form->select('tipoSanguinio', $options,[ 'class' => 'form-control', 'value' => $this->request->params['pass'][1]]);		
								?>
							</div>
							<?php echo $this->Form->label('sexo', 'Sexo', ['class' => 'col-md-1 control-label']); ?>
							<div class="col-md-2">
								<?php
									$options = ['1' => '', '2' => 'Feminino', '3' => 'Masculino'];
									echo $this->Form->select('sexo', $options,[ 'class' => 'form-control', 'value' => $this->request->params['pass'][1]]);		
								?>
							</div>
							<?php echo $this->Form->label('cor', 'Cor', ['class' => 'col-md-1 control-label']); ?>
							<div class="col-md-3">
								<?php
									$options = ['1' => '', '2' => 'cor 1', '3' => 'cor 2'];
									echo $this->Form->select('cor', $options,[ 'class' => 'form-control', 'value' => $this->request->params['pass'][1]]);		
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('RG', 'RG', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-5">
								<?php echo $this->Form->text('RG', ['class' => 'form-control', 'id' => 'RG', 'required' => 'required']); ?>
							</div>
							<?php echo $this->Form->label('CPF', 'CPF', ['class' => 'col-md-1 control-label']); ?>
							<div class="col-md-3">
								<?php echo $this->Form->text('CPF', ['class' => 'form-control', 'id' => 'CPF', 'required' => 'required', value => '123.456.789-10']); ?>
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
								<?php echo $this->Form->text('nomeMae', ['class' => 'form-control', 'id' => 'nomeMae', 'required' => 'required']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('nomePai', 'Nome do Pai', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->text('nomePai', ['class' => 'form-control', 'id' => 'nomePai', 'required' => 'required']); ?>
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
								<?php echo $this->Form->text('email', ['class' => 'form-control', 'id' => 'email', 'required' => 'required']); ?>
							</div>
						</div>	
						<div class="form-group">
							<label for="envioSMS" class="col-md-3 control-label">Envio SMS</label>
							<div class="col-md-8"><input name="data[SMS][status]" id="envioSMS" value="0" type="hidden">
								<input name="data[SMS][status]" value="a" class="" id="envioSMS" checked="checked" type="checkbox">
							</div>
						</div>
						<div class="form-group">
							<label for="PacienteStatus" class="col-md-3 control-label">Ativo</label>
							<div class="col-md-8"><input name="data[Paciente][status]" id="PacienteStatus_" value="0" type="hidden">
								<input name="data[Paciente][status]" value="a" class="" id="PacienteStatus" checked="checked" type="checkbox">
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
								<?php echo $this->Form->text('cep', ['class' => 'form-control', 'id' => 'cep', 'required' => 'required']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('endereco', 'Endereço', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-10">
								<?php echo $this->Form->text('endereco', ['class' => 'form-control', 'id' => 'endereco', 'required' => 'required']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('numero', 'Número', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-2">
								<?php echo $this->Form->text('numero', ['class' => 'form-control', 'id' => 'numero', 'required' => 'required']); ?>
							</div>
							<?php echo $this->Form->label('complemento', 'Complemento', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-6">
								<?php echo $this->Form->text('complemento', ['class' => 'form-control', 'id' => 'complemento', 'required' => 'required']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('bairro', 'Bairro', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('bairro', ['class' => 'form-control', 'id' => 'bairro', 'required' => 'required']); ?>
							</div>
							<?php echo $this->Form->label('cidade', 'Cidade', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('cidade', ['class' => 'form-control', 'id' => 'cidade', 'required' => 'required']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('estado', 'Estado', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('estado', ['class' => 'form-control', 'id' => 'estado', 'required' => 'required']); ?>
							</div>
							<?php echo $this->Form->label('pais', 'País', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('pais', ['class' => 'form-control', 'id' => 'pais', 'required' => 'required']); ?>
							</div>
						</div>
						<hr />
						<div class="form-group required">
							<p class="col-md-2"><a href="#panel-telefone" data-toggle="collapse" title="Cadastrar novo telefone" class="btn btn-danger novo-telefone"><span class="glyphicon glyphicon-plus"></span> Novo Telefone</a></p>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('tipo', 'Tipo', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php
									$options = ['1' => '', '2' => 'Residencial', '3' => 'Celular', '4' => 'Comercial'];
									echo $this->Form->select('nacionalidade', $options,[ 'class' => 'form-control']);		
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('telefone', 'Telefone', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('telefone', ['class' => 'form-control', 'id' => 'telefone', 'required' => 'required']); ?>
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
		</form>		
	</div>
</div>
