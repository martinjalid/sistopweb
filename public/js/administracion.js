	$(document).ready(function(){

		$("button[name=profesional_guardar]").click( function(){
			guardarProfesional();
		});

		function guardarProfesional(){
			var error = false;
			if ( $("input[name=profesional_nombre]").val() == "" ) {
				swal( 'Oops..', 'Ingrese un nombre', 'error');
				$("input[name=profesional_nombre]").addClass('input-error');
				$("input[name=profesional_nombre]").on('focus', function(){
					$(this).removeClass('input-error');
				});
				error = true;
			}

			if (  $("input[name=profesional_apellido]").val() == ""  ) {
				swal( 'Oops..', 'Ingrese un apellido', 'error');
				$("input[name=profesional_apellido]").addClass('input-error');
				$("input[name=profesional_apellido]").on('focus', function(){
					$(this).removeClass('input-error');
				});
				error = true;
			}

			if ( !error ) {
				var data = {
					nombre : $("input[name=profesional_nombre]").val(),
					apellido : $("input[name=profesional_apellido]").val(),
				}
				console.log( location.href.split('/')[ location.href.split('/').length - 1 ] )
				$.ajax({
			    	url: location.href.split('/')[4]+"/guardarProfesional",
			    	type: 'GET',
			    	dataType: 'json',
			    	data: data,
			    }).done( function(){
		    		location.reload();
			    })	
			}
		}

	});
