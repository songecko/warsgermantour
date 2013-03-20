<div class="comments-mje-pop fontTitillium">Conectate</div>
<div class="comments-mensaje-pop">
    Conectate con Twitter o con Facebook para dejar tu voto.
</div>
<div class="signin">
    <div class="signin-fb">
        <a href="#" id="facebookConnectButton"><img src="<?php echo image_path('bt-signin-fb.png')?>" width="154" height="25" /></a>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function()
{
    //sfFacebook.init('<?php echo sfConfig::get('app_facebook_api_key')?>', '<?php echo url_for(sfConfig::get('app_facebook_connect_signin_url')) ?>');

    //Facebook Connect
    $('#facebookConnectButton').click(function(e)
    {
        FB.login(function(response) {
            if (response.session) {
                if (response.perms) {  // user is logged in and granted some permissions.
                    $.fancybox.showActivity();

                    $.ajax({
                        url: '<?php echo $sf_request->getUri() ?>',
                        data: 'forceLogin=1',
                        type: 'GET',
                        dataType: 'html',
                        success: function(data, textStatus, jqXHR)
                        {
                            $.fancybox(data,
                            {
                                'scrolling'          : 'no',
                                'titleShow'          : false,
                                'padding'         : 0,
                                'showCloseButton' : false
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown)
                        {
                            alert(textStatus);
                        }
                    });
                } else {  // user is logged in, but did not grant any permissions
                }
              } else {  // user is not logged in
              }
        }, {perms:'publish_stream'});

        e.preventDefault();
    });
});
</script>