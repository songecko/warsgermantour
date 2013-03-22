<div class="cuerpo centrar2">
	<div class="formulario register">
		<div class="moduloCentro">
			<div class="cuerpo">
				<div class="logo"></div>
				<form class="form" method="post" action="<?php echo url_for('create_profile') ?>">
					<div class="col1">
						<?php echo $form['_csrf_token']->render() ?>
						<?php echo $form['id']->render() ?>
						<?php if(isset($form['user_id'])): ?>
						<?php echo $form['user_id']->render() ?>
						<?php endif; ?>
						<div class="input<?php echo $form['first_name']->hasError()?' error':'' ?>">
							<?php echo $form['first_name']->renderLabel('Nombre') ?>
							<?php echo $form['first_name']->render(array('tabindex' => 3)) ?>
						</div>
						<div class="input<?php echo $form['last_name']->hasError()?' error':'' ?>">
							<?php echo $form['last_name']->renderLabel('Apellido') ?>
							<?php echo $form['last_name']->render(array('tabindex' => 3)) ?>
						</div>												
						<div class="input<?php echo $form['email_address']->hasError()?' error':'' ?>">
							<?php echo $form['email_address']->renderLabel('E-mail') ?>
							<?php echo $form['email_address']->render(array('tabindex' => 1)) ?>
						</div>
						<div class="input<?php echo $form['phone_number']->hasError()?' error':'' ?>">
							<?php echo $form['phone_number']->renderLabel('Teléfono') ?>
							<?php echo $form['phone_number']->render(array('tabindex' => 5)) ?>
						</div>						
					</div>
					<input type="submit" class="btn1" value="siguiente" tabindex="9" />
				</form>				
			</div>
			<div class="legales">
				<a class="izq" href="#">TÉRMINOS Y CONDICIONES</a>
			</div>
		</div>
	</div>
</div>