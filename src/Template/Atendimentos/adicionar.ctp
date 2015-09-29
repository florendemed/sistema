<?php
echo $this->Html->scriptBlock("
	$(document).ready(function() {
		alert('teste');
		$('#pacientes-id').autocomplete({
			source: '/pacientes/buscar',
			minLength: 2,
			select: function(event, ui) {
				console.log( ui.item ?
				'Selected: ' + ui.item.value + ' aka ' + ui.item.id :
				'Nothing selected, input was ' + this.value );
			}
		});
	});
");
?>
<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Atendimentos / Adicionar</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/atendimentos/adicionar">Novo</a></li>
			<li class=""><a href="/atendimentos/index">Listar</a></li>
		</ul>
		<?php echo $this->Form->create($atendimento, ['class' => 'form-horizontal']); ?>
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('pacientes_id', 'Paciente', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php
									echo $this->Form->input('pacientes_id', array('label' => false, 'type' => 'text', 'class' => 'form-control'));
								?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('colaborador_id', 'Profissional', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php
									echo $this->Form->input('colaborador_id', array('label' => false, 'class' => 'form-control', 'options' => $colaborador));
								?>
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
