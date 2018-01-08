var rec = RecetaEdit = function(){
	console.log('RECETA EDIT');
	this.receta_general = new RecetaGeneral();
	this.general = new General();
	this.general.csrf = document.getElementsByName('_token')[0].value;

	this.bind_events();
}

RecetaEdit.prototype.bind_events = function(){
	var _this = this;
	var cerca = document.getElementById('cerca');
	var lejos = document.getElementById('lejos');
	var tipo_lente = document.getElementById('tipo_lente').velue;

	if ( cerca != null && tipo_lente == 'Monofocal') {
		$(cerca).find('select[name=tratamiento_id]').on('change', function(e){
			var tratamiento_color = $(lejos).find('input[name=tratamiento_color]');
			if (this.value == -1) {
				tratamiento_color.parent().parent().hide(300);
				tratamiento_color.val('');
			}else{
				tratamiento_color.parent().parent().show(300);
			}
		});
	};

	if ( lejos != null ) {
		$(lejos).find('select[name=tratamiento_id]').on('change', function(e){
			var tratamiento_color = $(lejos).find('input[name=tratamiento_color]');
			if (this.value == '') {
				tratamiento_color.parent().parent().hide(300);
				tratamiento_color.val('');
			}else{
				tratamiento_color.parent().parent().show(300);
			}
		});

	};

	document.getElementById('guardar_receta').addEventListener('click',function(){
		if( _this.validate() )
			_this.general.notification('Error', 'Hay error en algunos campos', 'error');
		else
			_this.save_receta();
		
	});
	
};

RecetaEdit.prototype.validate = function(){
	var _this = this;
	var error = false
	var cerca = document.getElementById('cerca');
	var lejos = document.getElementById('lejos');
	var tipo_lente = document.getElementById('tipo_lente').velue;

	if ( lejos != null ) {
		var od_esferico = $(lejos).find('input[name=od_esferico]');
		if( od_esferico.val() != '' && !$.isNumeric( od_esferico.val() ) ){
			_this.receta_general.add_error( od_esferico );
			error = true;
		};

		var od_cilindrico = $(lejos).find('input[name=od_cilindrico]');
		if( od_cilindrico.val() != '' && !$.isNumeric( od_cilindrico.val() ) ){
			_this.receta_general.add_error( od_cilindrico );
			error = true;
		};

		var od_eje = $(lejos).find('input[name=od_eje]');
		if( od_eje.val() != '' && !$.isNumeric( od_eje.val() ) ){
			_this.receta_general.add_error( od_eje );
			error = true;
		};

		var oi_esferico = $(lejos).find('input[name=oi_esferico]');
		if( oi_esferico.val() != '' && !$.isNumeric( oi_esferico.val() ) ){
			_this.receta_general.add_error( oi_esferico );
			error = true;
		};

		var oi_cilindrico = $(lejos).find('input[name=oi_cilindrico]');
		if( oi_cilindrico.val() != '' && !$.isNumeric( oi_cilindrico.val() ) ){
			_this.receta_general.add_error( oi_cilindrico );
			error = true;
		};

		var oi_eje = $(lejos).find('input[name=oi_eje]');
		if( oi_eje.val() != '' && !$.isNumeric( oi_eje.val() ) ){
			_this.receta_general.add_error( oi_eje );
			error = true;
		};

		var valor_lente = $(lejos).find('input[name=valor_lente]');
		if( valor_lente.val() != '' && !$.isNumeric( valor_lente.val() ) ){
			_this.receta_general.add_error( valor_lente );
			error = true;
		};

		var valor_armazon = $(lejos).find('input[name=valor_armazon]');
		if( valor_armazon.val() != '' && !$.isNumeric( valor_armazon.val() ) ){
			_this.receta_general.add_error( valor_armazon );
			error = true;
		};
	}

	if ( cerca != null ) {
		var od_esferico = $(cerca).find('input[name=od_esferico]');
		if( od_esferico.val() != '' && !$.isNumeric( od_esferico.val() ) ){
			_this.receta_general.add_error( od_esferico );
			error = true;
		};

		var od_cilindrico = $(cerca).find('input[name=od_cilindrico]');
		if( od_cilindrico.val() != '' && !$.isNumeric( od_cilindrico.val() ) ){
			_this.receta_general.add_error( od_cilindrico );
			error = true;
		};

		var od_eje = $(cerca).find('input[name=od_eje]');
		if( od_eje.val() != '' && !$.isNumeric( od_eje.val() ) ){
			_this.receta_general.add_error( od_eje );
			error = true;
		};

		var oi_esferico = $(cerca).find('input[name=oi_esferico]');
		if( oi_esferico.val() != '' && !$.isNumeric( oi_esferico.val() ) ){
			_this.receta_general.add_error( oi_esferico );
			error = true;
		};

		var oi_cilindrico = $(cerca).find('input[name=oi_cilindrico]');
		if( oi_cilindrico.val() != '' && !$.isNumeric( oi_cilindrico.val() ) ){
			_this.receta_general.add_error( oi_cilindrico );
			error = true;
		};

		var oi_eje = $(cerca).find('input[name=oi_eje]');
		if( oi_eje.val() != '' && !$.isNumeric( oi_eje.val() ) ){
			_this.receta_general.add_error( oi_eje );
			error = true;
		};

		var valor_lente = $(cerca).find('input[name=valor_lente]');
		if( valor_lente.val() != '' && !$.isNumeric( valor_lente.val() ) ){
			_this.receta_general.add_error( valor_lente );
			error = true;
		};

		var valor_armazon = $(cerca).find('input[name=valor_armazon]');
		if( valor_armazon.val() != '' && !$.isNumeric( valor_armazon.val() ) ){
			_this.receta_general.add_error( valor_armazon );
			error = true;
		};
	}

	return error;
}

RecetaEdit.prototype.save_receta = function(){
	var _this = this;
	var cerca = document.getElementById('cerca');
	var lejos = document.getElementById('lejos');

	if ( lejos != null ) {
		var _lejos = {
			'od_esferico' 		: $(lejos).find('input[name=od_esferico]').val(),
			'od_cilindrico' 	: $(lejos).find('input[name=od_cilindrico]').val(),
			'od_eje' 			: $(lejos).find('input[name=od_eje]').val(),
			'oi_esferico' 		: $(lejos).find('input[name=oi_esferico]').val(),
			'oi_cilindrico' 	: $(lejos).find('input[name=oi_cilindrico]').val(),
			'oi_eje' 			: $(lejos).find('input[name=oi_eje]').val(),
			'valor_lente' 		: $(lejos).find('input[name=valor_lente]').val(),
			'valor_armazon' 	: $(lejos).find('input[name=valor_armazon]').val(),
			'armazon' 			: $(lejos).find('input[name=armazon]').val(),
			'material_lente_id' : $(lejos).find('select[name=material_lente_id]').val(),
			'tratamiento_id' 	: $(lejos).find('select[name=tratamiento_id]').val(),
			'tratamiento_color' : $(lejos).find('input[name=tratamiento_color]').val(),
			'color_id' 			: $(lejos).find('select[name=color_id]').val(),
		}
	}

	if ( cerca != null ) {
		var _cerca = {
			'od_esferico' 		: $(cerca).find('input[name=od_esferico]').val(),
			'od_cilindrico' 	: $(cerca).find('input[name=od_cilindrico]').val(),
			'od_eje' 			: $(cerca).find('input[name=od_eje]').val(),
			'oi_esferico' 		: $(cerca).find('input[name=oi_esferico]').val(),
			'oi_cilindrico' 	: $(cerca).find('input[name=oi_cilindrico]').val(),
			'oi_eje' 			: $(cerca).find('input[name=oi_eje]').val(),
			'valor_lente' 		: $(cerca).find('input[name=valor_lente]').val(),
			'valor_armazon' 	: $(cerca).find('input[name=valor_armazon]').val(),
			'armazon' 			: $(cerca).find('input[name=armazon]').val(),
			'material_lente_id' : $(cerca).find('select[name=material_lente_id]').val(),
			'tratamiento_id' 	: $(cerca).find('select[name=tratamiento_id]').val(),
			'tratamiento_color' : $(cerca).find('input[name=tratamiento_color]').val(),
			'color_id' 			: $(cerca).find('select[name=color_id]').val(),
		}
	}

	var _receta = {
		'distancia' 	: $("input[name=distancia]").val(),
		'altura' 		: $("input[name=altura]").val(),
		'adicion' 		: $("input[name=adicion]").val(),
		'detalle_lente' : $("input[name=detalle_lente]").val(),
	} 

	var _producto = {
		'profesional_id' : $("select[name=profesional_id]").val(),
		'observacion' : $("#observacion").val(),
	}

	var info = {
		'lejos' 	: _lejos,
		'cerca' 	: _cerca,
		'receta' 	: _receta,
		'producto' 	: _producto,
	}

	_this.general.send_ajax('POST', location.href+'/edit_receta', info, _this.receta_general.callback);
}

var rec_len = RecetaLenteEdit = function(){
	console.log('RECETA LENTE EDIT');
	this.receta_general = new RecetaGeneral();
	this.general = new General();
	this.general.csrf = document.getElementsByName('_token')[0].value;

	this.bind_events();
}

RecetaLenteEdit.prototype.bind_events = function(){
	var _this = this;
	document.getElementById('guardar_receta').addEventListener('click', function(){
		if ( _this.validate() )
			_this.general.notification('Error', 'Hay error en algunos campos', 'error');
		else
			_this.save_receta();
	});
}

RecetaLenteEdit.prototype.validate = function(){
	var _this = this;
	var prueba = document.getElementById('prueba');
	var oftalmologo = document.getElementById('oftalmologo');
	var lentes_pedidas = document.getElementById('lentes_pedidas');
	var queratometria = document.getElementById('queratometria');
	var agudeza = document.getElementById('agudeza');
	var error = false;
	
	{ // PRUEBA
		var od_esferico = $(prueba).find('input[name=od_esferico]');
		if( od_esferico.val() != '' && !$.isNumeric( od_esferico.val() ) ){
			_this.receta_general.add_error( od_esferico );
			error = true;
		};
		var od_cilindrico = $(prueba).find('input[name=od_cilindrico]');
		if( od_cilindrico.val() != '' && !$.isNumeric( od_cilindrico.val() ) ){
			_this.receta_general.add_error( od_cilindrico );
			error = true;
		};
		var od_eje = $(prueba).find('input[name=od_eje]');
		if( od_eje.val() != '' && !$.isNumeric( od_eje.val() ) ){
			_this.receta_general.add_error( od_eje );
			error = true;
		};
		var oi_esferico = $(prueba).find('input[name=oi_esferico]');
		if( oi_esferico.val() != '' && !$.isNumeric( oi_esferico.val() ) ){
			_this.receta_general.add_error( oi_esferico );
			error = true;
		};
		var oi_cilindrico = $(prueba).find('input[name=oi_cilindrico]');
		if( oi_cilindrico.val() != '' && !$.isNumeric( oi_cilindrico.val() ) ){
			_this.receta_general.add_error( oi_cilindrico );
			error = true;
		};
		var oi_eje = $(prueba).find('input[name=oi_eje]');
		if( oi_eje.val() != '' && !$.isNumeric( oi_eje.val() ) ){
			_this.receta_general.add_error( oi_eje );
			error = true;
		};
	}

	{ // OFTALMOLOGO
		var od_esferico = $(oftalmologo).find('input[name=od_esferico]');
		if( od_esferico.val() != '' && !$.isNumeric( od_esferico.val() ) ){
			_this.receta_general.add_error( od_esferico );
			error = true;
		};
		var od_cilindrico = $(oftalmologo).find('input[name=od_cilindrico]');
		if( od_cilindrico.val() != '' && !$.isNumeric( od_cilindrico.val() ) ){
			_this.receta_general.add_error( od_cilindrico );
			error = true;
		};
		var od_eje = $(oftalmologo).find('input[name=od_eje]');
		if( od_eje.val() != '' && !$.isNumeric( od_eje.val() ) ){
			_this.receta_general.add_error( od_eje );
			error = true;
		};
		var oi_esferico = $(oftalmologo).find('input[name=oi_esferico]');
		if( oi_esferico.val() != '' && !$.isNumeric( oi_esferico.val() ) ){
			_this.receta_general.add_error( oi_esferico );
			error = true;
		};
		var oi_cilindrico = $(oftalmologo).find('input[name=oi_cilindrico]');
		if( oi_cilindrico.val() != '' && !$.isNumeric( oi_cilindrico.val() ) ){
			_this.receta_general.add_error( oi_cilindrico );
			error = true;
		};
		var oi_eje = $(oftalmologo).find('input[name=oi_eje]');
		if( oi_eje.val() != '' && !$.isNumeric( oi_eje.val() ) ){
			_this.receta_general.add_error( oi_eje );
			error = true;
		};
	}

	{ // PEDIDAS
		var od_esferico = $(lentes_pedidas).find('input[name=od_esferico]');
		if( od_esferico.val() != '' && !$.isNumeric( od_esferico.val() ) ){
			_this.receta_general.add_error( od_esferico );
			error = true;
		};
		var od_cilindrico = $(lentes_pedidas).find('input[name=od_cilindrico]');
		if( od_cilindrico.val() != '' && !$.isNumeric( od_cilindrico.val() ) ){
			_this.receta_general.add_error( od_cilindrico );
			error = true;
		};
		var od_eje = $(lentes_pedidas).find('input[name=od_eje]');
		if( od_eje.val() != '' && !$.isNumeric( od_eje.val() ) ){
			_this.receta_general.add_error( od_eje );
			error = true;
		};
		var oi_esferico = $(lentes_pedidas).find('input[name=oi_esferico]');
		if( oi_esferico.val() != '' && !$.isNumeric( oi_esferico.val() ) ){
			_this.receta_general.add_error( oi_esferico );
			error = true;
		};
		var oi_cilindrico = $(lentes_pedidas).find('input[name=oi_cilindrico]');
		if( oi_cilindrico.val() != '' && !$.isNumeric( oi_cilindrico.val() ) ){
			_this.receta_general.add_error( oi_cilindrico );
			error = true;
		};
		var oi_eje = $(lentes_pedidas).find('input[name=oi_eje]');
		if( oi_eje.val() != '' && !$.isNumeric( oi_eje.val() ) ){
			_this.receta_general.add_error( oi_eje );
			error = true;
		};
	}

	{ // AGUDEZA
		var od = $(agudeza).find('input[name=od]');
		if( od.val() != '' && !$.isNumeric( od.val() ) ){
			_this.receta_general.add_error( od );
			error = true;
		};
		var oi = $(agudeza).find('input[name=oi]');
		if( oi.val() != '' && !$.isNumeric( oi.val() ) ){
			_this.receta_general.add_error( oi );
			error = true;
		};
		var ao = $(agudeza).find('input[name=ao]');
		if( ao.val() != '' && !$.isNumeric( ao.val() ) ){
			_this.receta_general.add_error( ao );
			error = true;
		};
	}

	{ // QUERATOMETRIA
		var od = $(queratometria).find('input[name=od]');
		if( od.val() != '' && !$.isNumeric( od.val() ) ){
			_this.receta_general.add_error( od );
			error = true;
		};
		var oi = $(queratometria).find('input[name=oi]');
		if( oi.val() != '' && !$.isNumeric( oi.val() ) ){
			_this.receta_general.add_error( oi );
			error = true;
		};
	}

	var color = $('input[name=color]');
	if( color.val() != '' && !$.isNumeric( color.val() ) ){
		_this.receta_general.add_error( color );
		error = true;
	};

	var radio = $('input[name=radio]');
	if( radio.val() != '' && !$.isNumeric( radio.val() ) ){
		_this.receta_general.add_error( radio );
		error = true;
	};

	var diametro = $('input[name=diametro]');
	if( diametro.val() != '' && !$.isNumeric( diametro.val() ) ){
		_this.receta_general.add_error( diametro );
		error = true;
	};

	return error;
};

RecetaLenteEdit.prototype.save_receta = function(){
	var _this = this;

	var prueba = document.getElementById('prueba');
	var oftalmologo = document.getElementById('oftalmologo');
	var lentes_pedidas = document.getElementById('lentes_pedidas');
	var queratometria = document.getElementById('queratometria');
	var agudeza = document.getElementById('agudeza');

	var _prueba = {
		'od_esferico' 	: $(prueba).find('input[name=od_esferico]').val(),
		'od_cilindrico' : $(prueba).find('input[name=od_cilindrico]').val(),
		'od_eje' 		: $(prueba).find('input[name=od_eje]').val(),
		'oi_esferico' 	: $(prueba).find('input[name=oi_esferico]').val(),
		'oi_cilindrico' : $(prueba).find('input[name=oi_cilindrico]').val(),
		'oi_eje' 		: $(prueba).find('input[name=oi_eje]').val(),
		'od_agudeza' 	: $(agudeza).find('input[name=od]').val(),
		'oi_agudeza' 	: $(agudeza).find('input[name=oi]').val(),
		'ao_agudeza' 	: $(agudeza).find('input[name=ao]').val(),
	};

	var _oftalmologo = {
		'od_esferico' 	: $(oftalmologo).find('input[name=od_esferico]').val(),
		'od_cilindrico' : $(oftalmologo).find('input[name=od_cilindrico]').val(),
		'od_eje' 		: $(oftalmologo).find('input[name=od_eje]').val(),
		'oi_esferico' 	: $(oftalmologo).find('input[name=oi_esferico]').val(),
		'oi_cilindrico' : $(oftalmologo).find('input[name=oi_cilindrico]').val(),
		'oi_eje' 		: $(oftalmologo).find('input[name=oi_eje]').val(),
	};

	var _receta_lente = {
		'od_esferico' 		: $(lentes_pedidas).find('input[name=od_esferico]').val(),
		'od_cilindrico' 	: $(lentes_pedidas).find('input[name=od_cilindrico]').val(),
		'od_eje' 			: $(lentes_pedidas).find('input[name=od_eje]').val(),
		'oi_esferico' 		: $(lentes_pedidas).find('input[name=oi_esferico]').val(),
		'oi_cilindrico' 	: $(lentes_pedidas).find('input[name=oi_cilindrico]').val(),
		'oi_eje' 			: $(lentes_pedidas).find('input[name=oi_eje]').val(),
		'queratometria_oi' 	: $(queratometria).find('input[name=oi]').val(),
		'queratometria_od' 	: $(queratometria).find('input[name=od]').val(),
		'diametro' 			: $('input[name=diametro]').val(),
		'color' 			: $('input[name=color]').val(),
		'radio' 			: $('input[name=radio]').val(),
		'tipo_lente' 		: $('input[name=tipo_lente]').val(),

	};

	var _producto = {
		'profesional_id' : $("select[name=profesional_id]").val(),
		'observacion' : $("#observacion").val(),
	}

	var info = {
		'oftalmologo' 	: _oftalmologo,
		'prueba' 		: _prueba,
		'receta_lente' 	: _receta_lente,
		'producto' 		: _producto,
	}

	_this.general.send_ajax('POST', location.href+'/edit_receta', info, _this.receta_general.callback);

}

var rec_gen = RecetaGeneral = function(){

	this.bind_events();
};

RecetaGeneral.prototype.bind_events = function(){

};

RecetaGeneral.prototype.callback = function(){
	location.reload();
};

RecetaGeneral.prototype.add_error = function(selector){
	selector.parent().addClass('has-error');
	selector.parent().addClass('fg-toggled');
	selector.focus(function(){
		$(this).parent().removeClass('has-error')
	});
}