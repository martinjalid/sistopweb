@extends('layout.navbar')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('other_js_css')
	<script type="text/javascript" src="/js/showCliente.js"></script>
	<link rel="stylesheet" href="/css/minimal.css"></link>
@endsection

@section('content')
	@include('sidebarCliente')
	<div class="col-lg-8">
		<div class="container">
			<h2 class="text-primary lead-label">Recetas</h2>
			<hr>
			<ul class="nav nav-tabs" id="tab-bar">
				<li class="active"><a data-toggle="tab" href="#nueva"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
				@foreach($recetas as $r)
					<li class="tab-receta"><a data-toggle="tab" href="#{{ $r->id }}">{{ date('F-Y', strtotime($r->created_at) ) }}</a></li>
				@endforeach
			</ul><br>

		  <div class="tab-content">
		  	@foreach($recetas as $receta)
		    <div id="{{ $receta->id }}" class="tab-pane fade in">
		      	<div class="row">
			    	<div class="col-lg-2" >
						<p class="text-primary lead-label">Tipo AAde Lente</p>
						<select class="select2 form-control notDisable" disabled> 
							<option value="-1">Tipo de Anteojo</option>
							@foreach($tipo_lente as $tl)
								<option value="{{ $tl->id }}" {{ $receta->tipo_lente_id == $tl->id ? 'selected': ''}}>{{ $tl->nombre }}</option>	
							@endforeach
						</select>
					</div>
					@if( $receta->tipo_lente_id == 1 )
						<div class="col-lg-2 lejos">
							<p class="text-primary lead-label">Lejos/Cerca</p>
							<select class="select2 form-control notDisable" disabled> 
								<option value="-1">Lejos/Cerca</option>
								<option value="1">Lejos</option>
								<option value="2">Cerca</option>	
								<option value="3">Lejos y Cerca</option>	
							</select>
						</div>
					@endif
					<div class="col-lg-2 detalle">
						<p class="text-primary lead-label">Detalle de Lente</p>
						<input class="form-control" name="detalle_lente_{{ $receta->id }}" value="{{ $receta->detalle_lente }}" disabled> 
					</div>
		    	</div>
			    	@foreach( $anteojos as $anteojo )
			    		@if( $anteojo->receta_id == $receta->id && $anteojo->tipo == 'lejos' )
							<div id="lejos_r">
				    			@include('anteojo_lejos_viejo')
				    		</div>
			    		@endif
			    	@endforeach
			    	@foreach( $anteojos as $anteojo )
			    		@if( $anteojo->receta_id == $receta->id && $anteojo->tipo == 'cerca' )
					    	<div id="cerca_r">
					    		@include('anteojo_cerca_viejo')
					    	</div>
			    		@endif
			    	@endforeach
		    	<div id="medidas_r">
		    		<hr>
		    		<div class="row">
		    			<div class="col-lg-2" >
							<p class="text-primary lead-label">Distancia</p>
							<input disabled class="form-control" name="distancia_{{ $receta->id }}" value="{{ $receta->distancia }}">
						</div>
						<div class="col-lg-2" >
							<p class="text-primary lead-label">Altura</p>
							<input disabled class="form-control" name="altura_{{ $receta->id }}" value="{{ $receta->altura }}">
						</div>
						<div class="col-lg-2" >
							<p class="text-primary lead-label">Adición</p>
							<input disabled class="form-control" name="adicion_{{ $receta->id }}" value="{{ $receta->adicion }}">
						</div>
						<div class="col-lg-2">
							<p class="text-primary lead-label">Profesional</p>
							<select disabled class="select2 form-control" name="profesional_{{ $receta->id }}"> 
								<option value="-1">Sin Profesional</option>
								@foreach($profesional as $p)
									<option value="{{ $p->id }}" {{ $receta->profesional_id == $p->id ? 'selected' : '' }}>{{ $p->nombre }}</option>	
								@endforeach
							</select>
						</div>
		    		</div>
		    		<div>
						<p class="text-primary lead-label">Observaciones</p>
		    			<textarea disabled name="observacion_{{ $receta->id }}" class="form-control" cols="80" rows="7" style="height: 155px; width: 750px">{{ $receta->observacion }}</textarea>
		    		</div>
		    		<div class="row">
		    			<div class="col-lg-2" style="margin-top: 5px;">
							<button type="button" name="editar_receta" receta_id="{{ $receta->id }}" class="btn btn-success" >Editar</button>
							<button type="button" name="guardar_editado" receta_id="{{ $receta->id }}" class="btn btn-primary" style="display: none" >Guardar</button>
						</div>
		    		</div>
		    	</div>
		    </div>
		    @endforeach

		    <div id="nueva" class="tab-pane fade in active">
		    	<div class="row">
			    	<div class="col-lg-2" >
						<p class="text-primary lead-label notDisable">Tipo de Lente</p>
						<select class="select2 form-control" name="tipo_lente" > 
							<option value="-1">Tipo de Anteojo</option>
							@foreach($tipo_lente as $tl)
								<option value="{{ $tl->id }}">{{ $tl->nombre }}</option>	
							@endforeach
						</select>
					</div>
					<div class="col-lg-2 lejos" style="display: none">
						<p class="text-primary lead-label">Lejos/Cerca</p>
						<select class="select2 form-control notDisable" name="lejos_cerca" > 
							<option value="-1">Lejos/Cerca</option>
							<option value="1">Lejos</option>
							<option value="2">Cerca</option>	
							<option value="3">Lejos y Cerca</option>	
						</select>
					</div>
					<div class="col-lg-2 detalle" style="display: none">
						<p class="text-primary lead-label">Detalle de Lente</p>
						<input class="form-control" name="detalle_lente"> 
					</div>
		    	</div>
		    	<div id="lejos" style="display: none;">
		    		@include('anteojo_lejos_nuevo')
		    	</div>
		    	<div id="cerca" style="display: none;">
		    		@include('anteojo_cerca_nuevo')
		    	</div>
		    	<div id="medidas" style="display: none;">
		    		<hr>
		    		<div class="row">
		    			<div class="col-lg-2" >
							<p class="text-primary lead-label">Distancia</p>
							<input class="form-control"  name="distancia" >
						</div>
						<div class="col-lg-2" >
							<p class="text-primary lead-label">Altura</p>
							<input class="form-control"  name="altura" >
						</div>
						<div class="col-lg-2" >
							<p class="text-primary lead-label">Adición</p>
							<input class="form-control"  name="adicion" >
						</div>
						<div class="col-lg-2">
							<p class="text-primary lead-label">Profesional</p>
							<select class="select2 form-control" name="profesional" > 
								<option value="-1">Sin Profesional</option>
								@foreach($profesional as $p)
									<option value="{{ $p->id }}">{{ $p->nombre }}</option>	
								@endforeach
							</select>
						</div>
		    		</div>
		    		<div>
						<p class="text-primary lead-label">Observaciones</p>
		    			<textarea name="observacion" cols="80" rows="7"></textarea>
		    		</div>
		    		<div class="row">
		    			<div class="col-lg-2" >
							<button type="button" name="guardar_receta" class="btn btn-primary" >Guardar</button>
						</div>
		    		</div>
		    	</div>
		    </div>
		  </div>
		</div>
	</div>
@endsection

