<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Prontuários</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/prontuarios/adicionar">Novo</a></li>
			<li><a href="/prontuarios/index">Listar</a></li>
		</ul>
		<form action="" class="form-horizontal" id="ProntuarioEditarForm" method="post" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<input type="hidden" name="data[Prontuario][id]" class="form-control" value="1" id="ProntuarioId"/>
						<div class="form-group required">
							<label for="ProntuarioNome" class="col-md-3 control-label">Nome</label>
							<div class="col-md-8">
								<input name="data[Prontuario][nome]" maxlength="255" class="form-control" type="text" value="teste" id="ProntuarioNome" required="required"/>
							</div>
						</div>
						<div class="form-group">
							<label for="prontuariosenha" class="col-md-3 control-label">Senha</label>
							<div class="col-md-8">
								<input name="data[Prontuario][senha]" class="form-control" type="password" id="prontuariosenha"/>
							</div>
						</div>
						<div class="form-group">
							<label for="ProntuarioRptSenha" class="col-md-3 control-label">Repita Senha</label>
							<div class="col-md-8">
								<input name="data[Prontuario][rpt_senha]" class="form-control" type="password" id="ProntuarioRptSenha"/>
							</div>
						</div>
						<div class="form-group">
							<label for="ProntuarioLogin" class="col-md-3 control-label">Login</label>
							<div class="col-md-8">
								<input name="data[Prontuario][login]" maxlength="120" class="form-control" type="text" value="teste" id="ProntuarioLogin"/>
							</div>
						</div>
						<div class="form-group required">
							<label for="ProntuarioEmail" class="col-md-3 control-label">Email</label>
							<div class="col-md-8">
								<input name="data[Prontuario][email]" maxlength="255" class="form-control" type="email" value="teste@teste.com.br" id="ProntuarioEmail" required="required"/>
							</div>
						</div>
						<div class="form-group">
							<label for="ProntuarioNascimento" class="col-md-3 control-label">Nascimento</label>
							<div class="col-md-8">
								<input name="data[Prontuario][nascimento]" class="form-control" type="text" value="27/12/1982" id="ProntuarioNascimento"/>
							</div>
						</div>
						<div class="form-group">
							<label for="prontuariostatus" class="col-md-3 control-label">Ativa</label>
							<div class="col-md-8">
								<input type="hidden" name="data[Prontuario][status]" id="prontuariostatus_" value="0"/>
								<input type="checkbox" name="data[Prontuario][status]"  value="a" class="" id="prontuariostatus" checked="checked"/>
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
