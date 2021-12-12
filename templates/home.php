<?php $this->setLayout('default'); ?>

<?php $this->startBlock('title'); ?>
<?= _('Home'); ?>
<?php $this->endBlock(); ?>

<?php $this->startBlock('content'); ?>
<main>
	<section class="py-5 text-center container">
		<div class="row py-lg-5">
			<div class="col-lg-6 col-md-8 mx-auto">
				<h1 class="fw-light"><?= _('Page example'); ?></h1>
				<p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<p><?= _('Connected on:'); ?> <?= $this->getEmail(); ?></p>
				<p><a href="/auth/logout" class="btn btn-warning"><?= _('logout'); ?></a></p>
			</div>
		</div>
	</section>
</main>
<?php $this->endBlock(); ?>
