<?php slot('body_tag') ?>
  <body id="juego">
<?php end_slot(); ?>
<div class="column_3">
	<ul class="navy">
		<li><a href="<?php echo url_for('como') ?>"><img src="<?php echo image_path('bullet.png') ?>" /> como participar</a></li>
		<li><a href="#"><img src="<?php echo image_path('bullet.png') ?>" /> ganadores</a></li>
    </ul>
	<div class="logo"><img src="<?php echo image_path('logo.png') ?>" alt="Warsteiner" /></div>
    <h1>cargá lote y hora para ingresar<span>en el avión</span></h1>
</div>
<div class="column_2">
	<div class="pasajeros clearfix">
		<ul>
			<?php foreach($airplaneUsers as $airplaneUser): ?>
			<li>
				<a class="user<?php echo ($sf_user->getGuardUser()->getId() == $airplaneUser->getId())?' propio':''?>" href="#1">
					<img src="<?php echo $airplaneUser->getSocialPicture() ?>" />
					<span>
						<img src="<?php echo $airplaneUser->getSocialPicture() ?>" />
          				<div class="name">
          					<strong><?php echo $airplaneUser->getFullname() ?></strong><br /><br />
            				Lotes cargados:<em><?php echo $airplaneUser->Profile->getPoints() ?></em>
            			</div>
					</span>
				</a>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
</div>
<div class="column_3">
	<div class="carga">
		<form method="post" action="<?php echo url_for('send_promo_code');?>">
			<?php echo $form['_csrf_token']->render() ?>
			<?php echo $form['code']->render(array('class' => $form['code']->hasError()?'error':'')) ?>
			<input type="submit" class="btn_cargar" value="cargar" />
		</form>
	</div>
	<div class="premios"><img src="<?php echo image_path('premios.png') ?>" alt="premios" /></div>
</div>
<?php if(isset($success) || isset($error)): ?>
<script type="text/javascript">
$(document).ready(function()
{
	$('.nav').qtip({
		content: {
			text:  '<?php echo html_entity_decode(isset($success)?$success:$error) ?>'
		},
		position: {
			my: 'top center',  // Position my top left...
			at: 'bottom center', // at the bottom right of...
			target: this // my target
		},
		show: {
			event: false, // Don't specify a show event...
			ready: true // ... but show the tooltip when ready
		},
		hide: false, // Don't specify a hide event either!
		style: {
			classes: 'ui-tooltip-<?php echo isset($error)?'red':'light' ?> ui-tooltip-shadow'
		}
	});
});
</script>
<?php endif;?>