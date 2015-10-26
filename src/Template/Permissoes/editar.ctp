<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Permissões / Editar</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/permissoes/adicionar">Novo</a></li>
			<li class="active"><a href="/permissoes/editar/<?= $permissao->id; ?>">Editar</a></li>
			<li><a href="/permissoes/index">Listar</a></li>
		</ul>
		<?php echo $this->Form->create($permissao, ['class' => 'form-horizontal']); ?>
			<?php echo $this->Form->input('id'); ?>
			<div class="row">
				<div class="col-md-6">
					<h3>Dados</h3>
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('nome', 'Nome', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->input('nome', ['label' => false, 'class' => 'form-control']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('ordem', 'Ordem', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->text('ordem', ['label' => false, 'class' => 'form-control']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('permissao_id', 'Permissão Pai', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php
								$selected = false;
								if ( $permissaoSelecionado == $permissaoPai){
									//encontrou no array e marca como checado
									$selected = true;
								}
									echo $this->Form->input('permissao_id', array('label' => false, 'selected' => $selected, 'class' => 'form-control', 'options' => $permissaoPai));
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('menu', 'Menu', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->checkbox('menu', ['label' => false, 'class' => '', 'value' => 's']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('status', 'Status', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->checkbox('status', ['label' => false, 'class' => '', 'value' => 'a']); ?>
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
								<?php echo $this->Form->input('controlador', ['label' => false, 'class' => 'form-control']); ?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('acao', 'Ação', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-10">
								<?php echo $this->Form->input('acao', ['label' => false, 'class' => 'form-control']); ?>
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