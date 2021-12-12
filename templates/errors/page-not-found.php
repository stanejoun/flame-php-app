<?php $this->setLayout('error'); ?>

<?php $this->startBlock('title'); ?>
<?= _('404 - Page not found'); ?>
<?php $this->endBlock(); ?>

<?php $this->startBlock('content'); ?>
	<section>
		<h1><?= _('Page not found!'); ?></h1>
	</section>
<?php $this->endBlock(); ?>