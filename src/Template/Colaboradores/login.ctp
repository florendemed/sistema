<div class="container-fluid">
	<div id="row">
		<div class="col-md-12">
			<form action="/agendas/index" class="form-signin" id="" method="post" accept-charset="utf-8">
				<p><?php echo $this->Html->image('logo_slogan.png');?></p>
				<?php 
					echo $this->Form->text('colaborador', ['class' => 'form-control', 'placeholder' => 'E-mail/Login']);
				?>
				<?php 
					echo $this->Form->password('senha', ['class' => 'form-control', 'placeholder' => 'Senha']);
				?>
				<div class="btn-group login" role="group">
					<button class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-chevron-right"></span> Entrar</button>
				</div>
			</form>
		</div>
	</div>
</div> <!-- /container -->