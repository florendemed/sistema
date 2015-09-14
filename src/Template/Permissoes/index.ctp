<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Permissões</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/permissoes/adicionar">Novo</a></li>
			<li class="active"><a href="/permissoes/index">Listar</a></li>
		</ul>
		<p class="alert alert-info">Clique no <strong>nome</strong> para editar os registros.</p>
		<div class="well filtros">
			<form action="/permissoes/index" class="form-horizontal" method="get" accept-charset="utf-8">	
				<fieldset>
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->text('nome', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Nome permissão', 'value' => @$this->request->query['nome']]); ?>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->text('controlador', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Controlador', 'value' => @$this->request->query['controlador']]); ?>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->text('acao', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Ação', 'value' => @$this->request->query['acao']]); ?>
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
		<?php if( count($permissoes) > 0 ) {?>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th><?= $this->Paginator->sort('id') ?></th>
					<th><?= $this->Paginator->sort('nome') ?></th>
					<th><?= $this->Paginator->sort('permissao_pai', 'permissão pai') ?></th>
					<th><?= $this->Paginator->sort('controlador') ?></a></th>
					<th><?= $this->Paginator->sort('acao', 'ação') ?></th>
					<th><?= $this->Paginator->sort('menu') ?></th>
					<th><?= $this->Paginator->sort('status') ?></th>
					<th><?= $this->Paginator->sort('created', 'Data Cadastro') ?></th>
					<th><?= $this->Paginator->sort('modified', 'Última Alteração') ?></th>
					<th class="actions"></th> 	 
				</tr>
			</thead>
			<tbody>
				<?php foreach ($permissoes as $permissao): 
				if ( h($permissao->status) == 'a' ){
					$status = "Ativo";
				} else {
					$status = "Inativo";
				}
				
				if ( h($permissao->menu) == 's' ){
					$menu = "Sim";
				} else {
					$menu = "Não";
				}
				?>
				<tr>
					<td><a href="/permissoes/editar/<?= h($permissao->id) ?>" title="Editar"><?= h($permissao->id) ?></a></td>
					<td><a href="/permissoes/editar/<?= h($permissao->id) ?>" title="Editar"><?= h($permissao->nome) ?></a></td>
					<td><a href="/permissoes/editar/<?= h($permissao->id) ?>" title="Editar"><?= h($permissao->permissao_pai) ?></a></td>
					<td><a href="/permissoes/editar/<?= h($permissao->id) ?>" title="Editar"><?= h($permissao->controlador) ?></a></td>
					<td><a href="/permissoes/editar/<?= h($permissao->id) ?>" title="Editar"><?= h($permissao->acao) ?></a></td>
					<td><a href="/permissoes/editar/<?= h($permissao->id) ?>" title="Editar"><?= h($menu) ?></a></td>
					<td><a href="/permissoes/editar/<?= h($permissao->id) ?>" title="Editar"><?= $status ?></a></td>
					<td><a href="/permissoes/editar/<?= h($permissao->id) ?>" title="Editar"><?= h($permissao->created) ?></a></td>
					<td><a href="/permissoes/editar/<?= h($permissao->id) ?>" title="Editar"><?= h($permissao->modified) ?></a></td>
					<td class="actions">
						<a href="/permissoes/editar/<?= h($permissao->id) ?>" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="/permissoes/excluir/<?= h($permissao->id) ?>" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
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