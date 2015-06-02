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
							<label for="GrupoNome" class="col-md-3 control-label">Nome</label>
							<div class="col-md-8">
								<input name="data[Grupo][nome]" maxlength="45" class="form-control" type="text" id="GrupoNome" required="required"/>
							</div>
						</div>
						<div class="form-group">
							<label for="GrupoPublico" class="col-md-3 control-label">Público</label>
							<div class="col-md-8">
								<input type="hidden" name="data[Grupo][publico]" id="GrupoPublico_" value="0"/>
								<input type="checkbox" name="data[Grupo][publico]"  value="1" class="" id="GrupoPublico"/></label>
							</div>
						</div>	
					</fieldset>
				</div>
				<div class="col-md-6">
					<h3>Controle de Acesso</h3>
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
					<input  class="btn btn-lg btn-primary btn" type="submit" value="Salvar"/>
				</div>
			</div>
		</form>				
	</div>
</div>
