var lg = Login = function(){
	console.log('LOGIN');

	this.csrf = document.getElementsByName('_token')[0].value;
	this.bind_events();
}

Login.prototype.bind_events = function(){
	var _this = this;
	var iniciar = document.getElementById('iniciar');
	if( iniciar ){
		iniciar.addEventListener('click', function(e){
			
			var email = document.getElementById('email').value;
			var pass  = document.getElementById('password').value;
			var remember = document.getElementById('remember').checked;

			if( !email || !pass )
				return false;

			var info = {
				mail: email,
				password : pass,
				remember: remember
			}
			_this.send_ajax('POST', '/login', info, _this.redirectLogin, true);
		});
	}

	var reset = document.getElementById('reset');
	if( reset ){
		document.getElementById('reset').addEventListener('click', function(e){
			var email = document.getElementById('email').value;
			if( !email )
				return false;

			var info = {
				email: email
			}

			_this.send_ajax('POST', '/reset', info, _this.redirectLogin, true);
		});	
	}
}

Login.prototype.redirectLogin = function(resp){
	location.href = resp.url;
}

Login.prototype.send_ajax = function(type, url, info, callback, returnResponse = false){
	var _this = this;
	var xhr = new XMLHttpRequest();
	xhr.open(type, url);
	xhr.setRequestHeader('Content-Type', 'application/json');
	xhr.setRequestHeader('X-CSRF-TOKEN', _this.csrf);
	xhr.onload = function() {
	    if (xhr.status === 200) {
	        var response = JSON.parse(xhr.responseText);
	        if( returnResponse )
	        	callback(response);
	        else{
		        if( response.error )
		        	toastr['error']('Hubo un error al guardar', response.msj);
		        else{
  					toastr.options.onHidden = function() { 
  						callback();
  					}
		        	toastr['success']('Actualizado correctamente');
		        }

		    }
	    }
	};

	xhr.send(JSON.stringify(info));
}

Login.prototype.notification = function(title, msj, callback = null){
  	if ( Notification.permission !== "granted" )
    	Notification.requestPermission();
  	else {
	    var notification = new Notification(title, {
	      	icon: '/images/icon.jpg',
	      	body: msj,
	    });

	    notification.onclick = function(callback) {
	    	if( callback )
	    		callback();
	    };

	    notification.onclick(callback);
  	}
}