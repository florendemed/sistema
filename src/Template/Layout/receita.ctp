<!DOCTYPE html>
<html>
	<head>
		<?= $this->Html->charset() ?>
		<title><?= $this->fetch('title') ?></title>
		<?= $this->Html->meta('icon', '/florence.png') ?>
		<?= $this->Html->css('bootstrap.min') ?>
		<?= $this->Html->css('tema') ?>
		<?= $this->Html->css('font-awesome') ?>
	</head>
	<body>
          <?= $this->fetch('content') ?>
	</body>
</html>