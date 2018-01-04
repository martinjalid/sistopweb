var Adm = Administracion = function () {
	console.log('ADMINISTRACION');

	this.general = new General();
	this.general.csrf = document.getElementsByName('_token')[0].value;
	this.bind_events();
}

Administracion.prototype.bind_events = function(){
	
}