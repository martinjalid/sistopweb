@extends('layout.layout')

@section('content')
<div class="crsf">
	{{ csrf_field() }}
</div>
<div class="container">
	<div class="col-md-12">
		<div class="card" style="box-shadow: 5px 5px 5px #888888;">
			<div class="card-header">
				<div class="row">
					<div class="col-sm-2 m-b-20">
						<img src="/images/receta.png" class="img-circle" style="width: 100%;">
					</div>
					<div class="col-sm-8 m-b-20">
						<div class="row">
						 	<h4>Tipo de Lente : <b>{{ $receta->tipo_lente() }}</b></h4>
						 	<h4>Detalle : <b>{{ $receta->detalle_lente }}</b></h4>
						 	<h4>Profesional : <b>{{ $receta->medico() }}</b></h4>
						 	<h4>Observacion : <b>{{ $receta->observacion }}</b></h4>
						</div>
					</div>
					<div class="col-sm-1 m-b-20">
						<a data-toggle="modal" href="#usuario-perfil" id="editar-usuario-perfil" class="col-md-1 editar-usuario-perfil pointer" title="Editar datos del cliente" style="font-size: 30px;">
							<i class="zmdi zmdi-more-vert zmdi-hc-fw"></i>
						</a>
					</div>
				</div>				
			</div>
			<hr>
			@foreach( $receta->anteojos() as $anteojo )
				<div class="card-body m-l-20 pointer">
					<a role="button" data-toggle="collapse" href="#{{ $anteojo->tipo }}" aria-controls="recetas" aria-expanded="true">
						<h4> {{ ucfirst($anteojo->tipo) }} </h4>
						<p>Ver datos</p>
					</a>
				</div>
				<div id="{{ $anteojo->tipo }}" class="card-body collapse out" aria-expanded="true">
					<hr>
					<div class="row m-b-20">
						<h4 class="col-sm-2 m-l-20">Ojo Derecho</h4>
						<h4 class="col-sm-2 color">Esferico: {{ $anteojo->od_esferico }}</h4>
						<h4 class="col-sm-2 color">Cilindrico: {{ $anteojo->od_cilindrico }}</h4>
						<h4 class="col-sm-2 color">Eje: {{ $anteojo->od_eje }}</h4>
					</div>
					<div class="row m-b-20">
						<h4 class="col-sm-2 m-l-20">Ojo Izquierdo</h4>
						<h4 class="col-sm-2 color">Esferico: {{ $anteojo->oi_esferico }}</h4>
						<h4 class="col-sm-2 color">Cilindrico: {{ $anteojo->oi_cilindrico }}</h4>
						<h4 class="col-sm-2 color">Eje: {{ $anteojo->oi_eje }}</h4>
					</div>
				</div>
			<hr>
			@endforeach
		</div>
	</div>
</div>
@endsection

@section('js')
    <script type="text/javascript" src="/js/general/index.js"></script>
    <script type="text/javascript" src="/js/receta/index.js"></script>
    <script type="text/javascript"> // INIT
        $(document).ready(function() {
            var recetaEdit = new RecetaEdit();
        });
    </script>
@endsection