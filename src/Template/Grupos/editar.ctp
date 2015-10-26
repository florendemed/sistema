<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Grupos / Editar</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/Grupos/adicionar">Novo</a></li>
			<li class="active"><a href="/Grupos/editar/<?= $grupo->id; ?>">Editar</a></li>
			<li><a href="/Grupos/index">Listar</a></li>
		</ul>
		<?php echo $this->Form->create($grupo, ['class' => 'form-horizontal']); ?>
			<?php echo $this->Form->input('id'); ?>
			<div class="row">
				<div class="col-md-6">
					<h3>Grupo de Acesso</h3>
					<p class="alert alert-info">Configure a seguir as permissões de acesso para este grupo de usuário. Lembre-se que ao alterar os privilégios do grupo, automatica e imediatamente todos os usuários que pertencem à este grupo terão acesso respeitando as políticas alteradas nesta ação.</p>
					<h3>Dados</h3>
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('nome', 'Nome', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-10">
								<?php echo $this->Form->text('nome', ['label' => false, 'class' => 'form-control']); ?>
							</div>
						</div>	
						<div class="form-group">
							<?php echo $this->Form->label('restrito', 'Público', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-10">
								<?php echo $this->Form->checkbox('restrito', ['label' => false, 'value' => 's']); ?>
							</div>
						</div>	
						<div class="form-group">
							<?php echo $this->Form->label('status', 'Status', ['class' => 'col-md-2 control-label']); ?>
							<div class="col-md-10">
								<?php echo $this->Form->checkbox('status', ['label' => false, 'value' => 'a']); ?>
							</div>
						</div>	
					</fieldset>
				</div>
				<div class="col-md-6">
					<h3>Permissões</h3>
					<fieldset>
						<?php 
						foreach ($permissoes as $i => $permissao) :
							$checked = false;
							if ( in_array($permissao['id'], $checados) ){
								//encontrou no array e marca como checado
								$checked = true;
							}
							echo '<div>'.$this->Form->checkbox('permissao.nome.'.$i, ['label' => false, 'checked' => $checked, 'value' => @$permissao['id'], 'div' => false]);
							echo ' '.$permissao['nome'].'</div>';
						endforeach; 
						?>
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