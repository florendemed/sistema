<div class="modal fade" id="modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Atendimentos / Adicionar</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/atendimentos/adicionar">Novo</a></li>
			<li class=""><a href="/atendimentos/index">Listar</a></li>
		</ul>
		<form action="/atendimentos/index" class="form-horizontal" id="AgendasAdicionarForm" method="post" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<div class="form-group required">
							<label for="nomePaciente" class="col-md-3 control-label">Nome Paciente</label>
							<div class="col-md-9">
								<?php 
									echo $this->Form->text('Nome Paciente', ['class' => 'form-control', 'id' => 'nomePaciente']);
								?>
							</div>
						</div>	
						<div class="form-group required">
							<label for="nomeProfissional" class="col-md-3 control-label">Profissional</label>
							<div class="col-md-9">
								<?php
									$options = ['1' => '', '2' => 'Profissional 1', '3' => 'Profissional 2', '4' => 'Profissional 3', '5' => 'Profissional 4'];
									echo $this->Form->select('profissional', $options,[ 'class' => 'form-control']);		
								?>
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
