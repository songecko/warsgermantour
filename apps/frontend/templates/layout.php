<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    
    <?php include_stylesheets() ?>    
    <?php include_javascripts() ?>
    
    <script type="text/javascript">
	    <?php /*if(!$sf_user->isAuthenticated()):?>
	    $(document).ready(function() {
			$.fancybox.open($('#login_popup'), {
				modal: true,
				padding: 0,
				autoSize: false,
				width: 499,
				height: 559
			});
	    });
	    <?php endif;*/ ?>
	</script>
  </head>
  <body>
	<div id="fb-root"></div>
	
    <?php echo $sf_content ?>
	
	<?php if(!$sf_user->isAuthenticated()):?>	
	<!-- This contains the hidden content for inline calls -->
	<div id="login_popup" style="display:none">
		<img src="<?php echo image_path('bgModalInicial.png') ?>" />
		<div class="btnLoginPopup"><a href="<?php echo url_for('twitter_signin') ?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','<?php echo image_path('btnTwitterOn.png') ?>',1)"><img src="<?php echo image_path('btnTwitter.png') ?>" width="247" height="60" id="Image1" /></a></div>
	</div>
	<?php endif; ?>
	<script type="text/javascript" src="http://connect.facebook.net/es_ES/all.js"></script>
  </body>
</html>