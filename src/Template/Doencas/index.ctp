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
							<?php echo $this->Form->input('nome', ['label' => false, 'class' => 'form-control', 'id' => 'nome', 'placeholder' => 'Nome', 'value' => @$this->request->query['nome'] ]); ?>
						</div>
						<div class="col-md-1">
							<?php echo $this->Form->submit('Filtrar', ['class' => 'btn btn-primary btn', 'value' => 'Filtrar']); ?>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<?php if( Count($pacientes) > 0 ) {?>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th><?= $this->Paginator->sort('id') ?></th>
					<th><?= $this->Paginator->sort('nome', 'Doença') ?></th>
					<th><?= $this->Paginator->sort('created', 'Data Cadastro') ?></th>
					<th><?= $this->Paginator->sort('modified', 'Última Alteração') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($pacientes as $paciente): ?>
				<tr>
					<td><?= h($paciente->id) ?></td>
					<td><?= h($paciente->nome) ?></td>
					<td><?= h($paciente->created) ?></td>
					<td><?= h($paciente->modified) ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<p>
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