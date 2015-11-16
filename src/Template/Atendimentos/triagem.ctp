<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Atendimentos / Triagem</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/atendimentos/adicionar">Novo</a></li>
			<li class="active"><a href="/atendimentos/editar/<?= $atendimento->id; ?>">Editar</a></li>
			<li><a href="/atendimentos/index">Listar</a></li>
		</ul>
		<?php
			echo $this->Form->create($atendimento, ['class' => 'form-horizontal']); ?>
			<?php echo $this->Form->input('id'); ?>
			<?php echo $this->Form->input('atendimentos_status_id', ['value' => '2', 'type' => 'hidden']);?>
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
						<li class="active"><a href="/atendimentos/editar/<?= $this->request->params['pass']['0'] ?>">Triagem</a></li>
						<li><a href="/atendimentos/editar/<?= $this->request->params['pass']['0'] ?>/editar">Atendimento Médico</a></li>
					</ul>
					<div class='col-md-7'>
						<fieldset>
							<div class="form-group required">
								<?php echo $this->Form->label('frequencia_cardiaca', 'Frequência Cardíaca', ['class' => 'col-md-4 control-label']).'bpm'; ?>
								<div class="col-md-7">
									<?php echo $this->Form->input('frequencia_cardiaca', array('label' => false, 'type' => 'text', 'class' => 'form-control')); ?>
								</div>
							</div>	
							<div class="form-group required">
								<?php echo $this->Form->label('pressao_arterial', 'Pressão Arterial', ['class' => 'col-md-4 control-label']).'mmHg'; ?>
								<div class="col-md-7">
									<?php echo $this->Form->input('pressao_arterial', array('label' => false, 'type' => 'text', 'class' => 'form-control')); ?>
								</div>
							</div>	
							<div class="form-group required">
								<?php echo $this->Form->label('temperatura', 'Temperatura Corporal', ['class' => 'col-md-4 control-label']).'°C'; ?>
								<div class="col-md-7">
									<?php echo $this->Form->input('temperatura', array('label' => false, 'type' => 'text', 'class' => 'form-control')); ?>
								</div>
							</div>	
							<div class="form-group required">
								<?php echo $this->Form->label('queixa', 'Queixa', ['class' => 'col-md-4 control-label']); ?>
								<div class="col-md-7">
									<?php echo $this->Form->input('queixa', array('label' => false, 'type' => 'textarea', 'escape' => false, 'class' => 'form-control')); ?>
								</div>
							</div>		
						</fieldset>
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
