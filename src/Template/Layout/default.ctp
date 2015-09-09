<!DOCTYPE html>
<html>
	<head>
		<?= $this->Html->charset() ?>
		<title><?= $this->fetch('title') ?></title>
		<?= $this->Html->meta('icon', '/florence.png') ?>
		<?= $this->Html->css('bootstrap.min') ?>
		<?= $this->Html->css('tema') ?>
		<?= $this->Html->css('fullcalendar.min') ?>
		<?=$this->Html->script('jquery-1.11.2.min') ?>
		<?=$this->Html->script('jquery.mask.min') ?>
		<?=$this->Html->script('fullcalendar-moment.min') ?>
		<?=$this->Html->script('fullcalendar.min') ?>
		<?=$this->Html->script('fullcalendar-pt-br') ?>
		<?=$this->Html->script('bootstrap.min') ?>
		<?=$this->Html->script('https://www.google.com/jsapi') ?>
		<?= $this->fetch('meta') ?>
		<?= $this->fetch('css') ?>
		<?= $this->fetch('script') ?>
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