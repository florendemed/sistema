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
							<?php echo $this->Form->label('colaboradorNome', 'Nome', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php 
									echo $this->Form->text('nome', ['class' => 'form-control', 'id' => 'colaboradorNome', 'required' => 'required', 'value' => 'Teste']);
								?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('colaboradorSenha', 'Senha', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php 
									echo $this->Form->password('senha', ['class' => 'form-control', 'id' => 'colaboradorSenha']);
								?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('colaboradorRptSenha', 'Repita Senha', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php 
									echo $this->Form->password('rpt_senha', ['class' => 'form-control', 'id' => 'colaboradorRptSenha']);
								?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('colaboradorLogin', 'Login', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php 
									echo $this->Form->password('rpt_senha', ['class' => 'form-control', 'id' => 'colaboradorRptSenha']);
								?>
							</div>
						</div>
						<div class="form-group required">
							<?php echo $this->Form->label('email', 'Email', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php 
									echo $this->Form->text('Email', ['class' => 'form-control', 'id' => 'colaboradorEmail', 'value' => 'teste@teste.com.br']);
								?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('colaboradorNascimento', 'Nascimento', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php 
									echo $this->Form->text('nascimento', ['class' => 'form-control', 'id' => 'colaboradorNascimento', 'value' => '27/12/1982']);
								?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('colaboradorStatus', 'Ativa', ['class' => 'col-md-3 control-label']); ?>
							<div class="col-md-8">
								<?php echo $this->Form->checkbox('status', ['value' => 'a', 'id' => 'colaboradorStatus', 'checked' => 'checked']); ?>
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
