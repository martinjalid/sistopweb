<?php foreach ($receta->anteojos() as $anteojo) {
    if ( $anteojo->tipo == 'cerca' ) 
        $cerca = $anteojo;
    else
        $lejos = $anteojo; 
} 

function signed($num){
    return $num > 0 ? '+'.$num : $num;
}
?>
<div class="row">
    <div class="col-md-1 p-r-0 m-l-10">
        <label class="control-label m-t-5">Tipo de Lente</label> 
    </div>
    <div class="col-sm-2">
        <div class="fg-line">
            <input id="tipo_lente" class="form-control input-sm" type="text" value="{{ $receta->tipo_lente->nombre }}" disabled>
        </div>                                  
    </div>
    @if( $receta->tipo_lente->nombre == 'Monofocal' )
    <?php $select = ( $receta->anteojos()->count() == '2' ) ? '3' : ( $receta->anteojos()->first()->tipo == 'cerca' ? '2' : '1') ;?>

    <div class="col-md-1 p-r-0 m-l-10">
        <label class="control-label m-t-5">Anteojo</label> 
    </div>
    <div class="col-sm-2">
        <div class="fg-line">
            <select class="select2 form-control" disabled> 
                <option {{ $select ==  '1' ? 'selected' : '' }}>Lejos</option>
                <option {{ $select ==  '2' ? 'selected' : '' }}>Cerca</option>    
                <option {{ $select ==  '3' ? 'selected' : '' }}>Lejos y Cerca</option>    
            </select>
        </div>
    </div>                                  
    @endif
    <div class="col-md-1 p-r-0 m-l-10">
        <label class="control-label m-t-5">Detalle Lente</label> 
    </div>
    <div class="col-sm-2">
        <div class="fg-line">
            <input id="detalle_lente" class="form-control input-sm" type="text" name="detalle_lente" placeholder="Detalle de la lente" value="{{ $receta->detalle_lente }}">
        </div>                                  
    </div>
</div>
@if( isset( $lejos ) )
    <hr>
    <div id="lejos">
        <h4 class="lead-label">Lejos</h4>
        <div id="lejos-container" class="m-l-20">
            <div class="row">
                <div class="col-lg-1 m-t-30 p-r-0">
                    <label class="control-label m-t-5">Ojo D</label> 
                </div>
                <div class="col-lg-1 m-l-0">
                    <label class="control-label m-t-5">Esférico</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="od_esferico" value="{{ signed($lejos->od_esferico) }}" style="color: {{ $lejos->od_esferico > 0 ? 'green' : '#c00000' }}">
                    </div>                                  
                </div>
                <div class="col-lg-1">
                    <label class="control-label m-t-5">Cilíndrico</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="od_cilindrico" value="{{ signed($lejos->od_cilindrico) }}" style="color: {{ $lejos->od_cilindrico > 0 ? 'green' : '#c00000' }}">
                    </div>                                  
                </div>
                <div class="col-lg-1">
                    <label class="control-label m-t-5">Eje</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="od_eje" value="{{ signed($lejos->od_eje) }}" style="color: {{ $lejos->od_eje > 0 ? 'green' : '#c00000' }}">
                    </div>                                  
                </div>
                <div class="col-lg-2 multi">
                    <label class="control-label m-t-5">Material Lente</label> 
                    <div class="fg-line">
                        <select class="select2 form-control" name="material_lente_id"> 
                            <option value="">Material</option>
                            @foreach($material_lente as $m)
                                <option value="{{ $m->id }}" {{ $lejos->material_lente_id == $m->id ? 'selected' : '' }}>{{ $m->nombre }}</option>    
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 multi">
                    <label class="control-label m-t-5">Color</label> 
                    <div class="fg-line">
                        <select class="select2 form-control" name="color_id"> 
                            <option value="">Color</option>
                            @foreach($color as $c)
                                <option value="{{ $c->id }}" {{ $lejos->color_id == $c->id ? 'selected' : '' }} >{{ $c->nombre }}</option>    
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 multi">
                    <label class="control-label m-t-5">Valor Lente</label> 
                    <div class="fg-line">
                        <input class="form-control" name="valor_lente" value="{{ $lejos->valor_lente }}">
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-lg-1 m-t-30 p-r-0">
                    <label class="control-label m-t-5">Ojo I</label> 
                </div>
                <div class="col-lg-1 m-l-0">
                    <label class="control-label m-t-5">Esférico</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="oi_esferico" value="{{ signed($lejos->oi_esferico) }}" style="color: {{ $lejos->oi_esferico > 0 ? 'green' : '#c00000' }}">
                    </div>                                  
                </div>
                <div class="col-lg-1">
                    <label class="control-label m-t-5">Cilíndrico</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="oi_cilindrico" value="{{ signed($lejos->oi_cilindrico) }}" style="color: {{ $lejos->oi_cilindrico > 0 ? 'green' : '#c00000' }}">
                    </div>                                  
                </div>
                <div class="col-lg-1">
                    <label class="control-label m-t-5">Eje</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="oi_eje" value="{{ signed($lejos->oi_eje )}}" style="color: {{ $lejos->oi_eje > 0 ? 'green' : '#c00000' }}">
                    </div>                                  
                </div>
                <div class="col-lg-2" style="display: block">
                    <label class="control-label m-t-5">Armazon</label> 
                    <div class="fg-line">
                        <input class="form-control" name="armazon" value="{{ $lejos->armazon }}" >
                    </div>
                </div>
                <div class="col-lg-2" style="display: block">
                    <label class="control-label m-t-5">Tratamiento</label> 
                    <div class="fg-line">
                        <select class="select2 form-control" name="tratamiento_id"> 
                            <option value="">Sin Tratamiento</option>
                            @foreach($tratamiento as $t)
                                <option value="{{ $t->id }}" {{ $lejos->tratamiento_id == $t->id ? 'selected' : '' }} >{{ $t->nombre }}</option>  
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 c_tratamiento">
                    <label class="control-label m-t-5">Tipo Tratamiento</label> 
                    <div class="fg-line">
                        <input class="form-control" name="tratamiento_color" value="{{ $lejos->tratamiento_color }}">
                    </div>
                </div>
                <div class="col-lg-2 multi" >
                    <label class="control-label m-t-5">Valor Armazon</label> 
                    <div class="fg-line">
                        <input class="form-control" name="valor_armazon" value="{{ $lejos->valor_armazon }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if( isset( $cerca ) )
    <hr>
    <div id="cerca">
        <h4 class="lead-label">Cerca</h4>
        <div id="cerca-container" class="m-l-20">
            <div class="row">
                <div class="col-lg-1 m-t-30 p-r-0">
                    <label class="control-label m-t-5">Ojo D</label> 
                </div>
                <div class="col-lg-1 m-l-0">
                    <label class="control-label m-t-5">Esférico</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="od_esferico" value="{{ signed($cerca->od_esferico) }}" style="color: {{ $cerca->od_esferico > 0 ? 'green' : '#c00000' }}">
                    </div>                                  
                </div>
                <div class="col-lg-1">
                    <label class="control-label m-t-5">Cilíndrico</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="od_cilindrico" value="{{ signed($cerca->od_cilindrico) }}" style="color: {{ $cerca->od_cilindrico > 0 ? 'green' : '#c00000' }}">
                    </div>                                  
                </div>
                <div class="col-lg-1">
                    <label class="control-label m-t-5">Eje</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="od_eje" value="{{ signed($cerca->od_eje) }}" style="color: {{ $cerca->od_eje > 0 ? 'green' : '#c00000' }}">
                    </div>                                  
                </div>
                @if( $cerca->material_lente_id )
                    <div class="col-lg-2 multi">
                        <label class="control-label m-t-5">Material Lente</label> 
                        <div class="fg-line">
                            <select class="select2 form-control" name="material_id"> 
                                <option value="">Material</option>
                                @foreach($material_lente as $m)
                                    <option value="{{ $m->id }}" {{ $cerca->material_lente_id == $m->id ? 'selected' : '' }}>{{ $m->nombre }}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                @if( $cerca->color_id )
                    <div class="col-lg-2 multi">
                        <label class="control-label m-t-5">Material Lente</label> 
                        <div class="fg-line">
                            <select class="select2 form-control" name="color_id"> 
                                <option value="">Color</option>
                                @foreach($color as $c)
                                    <option value="{{ $c->id }}" {{ $cerca->color_id == $c->id ? 'selected' : '' }} >{{ $c->nombre }}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                @if( $cerca->valor_lente )
                    <div class="col-lg-2 multi">
                        <label class="control-label m-t-5">Valor Lente</label> 
                        <div class="fg-line">
                            <input class="form-control" name="valor_lente" value="{{ $cerca->valor_lente }}">
                        </div>
                    </div>
                @endif
            </div><br>
            <div class="row">
                <div class="col-lg-1 m-t-30 p-r-0">
                    <label class="control-label m-t-5">Ojo I</label> 
                </div>
                <div class="col-lg-1 m-l-0">
                    <label class="control-label m-t-5">Esférico</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="oi_esferico" value="{{ signed($cerca->oi_esferico) }}" style="color: {{ $cerca->oi_esferico > 0 ? 'green' : '#c00000' }}">
                    </div>                                  
                </div>
                <div class="col-lg-1">
                    <label class="control-label m-t-5">Cilíndrico</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="oi_cilindrico" value="{{ signed($cerca->oi_cilindrico) }}" style="color: {{ $cerca->oi_cilindrico > 0 ? 'green' : '#c00000' }}">
                    </div>                                  
                </div>
                <div class="col-lg-1">
                    <label class="control-label m-t-5">Eje</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="oi_eje" value="{{ signed($cerca->oi_eje) }}" style="color: {{ $cerca->oi_eje > 0 ? 'green' : '#c00000' }}">
                    </div>                                  
                </div>
                @if( $receta->tipo_lente->nombre == "Monofocal" )
                    <div class="col-lg-2 multi" style="display: block">
                        <label class="control-label m-t-5">Armazon</label> 
                        <div class="fg-line">
                            <input class="form-control" name="armazon" value="{{ $cerca->armazon }}" >
                        </div>
                    </div>
                @endif
                @if( $receta->tipo_lente->nombre == "Monofocal" )
                    <div class="col-lg-2 multi" style="display: block">
                        <label class="control-label m-t-5">Tratamiento</label> 
                        <div class="fg-line">
                            <select class="select2 form-control" name="tratamiento_id"> 
                                <option value="">Sin Tratamiento</option>
                                @foreach($tratamiento as $t)
                                    <option value="{{ $t->id }}" {{ $cerca->tratamiento_id == $t->id ? 'selected' : '' }} >{{ $t->nombre }}</option>  
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 c_tratamiento">
                        <label class="control-label m-t-5">Tipo Tratamiento</label> 
                        <div class="fg-line">
                            <input class="form-control" name="tipo_tratamiento_id" value="{{ $cerca->tratamiento_color }}">
                        </div>
                    </div>
                @endif
                @if( $receta->tipo_lente->nombre == "Monofocal" )
                    <div class="col-lg-2 multi" >
                        <label class="control-label m-t-5">Valor Armazon</label> 
                        <div class="fg-line">
                            <input class="form-control" name="valor_armazon" value="{{ $cerca->valor_armazon }}">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif
<div id="receta">
    <hr>
    <div class="row">
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Distancia</label> 
        </div>
        <div class="col-sm-1">
            <div class="fg-line">
                <input name="distancia" class="form-control input-sm" type="text" placeholder="Distancia" value="{{ $receta->distancia }}">
            </div>                                  
        </div>
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Altura</label> 
        </div>
        <div class="col-sm-1">
            <div class="fg-line">
                <input name="altura" class="form-control input-sm" type="text" placeholder="Altura" value="{{ $receta->altura }}">
            </div>                                  
        </div>
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Adición</label> 
        </div>
        <div class="col-sm-1">
            <div class="fg-line">
                <input name="adicion" class="form-control input-sm" type="text" placeholder="Adición" value="{{ $receta->adicion }}">
            </div>                                  
        </div>
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Profesional</label> 
        </div>
        <div class="col-sm-2 p-r-0 m-l-10">
            <div class="fg-line">
                <select class="select2 form-control" name="profesional_id"> 
                    <option value="">Sin Profesional</option>
                    @foreach( $optica->profesionales as $p)
                        <option value="{{ $p->id }}" {{ $producto->profesional_id == $p->id ? 'selected' : '' }}>{{ $p->nombre }}</option>    
                    @endforeach
                </select>
            </div>                                  
        </div>
    </div>
    <div class="row m-t-20">
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Observación</label> 
        </div>
        <div class="col-sm-8 m-l-10">
            <div class="fg-line">
                <textarea id="observacion" class="form-control" style="height: 155px; width: 100%">{{ $producto->observacion }}</textarea>
            </div>                                  
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 m-t-20" style="margin-top: 5px;">
            <button type="button" id="guardar_receta" class="but btn btn-primary" style="background: #468e46">Guardar Receta</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function($) {
        var recetaEdit = new RecetaEdit();
    });
</script>