<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Colaboradores</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/colaboradores/adicionar">Novo</a></li>
			<li><a href="/colaboradores/index">Listar</a></li>
		</ul>
		<form action="/colaboradores/adicionar" class="form-horizontal" id="ColaboradoresAdicionarForm" method="post" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-6">
					<h3>Dados Pessoais</h3>
					<p>&nbsp;</p>
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('profissional', 'Profisisonal', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php
									$options = ['1' => '', '2' => 'Profisisonal 1', '3' => 'Profisisonal 2', '4' => 'Profisisonal 3'];
									echo $this->Form->select('profissional', $options,[ 'class' => 'form-control']);		
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('colaboradorNome', 'Nome', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->text('nome', ['class' => 'form-control', 'id' => 'colaboradorNome', 'required' => 'required']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('conselhoRegional', 'Conselho Regional', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-2">
								<?php
									$options = ['1' => '', '2' => 'CRM', '3' => 'CRP', '4' => 'CRE'];
									echo $this->Form->select('conselhoRegional', $options,[ 'class' => 'form-control']);		
								?>
							</div>
							<?php echo $this->Form->label('conselhoRegionalNum', 'Conselho Regional Número', ['class' => 'col-md-4 control-label']); ?>
							<div class="col-md-3">
								<?php echo $this->Form->text('conselhoRegionalNum', ['class' => 'form-control', 'id' => 'conselhoRegionalNum', 'required' => 'required']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('dataNascimento', 'Nascimento', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->text('dataNascimento', ['class' => 'form-control', 'id' => 'dataNascimento', 'required' => 'required']); ?>
							</div>
							<?php echo $this->Form->label('estadoCivil', 'Estado Civil', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-3">
								<?php
									$options = ['1' => '', '2' => 'Solteiro', '3' => 'Casado', '4' => 'Divorciado'];
									echo $this->Form->select('estadoCivil', $options,[ 'class' => 'form-control']);		
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
								<?php echo $this->Form->text('CPF', ['class' => 'form-control', 'id' => 'CPF', 'required' => 'required']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('sexo', 'Sexo', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-2">
								<?php
									$options = ['1' => '', '2' => 'Feminino', '3' => 'Masculino'];
									echo $this->Form->select('sexo', $options,[ 'class' => 'form-control', 'value' => $this->request->params['pass'][1]]);		
								?>
							</div>
							<?php echo $this->Form->label('escolaridade', 'Escolaridade', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-5">
								<?php
									$options = ['1' => '', '2' => 'Escolaridade 1', '3' => 'Escolaridade 2', '4' => 'Escolaridade 3'];
									echo $this->Form->select('escolaridade', $options,[ 'class' => 'form-control']);		
								?>
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
						<div class="form-group required">
							<?php echo $this->Form->label('senha', 'Senha', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-3">
								<?php echo $this->Form->password('senha', ['class' => 'form-control', 'id' => 'senha', 'required' => 'required']); ?>
							</div>
							<?php echo $this->Form->label('senhaRepetir', 'Repetir Senha', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-3">
								<?php echo $this->Form->password('senhaRepetir', ['class' => 'form-control', 'id' => 'senhaRepetir', 'required' => 'required']); ?>
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
							<p class="col-md-3 text-right"><a href="#panel-telefone" data-toggle="collapse" title="Cadastrar novo telefone" class="btn btn-danger novo-telefone"><span class="glyphicon glyphicon-plus"></span> Novo Telefone</a></p>
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
