@extends('layout.layout')

@section('content')
<div class="crsf">
    {{ csrf_field() }}
</div>
<aside id="filtro">
    <div class="filtro-inner c-overflow">
        <div class="t-uppercase m-l-20 m-b-30" style="margin-top: 30px;">
            <h4>Filtros</h4>
        </div>
        <hr>
        <ul class="main-menu">
            <li>
                <label class="col-sm-12 control-label m-t-20">Por nombre</label>
                <div class="col-sm-9">
                    <div class="fg-line">
                        <input class="form-control input-sm" type="text" name="filtro_nombre" id="filtro_nombre" placeholder="Ingrese un nombre">                        
                    </div>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-default waves-effect" id="filtro_nombre_button">
                        <i class="fa fa-check fa-lg pointer" data-placement="bottom" data-original-title="OK"></i>
                    </button>
                </div>
            </li>
            <li>
                <label class="col-sm-12 control-label m-t-20">Por apellido</label>
                <div class="col-sm-9">
                    <div class="fg-line">
                        <input class="form-control input-sm" type="text" name="filtro_apellido" id="filtro_apellido" placeholder="Ingrese un apellido">                        
                    </div>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-default waves-effect" id="filtro_apellido_button">
                        <i class="fa fa-check fa-lg pointer" data-placement="bottom" data-original-title="OK"></i>
                    </button>
                </div>
            </li>
            <li>
                <label class="col-sm-12 control-label m-t-20">Por DNI</label>
                <div class="col-sm-9">
                    <div class="fg-line">
                        <input class="form-control input-sm" type="text" name="filtro_dni" id="filtro_dni" placeholder="Ingrese un DNI">                        
                    </div>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-default waves-effect" id="filtro_dni_button">
                        <i class="fa fa-check fa-lg pointer" data-placement="bottom" data-original-title="OK"></i>
                    </button>
                </div>
            </li>
        </ul>
    </div>
</aside>
<div class="card">
	<div class="card-body">
		<div class="table-responsive">
            <table id="data-table-basic" class="table table-hover">
                <thead>
                    <tr>
                        <th data-column-id="sender">Nombre</th>
                        <th data-column-id="perfil">DNI</th>
                        <th data-column-id="perfil">Telefono</th>
                        <th data-column-id="acciones"></th>
                    </tr>
                </thead>
                <tbody>
                    @if( $usuarios->count() == 0 )
                        <tr>
                            <td>
                                <p>No hay usuarios</p>
                            </td>
                        </tr>
                    @endif

                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre.' '.$usuario->apellido }}</td>
                        <td>{{ $usuario->dni }}</td>
                        <td>{{ $usuario->telefono }}</td>
                        <td>
                            <a href="cliente/{{ $usuario->id }}">
                                <i class="fa fa-eye fa-lg pointer" data-toggle="tooltip" data-placement="bottom" data-original-title="Ver Cliente"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- BOTON NEW USER -->
            <div tabindex="0" class="I2J05UB-ob-g" data-toggle="modal" data-placement="left" data-original-title="Nuevo Usuario" href="#new_user">
                <input type="text" tabindex="-1" role="presentation" class="new_user">
                <div>
                    <div class="I2J05UB-ob-l" style="height: 0px;"></div>
                    <div class="I2J05UB-ob-f">
                        <div tabindex="0" class="I2J05UB-ob-e I2J05UB-ob-a">
                            <input type="text" tabindex="-1" role="presentation" class="new_user">
                            <div>
                                <img class="gwt-Image I2J05UB-ob-b" src="/images/fab_add.svg">
                                <img class="gwt-Image I2J05UB-ob-h" src="/images/fab_add_single_user.svg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PAGINATION -->
            <div class="pull-right">
                {{ $usuarios->links() }}
            </div>
            <!-- END PAGINATION -->
            
        </div>
	</div>
</div>
@endsection

@section('modals')
    <div class="modal fade" id="new_user" data-keyboard="false" tabindex="-1" role="dialog">
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
                                    <input id="perfil_nombre" class="form-control input-sm" type="text" name="nombre" placeholder="Nombre" value="">
                                </div>                                  
                            </div>
                            <div class="col-md-2">
                                <label class="control-label m-t-5">Apellido</label> 
                            </div>                              
                            <div class="col-sm-4">
                                <div class="fg-line">
                                    <input id="perfil_apellido" class="form-control input-sm" type="text" name="apellido" placeholder="Apellido" value="">
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
                                    <input id="perfil_dni" class="form-control input-sm" type="text" name="dni" placeholder="Num. Documento" value="">
                                </div>                                  
                            </div>
                            <div class="col-md-2">
                                <label class="control-label m-t-5">Telefono</label>    
                            </div>                              
                            <div class="col-sm-4">
                                <div class="fg-line">
                                    <input id="perfil_telefono" class="form-control input-sm" type="text" name="telefono" placeholder="Telefono" value="">
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
                                    <input id="perfil_direccion" class="form-control input-sm" type="text" name="telefono" placeholder="Direccion" value="">
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
                                            <option value="{{ $obra->id }}">{{ $obra->nombre }}</option>
                                        @endforeach
                                    </select> 
                                </div>                                  
                            </div>
                            <div class="col-md-2">
                                <label class="control-label m-t-5">N° Obra Social</label> 
                            </div>                              
                            <div class="col-sm-4">
                                <div class="fg-line">
                                    <input id="perfil_num_obra" class="form-control input-sm" type="text" name="num_obra" placeholder="N° Obra Social" value="">
                                </div>                                  
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <hr>
                    <button id="save_perfil" type="button" usuario="new" class="btn btn-success waves-effect pull-right">Guardar</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script type="text/javascript" src="/js/general/index.js"></script>
        <script type="text/javascript" src="/js/table/index.js"></script>
        <script type="text/javascript" src="/js/usuario/index.js"></script>
        <script type="text/javascript"> // INIT
            $(document).ready(function() {
                var us = new Usuario();
                var newUs = new UsuarioNew()
            });
        </script>
    @endsection
@endsection