<?php $this->setLayout('default'); ?>

<?php $this->startBlock('title'); ?>
<?= _('Login'); ?>
<?php $this->endBlock(); ?>

<?php $this->startBlock('content'); ?>
	<div class="container-fluid">
		<main class="d-flex flex-column justify-content-center align-items-center">
			<section class="col-md-5">
				<h1 class="text-center mt-5 mb-5 h1"><?= _('Welcome to the Open PHP Framework!'); ?></h1>
				<p><?= _('You have installed a skeleton of OPFramework which contains some basic implementation examples.'); ?></p>
				<p><?= _('The examples allow you to understand the MVC, including routing, controllers, views and ORM.'); ?></p>
				<p><?= _('Of course these examples are far from being complete and give you a small overview of the possibilities of the framework.'); ?></p>
				<p><?= _('Furthermore, a complete documentation will be available one day...'); ?></p>
				<p><?= _("In the meantime, be curious and don't hesitate to explore the core of the framework to find the features and behavior you need."); ?></p>
				<p><?= _('Read and understand the code which is normally written on the KISS (Keep it simple, stupid) principle.'); ?></p>
			</section>
			<?php if ($this->available_db): ?>
				<hr class="col-md-7">
				<section class="col-md-3">
					<form method="post" action="/auth/login" class="form bg-body p-5">
						<div class="mb-3 text-center">
							<h3 class="h3"><?= _('Log in'); ?></h3>
						</div>
						<?php if (!empty($this->error_message)): ?>
							<div class="text-center text-danger mb-4">
								<?= $this->error_message; ?>
							</div>
						<?php endif; ?>
						<div class="mb-3">
							<label class="form-label fw-bolder" for="inputEmail"><?= _('Email'); ?></label>
							<input id="inputEmail" class="form-control" name="email" type="email" value="admin@opframework.com" placeholder="admin@opframework.com" required>
							<?php if (!empty($this->input_errors->email)): ?>
								<div class="invalid-feedback"><?= $this->input_errors->email; ?></div>
							<?php endif; ?>
						</div>
						<div class="mb-3">
							<div class="d-flex flex-stack">
								<label class="form-label fw-bolder" for="inputPassword"><?= _('Password'); ?></label>
							</div>
							<input id="inputPassword" class="form-control" name="password" type="password" value="123456789" placeholder="123456789" required>
							<?php if (!empty($this->input_errors->password)): ?>
								<div class="invalid-feedback"><?= $this->input_errors->password; ?></div>
							<?php endif; ?>
						</div>
						<div class="d-grid gap-2">
							<button class="btn btn-primary" type="submit"><?= _('Continue'); ?></button>
						</div>
					</form>
				</section>
			<?php endif; ?>
			<?php if (!$this->available_db): ?>
			<hr class="col-md-7">
			<section class="col-md-3">
				<div class="mb-3 text-center">
					<h3 class="h3"><?= _('No database configured!'); ?></h3>
				</div>
			</section>
			<?php endif; ?>
		</main>
	</div>
<?php $this->endBlock(); ?>