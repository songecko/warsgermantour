<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=320,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=1"/>
	<meta property="og:image" content="<?php echo image_path('fb_share.png', true) ?>" />
    <?php include_title() ?>
    
    <?php include_stylesheets() ?>    
    <?php include_javascripts() ?>
    
    <?php /*if(!$sf_user->isAuthenticated()): ?>
    <base target="_parent" />   
    <?php endif; */?> 
    <script type="text/javascript">
    	<?php
	$isMobile = (preg_match('#^(?!.*iPad).*(Mobile|Jasmine|Symbian|NetFront|BlackBerry|Opera Mini|Opera Mobi).*$#i', $sf_request->getHttpHeader('User-Agent')) && !$sf_user->getAttribute('fullversion', false));		
	if(!$isMobile):
	?>
    if (window.self === window.top) window.location = '<?php echo sfConfig::get('app_facebook_tab_url') ?>';
    <?php endif; ?>
	$(document).ready(function()
	{
		$('.popup a.btn_close').click(function(e){
			$(this).parents('.popup').hide();
			e.preventDefault();
		});
	});
	</script>
  </head>
  <?php include_slot('body_tag', '<body>') ?>
	<div id="fb-root"></div>
	
	<!-- POPUPS -->
	<?php include_partial('global/popups') ?>
	
	<div class="wrap clearfix">	
    	<?php echo $sf_content ?>		
	</div>
	<div class="footer clearfix">
		<p>Promoción válida en Argentina desde el 01.04.2013 hasta el 31.05.2013 . Ver bases y condiciones en www.warsteiner.com.ar. Sin obligación de compra. Fotos a modo ilustrativo. No acumulable con otras promociones. Organiza Cervecería Argentina S.A. Isenbeck, CUIT N° 30-66198200-0, con domicilio en la Avenida Leandro N. Alem 928, Piso 7, Oficina 721, Ciudad de Buenos Aires. Teléfono 0800-888-8500. BEBER CON MODERACIÓN. PROHIBIDA SU VENTA A MENORES DE 18 AÑOS.</p>
		<a href="<?php echo url_for('pregame') ?>"><img src="<?php echo image_path('botones.png')?>" /></a>
	</div>
	<script type="text/javascript" src="https://connect.facebook.net/es_ES/all.js"></script>
  </body>
</html>