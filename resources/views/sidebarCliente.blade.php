<div class="col-lg-2" id="usuario" style="height: 100%; background: #efefef">
	<div class="row" id="usuario-img" style="background: rgba(96, 125, 139, 0.70)">
		<div class="col-sm-10 col-sm-offset-1 m-t-20 m-b-20">
			<img src="/images/user.svg" class="img-circle" style="width: 100%;">
		</div>
	</div>
	<div class="row m-t-10" >
		<h4 class="col-md-11 m-l-10">Nombre: <b>{{ $usuario->nombre . ' ' . $usuario->apellido }}</b></h4>	
		<h4 class="col-md-11 m-l-10">DNI: <b>{{ $usuario->dni }}</b></h4>	
		<h4 class="col-md-11 m-l-10">Teléfono: <b>{{ $usuario->telefono }}</b></h4>	
		<h4 class="col-md-11 m-l-10">Dirección: <b>{{ $usuario->direccion }}</b></h4>
		<h4 class="col-md-11 m-l-10">Obra Social: <b>{{ $usuario->obra()->nombre }}</b></h4>	
		<h4 class="col-md-11 m-l-10">N° Obra Social: <b>{{ $usuario->num_obra_social }}</b></h4>	
	</div>
	<div class="row m-t-10">
		<div class="col-md-10 col-md-offset-1">	
	        <button  data-toggle="modal" href="#usuario-perfil" type="button" usuario="{{ $usuario->id }}" class="btn btn-primary but">Editar Usuario <i class="fa fa-pencil"></i></button>	
		</div>
	</div>
</div>

<style type="text/css">
	.but {
		background: #509bbf;
		border-radius: 0px;
		border-color: #8a9ea8 !important;
		width: 100%;
	}
	.but:hover{
		background: #7fc2e2;
	}
</style>
