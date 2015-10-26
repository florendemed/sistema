<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Medicamentos / Adicionar</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/medicamentos/novo">Novo</a></li>
			<li><a href="/medicamentos/index">Listar</a></li>
		</ul>
		<p class="alert alert-info">Arquivo <strong>XML</strong> nos padrões abaixo:</p>
		<?php echo $this->Form->create($medicamento, ['class' => 'form-horizontal']); ?>
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('nome', 'Nome', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-9">
								<?php echo $this->Form->input('nome', ['label' => false, 'class' => 'form-control']); ?>
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
