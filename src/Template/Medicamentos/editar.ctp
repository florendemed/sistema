<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Medicamentos / Editar</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/medicamentos/adicionar">Novo</a></li>
			<li class="active"><a href="/medicamentos/editar/<?= $medicamento->id; ?>">Editar</a></li>
			<li><a href="/medicamentos/index">Listar</a></li>
		</ul>
		<?php echo $this->Form->create($medicamento, ['class' => 'form-horizontal']); ?>
			<?php echo $this->Form->input('id'); ?>
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('nome', 'Nome Exame', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->input('nome', ['label' => false, 'class' => 'form-control']); ?>
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
			</div>
			<hr />
			<div class="row">
				<div class="col-md-12">
					<?php 
						echo $this->Form->submit('Enviar', ['class' => 'btn btn-primary btn', 'value' => 'enviar']);
					?>
				</div>
			</div>
		<?php echo $this->Form->end();?>				
	</div>
</div>