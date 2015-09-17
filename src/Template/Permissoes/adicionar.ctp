<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Permissões</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/permissoes/adicionar">Novo</a></li>
			<li><a href="/permissoes/index">Listar</a></li>
		</ul>
		<form action="/permissoes/adicionar" class="form-horizontal" method="post" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-6">
					<h3>Dados</h3>
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('nome', 'Nome', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->text('nome', ['class' => 'form-control']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('ordem', 'Ordem', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->text('ordem', ['class' => 'form-control']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('permissao_pai', 'Permissão Pai', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php
									echo $this->Form->input('permissao_pai', array('label' => false, 'class' => 'form-control', 'options' => $permissaoPai));
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('menu', 'Menu', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->checkbox('menu', ['id' => 'PermissaoMenu']); ?>
							</div>
						</div>	
					</fieldset>
				</div>
				<div class="col-md-6">
					<h3>URL/Endereçamento</h3>
					<fieldset>
						<div class="form-group">
							<?php echo $this->Form->label('controlador', 'Controlador', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-10">
								<?php echo $this->Form->text('controlador', ['class' => 'form-control']); ?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('acao', 'Ação', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-10">
								<?php echo $this->Form->text('acao', ['class' => 'form-control']); ?>
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
		</form>				
	</div>
</div>
