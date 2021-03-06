var gral = General = function(){}

General.prototype.notification = function(title, msj, type = 'success', callback = null){
  	// if ( Notification.permission !== "granted" )
   //  	Notification.requestPermission();
  	// else {
	  //   var notification = new Notification(title, {
	  //     	icon: '/images/icon.jpg',
	  //     	body: msj,
	  //   });

	  //   notification.onclick = function(callback) {
	  //   	if( callback )
	  //   		callback();
	  //   };

	  //   notification.onclick(callback);
  	// }
  	toastr[type](msj, title	);
}

General.prototype.copy = function(id){	
   	var input = document.getElementById(id);  
	var range = document.createRange();  
	range.selectNode(input);  
	window.getSelection().addRange(range);
   	try {  
	    var success = document.execCommand('copy');  
	    var msj = success ? 'Success' : 'Error';  

	    this.notification('Texto copiado al portapapeles', msj, null);
	} catch(err) {  
		this.notification('Error al copiar', err, null);
	}

	window.getSelection().removeAllRanges();  
}

General.prototype.send_ajax = function(type, url, info, callback, returnResponse = false){
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