<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Colaboradores</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/colaboradores/adicionar">Novo</a></li>
			<li class="active"><a href="/colaboradores/index">Listar</a></li>
		</ul>
		<p class="alert alert-info">Clique no <strong>nome</strong> para editar os registros.</p>
		<div class="well filtros">
			<form action="/colaboradores/index" class="form-horizontal" id="ColaboradorIndexForm" method="get" accept-charset="utf-8">	
				<fieldset>
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->input('nome', ['label' => false, 'class' => 'form-control', 'id' => 'nome', 'placeholder' => 'Nome', 'value' => @$this->request->query['nome'] ]); ?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('cpf', ['label' => false, 'class' => 'form-control', 'id' => 'cpf', 'placeholder' => 'CPF', 'value' => @$this->request->query['cpf']]); ?>
						</div>
						<div class="col-md-1">
							<?php echo $this->Form->submit('Filtrar', ['class' => 'btn btn-primary btn', 'value' => 'Filtrar']); ?>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<?php if( Count($colaboradores) > 0 ) {?>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th><?= $this->Paginator->sort('id') ?></th>
					
				</tr>
			</thead>
			<tbody>
				
				<tr>

				</tr>
				
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