window.fbAsyncInit = function() {
  FB.init({
    appId : '255139821244184', // App ID
    status: true, // check login status
    cookie: true, // enable cookies to allow the server to access the session
    xfbml: true,  // parse XFBML
    oath: true
  });
  var login = function(response) {
    var userID = response.authResponse.userID;
    //get the rest of the users data
    FB.api('/me', function(response) {
      //console.log(response);
      window.location = "login.php?userID=" + userID + "&firstname=" + response.first_name + "&lastname=" + response.last_name;
    });
    //window.location = "login.php?userID=" + userID + "&name=" + name;
    
    /*$.ajax({
    	type: 'POST',
    	url: 'Login',
    	data: userID
    }).done(function(response) {
    	window.location = "index.jsp";
    });
    */
  };
  FB.Event.subscribe('auth.login', function(response) {
	login(response);
  });
  FB.Event.subscribe('auth.logout', function(response) {
    $.ajax({
      type: 'POST',
      url: 'logout.php'
    }).done(function(response) {
      window.location = "login.php";
    });
  });
 FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
	login(response);
  }
 });

};
// Load the SDK Asynchronously
(function(d){
  var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement('script'); js.id = id; js.async = true;
  js.src = "//connect.facebook.net/en_US/all.js";
  ref.parentNode.insertBefore(js, ref);
}(document));
