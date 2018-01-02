@extends('layout.layout')

@section('content')
<div class="crsf">
	{{ csrf_field() }}
</div>
@include('sidebarCliente')
<div class="col-lg-8">
    <h3 >Nueva Receta</h3>
    <hr>

    <div id="">
        @include('receta.new')
    </div>
</div>
<div class="col-lg-2">
    <div id="recetas" class="" aria-expanded="true">
        <div class="">
            @foreach( $recetas as $receta )
                <div class="row m-t-5">
                    <button type="button" class="btn btn-default waves-effect btn-panel" onclick="window.location.href='/cliente/{{ $usuario->id }}/receta/{{ $receta->id }}'" style="width: 200px; height: 100px">
                        <h4>{{ $receta->tipo_lente() }}</h4>
                        <p>
                            Detalle: <b>{{ $receta->detalle_lente }}</b><br>
                            Fecha: <b>{{ date_format($receta->created_at, 'm-Y') }}</b><br>
                        </p>
                    </button>   
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('modals')
    <div class="modal fade" id="usuario-perfil" data-keyboard="false" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">             
                <div class="modal-header">
                    <h4 class="modal-title">Editar Cliente</h4>  
                    <hr>
                </div>          
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label m-t-5">Nombre</label>   
                            </div>                              
                            <div class="col-sm-4">
                                <div class="fg-line">
                                    <input id="perfil_nombre" class="form-control input-sm" type="text" name="nombre" placeholder="Nombre" value="{{ $usuario->nombre }}">
                                </div>                                  
                            </div>
                            <div class="col-md-2">
                                <label class="control-label m-t-5">Apellido</label> 
                            </div>                              
                            <div class="col-sm-4">
                                <div class="fg-line">
                                    <input id="perfil_apellido" class="form-control input-sm" type="text" name="apellido" placeholder="Apellido" value="{{ $usuario->apellido }}">
                                </div>                                  
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-15">
                        <div class="form-group">
                        	<div class="col-md-2">
                                <label class="control-label m-t-5">DNI</label>  
                            </div>                              
                            <div class="col-sm-4">
                                <div class="fg-line">
                                    <input id="perfil_dni" class="form-control input-sm" type="text" name="dni" placeholder="Num. Documento" value="{{ $usuario->dni }}">
                                </div>                                  
                            </div>
                            <div class="col-md-2">
                                <label class="control-label m-t-5">Telefono</label>    
                            </div>                              
                            <div class="col-sm-4">
                                <div class="fg-line">
                                    <input id="perfil_telefono" class="form-control input-sm" type="text" name="telefono" placeholder="Telefono" value="{{ $usuario->telefono }}">
                                </div>                                  
                            </div>
                            
                        </div>
                    </div>
                    <div class="row m-t-15">
                        <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label m-t-5">Direccion</label> 
                            </div>                              
                            <div class="col-sm-4">
                                <div class="fg-line">
                                    <input id="perfil_direccion" class="form-control input-sm" type="text" name="telefono" placeholder="Direccion" value="{{ $usuario->direccion }}">
                                </div>                                  
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-15">
                        <div class="form-group">
                        	<div class="col-md-2">
                                <label class="control-label m-t-5">Obra Social</label> 
                            </div>
                            <div class="col-sm-4">
                                <div class="fg-line">
                                    <select id="perfil_obra" class="form-control">
			                            <option value="all">Seleccione la obra</option>
			                            @foreach( $obras as $obra )
			                                <option value="{{ $obra->id }}" {{ $usuario->obra_social_id == $obra->id ? 'selected' : '' }}>{{ $obra->nombre }}</option>
			                            @endforeach
			                        </select> 
                                </div>                                  
                            </div>
                            <div class="col-md-2">
                                <label class="control-label m-t-5">N° Obra Social</label> 
                            </div>                              
                            <div class="col-sm-4">
                                <div class="fg-line">
                                    <input id="perfil_num_obra" class="form-control input-sm" type="text" name="num_obra" placeholder="N° Obra Social" value="{{ $usuario->num_obra_social }}">
                                </div>                                  
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <hr>
                    <button id="save_perfil" type="button" usuario="{{ $usuario->id }}" class="btn btn-success waves-effect pull-right">Guardar</button>
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