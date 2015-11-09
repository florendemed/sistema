<!DOCTYPE html>
<html>
	<head>
		<?= $this->Html->charset() ?>
		<title><?= $this->fetch('title') ?></title>
		<?= $this->Html->meta('icon', '/florence.png') ?>
		<?= $this->Html->css('bootstrap.min') ?>
		<?= $this->Html->css('tema') ?>
		<?= $this->Html->css('normalize') ?>
		<?= $this->Html->css('timeline') ?>
		<?= $this->Html->css('font-awesome') ?>
		<?= $this->Html->css('//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css') ?>
		<?= $this->Html->css('fullcalendar.min') ?>
		<?=$this->Html->script('jquery-1.11.2.min') ?>
		<?=$this->Html->script('jquery.mask.min') ?>
		<?=$this->Html->script('//code.jquery.com/ui/1.11.4/jquery-ui.js') ?>
		<?=$this->Html->script('fullcalendar-moment.min') ?>
		<?=$this->Html->script('fullcalendar.min') ?>
		<?=$this->Html->script('fullcalendar-pt-br') ?>
		<?=$this->Html->script('bootstrap.min') ?>
		<?=$this->Html->script('https://www.google.com/jsapi') ?>
		<?= $this->fetch('meta') ?>
		<?= $this->fetch('css') ?>
		<?= $this->fetch('script') ?>
		<?php
		echo $this->Html->scriptBlock("
			$(document).ready(function() {
				$('.cep').mask('00000-000');
				$('.date').mask('00/00/0000');
				$('.telefone').mask('(00) 0000-0000');
				$('.cpf').mask('00000000000');
				$('.numero').mask('099999999');
			});
		");
		?>
	</head>
	<body>
		 <?php echo $this->element('menuPrincipal'); ?>
		<div class="container-fluid conteudo">
			<?= $this->Flash->render() ?>
			<?= $this->fetch('content') ?>
		</div>	
		<footer>
			<div class="rodape container-fluid">
				<div class="row">
					<div class="col-md-2 col-md-offset-10 pull-right">
						<?php echo $this->Html->image('logo.png', ['alt' => 'Florence']) ?>
					</div>
				</div>
			</div>
        </footer>
		<div class="false-load"></div>
	</body>
</html>