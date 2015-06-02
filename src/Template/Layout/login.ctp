<!DOCTYPE html>
<html>
  <head>
		<?= $this->Html->charset() ?>
		<title><?= $this->fetch('title') ?></title>
		<?= $this->Html->meta('icon', '/florence.png') ?>
		<?= $this->Html->css('bootstrap.min') ?>
		<?= $this->Html->css('tema') ?>
		<?=$this->Html->script('jquery-1.11.2.min') ?>
		<?=$this->Html->script('bootstrap.min') ?>
		<?= $this->fetch('meta') ?>
		<?= $this->fetch('css') ?>
		<?= $this->fetch('script') ?>
  </head>
  <body>
		<div class="container login">
			<?= $this->Flash->render() ?>
			<?= $this->fetch('content') ?>
		</div>	
  </body>
</html>