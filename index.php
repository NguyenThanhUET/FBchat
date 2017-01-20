<!-- required logined facebook-->
<html>
<body>
<div>
    Duration post : <input id="step-duration" value="10"/> Minute<br><br>
    <button id="btn-post">Run Start Post Group</button>
    <button id="btn-post-friend">Run Start Post Friend</button>
    <button id="btn-like">Like</button>
</div>
</body>
</html>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click','#btn-post',function(){
            var duration  =  $('#step-duration').val()*1000;
            var messagePost =   Math.random();
            startPost(duration,messagePost);
        });
        $(document).on('click','#btn-post-friend',function(){
            var duration  =  $('#step-duration').val()*1000;
            var messagePost =   Math.random();
            postOtherAccount();
        });
        $(document).on('click','#btn-like',function(){
            var duration  =  $('#step-duration').val()*1000;
            var messagePost =   Math.random();
            likePost();
        });
    });

    window.fbAsyncInit = function() {
        FB.init({
            appId      : '788330954675815',
            status     : true, // check login status
            cookie     : true, // enable cookies to allow the server to access the session
            xfbml      : true,
            version    : 'v2.8'
        });
        FB.AppEvents.logPageView();

        /*FB.ui(
         {
         method: 'share',
         href: 'https://developers.facebook.com/docs/'
         }, function(response){});*/
        /*FB.ui({
         method: 'share_open_graph',
         action_type: 'og.likes',
         action_properties: JSON.stringify({
         object:'https://developers.facebook.com/docs/',
         })
         }, function(response){
         // Debug response (optional)
         console.log(response);
         });*/
        /*FB.getLoginStatus(function(response) {
         if (response.status === 'connected') {
         console.log('Logged in.');
         }
         else {
         FB.login();
         }
         });*/
        //FB.api('/me/feed', 'post', {message: 'Hello, 45454545!'});


    };
    function startPost(duration,messagePost){
        FB.login(function(){
            // Note: post on my group
            FB.api('/1431685630189116/feed', 'post', {message: messagePost}, function (response) {
                if (response && !response.error) {
                    console.log(response);
                }
            });
        }, {scope: 'publish_actions',
            return_scopes: true});
        // setTimeout(startPost,duration);
    }
    function likePost(){
        FB.login(function(){
            // Note: post on my group
            FB.api('/1175490972535612/likes', 'post', function (response) {
                if (response && !response.error) {
                    console.log(response);
                }
            });
        }, {scope: 'publish_actions',
            return_scopes: true});
        // setTimeout(startPost,duration);
    }
    function postOtherAccount(){
        FB.login(function(){
            $.ajax({
                type		:	'GET',
                url			:	'https://graph.facebook.com/oauth/access_token?client_id=930904860379045&client_secret=fe3f9be9d8db272b6ffc6d5ed2bfc9da&grant_type=client_credentials',
                dataType	:	'html',
                loading		:	true,
                data		:	{},
                success: function(html) {
                    console.log(html);
                    FB.api(
                        "graph.facebook.com/1431685630189116/feed?message=dsdsdsdsds&"+html,
                        function (response) {
                            if (response && !response.error) {
                                /!* handle the result *!/
                                console.log(response);
                            }
                        }
                    );
                },
            });


        }, {scope: 'publish_actions',
            return_scopes: true});
    }
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));



</script>
