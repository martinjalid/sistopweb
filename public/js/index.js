$(document).ready(function(){

	$("select[name=obra_social]").on('change', function(e){
		if ( $(this).val() == "nueva" ) {
			$(".nueva").show(300);
		}else{
			$(".nueva").hide(300);
		}
	});

	var delay = (function(){
		var timer = 0;
		return function(callback, ms){
			clearTimeout (timer);
			timer = setTimeout(callback, ms);
		};
	})();

	$(".nuevoUsuarioModal").click(function(){
		$("#nuevoUsuarioModal").modal('show');
	});

	$(".buscarUsuarioModal").click(function(){
		$("#buscarUsuarioModal").modal('show');

		$.ajax({
	    	url: "/buscarUsuario",
	    	type: 'GET',
	    	dataType: 'json',
	    	data: { nombre: '',
	    			apellido: '',
	    			dni: ''
	    	 }
	    }).done( function(usuarios){
	    	if ( usuarios.length ) {
			    $("tbody").html('');
		    	for (var i = 0; i < usuarios.length; i++) {
			    	$("tbody").append('<tr><td>'+usuarios[i].nombre+'</td><td>'+usuarios[i].apellido+'</td><td>'+usuarios[i].dni+'</td><td><a href="/cliente/'+usuarios[i].id+'"><i class="fa fa-eye" aria-hidden="true"></i></a></td></tr>');
		    	}
	    	}else{
			    $("tbody").html('<tr><td>No se encontraron resultados</td></tr>');
	    	}
	    })	
		
	});


	$(".buscar").on('keyup', function(){
		delay(function(){
			var nombre = nombre = $("input[name=buscar_nombre]").val();
			var apellido = apellido = $("input[name=buscar_apellido]").val();
			var dni = dni = $("input[name=buscar_dni]").val();
						
			$.ajax({
		    	url: "/buscarUsuario",
		    	type: 'GET',
		    	dataType: 'json',
		    	data: { nombre: nombre,
		    			apellido: apellido,
		    			dni: dni
		    	 }
		    }).done( function(usuarios){
		    	if ( usuarios.length ) {
				    $("tbody").html('');
			    	for (var i = 0; i < usuarios.length; i++) {
				    	//$("tbody").append('<li><a href="/cliente/'+usuarios[i].id+'" class="user">'+usuarios[i].apellido+', '+usuarios[i].nombre+'</a></li>');
				    	$("tbody").append('<tr><td>'+usuarios[i].nombre+'</td><td>'+usuarios[i].apellido+'</td><td>'+usuarios[i].dni+'</td><td><a href="/cliente/'+usuarios[i].id+'"><i class="fa fa-eye" aria-hidden="true"></i></a></td></tr>');
			    	}
		    	}else{
				    $("tbody").html('<tr><td>No se encontraron resultados</td></tr>');
		    	}
		    })	
		
		}, 800 );
	})

	$("button[name=guardar]").click(function(){
		
    	if ( $("input[name=obra_social]").val() == 'Nueva Obra' ) {
    		guardarObraSocial();
		}else{
			guardarUsuario( $("input[name=obra_social]").val() );
		}

	});

	function guardarUsuario(obra) {
		var data = {
			nombre : $("input[name=nombre]").val(),
			apellido : $("input[name=apellido]").val(),
			dni : $("input[name=dni]").val(),
			direccion : $("input[name=direccion]").val(),
			telefono : $("input[name=telefono]").val(),
			num_obra_social : $("input[name=num_obra_social]").val(),
			obra_social : obra ,
		};

			$.ajax({
		    	url: "/crearUsuario",
		    	type: 'GET',
		    	dataType: 'json',
		    	data: data,
		    }).done( function(resp){
	    		location.href = "/cliente/"+resp.id;
		    })	
	}

	function guardarObraSocial() {
			var data = { nombre : $("input[name=nueva_obra_social]").val() };

			$.ajax({
		    	url: "/nuevaObraSocial",
		    	type: 'GET',
		    	dataType: 'json',
		    	data: data
		    }).done( function(resp){
		    	guardarUsuario(resp.id);
		    })
	}

});
