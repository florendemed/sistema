<div class="container-fluid">
	<div id="row">
		<div class="col-md-12">
		<?php echo $this->Form->create(null, ['class' => 'form-signin']); ?>
				<p><?php echo $this->Html->image('logo_slogan.png');?></p>
				<?php 
					echo $this->Form->text('cpf', ['class' => 'form-control', 'placeholder' => 'CPF']);
				?>
				<?php 
					echo $this->Form->password('senha', ['class' => 'form-control', 'placeholder' => 'Senha']);
				?>
				<div class="btn-group login" role="group">
					<button class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-chevron-right"></span> Entrar</button>
				</div>
			<?php echo $this->Form->end();?>
		</div>
	</div>
</div> <!-- /container -->