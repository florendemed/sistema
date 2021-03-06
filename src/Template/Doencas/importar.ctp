<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Doenças / Importar</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/doencas/importar">Importar</a></li>
			<li><a href="/doencas/index">Listar</a></li>
		</ul>
		<p class="alert alert-info">Arquivo <strong>XML</strong> nos padrões abaixo:</p>
		<?php echo $this->Form->create(null, ['enctype' => 'multipart/form-data', 'class' => 'form-horizontal']); ?>
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<div class="form-group required">
							<div class="col-md-8">
								<?php
									echo $this->Form->input('', ['type' => 'file', 'name' => 'DoencasArquivo', 'id' => 'DoencasArquivo']);
								?>
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
