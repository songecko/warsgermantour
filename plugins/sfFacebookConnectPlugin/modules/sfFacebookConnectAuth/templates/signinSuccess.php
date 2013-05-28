<?php slot('body_tag') ?>	
  <body class="registro">
<?php end_slot(); ?>
<form class="form" method="post" action="<?php echo url_for('create_profile') ?>" onsubmit="return validateForm();">
	<?php echo $form['_csrf_token']->render() ?>
	<?php echo $form['id']->render() ?>
	<label>
		<?php echo $form['first_name']->render(array('placeholder' => 'Nombre', 'class' => $form['first_name']->hasError()?'error':'')) ?>
	</label>
	<label>
		<?php echo $form['dni']->render(array('placeholder' => 'DNI', 'class' => $form['dni']->hasError()?'error':'')) ?>
    </label>
    <label class="bases">
      <?php echo $form['accept_bases']->render() ?>
      <a href="#1">Acepto las bases y condiciones</a>
    </label>
    <a class="btn_registrar" href="pre_game.php">Enviar</a>
</form>