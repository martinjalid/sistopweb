@extends('layout.layout')

@section('other_js_css')
   	<script type="text/javascript" src="/js/index.js"></script>
@endsection

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-body card-padding">
				<div class="row">
					<div class="col-md-3">
						<button type="button" class="btn btn-default waves-effect btn-panel" onclick="window.location.href+='/medicos'">
							<i class="fa fa-user-md fa-3x"></i>
							<h4>Médicos</h4>
							<p>Añade, administra y cambia<br> el nombre de los médicos</p>
						</button>									
					</div>
					 <div class="col-md-3">
						<button type="button" class="btn btn-default waves-effect btn-panel btn-panel" data-toggle="modal" href="#usuario-perfil">
							<i class="fa fa-child fa-3x"></i>
							<h4>Usuarios</h4>
							<p>Edita y añade<br> los usuarios del sistema</p>
						</button>									
					</div>
				<hr>
			</div>		
		</div>
	</div>
@endsection('content')


@section('modals')
    <div class="modal fade" id="usuario-perfil" data-keyboard="false" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">             
                <div class="modal-header" style="height: 70px">
                    <h4 class="modal-title">Usuarios</h4>  
                    <hr>
                </div>          
                <div class="modal-body">
                	<table class="table">
						<thead>
							<tr>
								<th>Email</th>
								<th>Fecha Creacion</th>
								<th>Activo</th>
							</tr>
						</thead>
						<tbody>
							@if( $usuarios->count() == 0 )
								<tr>
									<td> No Hay Usuarios Registrados</td>
								</tr>
							@endif
							@foreach( $usuarios as $usuario )
								<tr>
									<td> {{ $usuario->mail }} </td>
									<td> {{ $usuario->created_at }}</td>
									<td> {{ $usuario->activo ? 'Activo' : 'No Activo' }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
                </div>
                <div class="modal-footer">
                    <hr>
                    <button id="save_perfil" type="button" class="btn btn-success waves-effect pull-right">Guardar</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script type="text/javascript" src="/js/general/index.js"></script>
        <script type="text/javascript" src="/js/usuario/index.js"></script>
        <script type="text/javascript" src="/js/receta/index.js"></script>
        <script type="text/javascript"> // INIT
            $(document).ready(function() {
                var usuarioEdit = new UsuarioEdit();
                var recetaEdit = new RecetaEdit();
            });
        </script>
    @endsection
@endsection