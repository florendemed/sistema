<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Exames</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/exames/adicionar">Novo</a></li>
			<li class="active"><a href="/exames/index">Listar</a></li>
		</ul>
		<p class="alert alert-info">Clique no <strong>exame</strong> para editar os registros.</p>
		<div class="well filtros">
			<form action="/exames/index" class="form-horizontal" id="doencaIndexForm" method="get" accept-charset="utf-8">	
				<fieldset>
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->input('nome', ['label' => false, 'class' => 'form-control', 'id' => 'nome', 'placeholder' => 'Exame', 'value' => @$this->request->query['nome'] ]); ?>
						</div>
						<div class="col-md-1">
							<?php echo $this->Form->submit('Filtrar', ['class' => 'btn btn-primary btn', 'value' => 'Filtrar']); ?>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<?php if( count($exames) > 0 ) {?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th><?= $this->Paginator->sort('id') ?></th>
						<th><?= $this->Paginator->sort('nome', 'Exames') ?></th>
						<th><?= $this->Paginator->sort('status') ?></th>
						<th><?= $this->Paginator->sort('created', 'Data Cadastro') ?></th>
						<th><?= $this->Paginator->sort('modified', 'Última Alteração') ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($exames as $exame): 
						if ( h($exame->status) == 'a' ){
							$status = "Ativo";
						} else {
							$status = "Inativo";
						}
					?>
					<tr>
						<td><a href="/exames/editar/<?= h($exame->id) ?>" title="Editar"><?= h($exame->id) ?></a></td>
						<td><a href="/exames/editar/<?= h($exame->id) ?>" title="Editar"><?= h($exame->nome) ?></a></td>
						<td><a href="/exames/editar/<?= h($exame->id) ?>" title="Editar"><?= $status ?></a></td>
						<td><a href="/exames/editar/<?= h($exame->id) ?>" title="Editar"><?= h($exame->created) ?></a></td>
						<td><a href="/exames/editar/<?= h($exame->id) ?>" title="Editar"><?= h($exame->modified) ?></a></td>
						<td class="actions">
							<a href="/exames/editar/<?= h($exame->id) ?>" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="/exames/excluir/<?= h($exame->id) ?>" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
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