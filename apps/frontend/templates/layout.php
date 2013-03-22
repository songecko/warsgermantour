<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    
    <?php include_stylesheets() ?>    
    <?php include_javascripts() ?>
    
    <?php if(!$sf_user->isAuthenticated()): ?>
    <base target="_parent" />   
    <?php endif; ?>
  </head>
  <body>
	<div id="fb-root"></div>
	
    <?php echo $sf_content ?>
		
	<script type="text/javascript" src="http://connect.facebook.net/es_ES/all.js"></script>
  </body>
</html>