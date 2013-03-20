<div>
  <?php if ($sf_user->isAuthenticated()): ?>
    Tu es connecté et ton login est : <?php echo $sf_user->getGuardUser()->getUsername() ?>
  <?php endif; ?>
</div>
