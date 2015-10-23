<?php
echo $this->Html->scriptBlock("
	$(document).ready(function() {
		$('.cep').mask('00000-000');
		$('.date').mask('00/00/0000');
		$('.telefone').mask('(00) 0000-0000');
		$('.cpf').mask('00000000000');
		
		$('#endereco-cep').keyup(function(){
			if ( $(this).val().length == 9 ) {
				$('.false-load').load('/app/busca_cep/' + $(this).val(), function(p1){
					var endereco	= $.parseJSON(p1);
					if ( endereco.retorno == 'ok' ) {
						$('#endereco-endereco').val(endereco.Endereco.nome);
						$('#endereco-bairro').val(endereco.Bairro.nome);
						$('#endereco-cidade').val(endereco.Cidade.nome);
						$('#endereco-estado').val(endereco.Estado.nome);
					} else {
						$('#endereco-endereco').val('');
						$('#endereco-bairro').val('');
						$('#endereco-cidade').val('');
						$('#endereco-estado').val('');
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
			<li class="active">Dados / Pacientes</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/pacientes/adicionar">Editar</a></li>
			<li><a href="/pacientes/index">Listar</a></li>
			<li><a href="/pacientes/prontuario">Prontuário</a></li>
		</ul>
		<?php echo $this->Form->create($paciente, ['class' => 'form-horizontal']); ?>
			<?php echo $this->Form->input('id'); ?>
			<div class="row">
				<div class="col-md-6">
					<h3>Dados Pessoais</h3>
					<p>&nbsp;</p>
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('nome', 'Nome', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->input('nome', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('numero_prontuario', 'Número Prontuário', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-2">
								<?php echo $this->Form->input('numero_prontuario', ['label' => false, 'class' => 'form-control']); ?>
							</div>
							<?php echo $this->Form->label('numero_sus', 'Número Cartão SUS', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->input('numero_sus', ['label' => false, 'class' => 'form-control', 'id' => 'CartaoSUS']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('estado_civil', 'Estado Civil', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-2">
								<?php
									$options = $combo_estadocivil;
									echo $this->Form->select('estado_civil', $options,[ 'class' => 'form-control']);		
								?>
							</div>
							<?php echo $this->Form->label('data_nascimento', 'Nascimento', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-5">
								<?php echo $this->Form->input('data_nascimento', ['type' => 'text', 'label' => false, 'class' => 'form-control date', 'id' => 'dataNascimento']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('tipo_sanguinio', 'Tipo Sanguinio', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-2">
								<?php
									$options = $combo_tipo_sanguinio;
									echo $this->Form->select('tipo_sanguinio', $options,[ 'class' => 'form-control']);		
								?>
							</div>
							<?php echo $this->Form->label('sexo', 'Sexo', ['class' => 'col-md-1 control-label']); ?>
							<div class="col-md-2">
								<?php
									$options = $combo_sexo;
									echo $this->Form->select('sexo', $options,[ 'class' => 'form-control']);		
								?>
							</div>
							<?php echo $this->Form->label('cor', 'Raça', ['class' => 'col-md-1 control-label']); ?>
							<div class="col-md-3">
								<?php
									$options = $combo_raca;
									echo $this->Form->select('cor', $options,[ 'class' => 'form-control']);		
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('rg', 'RG', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-3">
								<?php echo $this->Form->input('rg', ['label' => false, 'class' => 'form-control', 'id' => 'RG']); ?>
							</div>
							<?php echo $this->Form->label('cpf', 'CPF', ['class' => 'col-md-1 control-label']); ?>
							<div class="col-md-5">
								<?php echo $this->Form->input('cpf', ['label' => false, 'class' => 'form-control cpf number', 'id' => 'CPF']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('ocupacao', 'Ocupação', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php
									$options = $combo_profissoes;
									echo $this->Form->select('ocupacao', $options,[ 'class' => 'form-control']);		
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('escolaridade', 'Escolaridade', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php
									$options = $combo_escolaridades;
									echo $this->Form->select('escolaridade', $options,[ 'class' => 'form-control']);		
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('nome_mae', 'Nome da Mãe', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->input('nome_mae', ['label' => false, 'class' => 'form-control', 'id' => 'nomeMae']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('nome_pai', 'Nome do Pai', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->input('nome_pai', ['label' => false, 'class' => 'form-control', 'id' => 'nomePai']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('email', 'E-mail', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->input('email', ['label' => false, 'class' => 'form-control', 'id' => 'email',  'required' => false]); ?>
							</div>
						</div>	
						<div class="form-group">
							<?php echo $this->Form->label('envio_sms', 'Envio SMS', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->checkbox('envio_sms', ['label' => false, 'class' => '', 'value' => 's']); ?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('status', 'Status', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->checkbox('status', ['label' => false, 'class' => '', 'value' => 'a']); ?>
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
								<?php echo $this->Form->input('endereco.cep', ['label' => false, 'class' => 'form-control cep', 'value' => @$endereco['cep']]); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('endereco.endereco', 'Endereço', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-10">
								<?php echo $this->Form->input('endereco.endereco', ['label' => false, 'class' => 'form-control',  'value' => @$endereco['endereco']]); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('endereco.numero', 'Número', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-2">
								<?php echo $this->Form->input('endereco.numero', ['label' => false, 'class' => 'form-control',  'value' => @$endereco['numero']]); ?>
							</div>
							<?php echo $this->Form->label('endereco.complemento', 'Complemento', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-6">
								<?php echo $this->Form->input('endereco.complemento', ['label' => false, 'class' => 'form-control',  'value' => @$endereco['complemento']]); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('endereco.bairro', 'Bairro', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->input('endereco.bairro', ['label' => false, 'class' => 'form-control',  'value' => @$endereco['bairro']]); ?>
							</div>
							<?php echo $this->Form->label('endereco.cidade', 'Cidade', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->input('endereco.cidade', ['label' => false, 'class' => 'form-control',  'value' => @$endereco['cidade']]); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('endereco.estado', 'Estado', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->input('endereco.estado', ['label' => false, 'class' => 'form-control',  'value' => @$endereco['estado']]); ?>
							</div>
							<?php echo $this->Form->label('endereco.pais', 'País', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-4">
								<?php echo $this->Form->input('endereco.pais', ['label' => false, 'class' => 'form-control',  'value' => @$endereco['pais']]); ?>
							</div>
						</div>
						<hr />
						<h3>Telefones</h3>
						<div class="form-group required">
							<div class="col-md-12">
								<div class="col-md-4">
									<?php echo $this->Form->label('telefone.tipo1', '', ['class' => 'control-label']); ?>
									<?php
										$options = $combo_tipos_telefone;
										echo $this->Form->select('telefone.tipo1', $options,[ 'class' => 'form-control', 'value' => @$telefone['0']['tipo']]);		
									?>
								</div>
								<div class="col-md-6">
									<?php echo $this->Form->label('telefone.numero1', '', ['class' => 'control-label']); ?>
									<?php echo $this->Form->input('telefone.numero1', ['label' => false, 'class' => 'form-control telefone', 'id' => 'telefone', 'value' => @$telefone['0']['numero']]); ?>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-4">
									<?php echo $this->Form->label('telefone.tipo2', '', ['class' => 'control-label']); ?>
									<?php
										$options = $combo_tipos_telefone;
										echo $this->Form->select('telefone.tipo2', $options,[ 'class' => 'form-control', 'value' => @$telefone['1']['tipo']]);		
									?>
								</div>
								<div class="col-md-6">
									<?php echo $this->Form->label('telefone.numero2', '', ['class' => 'control-label']); ?>
									<?php echo $this->Form->input('telefone.numero2', ['label' => false, 'class' => 'form-control telefone', 'id' => 'telefone', 'value' => @$telefone['1']['numero']]); ?>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-4">
									<?php echo $this->Form->label('telefone.tipo3', '', ['class' => 'control-label']); ?>
									<?php
										$options = $combo_tipos_telefone;
										echo $this->Form->select('telefone.tipo3', $options,[ 'class' => 'form-control', 'value' => @$telefone['2']['tipo']]);		
									?>
								</div>
								<div class="col-md-6">
									<?php echo $this->Form->label('telefone.numero3', '', ['class' => 'control-label']); ?>
									<?php echo $this->Form->input('telefone.numero3', ['label' => false, 'class' => 'form-control telefone', 'id' => 'telefone', 'value' => @$telefone['2']['numero']]); ?>
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