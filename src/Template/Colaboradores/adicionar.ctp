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
							<?php echo $this->Form->label('ColaboradorNome', 'Nome', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->text('nome', ['class' => 'form-control', 'id' => 'ColaboradorNome', 'required' => 'required']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('ColaboradorEmail', 'E-mail', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->text('email', ['class' => 'form-control', 'id' => 'ColaboradorEmail', 'required' => 'required']); ?>
							</div>
						</div>	
						<div class="form-group">
							<?php echo $this->Form->label('ColaboradorLogin', 'Login', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->text('login', ['class' => 'form-control', 'id' => 'ColaboradorLogin']); ?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('ColaboradorSenha', 'Senha', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->password('senha', ['class' => 'form-control', 'id' => 'ColaboradorSenha', 'required' => 'required']); ?>
							</div>
						</div>	
						<div class="form-group required">
							<?php echo $this->Form->label('ColaboradorRptSenha', 'Repita Senha', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->password('rpt_senha', ['class' => 'form-control', 'id' => 'ColaboradorRptSenha', 'required' => 'required']); ?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('ColaboradorNascimento', 'Nascimento', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->text('nascimento', ['class' => 'form-control', 'id' => 'ColaboradorNascimento']); ?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('ColaboradorStatus', 'Ativo', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8"><input name="data[colaborador][status]" id="ColaboradoreStatus" value="0" type="hidden">
								<?php echo $this->Form->checkbox('status', ['value' => 'a', 'id' => 'colaboradorStatus']); ?>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="col-md-12">
					<?php echo $this->Form->submit('Salvar', ['class' => 'btn btn-lg btn-primary btn', 'value' => 'Salvar']); ?>
				</div>
			</div>
		</form>				
	</div>
</div>
