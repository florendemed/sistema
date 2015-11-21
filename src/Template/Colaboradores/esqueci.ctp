<?php
echo $this->Html->scriptBlock("
	$(document).ready(function() {
		$('#UsuarioCelular').mask('+999999999999?99');
	});
");
?>
<div class="row">
	<?php echo $this->Form->create(null, ['class' => 'form-horizontal form-esqueci']); ?>
	<p><?php echo $this->Html->image('logo_slogan.png');?></p>
    <div class="col-md-12" id="mensagem_header_default">
        <p>Utilize seu e-mail/login cadastrado para receber uma nova senha de acesso ao sistema.</p>
    </div>
    <div class="col-md-12">
        <h4>E-mail/Login</h4>
        <?php echo $this->Form->input('rec_email', array('class' => 'form-control', 'div' => false, 'label' => false, 'placeholder' => 'E-mail/Login', 'autofocus' => true, 'after' => false, 'before' => false, 'type' => 'text', 'required' => false)); ?>
        <div class="btn-group login" role="group">
			<button class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-envelope"></span> Enviar</button>
		</div>
    </div>
	<div class="help-block">
        <a href="/entrar" title="Voltar" class='voltar'><span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>
    </div>
	<?php echo $this->Form->end();?>
</div>