@extends('layout.layout')

@section('other_js_css')
   	<script type="text/javascript" src="/js/index.js"></script>
@endsection

@section('content')
	<!-- <div class="container" style="margin-top: 10px">			
		<div class="w3-card-4">
			<header class="w3-container w3-light-grey">
		  		<h3>Qué desea hacer?</h3>
			</header>
			<div class="w3-container">
			  	<div class="row">
					<div class="col-lg-6">
						<button type="button" class="btn btn-primary nuevoUsuarioModal" style="width: 200px; height: 100px">
							<i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
							<h4 >Nuevo Cliente</h4>
						</button>
					</div>
					<div class="col-lg-6 ">
						<button type="button" class="btn btn-primary buscarUsuarioModal"  style="width: 200px; height: 100px">
						<i class="fa fa-search fa-2x" aria-hidden="true"></i>
						<h4 >Buscar Cliente</h4>
						</button>
					</div>
			  	</div>
			</div>
		</div>
	</div> -->

	<div class="container">
		<div class="card">
			<div class="card-body card-padding">
				<div class="row">
					<div class="col-md-3">
						<button type="button" class="btn btn-default waves-effect btn-panel" onclick="window.location.href='/medicos'">
							<i class="fa fa-user-md fa-3x"></i>
							<h4>Médicos</h4>
							<p>Añade, administra y cambia<br> el nombre de los médicos</p>
						</button>									
					</div>
					 <div class="col-md-3">
						<button type="button" class="btn btn-default waves-effect btn-panel btn-panel" onclick="window.location.href='/obras'">
							<i class="fa fa-building-o fa-3x"></i>
							<h4>Obras Sociales</h4>
							<p>Edita, activa y añade<br> las obras sociales</p>
						</button>									
					</div>
					<!--<div class="col-md-3">
						<button type="button" class="btn btn-default waves-effect btn-panel" onclick="window.location.href='/coberturacia'">
							<i class="fa fa-briefcase fa-3x"></i>
							<h4>Coberturacia</h4>
							<p>Edita, cambia y administra<br> coberturas por compañía</p>
						</button>									
					</div>
					<div class="col-md-3">
						<button type="button" class="btn btn-default waves-effect btn-panel" onclick="window.location.href='/productorcia'">
							<i class="fa fa-user-secret fa-3x"></i>
							<h4>Productorcia</h4>
							<p>Administra el código de<br> cada productor por compañía</p>
						</button>									
					</div>
				</div>		
				<div class="row m-t-20">
					<div class="col-md-3">
						<button type="button" class="btn btn-default waves-effect btn-panel" onclick="window.location.href='/canalcia'">
							<i class="fa fa-sitemap fa-3x"></i>
							<h4>Canalcia</h4>
							<p>Edita, activa y administra<br> cada campaña por cobertura</p>
						</button>									
					</div>
					<div class="col-md-3">
						<button type="button" class="btn btn-default waves-effect btn-panel" onclick="window.location.href='/descuento'">
							<i class="fa fa-gift fa-3x"></i>
							<h4>Descuentos</h4>
							<p>Edita y administra los descuentos <br>por compañía y campaña</p>
						</button>									
					</div>
					<div class="col-md-3">
						<button type="button" class="btn btn-default waves-effect btn-panel" onclick="window.location.href='/permiso'">
							<i class="fa fa-lock fa-3x"></i>
							<h4>Permisos</h4>
							<p>Edita, administra perfiles <br>y permisos</p>
						</button>									
					</div>
					<div class="col-md-3">
						<button type="button" class="btn btn-default waves-effect btn-panel" onclick="window.location.href='/riesgo_cia_cob'">
							<i class="fa fa-cubes fa-3x"></i>
							<h4>Riesgo - Cia - Cob</h4>
							<p>Alta y edición de cobertura<br> compañía, riesgo y productor</p>
						</button>									
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-md-3">
						<button type="button" class="btn btn-default waves-effect btn-panel" onclick="window.location.href='/canal'">
							<i class="fa fa-bullseye fa-3x"></i>
							<h4>Canales</h4>
							<p class="p-b-20">Alta y edición de campañas</p>
						</button>									
					</div>
					<div class="col-md-3">
						<button type="button" class="btn btn-default waves-effect btn-panel" onclick="window.location.href='/tipo_canal'">
							<i class="fa fa-sliders fa-3x"></i>
							<h4>Tipo de Canales</h4>
							<p class="p-b-20">Edita y edición de tipo de canales</p>
						</button>									
					</div>
					<div class="col-md-3">
						<button type="button" class="btn btn-default waves-effect btn-panel" onclick="window.location.href='/grupo_canal'">
							<i class="fa fa-bars fa-3x"></i>
							<h4>Grupo Canales</h4>
							<p>Edita y edición de grupos <br>de canales</p>
						</button>									
					</div>
					<div class="col-md-3">
						<button type="button" class="btn btn-default waves-effect btn-panel" onclick="window.location.href='/new_compania'">
							<i class="fa fa-code-fork fa-3x"></i>
							<h4>Nueva Compañía</h4>
							<p>Alta de nueva compañía<br> para cotizar</p>
						</button>									
					</div>
				</div> -->
				<hr>
			</div>		
		</div>
	</div>
@endsection('content')