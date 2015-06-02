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
			<form action="/grupos/index" class="form-horizontal" id="grupoIndexForm" method="get" accept-charset="utf-8">	
				<fieldset>
					<div class="row">
						<div class="col-md-2">
							<input name="nome" placeholder="Nome" class="form-control" type="text" id="grupoNome"/>
						</div>
						<div class="col-md-1">
							<input  class="btn btn-primary btn" type="submit" value="filtrar"/>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th><a href="/grupos?sort=id&amp;direction=asc">Id</a></th>
					<th><a href="/grupos?sort=nome&amp;direction=asc">Nome</a></th>
					<th><a href="/grupos?sort=email&amp;direction=asc">Status</a></th>
					<th><a href="/grupos?sort=status&amp;direction=asc">Público</a></th>
					<th><a href="/grupos?sort=status&amp;direction=asc">Data Cadastro</a></th>
					<th><a href="/grupos?sort=created&amp;direction=asc">Última Alteração</a></th>
					<th class="actions"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><a href="/grupos/editar">1</a></td>
					<td><a href="/grupos/editar">Atendente</a></td>
					<td><a href="/grupos/editar">ativo</a></td>
					<td><a href="/grupos/editar">não</a></td>
					<td><a href="/grupos/editar">27/07/2010 17:38</a></td>
					<td><a href="/grupos/editar">03/02/2015 17:13</a></td>
					<td class="actions">
						<a href="/grupos/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<tr>
					<td><a href="/grupos/editar">2</a></td>
					<td><a href="/grupos/editar">Atendente</a></td>
					<td><a href="/grupos/editar">ativo</a></td>
					<td><a href="/grupos/editar">não</a></td>
					<td><a href="/grupos/editar">27/07/2010 17:38</a></td>
					<td><a href="/grupos/editar">03/02/2015 17:13</a></td>
					<td class="actions">
						<a href="/grupos/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<tr>
					<td><a href="/grupos/editar">3</a></td>
					<td><a href="/grupos/editar">Atendente</a></td>
					<td><a href="/grupos/editar">ativo</a></td>
					<td><a href="/grupos/editar">não</a></td>
					<td><a href="/grupos/editar">27/07/2010 17:38</a></td>
					<td><a href="/grupos/editar">03/02/2015 17:13</a></td>
					<td class="actions">
						<a href="/grupos/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<tr>
					<td><a href="/grupos/editar">4</a></td>
					<td><a href="/grupos/editar">Atendente</a></td>
					<td><a href="/grupos/editar">ativo</a></td>
					<td><a href="/grupos/editar">não</a></td>
					<td><a href="/grupos/editar">27/07/2010 17:38</a></td>
					<td><a href="/grupos/editar">03/02/2015 17:13</a></td>
					<td class="actions">
						<a href="/grupos/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
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