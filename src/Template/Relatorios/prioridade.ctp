<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Relatórios / Atendimentos por Prioridade</li>
		</ul>
		<div class="well filtros">
			<form action="/Relatorios/prioridade" class="form-horizontal" id="colaboradorIndexForm" method="get" accept-charset="utf-8">	
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
		<?php if( count($query) > 0 ) { ?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Prioridade</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?= h($query->id) ?></td>
						<td><?= h($query->atendimentos_status_id) ?></td>
						<td><?= h($query->total) ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php } else { ?>
			<p class="alert alert-warning">Nenhum resultado encontrado.</p>
		<?php }?>
		<div id="chart_div"></div>
	</div>
</div>