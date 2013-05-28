<?php slot('body_tag') ?>	
  <body class="registro">
<?php end_slot(); ?>
<form class="form" method="post" action="<?php echo url_for('create_profile') ?>" onsubmit="return validateForm();">
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
    <input type="submit" class="btn_registrar" value="Enviar" />
</form>
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