var us = Usuario = function(){
	console.log('USUARIO');
	
	this.tb			 = new DataTable();
	this.tb.filtros  = ['nombre', 'apellido', 'dni']; // ESTA LISTA SE ORDENA COMO EL ROUTER ESPERA LAS VARIABLES
	this.tb.pathname = location.pathname;
	this.tb.path_explode = this.tb.pathname.split('/');

	this.tb.expand_filters();
	this.tb.load_filters();
	this.bind_events();
}

Usuario.prototype.bind_events = function(){
	var _this = this;
	var url_origin = '/cliente/';

	document.getElementById('new_user').addEventListener('click', function(e){
		location.href = '/cliente/new';
	});

	document.getElementById('filtro_nombre_button').addEventListener('click', function(e){
		var nombre = document.getElementById('filtro_nombre').value; 
		
		// Para el caso que el input del nombre está vacío
		if( nombre == '' ) 
			nombre = 'all';

		var new_url 	= _this.tb.make_url(url_origin, 'nombre', nombre);
		location.href	= new_url;
	});

	document.getElementById('filtro_apellido_button').addEventListener('click', function(e){
		var apellido = document.getElementById('filtro_apellido').value; 
		
		// Para el caso que el input del apellido está vacío
		if( apellido == '' ) 
			apellido = 'all';

		var new_url 	= _this.tb.make_url(url_origin, 'apellido', apellido);
		location.href	= new_url;
	});

	document.getElementById('filtro_dni_button').addEventListener('click', function(e){
		var dni = document.getElementById('filtro_dni').value; 
		
		// Para el caso que el input del dni está vacío
		if( dni == '' ) 
			dni = 'all';

		var new_url 	= _this.tb.make_url(url_origin, 'dni', nombre);
		location.href	= new_url;
	});
}

var usE = UsuarioEdit = function(){
	console.log('USUARIO EDIT');

	this.general = new General();
	this.general.csrf = document.getElementsByName('_token')[0].value;
	this.bind_events();

	this.user_general = new UsuarioGeneral();
}

UsuarioEdit.prototype.callback_save_perfil = function(){
	$('#usuario-perfil').modal('hide');
	location.reload();
}

UsuarioEdit.prototype.bind_events = function(){
	var _this = this;

	//document.getElementById('new_receta').addEventListener('click', function(e){
	//	location.href = '/cliente/new-receta';
	//});	

	document.getElementById('save_perfil').addEventListener('click', function(e){
		_this.user_general.save_usuario('PUT', location.href+'/edit', _this.callback_save_perfil);		
	});
	
}

var usNew = UsuarioNew = function(){
	console.log('USUARIO NUEVO');

	this.general = new General();
	this.general.csrf = document.getElementsByName('_token')[0].value;

	this.user_general = new UsuarioGeneral();

	this.bind_events();
}

UsuarioNew.prototype.bind_events = function(){
	var _this = this;

	// SAVE USUARIO
	document.getElementById('save_perfil').addEventListener('click', function(){
		_this.user_general.save_usuario('POST', '/usuario/new' , _this.callback_save_new_perfil);
	});
}

UsuarioNew.prototype.callback_save_new_perfil = function(){
	location.reload();
}

var usGeneral = UsuarioGeneral = function(){
	this.general = new General();
	this.general.csrf = document.getElementsByName('_token')[0].value;

	this.bind_events(); 
}

UsuarioGeneral.prototype.save_usuario = function(type, url, callback){
	var _this = this;

	var id 			= document.getElementById('save_perfil').getAttribute('usuario');
	var nombre 		= document.getElementById('perfil_nombre').value;
	var apellido 	= document.getElementById('perfil_apellido').value;
	var dni 		= document.getElementById('perfil_dni').value;	
	var direccion 	= document.getElementById('perfil_direccion').value;	
	var telefono 	= document.getElementById('perfil_telefono').value;
	var obra 		= document.getElementById('perfil_obra').value;
	var num_obra 	= document.getElementById('perfil_num_obra').value;

	var info = { 
		'usuario'	: id,
		'nombre'  	: nombre,
		'apellido' 	: apellido,
		'dni'		: dni,
		'direccion'	: direccion,
		'telefono'	: telefono,
		'obra'  	: obra,
		'num_obra'  : num_obra
	};

	if( _this.validarPerfil(info) )
		_this.general.send_ajax(type, url, info, callback);		
	else
		_this.general.notification('Hubo un error, complete los campos faltantes', '', null);
}

UsuarioGeneral.prototype.bind_events = function(){
	var _this 	= this;
}

UsuarioGeneral.prototype.validarPerfil = function(perfil){
	valido = true;

	if( perfil.nombre == '' )
		valido = false;
	else if( perfil.apellido == '' )
		valido = false;
	else if( perfil.telefono == '' )
		valido = false;
	else if( perfil.dni < 6 )
		valido = false;
	else if( perfil.direccion == '' )
		valido = false;	
	else if( perfil.obra == '')
		valido = false;
	else if( perfil.num_obra == '')
		valido = false;

	return valido;
}