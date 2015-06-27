<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Prontuários</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/prontuarios/adicionar">Dados Paciente</a></li>
			<li><a href="/prontuarios/anamnese">Anamnese</a></li>
			<li class="active"><a href="/prontuarios/diagnostico">Diagnóstico</a></li>
			<li><a href="/prontuarios/prescricao">Prescrição</a></li>
			<li><a href="/prontuarios/receita">Receita</a></li>
			<li><a href="/prontuarios/atestado">Atestado</a></li>
		</ul>
		<form action="/prontuarios/adicionar" class="form-horizontal" id="prontuariosAdicionarForm" method="post" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<div class="form-group required">
							<label for="prontuarioeNome" class="col-md-3 control-label">Nome</label>
							<div class="col-md-8">
								<input name="data[prontuarioe][nome]" maxlength="255" class="form-control" type="text" id="prontuarioeNome" required="required"/>
							</div>
						</div>	
						<div class="form-group required">
							<label for="prontuarioeEmail" class="col-md-3 control-label">E-mail</label>
							<div class="col-md-8">
								<input name="data[prontuarioe][email]" maxlength="255" class="form-control" type="text" id="prontuarioeEmail" required="required"/>
							</div>
						</div>	
						<div class="form-group">
							<label for="prontuarioeLogin" class="col-md-3 control-label">Login</label>
							<div class="col-md-8">
								<input name="data[prontuarioe][login]" maxlength="120" class="form-control" id="prontuarioeLogin" type="text">
							</div>
						</div>
						<div class="form-group required">
							<label for="prontuariosenha" class="col-md-3 control-label">Senha</label>
							<div class="col-md-8">
								<input name="data[prontuarioe][senha]" class="form-control" id="prontuariosenha" required="required" type="password">
							</div>
						</div>	
						<div class="form-group required">
							<label for="prontuarioeRptSenha" class="col-md-3 control-label">Repita Senha</label>
							<div class="col-md-8">
								<input name="data[prontuarioe][rpt_senha]" class="form-control" id="prontuarioeRptSenha" required="required" type="password">
							</div>
						</div>
						<div class="form-group">
							<label for="prontuarioeNascimento" class="col-md-3 control-label">Nascimento</label>
							<div class="col-md-8">
								<input name="data[prontuarioe][nascimento]" class="form-control" value="" id="prontuarioeNascimento" type="text">
							</div>
						</div>
						<div class="form-group">
							<label for="prontuariostatus" class="col-md-3 control-label">Ativo</label>
							<div class="col-md-8"><input name="data[prontuarioe][status]" id="prontuariostatus_" value="0" type="hidden">
								<input name="data[prontuarioe][status]" value="a" class="" id="prontuariostatus" checked="checked" type="checkbox">
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
