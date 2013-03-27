<?php slot('body_tag') ?>
<body id="pop">
<?php end_slot(); ?>
<div class="wrap clearfix">
	<div class="content clearfix">
		<a class="close" href="<?php echo url_for('homepage') ?>">cerrar</a>
		<h2><span>ellos están</span> arriba del avión</h2>
		<div class="scroll clearfix">
			<ul class="ranking">
				<?php $i = 0; ?>
				<?php foreach($winners as $user): $i++; ?>
				<li class="win clearfix">
					<div class="avatar"><img src="<?php echo $user->getSocialPicture() ?>" /></div>
					<div class="info"><?php echo $user->getFullname() ?> <span>Lotes cargados: <em><?php echo $user->Profile->getPoints() ?></em></span></div>
					<div class="posicion"><?php echo $i ?></div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>