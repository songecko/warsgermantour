<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=320,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=1"/>
    <?php include_title() ?>
    
    <?php include_stylesheets() ?>    
    <?php include_javascripts() ?>
    
    <?php if(!$sf_user->isAuthenticated()): ?>
    <base target="_parent" />   
    <?php endif; ?> 
  </head>
  <?php include_slot('body_tag', '<body>') ?>
	<div id="fb-root"></div>
	<div class="wrap">	
    	<?php echo $sf_content ?>		
	</div>
	<?php if(!in_array($sf_context->getActionName(), array('como', 'winners'))): ?>
	<div class="bases">
    	<p>Promoción válida en Argentina desde el 01.04.2013 hasta el 31.05.2013 . Ver bases y condiciones en www.warsteiner.com.ar. Sin obligación de compra. Fotos a modo ilustrativo. No acumulable con otras promociones. Organiza Cervecería Argentina S.A. Isenbeck, CUIT N° 30-66198200-0, con domicilio en la Avenida Leandro N. Alem 928, Piso 7, Oficina 721, Ciudad de Buenos Aires. Teléfono 0800-888-8500. BEBER CON MODERACIÓN. PROHIBIDA SU VENTA A MENORES DE 18 AÑOS.</p>
    	<a class="btn_bases" target="_self" href="<?php echo url_for('bases') ?>">bases y condiciones</a>
    </div>
    <?php endif; ?>
	<script type="text/javascript" src="https://connect.facebook.net/es_ES/all.js"></script>
  </body>
</html>