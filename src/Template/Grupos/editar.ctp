<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Grupos</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/Grupos/adicionar">Novo</a></li>
			<li><a href="/Grupos/index">Listar</a></li>
		</ul>
		<form action="/Grupos/adicionar" class="form-horizontal" id="GruposAdicionarForm" method="post" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-6">
					<h3>Grupo de Acesso</h3>
					<p class="alert alert-info">Configure a seguir as permissões de acesso para este grupo de usuário. Lembre-se que ao alterar os privilégios do grupo, automatica e imediatamente todos os usuários que pertencem à este grupo terão acesso respeitando as políticas alteradas nesta ação.</p>
					<fieldset>
						<div class="form-group required">
							<?php echo $this->Form->label('GrupoNome', 'Nome', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php 
									echo $this->Form->text('nome', ['class' => 'form-control', 'id' => 'GrupoNome', 'required' => 'required', 'value' => 'Atendente']);
								?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('GrupoPublico', 'Público', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->checkbox('público', ['value' => '1', 'id' => 'GrupoPublico', 'checked' => 'checked']); ?>
							</div>
						</div>	
					</fieldset>
				</div>
				<div class="col-md-6">
					<h3>Controle de Acesso</h3>
					<fieldset>
						<p><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="52" checked="checked" /> Alteração de Status de Cadeiras</p>
						<p><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="18" /> Associação</p>
						<p><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="55" checked="checked" /> Bloqueio de Cadeiras</p>
						<p><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="38" /> Busca de Cadeira</p>
						<p><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="19" /> Cadastro de Sócio</p>
						<p><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="21" checked="checked" /> Carrinho de Compras</p>
						<p><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="154" /> Extrato Contratual</p>
						<p><input type="checkbox" name="data[permissoes][]" id="data[permissoes][]"  value="22" /> Listagem de Movimentações</p>
					</fieldset>
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="col-md-12">
					<input  class="btn btn-lg btn-primary btn" type="submit" value="Salvar"/>
				</div>
			</div>
		</form>
	</div>
</div>
