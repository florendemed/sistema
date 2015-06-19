<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Permissões</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/permissoes/adicionar">Novo</a></li>
			<li><a href="/permissoes/index">Listar</a></li>
		</ul>
		<form action="/permissoes/adicionar" class="form-horizontal" id="permissoesAdicionarForm" method="post" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-6">
					<h3>Dados</h3>
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('PermissaoNome', 'Nome', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php 
									echo $this->Form->text('nome', ['class' => 'form-control', 'id' => 'PermissaoNome', 'required' => 'required', 'value' => 'Configurações']);
								?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('PermissaoStatus', 'Ativa', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->checkbox('status', ['value' => 'a', 'id' => 'PermissaoStatus', 'checked' => 'checked']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('PermissaoMenu', 'Menu', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->checkbox('menu', ['value' => '1', 'id' => 'PermissaoMenu', 'checked' => 'checked']); ?>
							</div>
						</div>	
						<div class="form-group">
							<?php echo $this->Form->label('PermissaoLista', 'Lista', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->checkbox('lista', ['value' => '1', 'id' => 'PermissaoLista', 'checked' => 'checked']); ?>
							</div>
						</div>
						<div class="form-group required">
							<label for="PermissaoOrdem" class="col-md-3 control-label">Ordem</label>
							<div class="col-md-8">
								<input name="data[Permissao][ordem]" class="form-control" type="number" value="7" id="PermissaoOrdem" required="required"/>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('PermissaoPermissoesId', 'Permissão Pai', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php 
									$options = [ 
										'0' => 'Nenhum',  
										'1' => 'Permissão 1', 
										'2' => 'Permissão 2', 
										'3' => 'Permissão 3', 
										'4' => 'Permissão 4', 
										'5' => 'Permissão 5', 
										'6' => 'Permissão 6', 
										'7' => 'Permissão 7', 
										'8' => 'Permissão 8' 
									];
									echo $this->Form->select('PermissaoPermissoesId', $options, [ 'class' => 'form-control' ]);
								?>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-md-6">
					<h3>URL/Rota/Endereçamento</h3>
					<fieldset>
						<div class="form-group">
							<?php echo $this->Form->label('PermissaoPlugin', 'Plugin', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php 
									echo $this->Form->text('plugin', ['class' => 'form-control', 'id' => 'PermissaoPlugin', 'value' => '']);
								?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('PermissaoController', 'Controlador', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php 
									echo $this->Form->text('controlador', ['class' => 'form-control', 'id' => 'PermissaoController', 'value' => 'Controlador']);
								?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('PermissaoAction', 'Ação', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php 
									echo $this->Form->text('ação', ['class' => 'form-control', 'id' => 'PermissaoAction', 'value' => '']);
								?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('PermissaoRoute', 'Rota', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php 
									echo $this->Form->text('ação', ['class' => 'form-control', 'id' => 'PermissaoRoute', 'value' => '']);
								?>
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
