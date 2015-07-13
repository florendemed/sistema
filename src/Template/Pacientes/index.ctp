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
							<input name="nome" placeholder="Nome" class="form-control" type="text" id="pacienteNome"/>
						</div>
						<div class="col-md-2">
							<input name="cpf" placeholder="CPF" class="form-control" type="text" id="pacienteCpf"/>
						</div>
						<div class="col-md-2">
							<input name="cartaoSUS" placeholder="Cartão SUS" class="form-control" type="text" id="cartaoSUS"/>
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
					<th><a href="/pacientes?sort=id&amp;direction=asc">Id</a></th>
					<th><a href="/pacientes?sort=nome&amp;direction=asc">Nome</a></th>
					<th><a href="/pacientes?sort=email&amp;direction=asc">Cartão SUS</a></th>
					<th><a href="/pacientes?sort=status&amp;direction=asc">CPF</a></th>
					<th><a href="/pacientes?sort=status&amp;direction=asc">Data Nascimento</a></th>
					<th><a href="/pacientes?sort=status&amp;direction=asc">Status</a></th>
					<th><a href="/pacientes?sort=created&amp;direction=asc">Data Cadastro</a></th>
					<th><a href="/pacientes?sort=modified&amp;direction=asc">Última Alteração</a></th>
					<th class="actions"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><a href="/pacientes/editar">1</a></td>
					<td><a href="/pacientes/editar">Teste Teste Teste</a></td>
					<td><a href="/pacientes/editar">123456</a></td>
					<td><a href="/pacientes/editar">123.456.789-10</a></td>
					<td><a href="/pacientes/editar">27/12/1982</a></td>
					<td><a href="/pacientes/editar">Ativo</a></td>
					<td><a href="/pacientes/editar">09/04/2015 18:31</a></td>
					<td><a href="/pacientes/editar">11/04/2015 21:21</a></td>
					<td class="actions">
						<a href="/pacientes/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<tr>
					<td><a href="/pacientes/editar">2</a></td>
					<td><a href="/pacientes/editar">Teste Teste Teste</a></td>
					<td><a href="/pacientes/editar">123456</a></td>
					<td><a href="/pacientes/editar">123.456.789-10</a></td>
					<td><a href="/pacientes/editar">27/12/1982</a></td>
					<td><a href="/pacientes/editar">Ativo</a></td>
					<td><a href="/pacientes/editar">09/04/2015 18:31</a></td>
					<td><a href="/pacientes/editar">11/04/2015 21:21</a></td>
					<td class="actions">
						<a href="/pacientes/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<tr>
					<td><a href="/pacientes/editar">3</a></td>
					<td><a href="/pacientes/editar">Teste Teste Teste</a></td>
					<td><a href="/pacientes/editar">123456</a></td>
					<td><a href="/pacientes/editar">123.456.789-10</a></td>
					<td><a href="/pacientes/editar">27/12/1982</a></td>
					<td><a href="/pacientes/editar">Ativo</a></td>
					<td><a href="/pacientes/editar">09/04/2015 18:31</a></td>
					<td><a href="/pacientes/editar">11/04/2015 21:21</a></td>
					<td class="actions">
						<a href="/pacientes/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<tr>
					<td><a href="/pacientes/editar">4</a></td>
					<td><a href="/pacientes/editar">Teste Teste Teste</a></td>
					<td><a href="/pacientes/editar">123456</a></td>
					<td><a href="/pacientes/editar">123.456.789-10</a></td>
					<td><a href="/pacientes/editar">27/12/1982</a></td>
					<td><a href="/pacientes/editar">Ativo</a></td>
					<td><a href="/pacientes/editar">09/04/2015 18:31</a></td>
					<td><a href="/pacientes/editar">11/04/2015 21:21</a></td>
					<td class="actions">
						<a href="/pacientes/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
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