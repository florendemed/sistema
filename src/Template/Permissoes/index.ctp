<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Permissões</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/permissoes/adicionar">Novo</a></li>
			<li class="active"><a href="/permissoes/index">Listar</a></li>
		</ul>
		<div class="well filtros">
			<form action="/permissoes/index" class="form-horizontal" id="permissaoIndexForm" method="get" accept-charset="utf-8">	
				<fieldset>
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->text('Nome', ['class' => 'form-control', 'id' => 'permissaoNome', 'placeholder' => 'Nome permissão']); ?>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->text('Controlador', ['class' => 'form-control', 'id' => 'permissaoControlador', 'placeholder' => 'Controlador']); ?>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->text('Ação', ['class' => 'form-control', 'id' => 'permissaoAcao', 'placeholder' => 'Ação']); ?>
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
					<th><a href="/permissoes?sort=id&amp;direction=asc">Id</a></th>
					<th><a href="/permissoes?sort=id&amp;direction=asc">Nome</a></th>
					<th><a href="/permissoes?sort=id&amp;direction=asc">Status</a></th>
					<th><a href="/permissoes?sort=id&amp;direction=asc">Menu</a></th>
					<th><a href="/permissoes?sort=id&amp;direction=asc">Rota</a></th>
					<th><a href="/permissoes?sort=id&amp;direction=asc">Ordem</a></th>
					<th><a href="/permissoes?sort=id&amp;direction=asc">Permissão Pai</a></th>
					<th><a href="/permissoes?sort=id&amp;direction=asc">Controlador</a></th>
					<th><a href="/permissoes?sort=id&amp;direction=asc">Ação</a></th>
					<th class="actions"></th>  	 
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><a href="/permissoes/editar">1</a></td>
					<td><a href="/permissoes/editar">Configurações</a></td>
					<td><a href="/permissoes/editar">ativo</a></td>
					<td><a href="/permissoes/editar">Sim</a></td>
					<td></td>
					<td><a href="/permissoes/editar">7</a></td>
					<td><a href="/permissoes/editar">-</a></td>
					<td></td>
					<td></td>
					<td class="actions">
						<a href="/permissoes/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<tr>
					<td><a href="/permissoes/editar">1</a></td>
					<td><a href="/permissoes/editar">Usuários</a></td>
					<td><a href="/permissoes/editar">ativo</a></td>
					<td><a href="/permissoes/editar">Sim</a></td>
					<td></td>
					<td><a href="/permissoes/editar">3</a></td>
					<td><a href="/permissoes/editar">1 - Configurações</a></td>
					<td><a href="/permissoes/editar">usuarios</a></td>
					<td></td>
					<td class="actions">
						<a href="/permissoes/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<tr>
					<td><a href="/permissoes/editar">1</a></td>
					<td><a href="/permissoes/editar">Financeiro</a></td>
					<td><a href="/permissoes/editar">ativo</a></td>
					<td><a href="/permissoes/editar">Sim</a></td>
					<td></td>
					<td><a href="/permissoes/editar">5</a></td>
					<td><a href="/permissoes/editar">2 - Acessos</a></td>
					<td><a href="/permissoes/editar">permissoes</a></td>
					<td></td>
					<td class="actions">
						<a href="/permissoes/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="" title="Remover" onclick="if (confirm(&quot;Tem certeza que deseja excluir este registro?&quot;)) { return true; } return false;"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<tr>
					<td><a href="/permissoes/editar">1</a></td>
					<td><a href="/permissoes/editar">Eventos</a></td>
					<td><a href="/permissoes/editar">ativo</a></td>
					<td><a href="/permissoes/editar">Sim</a></td>
					<td></td>
					<td><a href="/permissoes/editar">7</a></td>
					<td><a href="/permissoes/editar">9 - Dados</a></td>
					<td><a href="/permissoes/editar">produtos</a></td>
					<td><a href="/permissoes/editar">carrinho</a></td>
					<td class="actions">
						<a href="/permissoes/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
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