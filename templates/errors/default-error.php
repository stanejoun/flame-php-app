<?php $this->setLayout('error'); ?>

<?php $this->startBlock('title'); ?>
<?= _('Error'); ?>
<?php $this->endBlock(); ?>

<?php $this->startBlock('content'); ?>
	<section>
		<h1><?= _('Error'); ?></h1>
		<p><?= _('Something is broken. Please let us know what you were doing when this error occurred. We will fix it as soon as possible. Sorry for any inconvenience caused.'); ?></p>
		<?php if ($this->data !== null): ?>
			<p><?= $this->getMessage(); ?></p>
			<?php foreach ($this->getErrors() as $inputName => $error): ?>
				<?php if (!is_array($error)): ?>
					<p><?= $inputName; ?>: <?= $error; ?></p>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
	</section>
<?php $this->endBlock(); ?>