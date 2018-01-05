$(document).ready(function(){
	
	$("select[name=obra_social]").on('change', function(e){
		if ( $(this).val() == "nueva" ) {
			$(".nueva").show(300);
		}else{
			$(".nueva").hide(300);
		}
	});

	$(".color").on('change', function(e){
		var value = $(this).val();
		if ( value > 0 ) {
			$(this).css('color', 'green');
			if ( value.substring(0, 1) != '+' )
				$(this).val( '+'+value )
		}else{
			$(this).css('color', '#c30000');
		}
	});

	$("select[name=l_tratamiento]").on('change', function(){
		if ( $(this).val() == -1 ){
			$(".l_tratamiento").hide(300);
			$("input[name=l_tipo_tratamiento]").val('') ;
		}
		else{
			$(".l_tratamiento").show(300);
			if ( $("select[name=l_tratamiento] option:selected").text() == "Antirreflejo"  )
				$(".l_tratamiento p").html("Tipo de Antirreflejo");
			else
				$(".l_tratamiento p").html("Color");
		}
	})

	$("button[name=editar_usuario]").on('click', function(){
		$("button[name=guardar]").removeAttr('disabled');
		$("#usuario input").removeAttr('disabled');
	});

	$("select[name=c_tratamiento]").on('change', function(){
		if ( $(this).val() == -1 ){
			$(".c_tratamiento").hide(300);
			$("input[name=c_tipo_tratamiento]").val('') ;
		}
		else{
			$(".c_tratamiento").show(300);
			if ( $("select[name=c_tratamiento] option:selected").text() == "Antirreflejo"  )
				$(".c_tratamiento p").html("Tipo de Antirreflejo");
			else
				$(".c_tratamiento p").html("Color");
		}
	})

	$("select[name=tipo_lente]").on('change', function(){
		$(".detalle").show(300)

		$(this).attr('disabled', 'true');
		if( $("select[name=tipo_lente] option:selected ").text() == 'Monofocal'){
			$(".lejos").show(300);
		}else{
			$(".multi").hide(300);
			$("#cerca").show(300);
			$("#lejos").show(300);
			$("#medidas").show(300);
		}	
	});

	$("select[name=lejos_cerca]").on('change', function(){
		$(this).attr('disabled', 'true');
		if( $(this).val() == 1 ){
			$("#lejos").show(300);
			$("#medidas").show(300);
		}else if ( $(this).val() == 2 ) {
			$("#cerca").show(300);
			$("#medidas").show(300);
		}else{
			$("#cerca").show(300);
			$("#lejos").show(300);
			$("#medidas").show(300);
		}
	})

	$("button[name=guardar]").click(function(){
		
    	if ( $("select[name=obra_social]").val() == 'nueva' ) {
    		guardarObraSocial();
		}else{
			actualizarUsuario( $("select[name=obra_social]").val() );
		}
	});
	var prev_selected = null;
	$("button[name=editar_receta]").click(function(){
		var receta_id = $(this).attr('receta_id');
		$("#"+prev_selected+" .form-control").attr('disabled', 'true');
		$("#"+receta_id+" .form-control").removeAttr('disabled');
		$(".notDisable").attr('disabled', 'true');
		$("button[name=guardar_editado]").show(300);
		prev_selected = receta_id;
	})

	$("button[name=guardar_editado]").click(function(){
		var receta_id = $(this).attr('receta_id');
		editarReceta( receta_id );
	});

	$("button[name=guardar_receta]").click(function(){
		validar();
		guardarReceta();
	});

	function validar(){
		var error = false
		if ( $("select[name=tipo_lente] option:selected").text() == 'Bifocal' || $("select[name=tipo_lente] option:selected").text() == 'Multifocal' ) {
			if ( $("input[name=d_l_esf]").val() == "" ) {
				swal('Opps...', 'Faltan datos por ingresar', 'error');
				$("input[name=d_l_esf]").addClass('input-error');
				$("input[name=d_l_esf]").on('focus', function(){
					$(this).removeClass('input-error');
				});
				error = true;
			}

			if ( $("input[name=d_l_cil]").val() != "" && $("input[name=d_l_eje]").val() == "" ) {
				swal('Opps...', 'Faltan datos por ingresar', 'error');
				$("input[name=d_l_eje]").addClass('input-error');
				$("input[name=d_l_eje]").on('focus', function(){
					$(this).removeClass('input-error');
				});
				error = true;
			}

			if ( $("input[name=i_l_esf]").val() == "" ) {
				swal('Opps...', 'Faltan datos por ingresar', 'error');
				$("input[name=i_l_esf]").addClass('input-error');
				$("input[name=i_l_esf]").on('focus', function(){
					$(this).removeClass('input-error');
				});
				error = true;
			}
			if ( $("input[name=i_l_cil]").val() != "" && $("input[name=i_l_eje]").val() == "" ) {
				swal('Opps...', 'Faltan datos por ingresar', 'error');
				$("input[name=i_l_eje]").addClass('input-error');
				$("input[name=i_l_eje]").on('focus', function(){
					$(this).removeClass('input-error');
				});
				error = true;
			} 
			if ( $("input[name=lejos_armazon]").val() == "" ) {
				swal('Opps...', 'Faltan datos por ingresar', 'error');
				$("input[name=lejos_armazon]").addClass('input-error');
				$("input[name=lejos_armazon]").on('focus', function(){
					$(this).removeClass('input-error');
				});
				error = true;
			}
			if ( $("input[name=d_c_esf]").val() == "" ) {
				swal('Opps...', 'Faltan datos por ingresar', 'error');
				$("input[name=d_c_esf]").addClass('input-error');
				$("input[name=d_c_esf]").on('focus', function(){
					$(this).removeClass('input-error');
				});
				error = true;
			}

			if ( $("input[name=d_c_cil]").val() != "" && $("input[name=d_c_eje]").val() == "" ) {
				swal('Opps...', 'Faltan datos por ingresar', 'error');
				$("input[name=d_c_eje]").addClass('input-error');
				$("input[name=d_c_eje]").on('focus', function(){
					$(this).removeClass('input-error');
				});
				error = true;
			}

			if ( $("input[name=i_c_esf]").val() == "" ) {
				swal('Opps...', 'Faltan datos por ingresar', 'error');
				$("input[name=i_c_esf]").addClass('input-error');
				$("input[name=i_c_esf]").on('focus', function(){
					$(this).removeClass('input-error');
				});
				error = true;
			}
			if ( $("input[name=i_c_cil]").val() != "" && $("input[name=i_c_eje]").val() == "" ) {
				swal('Opps...', 'Faltan datos por ingresar', 'error');
				$("input[name=i_c_eje]").addClass('input-error');
				$("input[name=i_c_eje]").on('focus', function(){
					$(this).removeClass('input-error');
				});
				error = true;
			} 
		}

		return error;
	}

	function guardarReceta(){
		var data = {
			observacion : $("textarea[name=observacion]").val(),
			profesional_id : $("select[name=profesional]").val() == -1 ? null : $("select[name=profesional]").val(),
			receta :{
				tipo_lente_id : $("select[name=tipo_lente]").val(),
				lejos_cerca : $("select[name=lejos_cerca] option:selected").text(),
				detalle : $("input[name=detalle_lente]").val(),
				altura : $("input[name=altura]").val(),
				distancia : $("input[name=distancia]").val(),
				adicion : $("input[name=adicion]").val(),
			},
			lejos : {
				der_esf : $("input[name=d_l_esf]").val(),
				der_cil : $("input[name=d_l_cil]").val(),
				der_eje : $("input[name=d_l_eje]").val(),
				izq_esf : $("input[name=i_l_esf]").val(),
				izq_cil : $("input[name=i_l_cil]").val(),
				izq_eje : $("input[name=i_l_eje]").val(),
				armazon : $("input[name=lejos_armazon]").val(),
				material : $("select[name=l_material]").val() == -1 ? null : $("select[name=l_material]").val(),
				color : $("select[name=l_color]").val() == -1 ? null : $("select[name=l_color]").val(),
				tratamiento : $("select[name=l_tratamiento]").val() == -1 ? null : $("select[name=l_tratamiento]").val(),
				tratamiento_color : $("input[name=l_tipo_tratamiento]").val(),
				valor_lente : $("input[name=valor_l_lente]").val(),
				valor_armazon : $("input[name=valor_l_armazon]").val(),
			},
			cerca : {
				der_esf : $("input[name=d_c_esf]").val(),
				der_cil : $("input[name=d_c_cil]").val(),
				der_eje : $("input[name=d_c_eje]").val(),
				izq_esf : $("input[name=i_c_esf]").val(),
				izq_cil : $("input[name=i_c_cil]").val(),
				izq_eje : $("input[name=i_c_eje]").val(),
				armazon : $("input[name=cerca_armazon]").val(),
				material : $("select[name=c_material]").val() == -1 ? null : $("select[name=c_material]").val(),
				color : $("select[name=c_color]").val() == -1 ? null : $("select[name=c_color]").val(),
				tratamiento : $("select[name=c_tratamiento]").val() == -1 ? null : $("select[name=c_tratamiento]").val(),
				tratamiento_color : $("input[name=c_tipo_tratamiento]").val(),
				valor_lente : $("input[name=valor_c_lente]").val(),
				valor_armazon : $("input[name=valor_c_armazon]").val(),
			}
		}
		$.ajax({
	    	url: location.href.split('/')[4]+"/guardarReceta",
	    	type: 'GET',
	    	dataType: 'json',
	    	data: data,
	    }).done( function(){
    		location.reload();
	    })	
	}

	function actualizarUsuario(obra_id) {
		var data = {
			nombre : $("input[name=nombre]").val(),
			apellido : $("input[name=apellido]").val(),
			dni : $("input[name=dni]").val(),
			direccion : $("input[name=direccion]").val(),
			telefono : $("input[name=telefono]").val(),
			num_obra_social : $("input[name=num_obra_social]").val(),
			obra_social : obra_id,
		};

			$.ajax({
		    	url: "actualizarUsuario/"+location.href.split('/')[4],
		    	type: 'GET',
		    	dataType: 'json',
		    	data: data,
		    }).done( function(){
	    		location.reload();
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
		    	guardarUsuario(resp);
		    })
	}

	function editarReceta(receta_id) {

		var data = {
			tipo_lente_id : $("select[name=tipo_lente_"+receta_id+"]").val(),
			lejos_cerca : $("select[name=lejos_cerca_"+receta_id+"] option:selected").text(),
			detalle : $("input[name=detalle_lente_"+receta_id+"]").val(),
			altura : $("input[name=altura_"+receta_id+"]").val(),
			distancia : $("input[name=distancia_"+receta_id+"]").val(),
			adicion : $("input[name=adicion_"+receta_id+"]").val(),
			observacion : $("textarea[name=observacion_"+receta_id+"]").val(),
			profesional_id : $("select[name=profesional_"+receta_id+"]").val() == -1 ? null : $("select[name=profesional"+receta_id+"]").val(),
			lejos : {
				der_esf : $("input[name=d_l_esf_"+receta_id+"]").val(),
				der_cil : $("input[name=d_l_cil_"+receta_id+"]").val(),
				der_eje : $("input[name=d_l_eje_"+receta_id+"]").val(),
				izq_esf : $("input[name=i_l_esf_"+receta_id+"]").val(),
				izq_cil : $("input[name=i_l_cil_"+receta_id+"]").val(),
				izq_eje : $("input[name=i_l_eje_"+receta_id+"]").val(),
				armazon : $("input[name=lejos_armazon_"+receta_id+"]").val(),
				material : $("select[name=l_material_"+receta_id+"]").val() == -1 ? null : $("select[name=l_material_"+receta_id+"]").val(),
				color : $("select[name=l_color_"+receta_id+"]").val() == -1 ? null : $("select[name=l_color]").val(),
				tratamiento : $("select[name=l_tratamiento_"+receta_id+"]").val() == -1 ? null : $("select[name=l_tratamiento_"+receta_id+"]").val(),
				tratamiento_color : $("input[name=l_tipo_tratamiento_"+receta_id+"]").val(),
				valor_lente : $("input[name=valor_l_lente_"+receta_id+"]").val(),
				valor_armazon : $("input[name=valor_l_armazon_"+receta_id+"]").val(),
			},
			cerca : {
				der_esf : $("input[name=d_c_esf_"+receta_id+"]").val(),
				der_cil : $("input[name=d_c_cil_"+receta_id+"").val(),
				der_eje : $("input[name=d_c_eje_"+receta_id+"]").val(),
				izq_esf : $("input[name=i_c_esf_"+receta_id+"]").val(),
				izq_cil : $("input[name=i_c_cil_"+receta_id+"]").val(),
				izq_eje : $("input[name=i_c_eje_"+receta_id+"]").val(),
				armazon : $("input[name=cerca_armazon_"+receta_id+"]").val(),
				material : $("select[name=c_material_"+receta_id+"]").val() == -1 ? null : $("select[name=c_material_"+receta_id+"]").val(),
				color : $("select[name=c_color_"+receta_id+"]").val() == -1 ? null : $("select[name=c_color_"+receta_id+"]").val(),
				tratamiento : $("select[name=c_tratamiento_"+receta_id+"]").val() == -1 ? null : $("select[name=c_tratamiento_"+receta_id+"]").val(),
				tratamiento_color : $("input[name=c_tipo_tratamiento_"+receta_id+"]").val(),
				valor_lente : $("input[name=valor_c_lente_"+receta_id+"]").val(),
				valor_armazon : $("input[name=valor_c_armazon_"+receta_id+"]").val(),
			}
		}
		console.log(data);
		$.ajax({
	    	url: location.href.split('/')[4]+"/editarReceta/"+receta_id,
	    	type: 'GET',
	    }).done( function(){
	    	swal(
				'Editado!',
				'La receta se edito correctamente',
				'success'
			).then( function(){
    			location.reload();
			})
	    })	
	}

});
