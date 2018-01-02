var tb = DataTable = function(){}

DataTable.prototype.load_filters = function(){
	var _this = this;
	for (var i = 0; i <= _this.filtros.length; i++) {
		if( typeof _this.filtros[i] != 'undefined' ){
			if( _this.pathname.indexOf('/'+_this.filtros[i]+'/') != -1 ){
				for (var inc = 0; inc <= _this.path_explode.length; inc++) {
					if( _this.path_explode[inc] == _this.filtros[i] ){
						if( document.getElementById('filtro_' + _this.filtros[i]) != null )
							document.getElementById('filtro_' + _this.filtros[i]).value = _this.path_explode[inc + 1];	
					}
				}
			}
		}
	}
}

DataTable.prototype.expand_filters = function(){
    $('body').addClass('toggled sw-toggled');
    $('#menu-filtro').addClass('checked');
    $('#content .card').attr('style', 'padding: 0px 0px 30px 270px !important');
}

DataTable.prototype.make_url = function(url, filtro, valor){
	for (var i = 0; i <= this.filtros.length; i++) {
		if( typeof this.filtros[i] != 'undefined' ){
			if( filtro != this.filtros[i] && this.pathname.indexOf('/'+this.filtros[i]+'/') == -1 ){
				url = url + this.filtros[i] +'/all/';
			}else if( filtro == this.filtros[i] ){
				url = url + this.filtros[i] + '/' + valor + '/';
			}else{
				for (var inc = 0; inc <= this.path_explode.length; inc++) {
					if( this.path_explode[inc] == this.filtros[i] ){
						url = url + this.filtros[i] + '/' + this.path_explode[ inc + 1 ] + '/';
					}
				}
			}
		}
	}
	
	return url;
}