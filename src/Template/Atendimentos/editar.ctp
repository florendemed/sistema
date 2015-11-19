<?php
echo $this->Html->scriptBlock("
	function inserir_medicamento() {
		if ( $('#medicamentos-id').val() != '' ) {
			//inserir medicamento atendimento
			$.ajax({
				method: 'POST',
				url: '/AtendimentosMedicamentos/inserir',
				data: { 
					atendimentos_id: " . $this->request->params['pass']['0'] . ",
					medicamentos_id: $('#medicamentos-id').val(),
					uso: $('#uso').val(),
					quantidade: $('#quantidade').val(),
					intervalo: $('#intervalo').val(),
					dias: $('#dias').val(),
				},
				success: function(data){
					$('#medicamentos-id').val('');
					$('#medicamentos-busca').val('');
					$('#quantidade').val('');
					$('#intervalo').val('');
					$('#dias').val('');
					$('.panel-medicamentos').load('/AtendimentosMedicamentos/listar/" . $this->request->params['pass']['0'] . "');
				}
			})
		}
	}
	
	function inserir_exame() {
		if ( $('#exames-id').val() != '' ) {
			//inserir exame atendimento
			$.ajax({
				method: 'POST',
				url: '/AtendimentosExames/inserir',
				data: { 
					atendimentos_id: " . $this->request->params['pass']['0'] . ",
					exames_id: $('#exames-id').val(),
				},
				success: function(data){
					$('#exames-id').val('');
					$('#exames-busca').val('');
					$('.panel-exames').load('/AtendimentosExames/listar/" . $this->request->params['pass']['0'] . "');
				}
			})
		}
	}
	
	function inserir_doenca() {
		if ( $('#doencas-id').val() != '' ) {
			//inserir doenca atendimento
			$.ajax({
				method: 'POST',
				url: '/AtendimentosDoencas/inserir',
				data: { 
					atendimentos_id: " . $this->request->params['pass']['0'] . ",
					doencas_id: $('#doencas-id').val(),
				},
				success: function(data){
					$('#doencas-id').val('');
					$('#doencas-busca').val('');
					$('.panel-doencas').load('/AtendimentosDoencas/listar/" . $this->request->params['pass']['0'] . "');
				}
			})
		}
	}
	
	$(document).ready(function() {
		$('.fone').mask('00 000000009');
		$('.enviar-sms').click(function(){
			if ( $('#telefone').val() != '' ) {
				if ( confirm('Esta receita será enviada por SMS para o telefone \"' + $('#telefone').val() + '\", tem certeza?') ) {
					$.ajax({
						method: 'POST',
						url: '/Atendimentos/sms',
						data: { 
							telefone: $('#telefone').val(),
							atendimentos_id: " . $this->request->params['pass']['0'] . ",
						},
						success: function(data) {
						},
					})
				}
			}
		});
		
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
							data: { nome: $('#medicamentos-busca').val() },
							success: function(data) {
								$('#medicamentos-id').val(data);
								inserir_medicamento();
							},
						})
					}
				}
			} else {
				inserir_medicamento();
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
			minLength: 4,
			select: function( event, ui ) {
				$('#medicamentos-id').val(ui.item.value);
				$('#medicamentos-busca').val(ui.item.label);
			},
		}).on( 'autocompleteselect', function( event, ui ) {
			return false;
		});
	
		$('.panel-exames').load('/AtendimentosExames/listar/" . $this->request->params['pass']['0'] . "');
		$('.inserir-exame').click(function(){
			var exames_id	= $('#exames-id').val();
			if ( exames_id == '' ) {
				if ( $('#exames-busca').val() != '' ) {
					if ( confirm('Este exame não foi encontrado, deseja cadastrá-lo?') ) {
						//cadastra o exame e insere
						$.ajax({
							method: 'POST',
							url: '/Exames/inserir',
							data: { nome: $('#exames-busca').val() },
							success: function(data) {
								$('#exames-id').val(data);
								inserir_exame();
							},
						})
					}
				}
			} else {
				inserir_exame();
			}
			$('.panel-exames').load('/AtendimentosExames/listar/" . $this->request->params['pass']['0'] . "');
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
		
		$('.panel-doencas').load('/AtendimentosDoencas/listar/" . $this->request->params['pass']['0'] . "');
		$('.inserir-doenca').click(function(){
			var doencas_id	= $('#doencas-id').val();
			if ( doencas_id != '' ) {
				inserir_doenca();
			}
			$('.panel-doencas').load('/AtendimentosDoencas/listar/" . $this->request->params['pass']['0'] . "');
		});

		$('#doencas-busca').autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: '/Doencas/buscar',
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
				$('#doencas-id').val(ui.item.value);
				$('#doencas-busca').val(ui.item.label);
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
					<p><strong>Nome: </strong><?= $atendimento->paciente->nome ?></p>
					<p><strong>Nascimento: </strong>
					<?php
						$nascimento = substr($atendimento->paciente->data_nascimento, 0, 10);
						echo($nascimento);
					?>
					</p>
					<p><strong>Idade: </strong>
					<?php
						function idade ($dataNascimento){
							
							$dataNascimento = explode('/', $dataNascimento);
						
							$diaNascimento = $dataNascimento[0];
							$mesNascimento = $dataNascimento[1];
							$anoNascimento = $dataNascimento[2];
							
							$anoAtual = date('Y');
							$mesAtual = date('m');
							$diaAtual = date('d');
							
							if ( $mesAtual < $mesNascimento ){
								$idade = ($anoAtual - $anoNascimento) - 1;
								echo($idade.' Anos');
							} else if ( $mesAtual > $mesNascimento ) {
								$idade = $anoAtual - $anoNascimento;
								echo($idade.' Anos');
							} else {
								if ( $diaAtual < $diaNascimento ){
									$idade = ($anoAtual - $anoNascimento) - 1;	
									echo($idade.' Anos');
								} else if ( $diaAtual >= $diaNascimento ) {
									$idade = $anoAtual - $anoNascimento;
									echo($idade.' Anos');
								}
							}
						}
						idade($nascimento);
					?>
					</p>
					<p><strong>Sexo: </strong>
					<?php
						if( $atendimento->paciente->sexo == 'F'){
							$sexo = "Feminino";
						} else {
							$sexo = "Masculino";
						}
						echo($sexo); 
					?>
					</p>
					<p><strong>Data Consulta: </strong>
					<?php
						$consulta = substr($atendimento['created'], 0, 10);
						echo($consulta);
					?>
					</p>
					<p><strong>Médico(a): </strong><?= $atendimento->colaborador->nome ?></p>
				</div>
				<div class="col-md-10 atendimentos">
					<ul class="nav nav-tabs">
						<li><a href="/atendimentos/editar/<?= $atendimento->id; ?>">Triagem</a></li>
						<li class="active"><a href="/atendimentos/editar/<?= $atendimento->id; ?>/editar">Atendimento Médico</a></li>
					</ul>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group required">
								<?php echo $this->Form->label('anamnese', 'Anamnese', ['class' => 'col-md-1 control-label']); ?>
								<div class="col-md-11">
									<?php echo $this->Form->input('anamnese', array('label' => false, 'type' => 'textarea', 'escape' => false, 'class' => 'form-control')); ?>
								</div>
							</div>
							<div class="form-group required">
								<?php echo $this->Form->label('queixa', 'Queixa', ['class' => 'col-md-1 control-label']); ?>
								<div class="col-md-11">
									<?php echo $this->Form->input('queixa', array('label' => false, 'type' => 'textarea', 'escape' => false, 'class' => 'form-control')); ?>
								</div>
							</div>
						</div>
					</div>
					<hr />
					<h4>Diagnóstico</h4>
					<div class="row">
						<div class="col-md-4">
							<?php echo $this->Form->input('doencas_busca', array('label' => false, 'escape' => false, 'class' => 'form-control', 'placeholder' => 'Digite o nome para buscar a doença')); ?>
							<?php echo $this->Form->input('doencas_id', array('type' => 'hidden')); ?>
						</div>
						<div class="col-md-1">
							<button class="btn btn-primary inserir-doenca" type="button"><span class="fa fa-plus"></span></button>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel-doencas capitalize"></div>
						</div>
					</div>
					<hr />
					<h4>Exames</h4>
					<div class="row">
						<div class="col-md-4">
							<?php echo $this->Form->input('exames_busca', array('label' => false, 'escape' => false, 'class' => 'form-control', 'placeholder' => 'Digite o nome para buscar o exame')); ?>
						</div>
						<div class="col-md-1">
							<button class="btn btn-primary inserir-exame" type="button"><span class="fa fa-plus"></span></button>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel-exames capitalize"></div>
						</div>
					</div>
					<hr />
					<h4>Medicamentos</h4>
					<div class="row">
						<div class="col-md-4">
							<?php echo $this->Form->input('medicamentos_busca', array('label' => false, 'escape' => false, 'class' => 'form-control', 'placeholder' => 'Digite o nome para buscar o medicamento')); ?>
							<?php echo $this->Form->input('medicamentos_id', array('type' => 'hidden')); ?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('uso', array('label' => false, 'class' => 'col-md-2 form-control', 'options' => $combo_uso)); ?>
						</div>
						<div class="col-md-1">
							<?php echo $this->Form->input('quantidade', array('label' => false, 'type' => 'text', 'placeholder' => 'Qtde.', 'class' => 'col-md-2 form-control')); ?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('intervalo', array('label' => false, 'class' => 'col-md-2 form-control', 'options' => $combo_intervalo)); ?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('dias', array('label' => false, 'type' => 'text', 'placeholder' => 'dias', 'class' => 'col-md-2 form-control')); ?>
						</div>
						<div class="col-md-1">
							<button class="btn btn-primary inserir-medicamento" type="button"><span class="fa fa-plus"></span></button>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel-medicamentos capitalize"></div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-12">
							<h4>Gerar e imprimir receita</h4>
						</div>
						<div class="col-md-2">
							<a href="/atendimentos/receita/<?= $atendimento->id ?>/<?= $atendimento->paciente->id ?>/<?= $atendimento->colaborador->id; ?>" target="_blank" class="gerar-receita btn btn-danger btn-sm"><span class="fa fa-medkit"></span> Gerar receita</a>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-12">
							<h4>Enviar receita via SMS</h4>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('telefone', array('label' => false, 'type' => 'text', 'placeholder' => 'Celular', 'class' => 'col-md-3 fone form-control')); ?>
						</div>
						<div class="col-md-2">
							<a href="javascript:void(0);" class="enviar-sms btn btn-danger btn-sm"><span class="fa fa-paper-plane"></span> Enviar SMS</a>
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