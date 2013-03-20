var sfFacebook = {
        init: function(appId, signinUrl)
        {
            FB.init({
                appId  : appId,
                status : true, // check login status
                cookie : true, // enable cookies to allow the server to access the session
                xfbml  : true  // parse XFBML
            });
        }
};