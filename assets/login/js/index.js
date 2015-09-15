 $("#login-button").click(function(event){
	 event.preventDefault();
	 $('form').fadeOut(500);
     $('.wrapper').addClass('form-success');
     var username = $('#username').val();
     var password = $('#password').val();
     window.location = "admincp/login?name=" + username + "&key=" + password;
});