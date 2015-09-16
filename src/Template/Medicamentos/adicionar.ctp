<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Medicamentos</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/medicamentos/adicionar">Adicionar</a></li>
			<li><a href="/medicamentos/index">Listar</a></li>
		</ul>
		<form action="/medicamentos/adicionar" class="form-horizontal" method="post" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('nome', 'Nome Medicamento', ['class' => 'col-md-3 control-label']); ?>
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
					<?php 
						echo $this->Form->submit('Enviar', ['class' => 'btn btn-primary btn', 'value' => 'enviar']);
					?>
				</div>
			</div>
		</form>				
	</div>
</div>