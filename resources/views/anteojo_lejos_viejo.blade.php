<hr>
<h4 class="text-primary lead-label">Lejos</h4>
<div id="lejos-container">
	<div class="row">
		<div class="col-lg-1" style="margin-top: 30px; padding-right: 0">
			<p class="text-primary lead-label" >Ojo D</p>
		</div>
    	<div class="row">	
    		<div class="col-lg-1" style="margin-left: -30px">
				<p class="text-primary lead-label">Esférico</p>
				<input disabled class="form-control color" name="d_l_esf_{{ $receta->id }}" value="{{ $anteojo->od_esferico }}" style="color: {{ $anteojo->od_esferico > 0 ? 'green' : '#c00000' }}">
			</div>
			<div class="col-lg-1" >
				<p class="text-primary lead-label">Cilíndrico</p>
				<input disabled class="form-control color" name="d_l_cil_{{ $receta->id }}" value="{{ $anteojo->od_cilindrico }}" style="color: {{ $anteojo->od_cilindrico > 0 ? 'green' : '#c00000' }}">
			</div>
			<div class="col-lg-1" >
				<p class="text-primary lead-label">Eje</p>
				<input disabled class="form-control" name="d_l_eje_{{ $receta->id }}" value="{{ $anteojo->od_eje }}" >
			</div>
			<div class="col-lg-2" >
				<p class="text-primary lead-label">Material Lente</p>
				<select disabled class="select2 form-control" name="l_material_{{ $receta->id }}" > 
					<option value="-1">Material</option>
					@foreach($material_lente as $m)
						<option value="{{ $m->id }}" {{ $anteojo->material_lente_id == $m->id ? 'selected': ''}}>{{ $m->nombre }}</option>	
					@endforeach
				</select>
			</div>
			<div class="col-lg-2" >
				<p class="text-primary lead-label">Color</p>
				<select disabled class="select2 form-control" name="l_color_{{ $receta->id }}" > 
					<option value="-1">Color</option>
					@foreach($color as $c)
						<option value="{{ $c->id }}" {{ $anteojo->color_id == $c->id ? 'selected': ''}}>{{ $c->nombre }}</option>	
					@endforeach
				</select>
			</div>
			<div class="col-lg-2" >
				<p class="text-primary lead-label" >Valor Lente</p>
				<input disabled class="form-control" name="valor_l_lente_{{ $receta->id }}" value="{{ $anteojo->valor_lente }}" >
			</div>
    	</div>
	</div><br>
	<div class="row">
		<div class="col-lg-1" style="margin-top: 30px; padding-right: 0">
			<p class="text-primary lead-label" >Ojo I</p>
		</div>
    	<div class="row">	
    		<div class="col-lg-1" style="margin-left: -30px">
				<p class="text-primary lead-label">Esférico</p>
				<input disabled class="form-control color" name="i_l_esf_{{ $receta->id }}" value="{{ $anteojo->oi_esferico }}" style="color: {{ $anteojo->oi_esferico > 0 ? 'green' : '#c00000' }}">
			</div>
			<div class="col-lg-1" >
				<p class="text-primary lead-label">Cilíndrico</p>
				<input disabled class="form-control color" name="i_l_cil_{{ $receta->id }}" value="{{ $anteojo->oi_cilindrico }}" style="color: {{ $anteojo->oi_cilindrico > 0 ? 'green' : '#c00000' }}">
			</div>
			<div class="col-lg-1" >
				<p class="text-primary lead-label">Eje</p>
				<input disabled class="form-control" name="i_l_eje_{{ $receta->id }}" value="{{ $anteojo->oi_eje }}">
			</div>
			<div class="col-lg-2" >
				<p class="text-primary lead-label">Armazon</p>
				<input disabled class="form-control" name="lejos_armazon_{{ $receta->id }}" value="{{ $anteojo->armazon }}">
			</div>
			<div class="col-lg-2" >
				<p class="text-primary lead-label">Tratamiento</p>
				<select disabled class="select2 form-control" name="l_tratamiento_{{ $receta->id }}" > 
					<option value="-1">Sin Tratamiento</option>
					@foreach($tratamiento as $t)
						<option value="{{ $t->id }}" {{ $anteojo->tratamiento_id == $t->id ? 'selected': ''}} >{{ $t->nombre == 'Tenido' ? "Teñido" : $t->nombre }}</option>	
					@endforeach
				</select>
			</div>
			@if( $anteojo->tratamiento_id != null )
				<div class="col-lg-2 l_tratamiento" >
					<p class="text-primary lead-label" >Tipo de Tratamiento</p>
					<input disabled class="form-control" name="l_tipo_tratamiento_{{ $receta->id }}" value="{{ $anteojo->tratamiento_color }}">
				</div>
			@endif
			<div class="col-lg-2" >
				<p class="text-primary lead-label">Valor Armazon</p>
				<input disabled class="form-control" name="valor_l_armazon_{{ $receta->id }}" value="{{ $anteojo->valor_armazon }}">
			</div>
    	</div>
	</div>
</div>
