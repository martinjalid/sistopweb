@extends('layout.layout')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('other_js_css')
   	<script type="text/javascript" src="/js/index.js"></script>
@endsection

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-body card-padding">
				<div class="row">
					<div class="col-md-3">
						<button type="button" class="btn btn-default waves-effect btn-panel" onclick="window.location.href+='/cliente'">
							<i class="fa fa-user fa-3x"></i>
							<h4>Clientes</h4>
							<p>Añade, administra y cambia<br> el nombre de los usuarios</p>
						</button>									
					</div>
				</div>
				<hr>
			</div>		
		</div>
	</div>


	

	<!--  MODAL  -->

	<div class="modal fade" id="nuevoUsuarioModal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Nuevo Cliente</h4>
				</div>
				<div class="modal-body">
					<div class="container" style="width: 100%">
						<div class="form">
							<div class="group col-lg-6">      
								<input type="text" name="nombre" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Nombre</label>
							</div>
							<div class="group col-lg-6">      
								<input type="text" name="apellido" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Apellido</label>
							</div>
							<div class="group col-lg-6">      
								<input type="text" name="direccion" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Dirección</label>
							</div>
							<div class="group col-lg-6">      
								<input type="text" name="telefono" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Telefono</label>
							</div>
							<div class="group col-lg-6">      
								<input type="text" name="dni" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>DNI</label>
							</div>
							<div class="group col-lg-6">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
						            <input class="mdl-textfield__input" type="text" id="sample1" name="obra_social" value="Obras Sociales" readonly tabIndex="-1">
						            <label for="sample1" class="mdl-textfield__label" style="color: #2473a1">Obra Social</label>
						            <ul for="sample1" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
						                <li class="mdl-menu__item" value="nueva">Nueva Obra Social</li>
						                @foreach( $obras as $obra )
							                <li class="mdl-menu__item" value="{{ $obra->id }}">{{ $obra->nombre }}</li>
						                @endforeach
						            </ul>
						        </div>
							</div>
							<div class="group col-lg-6">      
								<input type="text" name="num_obra_social" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>N° Obra Social</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" name="guardar" class="btn btn-primary" >Guardar</button>
				</div>
			</div>

		</div>
	</div>

	<div class="modal fade" id="buscarUsuarioModal" role="dialog">
		<div class="modal-dialog" style="width: 1200px">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Buscar Cliente</h4>
				</div>
				<div class="modal-body">
					<div class="container" style="width: 100%">
						<table class="table table-hover">
							<thead>
								<tr>
									<div class="form">
										<th>
											<div class="col-lg-12" style="padding-left: 0px">
												<input type="text" name="buscar_nombre" class="buscar" required>
												<span class="highlight"></span>
												<span class="bar"></span>
												<label style="margin-left: -15px">Nombre</label>
											</div>
										</th>
										<th>
											<div class="col-lg-12" style="padding-left: 0px">
												<input type="text" name="buscar_apellido" class="buscar" required>
												<span class="highlight"></span>
												<span class="bar"></span>
												<label style="margin-left: -15px">Apellido</label>
											</div>
										</th>
										<th>
											<div class="col-lg-12" style="padding-left: 0px">
												<input type="text" name="buscar_dni" class="buscar" required>
												<span class="highlight"></span>
												<span class="bar"></span>
												<label style="margin-left: -15px">DNI</label>
											</div>
										</th>
										<th>
										</th>
									</div>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
				</div>

			</div>
		</div>
	</div>
@endsection