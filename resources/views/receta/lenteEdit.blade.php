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
            <input id="tipo_lente" class="form-control input-sm" type="text" value="{{ $receta->tipo_lente() }}" disabled>
        </div>                                  
    </div>
    @if( $receta->tipo_lente() == 'Monofocal' )
    <?php $select = ( $receta->anteojos()->count() == '2' ) ? '3' : ( $receta->anteojos()->tipo == 'cerca' ? '2' : '1') ;?>

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
    <hr>
<div id="oftalmologo" class="col-lg-4">
    <h4 class="lead-label">Receta Oftalmológica</h4>
    <div id="lejos-container" class="m-l-20">
        <div class="row">
            <div class="col-lg-3 m-t-30 p-r-0">
                <label class="control-label m-t-5">Ojo D</label> 
            </div>
            <div class="col-lg-3 m-l-0">
                <label class="control-label m-t-5">Esférico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="d_c_esf" value="{{ signed($lejos->od_esferico) }}" style="color: {{ $lejos->od_esferico > 0 ? 'green' : '#c00000' }}">
                </div>                                  
            </div>
            <div class="col-lg-3">
                <label class="control-label m-t-5">Cilíndrico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="d_c_cil" value="{{ signed($lejos->od_cilindrico) }}" style="color: {{ $lejos->od_cilindrico > 0 ? 'green' : '#c00000' }}">
                </div>                                  
            </div>
            <div class="col-lg-3">
                <label class="control-label m-t-5">Eje</label> 
                <div class="fg-line">
                    <input class="form-control color" name="d_c_eje" value="{{ signed($lejos->od_eje) }}" style="color: {{ $lejos->od_eje > 0 ? 'green' : '#c00000' }}">
                </div>                                  
            </div>
        </div><br>
        <div class="row">
            <div class="col-lg-3 m-t-30 p-r-0">
                <label class="control-label m-t-5">Ojo I</label> 
            </div>
            <div class="col-lg-3 m-l-0">
                <label class="control-label m-t-5">Esférico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="i_c_esf" value="{{ signed($lejos->oi_esferico) }}" style="color: {{ $lejos->oi_esferico > 0 ? 'green' : '#c00000' }}">
                </div>                                  
            </div>
            <div class="col-lg-3">
                <label class="control-label m-t-5">Cilíndrico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="i_c_cil" value="{{ signed($lejos->oi_cilindrico) }}" style="color: {{ $lejos->oi_cilindrico > 0 ? 'green' : '#c00000' }}">
                </div>                                  
            </div>
            <div class="col-lg-3">
                <label class="control-label m-t-5">Eje</label> 
                <div class="fg-line">
                    <input class="form-control color" name="i_c_eje" value="{{ signed($lejos->oi_eje )}}" style="color: {{ $lejos->oi_eje > 0 ? 'green' : '#c00000' }}">
                </div>                                  
            </div>
        </div>
    </div>
</div>
<div id="prueba" class="col-lg-8">
    <h4 class="lead-label">Lente de Prueba</h4>
    <div id="cerca-container" class="m-l-20">
        <div class="row">
            <div class="col-lg-2 m-t-30 p-r-0">
                <label class="control-label m-t-5">Ojo D</label> 
            </div>
            <div class="col-lg-2 m-l-0">
                <label class="control-label m-t-5">Esférico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="d_c_esf" value="{{ signed($cerca->od_esferico) }}" style="color: {{ $cerca->od_esferico > 0 ? 'green' : '#c00000' }}">
                </div>                                  
            </div>
            <div class="col-lg-2">
                <label class="control-label m-t-5">Cilíndrico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="d_c_cil" value="{{ signed($cerca->od_cilindrico) }}" style="color: {{ $cerca->od_cilindrico > 0 ? 'green' : '#c00000' }}">
                </div>                                  
            </div>
            <div class="col-lg-2">
                <label class="control-label m-t-5">Eje</label> 
                <div class="fg-line">
                    <input class="form-control color" name="d_c_eje" value="{{ signed($cerca->od_eje) }}" style="color: {{ $cerca->od_eje > 0 ? 'green' : '#c00000' }}">
                </div>                                  
            </div>
            <div class="col-lg-2">
                <label class="control-label m-t-5">Agudeza</label> 
                <div class="fg-line">
                    <input class="form-control color" name="od_agudeza" value="{{ $cerca->od_eje }}">
                </div>                                  
            </div>
            <div class="col-lg-2">
                <label class="control-label m-t-5">Ag. Ambos Ojos</label> 
                <div class="fg-line">
                    <input class="form-control color" name="oi_agudeza" value="{{ $cerca->oi_eje }}" >
                </div>                                  
            </div>
        </div><br>
        <div class="row">
            <div class="col-lg-2 m-t-30 p-r-0">
                <label class="control-label m-t-5">Ojo I</label> 
            </div>
            <div class="col-lg-2 m-l-0">
                <label class="control-label m-t-5">Esférico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="i_c_esf" value="{{ signed($cerca->oi_esferico) }}" style="color: {{ $cerca->oi_esferico > 0 ? 'green' : '#c00000' }}">
                </div>                                  
            </div>
            <div class="col-lg-2">
                <label class="control-label m-t-5">Cilíndrico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="i_c_cil" value="{{ signed($cerca->oi_cilindrico) }}" style="color: {{ $cerca->oi_cilindrico > 0 ? 'green' : '#c00000' }}">
                </div>                                  
            </div>
            <div class="col-lg-2">
                <label class="control-label m-t-5">Eje</label> 
                <div class="fg-line">
                    <input class="form-control color" name="i_c_eje" value="{{ signed($cerca->oi_eje) }}" style="color: {{ $cerca->oi_eje > 0 ? 'green' : '#c00000' }}">
                </div>                                  
            </div>
            <div class="col-lg-2">
                <label class="control-label m-t-5">Agudeza</label> 
                <div class="fg-line">
                    <input class="form-control color" name="oi_agudeza" value="{{ $cerca->oi_eje }}">
                </div>                                  
            </div>
        </div>
    </div>
</div>
<div id="medidas_r" class="col-lg-12">
    <hr>
    <div class="row">
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Distancia</label> 
        </div>
        <div class="col-sm-1">
            <div class="fg-line">
                <input id="distancia" class="form-control input-sm" type="text" placeholder="Distancia" value="{{ $receta->distancia }}">
            </div>                                  
        </div>
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Altura</label> 
        </div>
        <div class="col-sm-1">
            <div class="fg-line">
                <input id="altura" class="form-control input-sm" type="text" placeholder="Altura" value="{{ $receta->altura }}">
            </div>                                  
        </div>
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Adición</label> 
        </div>
        <div class="col-sm-1">
            <div class="fg-line">
                <input id="adicion" class="form-control input-sm" type="text" value="{{ $receta->adicion }}">
            </div>                                  
        </div>
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Profesional</label> 
        </div>
        <div class="col-sm-2">
            <div class="fg-line">
                <select class="select2 form-control" name="profesional_{{ $receta->id }}"> 
                    <option value="-1">Sin Profesional</option>
                    @foreach($profesional as $p)
                        <option value="{{ $p->id }}" {{ $receta->profesional_id == $p->id ? 'selected' : '' }}>{{ $p->nombre }}</option>    
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
                <textarea id="observacion" class="form-control" cols="80" rows="7" style="height: 155px; width: 750px">{{ $receta->observacion }}</textarea>
            </div>                                  
        </div>
    </div>
    <div class="row">
    <hr>
        <div class="col-lg-3" style="margin-top: 5px;">
            <button type="button" name="guardar_receta" class="but btn btn-primary" style="background: #468e46">Guardar Receta</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function($) {
        var recetaLenteEdit = new RecetaLenteEdit();
    });
</script>