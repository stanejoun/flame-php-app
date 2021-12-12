<?php $this->setLayout('default'); ?>

<?php $this->startBlock('title'); ?>
<?= _('Home'); ?>
<?php $this->endBlock(); ?>

<?php $this->startBlock('content'); ?>
<section>
	<?= _('User connected:'); ?> <?= $this->email ?>
</section>
<?php $this->endBlock(); ?>
