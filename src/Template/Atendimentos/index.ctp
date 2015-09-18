<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Atendimentos</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/atendimentos/adicionar">Novo</a></li>
			<li class="active"><a href="/atendimentos/index">Listar</a></li>
		</ul>
		<p class="alert alert-info">Clique no <strong>nome</strong> para editar os registros.</p>
		<div class="well filtros">
			<form action="/atendimentos/index" class="form-horizontal" id="colaboradorIndexForm" method="get" accept-charset="utf-8">	
				<fieldset>
					<div class="row">
						<div class="col-md-2">
							<?php 
								echo $this->Form->text('nome', ['class' => 'form-control', 'id' => 'dataAtendimentoDe', 'placeholder' => 'Data Inicial']);
							?>
						</div>
						<div class="col-md-2">
							<?php 
								echo $this->Form->text('nome', ['class' => 'form-control', 'id' => 'dataAtendimentoAte', 'placeholder' => 'Data Final']);
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
		<?php if( count($atendimento) > 0 ) {
			?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th><?= $this->Paginator->sort('id') ?></th>
						<th><?= $this->Paginator->sort('pacientes_id', 'Paciente') ?></th>
						<th><?= $this->Paginator->sort('colaborador_id', 'Colaborador') ?></th>
						<th><?= $this->Paginator->sort('atendimentos_status_id', 'Situação') ?></th>
						<th><?= $this->Paginator->sort('status') ?></th>
						<th><?= $this->Paginator->sort('created', 'Data Cadastro') ?></th>
						<th><?= $this->Paginator->sort('modified', 'Última Alteração') ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($atendimento as $atendimentos): 
						if ( h($atendimentos->status) == 'a' ){
							$status = "Ativo";
						} else {
							$status = "Inativo";
						}
					?>
					<tr>
						<td><a href="/atendimentos/editar/" title="Editar"><?= h($atendimentos->id) ?></a></td>
						<td><a href="/atendimentos/editar/" title="Editar"><?= h($atendimentos->paciente->nome) ?></a></td>
						<td><a href="/atendimentos/editar/" title="Editar"><?= h($atendimentos->colaborador->nome) ?></a></td>
						<td><a href="/atendimentos/editar/" title="Editar"><?= h($atendimentos->situacao->nome) ?></a></td>
						<td><a href="/atendimentos/editar/" title="Editar"><?= $status ?></a></td>
						<td><a href="/atendimentos/editar/" title="Editar"><?= h($atendimentos->created) ?></a></td>
						<td><a href="/atendimentos/editar/" title="Editar"><?= h($atendimentos->modified) ?></a></td>
						<td class="actions">
							<a href="/atendimentos/editar/" title="Editar"><span class="glyphicon glyphicon-earphone"></span></a>
							<a href="/atendimentos/editar/" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="/atendimentos/excluir/" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
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
			<?php echo $this->Paginator->numbers(['first' => 'First page']); ?>
		</ul>
		<?php } else { ?>
			<p class="alert alert-warning">Nenhum resultado encontrado.</p>
		<?php }?>
	</div>
</div>