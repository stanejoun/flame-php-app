<?php $this->setLayout('default'); ?>

<?php $this->startBlock('title'); ?>
<?= _('Login'); ?>
<?php $this->endBlock(); ?>

<?php $this->startBlock('content'); ?>
	<section>
		<form action="/auth/login" method="post">
			<?php if (!empty($this->data)): ?>
				<p><?= $this->error_message; ?></p>
			<?php endif; ?>
			<div class="container">
				<label><b><?= _('Email'); ?></b></label>
				<input type="text" placeholder="<?= _('Enter email'); ?>" name="email" required/>
				<?php if (!empty($this->data)): ?>
					<p><?= $this->input_errors->email; ?></p>
				<?php endif; ?>
				<label><b><?= _('Password'); ?></b></label>
				<input type="password" placeholder="<?= _('Enter Password'); ?>" name="password" required/>
				<button type="submit"><?= _('Login'); ?></button>
				<?php if (!empty($this->data)): ?>
					<p><?= $this->input_errors->password; ?></p>
				<?php endif; ?>
			</div>
		</form>
	</section>
<?php $this->endBlock(); ?>