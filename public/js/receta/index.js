var rec = RecetaEdit = function(){
	console.log('RECETA EDIT');
	this.receta_general = new RecetaGeneral();

	this.bind_events();
}

RecetaEdit.prototype.bind_events = function(){

};


var rec_gen = RecetaGeneral = function(){

	this.bind_events();
};

RecetaGeneral.prototype.bind_events = function(){

	document.getElementById('l_tratamiento').addEventListener('change', function(e){
		var tipo_t = document.getElementById('l_tipo_tratamiento');
		if (this.value == -1) {
			tipo_t.parentNode.parentNode.style.display = 'none';
			tipo_t.value = '';
		}else{
			console.log( this.innerText );
			tipo_t.parentNode.parentNode.style.display = 'block';
		}
	});



};

RecetaGeneral.prototype.save_receta = function(){

}