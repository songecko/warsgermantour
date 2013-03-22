<div>
  <?php if ($sf_user->isAuthenticated()): ?>
  	Home, usuario: <?php echo $sf_user->getGuardUser()->getUsername() ?>
  <?php endif; ?>
</div>
<a href="<?php echo url_for('send_promo_code') ?>">Cargar lote</a>