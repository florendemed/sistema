<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Doenças</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/doencas/importar">Importar</a></li>
			<li class="active"><a href="/doencas/index">Listar</a></li>
		</ul>
		<div class="well filtros">
			<form action="/doencas/index" class="form-horizontal" id="doencaIndexForm" method="get" accept-charset="utf-8">	
				<fieldset>
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->input('codigo', ['label' => false, 'class' => 'form-control', 'id' => 'nome', 'placeholder' => 'Código', 'value' => @$this->request->query['codigo'] ]); ?>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->input('nome', ['label' => false, 'class' => 'form-control', 'id' => 'nome', 'placeholder' => 'Doença', 'value' => @$this->request->query['nome'] ]); ?>
						</div>
						<div class="col-md-1">
							<?php echo $this->Form->submit('Filtrar', ['class' => 'btn btn-primary btn', 'value' => 'Filtrar']); ?>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<?php if( count($doencas) > 0 ) {?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th><?= $this->Paginator->sort('id') ?></th>
						<th><?= $this->Paginator->sort('codigo', 'Código') ?></th>
						<th><?= $this->Paginator->sort('nome', 'Doença') ?></th>
						<th><?= $this->Paginator->sort('nome50', 'Nome50') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($doencas as $doenca): ?>
					<tr>
						<td><?= h($doenca->id) ?></td>
						<td><?= h($doenca->codigo) ?></td>
						<td><?= h($doenca->nome) ?></td>
						<td><?= h($doenca->nome50) ?></td>
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