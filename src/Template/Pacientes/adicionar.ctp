<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Pacientes</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/Pacientes/adicionar">Novo</a></li>
			<li><a href="/Pacientes/index">Listar</a></li>
		</ul>
		<form action="/Pacientes/adicionar" class="form-horizontal" id="PacientesAdicionarForm" method="post" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<div class="form-group required">
							<label for="PacienteNome" class="col-md-3 control-label">Nome</label>
							<div class="col-md-8">
								<input name="data[Paciente][nome]" maxlength="255" class="form-control" type="text" id="PacienteNome" required="required"/>
							</div>
						</div>	
						<div class="form-group required">
							<label for="PacienteEmail" class="col-md-3 control-label">E-mail</label>
							<div class="col-md-8">
								<input name="data[Paciente][email]" maxlength="255" class="form-control" type="text" id="PacienteEmail" required="required"/>
							</div>
						</div>	
						<div class="form-group">
							<label for="PacienteLogin" class="col-md-3 control-label">Login</label>
							<div class="col-md-8">
								<input name="data[Paciente][login]" maxlength="120" class="form-control" id="PacienteLogin" type="text">
							</div>
						</div>
						<div class="form-group required">
							<label for="PacienteSenha" class="col-md-3 control-label">Senha</label>
							<div class="col-md-8">
								<input name="data[Paciente][senha]" class="form-control" id="PacienteSenha" required="required" type="password">
							</div>
						</div>	
						<div class="form-group required">
							<label for="PacienteRptSenha" class="col-md-3 control-label">Repita Senha</label>
							<div class="col-md-8">
								<input name="data[Paciente][rpt_senha]" class="form-control" id="PacienteRptSenha" required="required" type="password">
							</div>
						</div>
						<div class="form-group">
							<label for="PacienteNascimento" class="col-md-3 control-label">Nascimento</label>
							<div class="col-md-8">
								<input name="data[Paciente][nascimento]" class="form-control" value="" id="PacienteNascimento" type="text">
							</div>
						</div>
						<div class="form-group">
							<label for="PacienteStatus" class="col-md-3 control-label">Ativo</label>
							<div class="col-md-8"><input name="data[Paciente][status]" id="PacienteStatus_" value="0" type="hidden">
								<input name="data[Paciente][status]" value="a" class="" id="PacienteStatus" checked="checked" type="checkbox">
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
