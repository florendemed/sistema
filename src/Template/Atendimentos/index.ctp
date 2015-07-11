<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Atendimentos</li>
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
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th><a href="/colaboradores?sort=id&amp;direction=asc">Id</a></th>
					<th><a href="/colaboradores?sort=nome&amp;direction=asc">Nome</a></th>
					<th><a href="/colaboradores?sort=nome&amp;direction=asc">Médico</a></th>
					<th><a href="/colaboradores?sort=email&amp;direction=asc">Data Atendimento</a></th>
					<th><a href="/colaboradores?sort=status&amp;direction=asc">Status</a></th>
					<th class="actions"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><a href="/colaboradores/editar">1</a></td>
					<td><a href="/colaboradores/editar">Teste Teste Teste</a></td>
					<td><a href="/colaboradores/editar">Médico Médico Médico</a></td>
					<td><a href="/colaboradores/editar">27/12/1982</a></td>
					<td><a href="/colaboradores/editar">ativo</a></td>
					<td class="actions">
						<a href="/colaboradores/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<tr>
					<td><a href="/colaboradores/editar">2</a></td>
					<td><a href="/colaboradores/editar">Teste Teste Teste</a></td>
					<td><a href="/colaboradores/editar">Médico Médico Médico</a></td>
					<td><a href="/colaboradores/editar">27/12/1982</a></td>
					<td><a href="/colaboradores/editar">ativo</a></td>
					<td class="actions">
						<a href="/colaboradores/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<tr>
					<td><a href="/colaboradores/editar">3</a></td>
					<td><a href="/colaboradores/editar">Teste Teste Teste</a></td>
					<td><a href="/colaboradores/editar">Médico Médico Médico</a></td>
					<td><a href="/colaboradores/editar">27/12/1982</a></td>
					<td><a href="/colaboradores/editar">ativo</a></td>
					<td class="actions">
						<a href="/colaboradores/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<tr>
					<td><a href="/colaboradores/editar">4</a></td>
					<td><a href="/colaboradores/editar">Teste Teste Teste</a></td>
					<td><a href="/colaboradores/editar">Médico Médico Médico</a></td>
					<td><a href="/colaboradores/editar">27/12/1982</a></td>
					<td><a href="/colaboradores/editar">ativo</a></td>
					<td class="actions">
						<a href="/colaboradores/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
			</tbody>
		</table>
		<p><strong>4</strong> resultado(s) encontrado(s).</p>
		<ul class="pagination">
			<li class="disabled prev"><a onclick="return false;">&larr; Anterior</a></li>
			<li class="active"><a>1</a></li>
			<li class="disabled next"><a onclick="return false;">Próxima &rarr;</a></li>
		</ul>
	</div>
</div>