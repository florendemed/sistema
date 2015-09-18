<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Grupos</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/grupos/adicionar">Novo</a></li>
			<li class="active"><a href="/grupos/index">Listar</a></li>
		</ul>
		<p class="alert alert-info">Clique no <strong>nome</strong> para editar os registros.</p>
		<div class="well filtros">
			<form action="/grupos/index" class="form-horizontal" method="get" accept-charset="utf-8">	
				<fieldset>
					<div class="row">
						<div class="col-md-2">
							<?php echo $this->Form->text('nome', ['class' => 'form-control', 'placeholder' => 'Nome grupo']); ?>
						</div>
						<div class="col-md-1">
							<?php echo $this->Form->submit('filtrar', ['class' => 'btn btn-primary btn', 'value' => 'filtrar']); ?>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<?php if( count($grupos) > 0 ) {?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th><?= $this->Paginator->sort('id') ?></th>
						<th><?= $this->Paginator->sort('nome') ?></th>
						<th><?= $this->Paginator->sort('restrito', 'Público') ?></th>
						<th><?= $this->Paginator->sort('status') ?></th>
						<th><?= $this->Paginator->sort('created', 'Data Cadastro') ?></th>
						<th><?= $this->Paginator->sort('modified', 'Última Alteração') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($grupos as $grupo): 
					if ( h($grupo->status) == 'a' ){
						$status = "Ativo";
					} else {
						$status = "Inativo";
					}
					
					if ( h($grupo->restrito) == 's' ){
						$restrito = "Sim";
					} else {
						$restrito = "Não";
					}
					?>
					<tr>
						<td><a href="/grupos/editar/<?= h($grupo->id) ?>" title="Editar"><?= h($grupo->id) ?></a></td>
						<td><a href="/grupos/editar/<?= h($grupo->id) ?>" title="Editar"><?= h($grupo->nome) ?></a></td>
						<td><a href="/grupos/editar/<?= h($grupo->id) ?>" title="Editar"><?= h($restrito) ?></a></td>
						<td><a href="/grupos/editar/<?= h($grupo->id) ?>" title="Editar"><?= $status ?></a></td>
						<td><a href="/grupos/editar/<?= h($grupo->id) ?>" title="Editar"><?= h($grupo->created) ?></a></td>
						<td><a href="/grupos/editar/<?= h($grupo->id) ?>" title="Editar"><?= h($grupo->modified) ?></a></td>
						<td class="actions">
							<a href="/grupos/editar/<?= h($grupo->id) ?>" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="/grupos/excluir/<?= h($grupo->id) ?>" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
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