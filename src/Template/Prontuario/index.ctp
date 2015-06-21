<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Prontuários</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/prontuarios/adicionar">Novo</a></li>
			<li class="active"><a href="/prontuarios/index">Listar</a></li>
		</ul>
		<p class="alert alert-info">Clique no <strong>nome</strong> para editar os registros.</p>
		<div class="well filtros">
			<form action="/prontuarios/index" class="form-horizontal" id="UsuarioIndexForm" method="get" accept-charset="utf-8">	
				<fieldset>
					<div class="row">
						<div class="col-md-3">
							<input name="nome" placeholder="Nome" class="form-control" type="text" id="prontuarioNome"/>
						</div>
						<div class="col-md-2">
							<input name="login" placeholder="Data de Nascimento" class="form-control" type="text" id="prontuarioNascimento"/>
						</div>
						<div class="col-md-2">
							<input name="cpf" placeholder="CPF" class="form-control" type="text" id="prontuarioCpf"/>
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
					<th><a href="/prontuarios?sort=id&amp;direction=asc">Id</a></th>
					<th><a href="/prontuarios?sort=nome&amp;direction=asc">Nome</a></th>
					<th><a href="/prontuarios?sort=email&amp;direction=asc">Email</a></th>
					<th><a href="/prontuarios?sort=status&amp;direction=asc">Status</a></th>
					<th><a href="/prontuarios?sort=status&amp;direction=asc">Data Nascimento</a></th>
					<th><a href="/prontuarios?sort=created&amp;direction=asc">Data Cadastro</a></th>
					<th><a href="/prontuarios?sort=modified&amp;direction=asc">Última Alteração</a></th>
					<th class="actions"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><a href="/prontuarios/editar">1</a></td>
					<td><a href="/prontuarios/editar">Teste</a></td>
					<td><a href="/prontuarios/editar">teste@teste.com.br</a></td>
					<td><a href="/prontuarios/editar">ativo</a></td>
					<td><a href="/prontuarios/editar">27/12/1982</a></td>
					<td><a href="/prontuarios/editar">09/04/2015 18:31</a></td>
					<td><a href="/prontuarios/editar">11/04/2015 21:21</a></td>
					<td class="actions">
						<a href="/prontuarios/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
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