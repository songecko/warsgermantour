<?php $left = 23; ?>
<ul>
	<?php foreach($airplaneUsers as $airplaneUser): $left--; ?>
	<li>
		<a class="user<?php echo ($sf_user->getGuardUser()->getId() == $airplaneUser->getId())?' propio':''?>" href="#1" style="cursor:default;" onclick="false;">
			<img src="<?php echo $airplaneUser->getSocialPicture() ?>" />
			<span>
				<img src="<?php echo $airplaneUser->getSocialPicture() ?>" />
				<div class="name">
					<strong><?php echo $airplaneUser->getFullname() ?></strong>
					<?php /* ?><br /><br />
					Lotes cargados:<em><?php echo $airplaneUser->Profile->getPoints() ?></em> */?>
				</div>
			</span>
		</a>
	</li>
	<?php endforeach;?>
	<?php for($left; $left > 0; $left--): ?>
	<li>
		<a class="user" href="#1">
			<img src="<?php echo image_path('avatar.jpg') ?>" />
		</a>
	</li>
	<?php endfor; ?>
</ul>