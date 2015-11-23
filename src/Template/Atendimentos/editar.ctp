<?php
echo $this->Html->scriptBlock("
	$(document).ready(function() {
		$('#pacientes-busca').autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: '/Pacientes/buscar',
					dataType: 'json',
					delay: 100,
					data: {
						busca: request.term
					},
					success: function( data ) {
						response( data );
					}
				});
			},
			minLength: 2,
			select: function( event, ui ) {
				console.log(event);
				$('#pacientes-id').val(ui.item.value);
				$('#pacientes-busca').val(ui.item.label);
				console.log(ui.item);
				/*
				console.log(
					ui.item ?
						'Selected: ' + ui.item.label :
						'Nothing selected, input was ' + this.value
				);
				*/
			},
		}).on( 'autocompleteselect', function( event, ui ) {
			return false;
		} );;
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
		<?php 
		echo $this->Form->create($atendimento, ['class' => 'form-horizontal']); 
		echo $this->Form->input('id');
		echo $this->Form->input('pacientes_id', array('type' => 'hidden'));
		?>
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('pacientes_busca', 'Paciente', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php
									echo $this->Form->input('pacientes_busca', array('label' => false, 'type' => 'text', 'class' => 'form-control', 'value' => $atendimento->paciente->nome));
								?>
							</div>
							<div class="col-md-1"><a href='/pacientes/adicionar' title="Adicionar Paciente" target="_blank"><button class="btn btn-primary inserir-medicamento" type="button"><span class="fa fa-plus"></span></button></a></div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('colaborador_id', 'Profissional', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php
									echo $this->Form->input('colaborador_id', array('label' => false, 'class' => 'form-control', 'options' => $colaborador));
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('prioridade', 'Prioridade', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php
									echo $this->Form->input('prioridade', array('label' => false, 'class' => 'form-control', 'options' => $combo_prioridades));
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