<hr>
<h4 class="text-primary lead-label">Cerca</h4>
<div id="lejos-container">
	<div class="row">
		<div class="col-lg-1" style="margin-top: 30px; padding-right: 0">
			<p class="text-primary lead-label" >Ojo D</p>
		</div>
    	<div class="row">	
    		<div class="col-lg-1" style="margin-left: -30px">
				<p class="text-primary lead-label">Esférico</p>
				<input class="form-control color"  name="d_c_esf" >
			</div>
			<div class="col-lg-1" >
				<p class="text-primary lead-label">Cilíndrico</p>
				<input class="form-control color"  name="d_c_cil" >
			</div>
			<div class="col-lg-1" >
				<p class="text-primary lead-label">Eje</p>
				<input class="form-control"  name="d_c_eje" >
			</div>
			<div class="col-lg-2 multi" style="display: block;" >
				<p class="text-primary lead-label">Material Lente</p>
				<select class="select2 form-control" name="c_material" > 
					<option value="-1">Material</option>
					@foreach($material_lente as $m)
						<option value="{{ $m->id }}">{{ $m->nombre }}</option>	
					@endforeach
				</select>
			</div>
			<div class="col-lg-2 multi" style="display: block">
				<p class="text-primary lead-label">Color</p>
				<select class="select2 form-control" name="c_color" > 
					<option value="-1">Color</option>
					@foreach($color as $c)
						<option value="{{ $c->id }}">{{ $c->nombre }}</option>	
					@endforeach
				</select>
			</div>
			<div class="col-lg-2 multi">
				<p class="text-primary lead-label" >Valor Lente</p>
				<input class="form-control"  name="valor_c_lente" >
			</div>
    	</div>
	</div><br>
	<div class="row">
		<div class="col-lg-1" style="margin-top: 30px; padding-right: 0">
			<p class="text-primary lead-label" >Ojo I</p>
		</div>
    	<div class="row">	
    		<div class="col-lg-1" style="margin-left: -30px" >
				<p class="text-primary lead-label">Esférico</p>
				<input class="form-control color"  name="i_c_esf" >
			</div>
			<div class="col-lg-1" >
				<p class="text-primary lead-label">Cilíndrico</p>
				<input class="form-control color"  name="i_c_cil" >
			</div>
			<div class="col-lg-1" >
				<p class="text-primary lead-label">Eje</p>
				<input class="form-control"  name="i_c_eje" >
			</div>
			<div class="col-lg-2 multi" style="display: block">
				<p class="text-primary lead-label" >Armazon</p>
				<input class="form-control"  name="cerca_armazon" >
			</div>
			<div class="col-lg-2 multi" style="display: block">
				<p class="text-primary lead-label">Tratamiento</p>
				<select class="select2 form-control" name="c_tratamiento" > 
					<option value="-1">Sin Tratamiento</option>
					@foreach($tratamiento as $t)
						<option value="{{ $t->id }}">{{ $t->nombre }}</option>	
					@endforeach
				</select>
			</div>
			<div class="col-lg-2 c_tratamiento" style="display: none;">
				<p class="text-primary lead-label" >Tipo de Tratamiento</p>
				<input class="form-control"  name="c_tipo_tratamiento" >
			</div>
			<div class="col-lg-2 multi" >
				<p class="text-primary lead-label" >Valor Armazon</p>
				<input class="form-control"  name="valor_c_armazon" >
			</div>
    	</div>
	</div>
</div>