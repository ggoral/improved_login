// Login Form

$(function() {
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
	var inputPlace = document.getElementById('user');
	inputPlace.focus();
    button.removeAttr('href');		
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
		inputPlace.focus();
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});
