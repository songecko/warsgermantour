<?php slot('body_tag') ?>
<body id="pop">
<?php end_slot(); ?>

<div class="wrap clearfix">
	<div class="content clearfix">
		<a class="close" href="<?php echo url_for('homepage') ?>">cerrar</a>
    	<h2><span>ellos estÁn</span> arriba del aviÓn</h2>
    	<div class="scroll clearfix">
      		<ul class="ranking">
        		<?php $i = 0; ?>
				<?php foreach($winners as $winner): $i++; ?>
        		<li class="win clearfix">
	          		<div class="avatar"><img src="<?php echo $winner->user->getSocialPicture() ?>" /></div>
	          		<div class="info">
	          			<?php echo $winner->user->getFullname() ?>
	          			<?php /*?><span>Lotes cargados: <em><?php echo $winner->user->Profile->getPoints() ?></em></span> */?>
	          		</div>
	          		<div class="premio"><span class="<?php echo $winner->getClassPrice() ?>"></span></div>
        		</li>
        		<?php endforeach; ?>
      		</ul>
    	</div>
	</div>
</div>