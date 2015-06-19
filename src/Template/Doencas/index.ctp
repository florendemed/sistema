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
							<?php 
								echo $this->Form->text('Nome', ['class' => 'form-control', 'id' => 'doencaNome', 'placeholder' => 'Nome doença']);
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
					<th>Id</th>
					<th>Nome</th>
					<th>Data Cadastro</th>
					<th>Última Alteração</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</a></td>
					<td>Teste</a></td>
					<td>09/04/2015 18:31</a></td>
					<td>11/04/2015 21:21</a></td>
				</tr>
				<tr>
					<td>2</a></td>
					<td>Teste</a></td>
					<td>09/04/2015 18:31</a></td>
					<td>11/04/2015 21:21</a></td>
				</tr>
				<tr>
					<td>3</a></td>
					<td>Teste</a></td>
					<td>09/04/2015 18:31</a></td>
					<td>11/04/2015 21:21</a></td>
				</tr>
				<tr>
					<td>4</a></td>
					<td>Teste</a></td>
					<td>09/04/2015 18:31</a></td>
					<td>11/04/2015 21:21</a></td>
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