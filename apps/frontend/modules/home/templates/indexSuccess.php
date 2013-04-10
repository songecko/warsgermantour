<?php slot('body_tag') ?>
  <body id="juego">
<?php end_slot(); ?>
<div class="column_3">
	<ul class="navy">
		<li><a href="<?php echo url_for('como') ?>"><img src="<?php echo image_path('bullet.png') ?>" /> como participar</a></li>
		<li><a href="<?php echo url_for('winners') ?>"><img src="<?php echo image_path('bullet.png') ?>" /> ganadores</a></li>
    </ul>
	<div class="logo"><img src="<?php echo image_path('logo.png') ?>" alt="Warsteiner" /></div>
    <h1>cargá lote y hora para ingresar<span>en el avión</span></h1>
</div>
<div class="column_2">
	<div class="pasajeros clearfix" id="pasajeros">
		<?php include_partial('home/airplaneUsers', array('airplaneUsers' => $airplaneUsers)); ?>		
	</div>
</div>
<div class="column_3">
	<?php if(!$isOnAirplane): ?>
	<div class="carga">
		<form method="post" action="<?php echo url_for('send_promo_code');?>">
			<?php echo $form['_csrf_token']->render() ?>
			<?php echo $form['code']->render(array('class' => $form['code']->hasError()?'error':'')) ?>
			<input type="submit" class="btn_cargar" value="cargar" />
		</form>
	</div>
	<?php endif; ?>
	<div class="premios"><img src="<?php echo image_path('premios.png') ?>" alt="premios" /></div>
</div>
<script type="text/javascript">
var timeoutID;

var startTimer = function()
{
	timeoutID = window.setTimeout(refreshAirplane, 10000);
};

var refreshAirplane = function()
{
	$.post('<?php echo url_for('airplane_users') ?>', 
		function(data, textStatus, jqXHR)
		{
			$('#pasajeros').html(data);

			startTimer();
		}
	);
};

$(document).ready(function()
{
<?php if(isset($success) || isset($error)): ?>
	$(window).qtip({
		id: "modal",
		content: {
			text:  '<?php echo html_entity_decode(isset($success)?$success:$error) ?>',
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
			classes: 'ui-tooltip-<?php echo isset($error)?'red':'light' ?> ui-tooltip-shadow'
		}
	});
<?php endif;?>

	startTimer();
});
</script>