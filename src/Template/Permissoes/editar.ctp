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
					<fieldset>
						<div class="form-group required">
							<label for="PermissaoNome" class="col-md-3 control-label">Nome</label>
							<div class="col-md-8">
								<input name="data[Permissao][nome]" maxlength="120" class="form-control" type="text" value="Configurações" id="PermissaoNome" required="required"/>
							</div>
						</div>	
						<div class="form-group required">
							<label for="PermissaoStatus" class="col-md-3 control-label">Ativa</label>
							<div class="col-md-8">
								<input type="hidden" name="data[Permissao][status]" id="PermissaoStatus_" value="0"/>
								<input type="checkbox" name="data[Permissao][status]"  value="a" class="" id="PermissaoStatus" checked="checked"/>
							</div>
						</div>	
						<div class="form-group required">
							<label for="PermissaoMenu" class="col-md-3 control-label">Menu</label>
							<div class="col-md-8">
								<input type="hidden" name="data[Permissao][menu]" id="PermissaoMenu_" value="0"/>
								<input type="checkbox" name="data[Permissao][menu]"  value="1" class="" id="PermissaoMenu" checked="checked"/>
							</div>
						</div>	
						<div class="form-group">
							<label for="PermissaoLista" class="col-md-3 control-label">Lista</label>
							<div class="col-md-8">
								<input type="hidden" name="data[Permissao][lista]" id="PermissaoLista_" value="0"/>
								<input type="checkbox" name="data[Permissao][lista]"  value="1" class="" id="PermissaoLista" checked="checked"/>
							</div>
						</div>
						<div class="form-group required">
							<label for="PermissaoOrdem" class="col-md-3 control-label">Ordem</label>
							<div class="col-md-8">
								<input name="data[Permissao][ordem]" class="form-control" type="number" value="7" id="PermissaoOrdem" required="required"/>
							</div>
						</div>	
						<div class="form-group required">
							<label for="PermissaoPermissoesId" class="col-md-3 control-label">Permissão Pai</label>
							<div class="col-md-8">
								<select name="data[Permissao][permissoes_id]" class="form-control" id="PermissaoPermissoesId">
									<option value="0">Nenhum</option>
									<option value="2" selected="selected">Acessos</option>
									<option value="145">Acessos</option>
									<option value="68">Acompanhamento de Eventos</option>
									<option value="127">Adesivos</option>
									<option value="115">Ajuste Smart</option>
									<option value="76">Alteração de Dados - Endereço</option>
									<option value="117">Alteração de Dados Financeiros</option>
									<option value="162">Alteração de Data de Corte</option>
									<option value="84">Alteração de Modo de Cobrança</option>
									<option value="52">Alteração de Status de Cadeiras</option>
									<option value="172">Alterar Vencimento da Parcela </option>
									<option value="16">Anéis</option>
									<option value="136">Arrecadação</option>
									<option value="18">Associação</option>
									<option value="130">Associações</option>
									<option value="79">Atendimento Jogos</option>
									<option value="114">Auditoria</option>
									<option value="42">Autoriza Reativação de Títulos</option>
									<option value="26">Bancos</option>
									<option value="174">Biometria</option>
									<option value="83">Blocos</option>
									<option value="24">Bloqueio CPF/CNPJ</option>
									<option value="55">Bloqueio de Cadeiras</option>
									<option value="151">Boletos Bancários</option>
									<option value="38">Busca de Cadeira</option>
									<option value="95">Busca de Parcelas</option>
								</select>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-md-6">
					<h3>URL/Rota/Endereçamento</h3>
					<fieldset>
						<div class="form-group">
							<label for="PermissaoPlugin" class="col-md-3 control-label">Plugin</label>
							<div class="col-md-8">
								<input name="data[Permissao][plugin]" maxlength="120" class="form-control" type="text" id="PermissaoPlugin"/>
							</div>
						</div>
						<div class="form-group">
							<label for="PermissaoController" class="col-md-3 control-label">Controlador</label>
							<div class="col-md-8">
								<input name="data[Permissao][controller]" maxlength="120" value="Controlador" class="form-control" type="text" id="PermissaoController"/>
							</div>
						</div>
						<div class="form-group">
							<label for="PermissaoAction" class="col-md-3 control-label">Ação</label>
							<div class="col-md-8">
								<input name="data[Permissao][action]" maxlength="120" class="form-control" type="text" id="PermissaoAction"/>
							</div>
						</div>
						<div class="form-group">
							<label for="PermissaoRoute" class="col-md-3 control-label">Rota</label>
							<div class="col-md-8">
								<input name="data[Permissao][route]" maxlength="150" class="form-control" type="text" id="PermissaoRoute"/>
							</div>
						</div>
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
