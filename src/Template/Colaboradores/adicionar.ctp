<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Colaboradores</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/colaboradores/adicionar">Novo</a></li>
			<li><a href="/colaboradores/index">Listar</a></li>
		</ul>
		<form action="/colaboradores/adicionar" class="form-horizontal" id="ColaboradoresAdicionarForm" method="post" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<div class="form-group required">
							<label for="ColaboradorNome" class="col-md-3 control-label">Nome</label>
							<div class="col-md-8">
								<input name="data[colaborador][nome]" maxlength="255" class="form-control" type="text" id="ColaboradorNome" required="required"/>
							</div>
						</div>	
						<div class="form-group required">
							<label for="ColaboradorEmail" class="col-md-3 control-label">E-mail</label>
							<div class="col-md-8">
								<input name="data[colaborador][email]" maxlength="255" class="form-control" type="text" id="ColaboradorEmail" required="required"/>
							</div>
						</div>	
						<div class="form-group">
							<label for="ColaboradorLogin" class="col-md-3 control-label">Login</label>
							<div class="col-md-8">
								<input name="data[colaborador][login]" maxlength="120" class="form-control" id="ColaboradorLogin" type="text">
							</div>
						</div>
						<div class="form-group required">
							<label for="ColaboradorSenha" class="col-md-3 control-label">Senha</label>
							<div class="col-md-8">
								<input name="data[colaborador][senha]" class="form-control" id="ColaboradorSenha" required="required" type="password">
							</div>
						</div>	
						<div class="form-group required">
							<label for="ColaboradorRptSenha" class="col-md-3 control-label">Repita Senha</label>
							<div class="col-md-8">
								<input name="data[Colaborador][rpt_senha]" class="form-control" id="ColaboradorRptSenha" required="required" type="password">
							</div>
						</div>
						<div class="form-group">
							<label for="ColaboradorNascimento" class="col-md-3 control-label">Nascimento</label>
							<div class="col-md-8">
								<input name="data[colaborador][nascimento]" class="form-control" value="" id="ColaboradorNascimento" type="text">
							</div>
						</div>
						<div class="form-group">
							<label for="ColaboradorStatus" class="col-md-3 control-label">Ativo</label>
							<div class="col-md-8"><input name="data[colaborador][status]" id="ColaboradoreStatus" value="0" type="hidden">
								<input name="data[colaborador][status]" value="a" class="" id="ColaboradoreStatus" checked="checked" type="checkbox">
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
