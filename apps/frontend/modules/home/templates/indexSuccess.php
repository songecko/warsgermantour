<div>
  <?php if ($sf_user->isAuthenticated()): ?>
  	Home, usuario: <?php echo $sf_user->getGuardUser()->getUsername() ?>
  <?php endif; ?>
</div>
