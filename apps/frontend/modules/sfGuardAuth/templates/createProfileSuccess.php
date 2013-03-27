<?php slot('body_tag') ?>
  <body id="registro">
<?php end_slot(); ?>
<div class="column_4 clearfix">
	<div class="logo"><img src="<?php echo image_path('logo.png') ?>" alt="Warsteiner" /></div>
    <h1>registrate <span>y asegurá tu lugar</span></h1>
    <div class="contenido clearfix">
		<p><strong>De lunes a viernes, en un momento al azar del día, premiaremos un lugar del avión!</strong></p>
		<p>A medida que nuevos participantes ingresen, irán desplazando a los demás. Si sos desplazado del avión, es importante que vuelvas a ingresar para poder participar! Te esperan increíbles premios! Un viaje a Alemania para 2 personas, heladeras Warsteiner, Giftpacks y muchos premios más!</p>
		<form class="form" method="post" action="<?php echo url_for('create_profile') ?>">
			<?php echo $form['_csrf_token']->render() ?>
			<?php echo $form['id']->render() ?>
			<?php if(isset($form['user_id'])): ?>
			<?php echo $form['user_id']->render() ?>
			<?php endif; ?>
			<label>
				<span>nombre</span>
          		<?php echo $form['first_name']->render(array('class' => $form['first_name']->hasError()?'error':'')) ?>
			</label>
        	<label>
        		<span>apellido</span>
				<?php echo $form['last_name']->render(array('class' => $form['last_name']->hasError()?'error':'')) ?>
			</label>
			<label>
				<span>dni</span>
				<?php echo $form['dni']->render(array('class' => $form['dni']->hasError()?'error':'')) ?>
			</label>
			<label>
				<span>email</span>
				<?php echo $form['email_address']->render(array('class' => $form['email_address']->hasError()?'error':'')) ?>
			</label>
			<label>
				<span>telefono</span>
				<?php echo $form['phone_number']->render(array('class' => $form['phone_number']->hasError()?'error':'')) ?>
			</label>
			<label class="cheq">
				<?php echo $form['accept_bases']->render() ?>
				<span>Acepto las bases y condiciones</span>
			</label>
			<input type="submit" class="btn_enviar" value="enviar" />
		</form>
	</div>
</div>