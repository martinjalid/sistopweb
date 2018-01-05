var rec = RecetaEdit = function(){
	console.log('RECETA EDIT');
	this.receta_general = new RecetaGeneral();

	this.bind_events();
}

RecetaEdit.prototype.bind_events = function(){
	var cerca = document.getElementById('cerca');
	var lejos = document.getElementById('lejos');
	console.log(cerca == null,  $(lejos).find('input[name=valor_lente]').val() );

	if ( cerca != null ) {

	};

	if ( lejos != null ) {
		$(lejos).find('select[name=tratamiento_id]').on('change', function(e){
			var tratamiento_color = $(lejos).find('input[name=tratamiento_color]');
			console.log( tratamiento_color );
			if (this.value == -1) {
				tipo_t.parentNode.parentNode.style.display = 'none';
				tipo_t.value = '';
			}else{
				console.log( this.innerText );
				tipo_t.parentNode.parentNode.style.display = 'block';
			}
		});

	};
	
	
};

var rec_len = RecetaLenteEdit = function(){
	console.log('RECETA LENTE EDIT');

	this.bind_events();
}

RecetaLenteEdit.prototype.bind_events = function(){

}

var rec_gen = RecetaGeneral = function(){

	this.bind_events();
};

RecetaGeneral.prototype.bind_events = function(){

};

RecetaGeneral.prototype.save_receta = function(){

}