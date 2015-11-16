<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Relatórios / Atendimentos por Perído</li>
		</ul>
		<div class="well filtros">
			<form action="/Relatorios/atendimentos" class="form-horizontal" id="colaboradorIndexForm" method="get" accept-charset="utf-8">	
				<fieldset>
					<div class="row">
						<div class="col-md-2">
							<?php 
								echo $this->Form->text('dataInicio', ['class' => 'form-control date', 'placeholder' => 'Data Inicial']);
							?>
						</div>
						<div class="col-md-2">
							<?php 
								echo $this->Form->text('dataFim', ['class' => 'form-control date', 'placeholder' => 'Data Final']);
							?>
						</div>
						<div class="col-md-2">
							<?php
								echo $this->Form->input('prioridade', array('label' => false, 'first' => 'Todos', 'class' => 'form-control', 'options' => $combo_prioridades_pesquisa));
							?>
						</div>
						<div class="col-md-1">
							<?php 
								echo $this->Form->submit('filtrar', ['class' => 'btn btn-primary btn', 'value' => 'filtrar']);
							?>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<?php if( count($atendimento) > 0 ) { ?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Paciente</th>
						<th>Colaborador</th>
						<th>Status</th>
						<th>Prioridade</th>
						<th>Data Atendimento</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($atendimento as $at): 
						if ( h($at->status) == 'a' ){
							$status = "Ativo";
						} else {
							$status = "Inativo";
						}
						
						if ( h($at->prioridade) == '1' ){
							$prioridade = "Emergencia";
						} else if ( h($at->prioridade) == '3' ) {
							$prioridade = "Baixa";
						}else {
							$prioridade = "Normal";
						}
					?>
					<tr>
						<td><?= h($at->id) ?></td>
						<td><?= h($at->paciente->nome) ?></td>
						<td><?= h($at->colaborador->nome) ?></td>
						<td><?= h($status) ?></td>
						<td><?= h($prioridade) ?></td>
						<td><?= h($at->created) ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php } else { ?>
			<p class="alert alert-warning">Nenhum resultado encontrado.</p>
		<?php }?>
		<div id="chart_div"></div>
	</div>
</div>