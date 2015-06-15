<div class="container-fluid">
	<div id="row">
		<div class="col-md-12">
			<form action="/agendas/index" class="form-signin" id="" method="post" accept-charset="utf-8">
				<p><?php echo $this->Html->image('logo_slogan.png');?></p>
				<input name="colaborador" class="form-control form-control" placeholder="E-mail/Login" autofocus="1" type="text" id="email" required="required"/>	
				<input name="senha" class="form-control form-control" placeholder="Senha" type="password" id="senha" required="required"/>	
				<div class="btn-group login" role="group">
					<button class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-chevron-right"></span> Entrar</button>
				</div>
			</form>
		</div>
	</div>
</div> <!-- /container -->