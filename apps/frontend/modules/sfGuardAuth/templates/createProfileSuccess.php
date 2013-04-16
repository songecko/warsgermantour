<?php slot('body_tag') ?>
  <body id="registro">
<?php end_slot(); ?>
<div class="column_4 clearfix">
	<div class="logo"><img src="<?php echo image_path('logo.png') ?>" alt="Warsteiner" /></div>
    <h1><span>registrate Y PERMANECÉ EN EL AVION!</span></h1>
    <div class="contenido clearfix">
	    <p>
	    	<strong>En un momento al azar de la semana, premiaremos lugares del avión!</strong><br />
			A medida que nuevos participantes ingresen, irán desplazando a los demás. Si sos desplazado del avión, es importante que vuelvas a ingresar para poder participar!
			Te esperan increíbles premios! un viaje a Alemania para 2 personas, heladeras Warsteiner, Giftpacks y muchos premios más!
		</p>
		<form class="form" method="post" action="<?php echo url_for('create_profile') ?>" onsubmit="return validateForm();">
			<?php echo $form['_csrf_token']->render() ?>
			<?php echo $form['id']->render() ?>
			<?php if(isset($form['user_id'])): ?>
			<?php echo $form['user_id']->render() ?>
			<?php endif; ?>
			<label>
          		<?php echo $form['first_name']->render(array('placeholder' => 'Nombre', 'class' => $form['first_name']->hasError()?'error':'')) ?>
			</label>
			<label>
				<?php echo $form['email_address']->render(array('placeholder' => 'E-mail', 'class' => $form['email_address']->hasError()?'error':'')) ?>
			</label>
        	<label>
				<?php echo $form['last_name']->render(array('placeholder' => 'Apellido', 'class' => $form['last_name']->hasError()?'error':'')) ?>
			</label>
			<label>
				<?php echo $form['phone_number']->render(array('placeholder' => 'Teléfono', 'class' => $form['phone_number']->hasError()?'error':'')) ?>
			</label>
			<label>
				<?php echo $form['dni']->render(array('placeholder' => 'DNI', 'class' => $form['dni']->hasError()?'error':'')) ?>
			</label>
			<label class="cheq">
				<?php echo $form['accept_bases']->render() ?>
				<span>Acepto las bases<br />y condiciones</span></label>
			</label>
			<input type="submit" class="btn_enviar" value="enviar" />
		</form>
	</div>
</div>
<script type="text/javascript">
var validateForm = function()
{
	if(!$('#sf_guard_user_profile_accept_bases').is(':checked'))
	{
		$(window).qtip({
			id: "modal",
			content: {
				text:  'Para continuar debes aceptar las bases y condiciones',
				title: {
					text: 'Warsteiner - German Master Tour',
					button: true
				}
			},
			position: {
				my: 'center',  // Position my top left...
				at: 'center', // at the bottom right of...
				target: $(window) // my target
			},
			show: {
				event: false, // Don't specify a show event...
				solo: true,
				ready: true, // ... but show the tooltip when ready
				modal: true
			},
			hide: false, // Don't specify a hide event either!
			style: {
				classes: 'ui-tooltip-red ui-tooltip-shadow'
			}
		});

		return false;
	}

	return true;
};
</script>