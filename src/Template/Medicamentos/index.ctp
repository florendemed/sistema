<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Medicamentos</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/medicamentos/adicionar">Adicionar</a></li>
			<li class="active"><a href="/medicamentos/index">Listar</a></li>
		</ul>
		<div class="well filtros">
			<form action="/medicamentos/index" class="form-horizontal" id="doencaIndexForm" method="get" accept-charset="utf-8">	
				<fieldset>
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->input('nome', ['label' => false, 'class' => 'form-control', 'id' => 'nome', 'placeholder' => 'Medicamento', 'value' => @$this->request->query['nome'] ]); ?>
						</div>
						<div class="col-md-1">
							<?php echo $this->Form->submit('Filtrar', ['class' => 'btn btn-primary btn', 'value' => 'Filtrar']); ?>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<?php if( count($medicamentos) > 0 ) {?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th><?= $this->Paginator->sort('id') ?></th>
						<th><?= $this->Paginator->sort('nome', 'Medicamentos') ?></th>
						<th><?= $this->Paginator->sort('status') ?></th>
						<th><?= $this->Paginator->sort('created', 'Data Cadastro') ?></th>
						<th><?= $this->Paginator->sort('modified', 'Última Alteração') ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($medicamentos as $medicamento): 
						if ( h($medicamento->status) == 'a' ){
							$status = "Ativo";
						} else {
							$status = "Inativo";
						}
					?>
					<tr>
						<td><a href="/medicamentos/editar/<?= h($medicamento->id) ?>" title="Editar"><?= h($medicamento->id) ?></a></td>
						<td><a href="/medicamentos/editar/<?= h($medicamento->id) ?>" title="Editar"><?= h($medicamento->nome) ?></a></td>
						<td><a href="/medicamentos/editar/<?= h($medicamento->id) ?>" title="Editar"><?= $status ?></a></td>
						<td><a href="/medicamentos/editar/<?= h($medicamento->id) ?>" title="Editar"><?= h($medicamento->created) ?></a></td>
						<td><a href="/medicamentos/editar/<?= h($medicamento->id) ?>" title="Editar"><?= h($medicamento->modified) ?></a></td>
						<td class="actions">
							<a href="/medicamentos/editar/<?= h($medicamento->id) ?>" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="/medicamentos/excluir/<?= h($medicamento->id) ?>" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
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