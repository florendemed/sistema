<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Pacientes</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/pacientes/adicionar">Novo</a></li>
			<li><a href="/pacientes/index">Listar</a></li>
		</ul>
		<form action="" class="form-horizontal" id="PacienteEditarForm" method="post" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<input type="hidden" name="data[Paciente][id]" class="form-control" value="1" id="PacienteId"/>
						<div class="form-group required">
							<label for="PacienteNome" class="col-md-3 control-label">Nome</label>
							<div class="col-md-8">
								<input name="data[Paciente][nome]" maxlength="255" class="form-control" type="text" value="teste" id="PacienteNome" required="required"/>
							</div>
						</div>
						<div class="form-group">
							<label for="pacientesenha" class="col-md-3 control-label">Senha</label>
							<div class="col-md-8">
								<input name="data[Paciente][senha]" class="form-control" type="password" id="pacientesenha"/>
							</div>
						</div>
						<div class="form-group">
							<label for="PacienteRptSenha" class="col-md-3 control-label">Repita Senha</label>
							<div class="col-md-8">
								<input name="data[Paciente][rpt_senha]" class="form-control" type="password" id="PacienteRptSenha"/>
							</div>
						</div>
						<div class="form-group">
							<label for="PacienteLogin" class="col-md-3 control-label">Login</label>
							<div class="col-md-8">
								<input name="data[Paciente][login]" maxlength="120" class="form-control" type="text" value="teste" id="PacienteLogin"/>
							</div>
						</div>
						<div class="form-group required">
							<label for="PacienteEmail" class="col-md-3 control-label">Email</label>
							<div class="col-md-8">
								<input name="data[Paciente][email]" maxlength="255" class="form-control" type="email" value="teste@teste.com.br" id="PacienteEmail" required="required"/>
							</div>
						</div>
						<div class="form-group">
							<label for="PacienteNascimento" class="col-md-3 control-label">Nascimento</label>
							<div class="col-md-8">
								<input name="data[Paciente][nascimento]" class="form-control" type="text" value="27/12/1982" id="PacienteNascimento"/>
							</div>
						</div>
						<div class="form-group">
							<label for="pacientestatus" class="col-md-3 control-label">Ativa</label>
							<div class="col-md-8">
								<input type="hidden" name="data[Paciente][status]" id="pacientestatus_" value="0"/>
								<input type="checkbox" name="data[Paciente][status]"  value="a" class="" id="pacientestatus" checked="checked"/>
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
