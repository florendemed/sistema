<?php
echo $this->Html->scriptBlock("
	$(document).ready(function() {
		$('.panel-medicamentos').load('/AtendimentosMedicamentos/listar/" . $this->request->params['pass']['0'] . "');
		$('.inserir-medicamento').click(function(){
			var medicamento_id	= $('#medicamentos-id').val();
			if ( medicamento_id == '' ) {
				if ( $('#medicamentos-busca').val() != '' ) {
					if ( confirm('Este medicamento não foi encontrado, deseja cadastrá-lo?') ) {
						//cadastra o medicamento e insere
						$.ajax({
							method: 'POST',
							url: '/Medicamentos/inserir',
							data: { nome: $('#medicamentos-busca').val() }
						})
						.done(function( id ) {
							$('#medicamentos-id').val(id);
							var medicamento_id	= id;
						});
					}
				} else {
					return false;
				}
			}
			if ( medicamento_id != '' ) {
				//inserir medicamento atendimento
				$.ajax({
					method: 'POST',
					url: '/AtendimentosMedicamentos/inserir',
					data: { 
						atendimentos_id: " . $this->request->params['pass']['0'] . ",
						medicamentos_id: medicamento_id,
						uso: $('#uso').val(),
						quantidade: $('#quantidade').val(),
						intervalo: $('#intervalo').val(),
						dias: $('#dias').val()
					}
				})
			}
			$('.panel-medicamentos').load('/AtendimentosMedicamentos/listar/" . $this->request->params['pass']['0'] . "');
		});

		$('#medicamentos-busca').autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: '/Medicamentos/buscar',
					dataType: 'json',
					delay: 30,
					data: {
						busca: request.term
					},
					success: function( data ) {
						response( data );
					}
				});
			},
			minLength: 5,
			select: function( event, ui ) {
				$('#medicamentos-id').val(ui.item.value);
				$('#medicamentos-busca').val(ui.item.label);
			},
		}).on( 'autocompleteselect', function( event, ui ) {
			return false;
		});
	
		$('#exames-busca').autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: '/Exames/buscar',
					dataType: 'json',
					delay: 30,
					data: {
						busca: request.term
					},
					success: function( data ) {
						response( data );
					}
				});
			},
			minLength: 3,
			select: function( event, ui ) {
				$('#exames-id').val(ui.item.value);
				$('#exames-busca').val(ui.item.label);
			},
		}).on( 'autocompleteselect', function( event, ui ) {
			return false;
		});
	});
");
?>
<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Atendimentos / Atendimento Médico</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/atendimentos/adicionar">Novo</a></li>
			<li class="active"><a href="/atendimentos/editar/<?= $atendimento->id; ?>">Editar</a></li>
			<li><a href="/atendimentos/index">Listar</a></li>
		</ul>
		<?php echo $this->Form->create($atendimento, ['class' => 'form-horizontal']); ?>
			<?php echo $this->Form->input('id'); ?>
			<?php echo $this->Form->input('atendimentos_status_id', ['value' => '3', 'type' => 'hidden']); ?>
			<?php echo $this->Form->input('exames_id', array('type' => 'hidden')); ?>
			<div class="row">
				<div class="col-md-2 dados">
					<p class="text-center"><img src='/img/sem_foto.png' /></p>
					<p><strong>Nome: </strong><?= h($atendimento->paciente->nome) ?></p>
					<p><strong>Nascimento: </strong>
					<?php
						$nascimento = substr($atendimento->paciente->data_nascimento, 0, 8);
						echo($nascimento);
					?>
					</p>
					<p><strong>Data Consulta: </strong>
					<?php
						$consulta = substr($atendimento['created'], 0, 8);
						echo($consulta);
					?>
					</p>
					<p><strong>Médico(a): </strong><?= h($atendimento->colaborador->nome) ?></p>
				</div>
				<div class="col-md-10 atendimentos">
					<ul class="nav nav-tabs">
						<li><a href="/atendimentos/editar/<?= $this->request->params['pass']['0'] ?>">Triagem</a></li>
						<li class="active"><a href="/atendimentos/editar/<?= $this->request->params['pass']['0'] ?>/editar">Atendimento Médico</a></li>
					</ul>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group required">
								<?php echo $this->Form->label('anamnese', 'Anamnese', ['class' => 'col-md-3 control-label']); ?>
								<div class="col-md-9">
									<?php echo $this->Form->input('anamnese', array('label' => false, 'type' => 'textarea', 'escape' => false, 'class' => 'form-control')); ?>
								</div>
							</div>
							<div class="form-group required">
								<?php echo $this->Form->label('diagnostico', 'Diagnóstico', ['class' => 'col-md-3 control-label']); ?>
								<div class="col-md-9">
									<?php echo $this->Form->input('diagnostico', array('label' => false, 'type' => 'textarea', 'escape' => false, 'class' => 'form-control')); ?>
								</div>
							</div>
							<div class="form-group required">
								<?php echo $this->Form->label('queixa', 'Queixa', ['class' => 'col-md-3 control-label']); ?>
								<div class="col-md-9">
									<?php echo $this->Form->input('queixa', array('label' => false, 'type' => 'textarea', 'escape' => false, 'class' => 'form-control')); ?>
								</div>
							</div>
						</div>
					</div>
					<hr />
					<h4>Medicamentos</h4>
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->input('medicamentos_busca', array('label' => false, 'escape' => false, 'class' => 'form-control', 'placeholder' => 'Digite o nome para buscar o medicamento')); ?>
							<?php echo $this->Form->input('medicamentos_id', array('type' => 'hidden')); ?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('uso', array('label' => false, 'class' => 'col-md-2 form-control', 'options' => $combo_uso)); ?>
						</div>
						<div class="col-md-1">
							<?php echo $this->Form->input('quantidade', array('label' => false, 'type' => 'text', 'placeholder' => 'Qtde.', 'class' => 'col-md-2 form-control numero')); ?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('intervalo', array('label' => false, 'class' => 'col-md-2 form-control', 'options' => $combo_tempo)); ?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('dias', array('label' => false, 'type' => 'text', 'placeholder' => 'dias', 'class' => 'col-md-2 form-control numero')); ?>
						</div>
						<div class="col-md-1">
							<button class="btn btn-primary inserir-medicamento" type="button"><span class="fa fa-plus"></span></button>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel-medicamentos"></div>
						</div>
					</div>
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