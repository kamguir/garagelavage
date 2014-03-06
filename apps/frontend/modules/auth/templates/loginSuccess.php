<div class="container">
	<fieldset id="loginform">
		<legend><?php echo __('IDENTIFICATION') ?></legend>
                <form action="<?php echo url_for('auth/login') ?>" method="post" class="form-signin">
			<table>
				<?php echo $form ?>
			</table>
			<div class="login_button">
				<input class="btn btn-lg btn-primary btn-block" type="submit" value="<?php echo __('VALIDER') ?>"/>
			</div>
			
		</form>
	</fieldset>
</div>