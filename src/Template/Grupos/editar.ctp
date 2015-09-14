<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Grupos</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/Grupos/adicionar">Novo</a></li>
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
						<p><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="52" /> Alteração de Status de Cadeiras</p>
						<p><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="18" /> Associação</p>
						<p class="int1"><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="55" /> Bloqueio de Cadeiras</p>
						<p class="int1"><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="38" /> Busca de Cadeira</p>
						<p class="int1"><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="19" /> Cadastro de Sócio</p>
						<p class="int1"><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="21" /> Carrinho de Compras</p>
						<p class="int1"><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="54" /> Correção de Cadastro</p>
						<p class="int1"><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="90" /> Editar Indicação no Contrato</p>
						<p class="int1"><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="156" /> Extrato Comercial</p>
						<p class="int1"><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="154" /> Extrato Contratual</p>
						<p class="int1"><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="22" /> Listagem de Movimentações</p>
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