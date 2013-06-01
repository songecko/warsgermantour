<?php slot('body_tag') ?>
  <body class="game">
<?php end_slot(); ?>

<!-- PARTICIPANTES -->
<div id="participantes">	
	<?php include_partial('home/airplaneUsers', array(
			'airplaneUsers' => $airplaneUsers,
			'outsideUsers' => $outsideUsers, 
			'totalAirplaneUsers' => $totalAirplaneUsers,
			'totalOutsideUsers' => $totalOutsideUsers
		)); 
	?>	
</div>
  
<!-- CARGAR CODIGOS -->
<div class="cargar">
	<form method="post" action="<?php echo url_for('send_promo_code');?>">
		<?php echo $form['_csrf_token']->render() ?>
		<?php echo $form['code']->render(array('class' => $form['code']->hasError()?'error':'')) ?>
		<input type="submit" class="btn_ingresar" value="Ingresar" />
	</form>
</div>
  
<!-- TIPS -->
<div class="tips">
	<div class="logo"><img src="<?php echo image_path('loguitp.png')?>" alt="warsteiner" /></div>
    <div class="burbuja">
		<div class="top"></div>
		<div class="cont">Ingresá más códigos de lote y hora para mantenerte en el avión!!</div>
		<div class="bottom"></div>
	</div>
</div>
  
<!-- COMPARTIR -->
<div class="share">
	<!-- AddThis Button BEGIN -->
	<div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a><br />
	  <br />
	  <a class="addthis_button_tweet"></a><br />
	  <br />
	  <a class="addthis_counter addthis_pill_style"></a> </div>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-51a8f3ff21060d09"></script> 
	<!-- AddThis Button END -->
</div>

<script type="text/javascript">
var timeoutID;

var startTimer = function()
{
	timeoutID = window.setTimeout(refreshAirplane, 10000);
};

var refreshAirplane = function()
{
	$.post('<?php echo url_for('airplane_users') ?>', 
		function(data, textStatus, jqXHR)
		{
			$('#participantes').html(data);

			startTimer();
		}
	);
};

$(document).ready(function()
{
	$('.popup a.btn_close').click(function(e){
		$(this).parent('.popup').hide();
		e.preventDefault();
	});

	<?php if(isset($success)): ?>
	$('#success_popup').show();
	<?php endif; ?>
	
	<?php if(isset($error)): ?>
	$('#error_popup').show();
	<?php endif; ?>
	
	startTimer();
});
</script>