<?php $this->setLayout('error'); ?>

<?php $this->startBlock('title'); ?>
<?= _('403 - Forbidden'); ?>
<?php $this->endBlock(); ?>

<?php $this->startBlock('content'); ?>
	<section>
		<h1><?= _('Forbidden'); ?></h1>
		<p><?= _('You are not authorized to access this page!'); ?></p>
	</section>
<?php $this->endBlock(); ?>