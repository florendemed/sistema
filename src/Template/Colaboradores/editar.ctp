<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Colaboradores</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/colaboradores/adicionar">Novo</a></li>
			<li><a href="/colaboradores/index">Listar</a></li>
		</ul>
		<form action="" class="form-horizontal" id="colaboradorEditarForm" method="post" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<input type="hidden" name="data[colaborador][id]" class="form-control" value="1" id="colaboradorId"/>
						<div class="form-group required">
							<label for="colaboradorNome" class="col-md-3 control-label">Nome</label>
							<div class="col-md-8">
								<input name="data[colaborador][nome]" maxlength="255" class="form-control" type="text" value="teste" id="colaboradorNome" required="required"/>
							</div>
						</div>
						<div class="form-group">
							<label for="colaboradorSenha" class="col-md-3 control-label">Senha</label>
							<div class="col-md-8">
								<input name="data[colaborador][senha]" class="form-control" type="password" id="colaboradorSenha"/>
							</div>
						</div>
						<div class="form-group">
							<label for="colaboradorRptSenha" class="col-md-3 control-label">Repita Senha</label>
							<div class="col-md-8">
								<input name="data[colaborador][rpt_senha]" class="form-control" type="password" id="colaboradorRptSenha"/>
							</div>
						</div>
						<div class="form-group">
							<label for="colaboradorLogin" class="col-md-3 control-label">Login</label>
							<div class="col-md-8">
								<input name="data[colaborador][login]" maxlength="120" class="form-control" type="text" value="teste" id="colaboradorLogin"/>
							</div>
						</div>
						<div class="form-group required">
							<label for="colaboradorEmail" class="col-md-3 control-label">Email</label>
							<div class="col-md-8">
								<input name="data[colaborador][email]" maxlength="255" class="form-control" type="email" value="teste@teste.com.br" id="colaboradorEmail" required="required"/>
							</div>
						</div>
						<div class="form-group">
							<label for="colaboradorNascimento" class="col-md-3 control-label">Nascimento</label>
							<div class="col-md-8">
								<input name="data[colaborador][nascimento]" class="form-control" type="text" value="27/12/1982" id="colaboradorNascimento"/>
							</div>
						</div>
						<div class="form-group">
							<label for="colaboradorStatus" class="col-md-3 control-label">Ativa</label>
							<div class="col-md-8">
								<input type="hidden" name="data[colaborador][status]" id="colaboradorStatus_" value="0"/>
								<input type="checkbox" name="data[colaborador][status]"  value="a" class="" id="colaboradorStatus" checked="checked"/>
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
