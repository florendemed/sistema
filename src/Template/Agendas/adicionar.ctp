<div class="modal fade" id="modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Agenda / Adicionar</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/colaboradores/adicionar">Novo</a></li>
		</ul>
		<form action="/agendas/adicionar" class="form-horizontal" id="AgendasAdicionarForm" method="post" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<div class="form-group required">
							<label for="AgendasDataHora" class="col-md-3 control-label">Data/Hora</label>
							<div class="col-md-8">
								<div class="input-group">
									<?php 
										echo $this->Form->text('DataHora', ['class' => 'form-control', 'value' => $this->request->params['pass'][0]]);
									?>
								</div>
							</div>
						</div>	
						<div class="form-group required">
							<label for="AgendasProfissional" class="col-md-3 control-label">Profissional</label>
							<div class="col-md-8">
								<div class="input-group">
									<?php
										$options = ['1' => 'Profissional 1', '2' => 'Profissional 2', '3' => 'Profissional 3', '4' => 'Profissional 4'];
										echo $this->Form->select('profissional', $options,[ 'class' => 'form-control', 'value' => $this->request->params['pass'][1]]);		
									?>
								</div>
							</div>
						</div>	
						<div class="form-group required">
							<label for="AgendasPaciente" class="col-md-3 control-label">CPF Paciente</label>
							<div class="col-md-8">
								<div class="input-group">
									<?php 
										echo $this->Form->text('agendaPaciente', ['class' => 'form-control']);
									?>
									<span class="input-group-btn">
										<a class="btn btn-primary" id="pacientesAdicionar" data-toggle="modal" href="/pacientes/adicionar/adicionar_modal/" data-target="#modal" title="Adicionar novo paciente"><span class="glyphicon glyphicon-plus"></span></a>
									</span>
								</div>
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
