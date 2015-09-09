<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Pacientes</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/pacientes/adicionar">Novo</a></li>
			<li class="active"><a href="/pacientes/index">Listar</a></li>
		</ul>
		<p class="alert alert-info">Clique no <strong>nome</strong> para editar os registros.</p>
		<div class="well filtros">
			<form action="/pacientes/index" class="form-horizontal" id="UsuarioIndexForm" method="get" accept-charset="utf-8">	
				<fieldset>
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->input('nome', ['label' => false, 'class' => 'form-control', 'id' => 'nome', 'placeholder' => 'Nome', 'value' => @$this->request->query['nome'] ]); ?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('cpf', ['label' => false, 'class' => 'form-control', 'id' => 'cpf', 'placeholder' => 'CPF', 'value' => @$this->request->query['cpf']]); ?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('cartaoSUS', ['label' => false, 'class' => 'form-control', 'id' => 'cartaoSUS', 'placeholder' => 'Cartão SUS', 'value' => @$this->request->query['cartaoSUS']]); ?>
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
					<th><?= $this->Paginator->sort('nome') ?></th>
					<th><?= $this->Paginator->sort('numero_prontuario') ?></th>
					<th><?= $this->Paginator->sort('numero_sus', 'Cartão SUS') ?></th>
					<th><?= $this->Paginator->sort('cpf', 'CPF') ?></a></th>
					<th><?= $this->Paginator->sort('data_nascimento') ?></th>
					<th><?= $this->Paginator->sort('status') ?></th>
					<th><?= $this->Paginator->sort('created', 'Data Cadastro') ?></th>
					<th><?= $this->Paginator->sort('modified', 'Última Alteração') ?></th>
					<th class="actions"></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($pacientes as $paciente): 
					if ( h($paciente->status) == 'a' ){
						$status = "Ativo";
					} else {
						$status = "Inativo";
					}
				?>
				<tr>
					<td><?= h($paciente->id) ?> </td>
					<td><?= h($paciente->nome) ?> </td>
					<td><?= h($paciente->numero_prontuario) ?> </td>
					<td><?= h($paciente->numero_sus) ?> </td>
					<td><?= h($paciente->cpf) ?> </td>
					<td><?= h($paciente->data_nascimento) ?> </td>
					<td><?= $status ?> </td>
					<td><?= h($paciente->created) ?> </td>
					<td><?= h($paciente->modified) ?> </td>
					<td class="actions">
						<a href="/pacientes/editar/<?= h($paciente->id) ?>" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="/pacientes/excluir/<?= h($paciente->id) ?>" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
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