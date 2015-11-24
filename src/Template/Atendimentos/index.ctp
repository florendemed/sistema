<?php
echo $this->Html->scriptBlock("
	$(document).ready(function() {
		$('.date').mask('00/00/0000');
	
	});
");
?>
<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Atendimentos</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/atendimentos/adicionar">Novo</a></li>
			<li class="active"><a href="/atendimentos/index">Listar</a></li>
		</ul>
		<p class="alert alert-info">Clique no <strong>paciente</strong> para editar os registros.</p>
		<div class="well filtros">
			<form action="/atendimentos/index" class="form-horizontal" id="colaboradorIndexForm" method="get" accept-charset="utf-8">	
				<fieldset>
					<div class="row">
						<div class="col-md-2">
							<?php 
								echo $this->Form->text('dataInicio', ['class' => 'form-control date margin-top', 'placeholder' => 'Data Inicial', 'value' => @$this->request->query['dataInicio']]);
							?>
						</div>
						<div class="col-md-2">
							<?php 
								echo $this->Form->text('dataFim', ['class' => 'form-control date margin-top', 'placeholder' => 'Data Final', 'value' => @$this->request->query['dataFim']]);
							?>
						</div>
						<div class="col-md-2">
							Prioridade:
							<?php
								echo $this->Form->input('prioridade', array('label' => false, 'class' => 'form-control', 'options' => $combo_prioridades, 'empty' => 'Todos', 'value' => @$this->request->query['prioridade']));
							?>
						</div>
						<div class="col-md-2">
							Situação:
							<?php
								echo $this->Form->input('situacao', array('label' => false, 'class' => 'form-control', 'options' => $atendimentoStatus, 'empty' => 'Todos', 'value' => @$this->request->query['situacao']));
							?>
						</div>
						<div class="col-md-1">
							<?php 
								echo $this->Form->submit('filtrar', ['class' => 'btn btn-primary btn margin-top', 'value' => 'filtrar']);
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
						<th><?= $this->Paginator->sort('id') ?></th>
						<th><?= $this->Paginator->sort('pacientes_id', 'Paciente') ?></th>
						<th><?= $this->Paginator->sort('colaborador_id', 'Colaborador') ?></th>
						<th><?= $this->Paginator->sort('atendimentos_status_id', 'Situação') ?></th>
						<th><?= $this->Paginator->sort('prioridade') ?></th>
						<th><?= $this->Paginator->sort('created', 'Data Cadastro') ?></th>
						<th><?= $this->Paginator->sort('modified', 'Última Alteração') ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($atendimento as $atendimentos): 
						if ( h($atendimentos->prioridade) == '1' ){
							$prioridade = "Emergencia";
							$class		= "emergencia";
						} else if ( h($atendimentos->prioridade) == '3' ) {
							$prioridade = "Baixa";
							$class		= "baixa";
						}else {
							$prioridade = "Normal";
							$class		= "normal";
						}

					?>
					<tr class="<?= $class ?>">
						<td><a href="/atendimentos/triagem/<?= h($atendimentos->id) ?>" title="Editar"><?= h($atendimentos->id) ?></a></td>
						<td><a href="/atendimentos/triagem/<?= h($atendimentos->id) ?>" title="Editar"><?= h($atendimentos->paciente->nome) ?></a></td>
						<td><a href="/atendimentos/triagem/<?= h($atendimentos->id) ?>" title="Editar"><?= h($atendimentos->colaborador->nome) ?></a></td>
						<td><a href="/atendimentos/triagem/<?= h($atendimentos->id) ?>" title="Editar"><?= h($atendimentos->situacao->nome) ?></a></td>
						<td><a href="/atendimentos/triagem/<?= h($atendimentos->id) ?>" title="Editar"><?= $prioridade ?></a></td>
						<td><a href="/atendimentos/triagem/<?= h($atendimentos->id) ?>" title="Editar"><?= h($atendimentos->created) ?></a></td>
						<td><a href="/atendimentos/triagem/<?= h($atendimentos->id) ?>" title="Editar"><?= h($atendimentos->modified) ?></a></td>
						<td class="actions">
							<a href="/atendimentos/prontuario/<?= h($atendimentos->paciente->id) ?>" title="Prontuário"><span class="fa fa-book"></span></a>
							<a href="/atendimentos/triagem/<?= h($atendimentos->id)?>" title="Iniciar Atendimento"><span class="glyphicon glyphicon-play"></span></a>
							<a href="/atendimentos/editar/<?= h($atendimentos->id)?>" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="/atendimentos/excluir/<?= h($atendimentos->id) ?>" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<p>
		<?php 
			echo $this->Paginator->counter([
				'format' => '<strong>{{count}}</strong> resultado(s) encontrado(s).'
			])
		?>
		</p>
		<ul class="pagination">
			<?php echo $this->Paginator->numbers(['first' => 'Primeira Página']); ?>
		</ul>
		<?php } else { ?>
			<p class="alert alert-warning">Nenhum resultado encontrado.</p>
		<?php }?>
	</div>
</div>