<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <meta name="viewport" content="width=500;initial-scale=1.0; minimum-scale=1.0;maximum-scale=1.0; user-scalable=1;"/>
    <?php include_title() ?>
   
	<link href="<?php echo _compute_public_path('mobile.css', 'css', 'css') ?>" rel="stylesheet" type="text/css" />
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
		<img src="<?php echo image_path('botones.png')?>" />
	</div>
	<script type="text/javascript" src="https://connect.facebook.net/es_ES/all.js"></script>
  </body>
</html>