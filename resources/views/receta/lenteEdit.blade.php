<?php 
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
            <input id="tipo_lente" class="form-control input-sm" type="text" value="{{ $receta->tipo_lente }}">
        </div>                                  
    </div>
</div>
    <hr>
<div class="row">
    <div id="oftalmologo" class="col-lg-4">
        <h4 class="lead-label">Receta Oftalmológica</h4>
            <div class="row">
                <div class="col-lg-3 m-t-30 p-r-0">
                    <label class="control-label m-t-5">Ojo D</label> 
                </div>
                <div class="col-lg-3 m-l-0">
                    <label class="control-label m-t-5">Esférico</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="od_esferico" value="{{ signed($oftalmologo->od_esferico) }}">
                    </div>                                  
                </div>
                <div class="col-lg-3">
                    <label class="control-label m-t-5">Cilíndrico</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="od_cilindrico" value="{{ signed($oftalmologo->od_cilindrico) }}">
                    </div>                                  
                </div>
                <div class="col-lg-3">
                    <label class="control-label m-t-5">Eje</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="od_eje" value="{{ signed($oftalmologo->od_eje) }}">
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
                        <input class="form-control color" name="oi_esferico" value="{{ signed($oftalmologo->oi_esferico) }}">
                    </div>                                  
                </div>
                <div class="col-lg-3">
                    <label class="control-label m-t-5">Cilíndrico</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="oi_cilindrico" value="{{ signed($oftalmologo->oi_cilindrico) }}">
                    </div>                                  
                </div>
                <div class="col-lg-3">
                    <label class="control-label m-t-5">Eje</label> 
                    <div class="fg-line">
                        <input class="form-control color" name="oi_eje" value="{{ signed($oftalmologo->oi_eje )}}">
                    </div>                                  
                </div>
            </div>
    </div>
    <div id="prueba" class="col-lg-8">
        <h4 class="lead-label">Lente de Prueba</h4>   
        <div class="row">
            <div class="col-lg-2 m-t-30 p-r-0">
                <label class="control-label m-t-5">Ojo D</label> 
            </div>
            <div class="col-lg-2 m-l-0">
                <label class="control-label m-t-5">Esférico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="od_esferico" value="{{ signed($prueba->od_esferico) }}">
                </div>                                  
            </div>
            <div class="col-lg-2">
                <label class="control-label m-t-5">Cilíndrico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="od_cilindrico" value="{{ signed($prueba->od_cilindrico) }}">
                </div>                                  
            </div>
            <div class="col-lg-2">
                <label class="control-label m-t-5">Eje</label> 
                <div class="fg-line">
                    <input class="form-control color" name="od_eje" value="{{ signed($prueba->od_eje) }}">
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
                    <input class="form-control color" name="oi_esferico" value="{{ signed($prueba->oi_esferico) }}">
                </div>                                  
            </div>
            <div class="col-lg-2">
                <label class="control-label m-t-5">Cilíndrico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="oi_cilindrico" value="{{ signed($prueba->oi_cilindrico) }}">
                </div>                                  
            </div>
            <div class="col-lg-2">
                <label class="control-label m-t-5">Eje</label> 
                <div class="fg-line">
                    <input class="form-control color" name="oi_eje" value="{{ signed($prueba->oi_eje) }}">
                </div>                                  
            </div>
        </div>
    </div>
</div>
<div class="row">
    <hr>
    <div id="lentes_pedidas" class="col-lg-4 m-t-10">
        <h4 class="lead-label">Lentes Pedidas</h4>
        <div class="row">
            <div class="col-lg-3 m-t-30 p-r-0">
                <label class="control-label m-t-5">Ojo D</label> 
            </div>
            <div class="col-lg-3 m-l-0">
                <label class="control-label m-t-5">Esférico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="od_esferico" value="{{ signed($receta->od_esferico) }}">
                </div>                                  
            </div>
            <div class="col-lg-3">
                <label class="control-label m-t-5">Cilíndrico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="od_cilindrico" value="{{ signed($receta->od_cilindrico) }}">
                </div>                                  
            </div>
            <div class="col-lg-3">
                <label class="control-label m-t-5">Eje</label> 
                <div class="fg-line">
                    <input class="form-control color" name="od_eje" value="{{ signed($receta->od_eje) }}">
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
                    <input class="form-control color" name="oi_esferico" value="{{ signed($receta->oi_esferico) }}">
                </div>                                  
            </div>
            <div class="col-lg-3">
                <label class="control-label m-t-5">Cilíndrico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="oi_cilindrico" value="{{ signed($receta->oi_cilindrico) }}">
                </div>                                  
            </div>
            <div class="col-lg-3">
                <label class="control-label m-t-5">Eje</label> 
                <div class="fg-line">
                    <input class="form-control color" name="oi_eje" value="{{ signed($receta->oi_eje )}}">
                </div>                                  
            </div>
        </div>
    </div>
    <div id="agudeza" class="col-lg-4 m-t-10">
        <h4 class="lead-label">Agudeza Visual</h4>
        <div class="col-lg-4">
            <label class="control-label m-t-5">Ojo D</label> 
            <div class="fg-line">
                <input class="form-control color" name="od" value="{{ $prueba->od_agudeza }}">
            </div>                                  
        </div>
        <div class="col-lg-4">
            <label class="control-label m-t-5">Ojo I</label> 
            <div class="fg-line">
                <input class="form-control color" name="oi" value="{{ $prueba->oi_agudeza }}">
            </div>                                  
        </div>
        <div class="col-lg-4">
            <label class="control-label m-t-5">Ambos</label> 
            <div class="fg-line">
                <input class="form-control color" name="ao" value="{{ $prueba->ao_agudeza }}" >
            </div>                                  
        </div>
    </div>
    <div id="queratometria" class="col-lg-4 m-t-10">
        <h4 class="lead-label">Queratometria</h4>
        <div class="col-lg-4">
            <label class="control-label m-t-5">Ojo I</label> 
            <div class="fg-line">
                <input class="form-control color" name="oi" value="{{ $receta->queratometria_oi }}">
            </div>                                  
        </div>
        <div class="col-lg-4">
            <label class="control-label m-t-5">Ojo D</label> 
            <div class="fg-line">
                <input class="form-control color" name="od" value="{{ $receta->queratometria_od }}" >
            </div>                                  
        </div>
    </div>
</div>
<div id="medidas_r" class="row">
    <hr>
    <div class="row">
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Diametro</label> 
        </div>
        <div class="col-sm-1">
            <div class="fg-line">
                <input name="diametro" class="form-control input-sm" type="text" placeholder="Diametro" value="{{ $receta->diametro }}">
            </div>                                  
        </div>
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Radio</label> 
        </div>
        <div class="col-sm-1">
            <div class="fg-line">
                <input name="radio" class="form-control input-sm" type="text" placeholder="Radio" value="{{ $receta->altura }}">
            </div>                                  
        </div>
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Color</label> 
        </div>
        <div class="col-sm-1">
            <div class="fg-line">
                <input name="color" class="form-control input-sm" placeholder="Color" type="text" value="{{ $receta->adicion }}">
            </div>                                  
        </div>
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Profesional</label> 
        </div>
        <div class="col-sm-2">
            <div class="fg-line">
                <select class="select2 form-control" name="profesional_id"> 
                    <option value="-1">Sin Profesional</option>
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
                <textarea id="observacion" class="form-control" rows="7" style="height: 155px; width: 100%">{{ $producto->observacion }}</textarea>
            </div>                                  
        </div>
    </div>
    <div class="row">
    <hr>
        <div class="col-lg-3" style="margin-top: 5px;">
            <button type="button" id="guardar_receta" class="but btn btn-primary" style="background: #468e46">Guardar Receta</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function($) {
        var recetaLenteEdit = new RecetaLenteEdit();
    });
</script>