<!-- PASAJEROS -->
<div class="asientos">
	<?php $i = 1; ?>
	<?php foreach($airplaneUsers as $user): ?>
	<div class="participante p_<?php echo $i ?><?php echo ($sf_user->getGuardUser()->getId() == $user->getId())?' propio':''?>">
		<img src="<?php echo $user->getSocialPicture() ?>" alt="avatar" />
	</div>
	<?php $i++;?>
	<?php endforeach;?>
	<?php for($i; $i <= $totalAirplaneUsers; $i++): ?>
    <div class="participante p_<?php echo $i ?>">
    	<!--<span class="belt"></span>-->
    	<img src="<?php echo image_path('avatar.jpg')?>" alt="avatar" />
    </div>
    <?php endfor; ?>
</div>

<!-- SALIENTES -->
<div class="salientes">
	<?php $i = 1; ?>
	<?php foreach($outsideUsers as $user): ?>
	<div class="saliente"><div class="participante"><img src="<?php echo $user->getSocialPicture() ?>" alt="avatar" /></div></div>
	<?php $i++;?>
	<?php endforeach;?>
</div>