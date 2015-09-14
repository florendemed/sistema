<?php
echo $this->Html->scriptBlock("
	$(document).ready(function() {
		$('.cep').mask('00000-000');
		$('.date').mask('00/00/0000');
		$('.telefone').mask('(00) 0000-0000');
		$('.cpf').mask('00000000000');
		
		$('#cep').keyup(function(){
			if ( $(this).val().length == 9 ) {
				$('.false-load').load('/app/busca_cep/' + $(this).val(), function(p1){
					var endereco	= $.parseJSON(p1);
					if ( endereco.retorno == 'ok' ) {
						$('#endereco').val(endereco.Endereco.nome);
						$('#bairro').val(endereco.Bairro.nome);
						$('#cidade').val(endereco.Cidade.nome);
						$('#estado').val(endereco.Estado.nome);
					} else {
						$('#endereco').val('');
						$('#bairro').val('');
						$('#cidade').val('');
						$('#estado').val('');
					}
				});
			}
		});
	});
");
?>
<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Colaboradores</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/colaboradores/adicionar">Novo</a></li>
			<li><a href="/colaboradores/index">Listar</a></li>
		</ul>
		<?php echo $this->Form->create($colaborador, ['class' => 'form-horizontal']); ?>
			<div class="row">
				<div class="col-md-6">
					<h3>Dados Pessoais</h3>
					<p>&nbsp;</p>
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('nome', 'Nome', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->input('nome', ['label' => false, 'class' => 'form-control']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('ocupacao', 'Ocupação', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php
									echo $this->Form->input('ocupacao', array('label' => false, 'class' => 'form-control', 'options' => $combo_profissoes));	
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('conselho_regional', 'Conselho Regional', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-2">
								<?php
									echo $this->Form->input('conselho_regional', array('label' => false, 'class' => 'form-control', 'options' => $combo_conselho_regional));		
								?>
							</div>
							<?php echo $this->Form->label('numero_conselho_regional', 'Conselho Regional Número', ['class' => 'col-md-4 control-label']); ?>
							<div class="col-md-3">
								<?php echo $this->Form->input('numero_conselho_regional', ['label' => false, 'class' => 'form-control']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('data_nascimento', 'Nascimento', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->input('data_nascimento', ['type' => 'text', 'label' => false, 'class' => 'form-control date', 'id' => 'dataNascimento']); ?>
							</div>
							<?php echo $this->Form->label('estado_civil', 'Estado Civil', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-3">
								<?php
									echo $this->Form->input('estado_civil', array('label' => false, 'class' => 'form-control', 'options' => $combo_estadocivil));		
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('rg', 'RG', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->input('rg', ['label' => false, 'class' => 'form-control']); ?>
							</div>
							<?php echo $this->Form->label('cpf', 'CPF', ['class' => 'col-md-1 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->input('cpf', ['label' => false, 'class' => 'form-control']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('sexo', 'Sexo', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-3">
								<?php
									echo $this->Form->input('sexo', array('label' => false, 'class' => 'form-control', 'options' => $combo_sexo));		
								?>
							</div>
							<?php echo $this->Form->label('escolaridade', 'Escolaridade', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php
									echo $this->Form->input('escolaridade', array('label' => false, 'class' => 'form-control', 'options' => $combo_escolaridades));		
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('email', 'E-mail', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->input('email', ['label' => false, 'class' => 'form-control', 'id' => 'email']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('senha', 'Senha', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-3">
								<?php echo $this->Form->input('senha', ['label' => false, 'type' => 'password', 'class' => 'form-control']); ?>
							</div>
							<?php echo $this->Form->label('senha_repetir', 'Repetir Senha', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-3">
								<?php echo $this->Form->input('senha_repetir', ['label' => false, 'type' => 'password', 'class' => 'form-control']); ?>
							</div>
						</div>	
						<div class="form-group">
							<?php echo $this->Form->label('envio_sms', 'Envio SMS', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->iput('envio_sms', ['type' => 'checkbox', 'class' => '']); ?>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-md-6">
					<h3>Dados de Contato</h3>
					<p>&nbsp;</p>
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('endereco.cep', 'CEP', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->input('endereco.cep', ['label' => false, 'class' => 'form-control cep', 'id' => 'cep']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('endereco.endereco', 'Endereço', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-10">
								<?php echo $this->Form->input('endereco.endereco', ['label' => false, 'class' => 'form-control', 'id' => 'endereco']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('endereco.numero', 'Número', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-2">
								<?php echo $this->Form->input('endereco.numero', ['label' => false, 'class' => 'form-control', 'id' => 'numero']); ?>
							</div>
							<?php echo $this->Form->label('endereco.complemento', 'Complemento', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-6">
								<?php echo $this->Form->input('endereco.complemento', ['label' => false, 'class' => 'form-control', 'id' => 'complemento']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('endereco.bairro', 'Bairro', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->input('endereco.bairro', ['label' => false, 'class' => 'form-control', 'id' => 'bairro', 'id' => 'bairro']); ?>
							</div>
							<?php echo $this->Form->label('endereco.cidade', 'Cidade', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->input('endereco.cidade', ['label' => false, 'class' => 'form-control', 'id' => 'cidade', 'id' => 'cidade']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('endereco.estado', 'Estado', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->input('endereco.estado', ['label' => false, 'class' => 'form-control', 'id' => 'estado', 'id' => 'estado']); ?>
							</div>
							<?php echo $this->Form->label('endereco.pais', 'País', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->input('endereco.pais', ['label' => false, 'class' => 'form-control', 'id' => 'pais', 'id' => 'pais']); ?>
							</div>
						</div>
						<hr />
						<h3>Telefones</h3>
						<div class="form-group required">
							<div class="col-md-12">
								<div class="col-md-4">
									<?php echo $this->Form->label('telefone.tipo1', '', ['class' => 'control-label']); ?>
									<?php
										echo $this->Form->input('telefone.tipo1', array('label' => false, 'class' => 'form-control', 'options' => $combo_tipos_telefone));		
									?>
								</div>
								<div class="col-md-6">
									<?php echo $this->Form->label('telefone.numero1', '', ['class' => 'control-label']); ?>
									<?php echo $this->Form->input('telefone.numero1', ['label' => false, 'class' => 'form-control telefone', 'id' => 'telefone']); ?>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-4">
									<?php echo $this->Form->label('telefone.tipo2', '', ['class' => 'control-label']); ?>
									<?php
										echo $this->Form->input('telefone.tipo2', array('label' => false, 'class' => 'form-control', 'options' => $combo_tipos_telefone));		
									?>
								</div>
								<div class="col-md-6">
									<?php echo $this->Form->label('telefone.numero2', '', ['class' => 'control-label']); ?>
									<?php echo $this->Form->input('telefone.numero2', ['label' => false, 'class' => 'form-control telefone', 'id' => 'telefone']); ?>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-4">
									<?php echo $this->Form->label('telefone.tipo3', '', ['class' => 'control-label']); ?>
									<?php
										echo $this->Form->input('telefone.tipo3', array('label' => false, 'class' => 'form-control', 'options' => $combo_tipos_telefone));		
									?>
								</div>
								<div class="col-md-6">
									<?php echo $this->Form->label('telefone.numero3', '', ['class' => 'control-label']); ?>
									<?php echo $this->Form->input('telefone.numero3', ['label' => false, 'class' => 'form-control telefone', 'id' => 'telefone']); ?>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-md-12">
					<hr />
					<h3>Grupos de Acesso</h3>
					<p class="alert alert-info">Administre os grupos de acesso deste usuário abaixo.</p>
					<fieldset>
						<?php foreach ($grupo as $i => $grupo) :
							echo $this->Form->input('grupo.nome.'.$i, ['label' => false, 'type' => 'checkbox', 'value' => @$grupo['id'], 'div' => false]);
							echo $grupo['nome'];
						endforeach; ?>
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
