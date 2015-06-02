<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Exames</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a href="/exames/importar">Importar</a></li>
			<li><a href="/exames/index">Listar</a></li>
		</ul>
		<p class="alert alert-info">Arquivo <strong>XML</strong> nos padrões abaixo:</p>
		<form action="/exames/adicionar" class="form-horizontal" id="examesImportarForm" method="post" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<div class="form-group required">
							<div class="col-md-8">
								<input type="file" name="data[exame][arquivo]" id="ExamesArquivo">
							</div>
						</div>	
					</fieldset>
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="col-md-12">
					<input  class="btn btn-lg btn-primary btn" type="submit" value="Enviar"/>
				</div>
			</div>
		</form>				
	</div>
</div>
