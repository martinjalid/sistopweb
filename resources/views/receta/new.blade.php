<div class="row">
    <div class="col-md-1 p-r-0 m-l-10">
        <label class="control-label m-t-5">Tipo de Lente</label> 
    </div>
    <div class="col-sm-2">
        <div class="fg-line">
	         <select class="select2 form-control"> 
	            <option value="0">Tipo Lente</option>
	         	@foreach( $tipos_lente as $tl )
		            <option value="{{ $tl->id }}">{{ $tl->nombre }}</option>    
	         	@endforeach
	        </select>
        </div>
    </div>

    <div class="col-md-1 p-r-0 m-l-10">
        <label class="control-label m-t-5">Anteojo</label> 
    </div>
    <div class="col-sm-2">
        <div class="fg-line">
            <select class="select2 form-control"> 
                <option value="">Lejos</option>
                <option value="">Cerca</option>    
                <option value="">Lejos y Cerca</option>    
            </select>
        </div>
    </div>                                  
    <div class="col-md-1 p-r-0 m-l-10">
        <label class="control-label m-t-5">Detalle Lente</label> 
    </div>
    <div class="col-sm-2">
        <div class="fg-line">
            <input id="detalle_lente" class="form-control input-sm" type="text" name="detalle_lente" placeholder="Detalle de la lente" value="">
        </div>                                  
    </div>
</div>
<div id="lejos">
    <hr>
    <h4 class="lead-label">Lejos</h4>
    <div id="lejos-container" class="m-l-20">
        <div class="row">
            <div class="col-lg-1 m-t-30 p-r-0">
                <label class="control-label m-t-5">Ojo D</label> 
            </div>
            <div class="col-lg-1 m-l-0">
                <label class="control-label m-t-5">Esférico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="d_c_esf" value="" style="">
                </div>                                  
            </div>
            <div class="col-lg-1">
                <label class="control-label m-t-5">Cilíndrico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="d_c_cil" value="" style="">
                </div>                                  
            </div>
            <div class="col-lg-1">
                <label class="control-label m-t-5">Eje</label> 
                <div class="fg-line">
                    <input class="form-control color" name="d_c_eje" value="" style="">
                </div>                                  
            </div>
            <div class="col-lg-2 multi">
                <label class="control-label m-t-5">Material Lente</label> 
                <div class="fg-line">
                    <select class="select2 form-control" name="c_material"> 
                        <option value="-1">Material</option>
                        @foreach($material_lente as $m)
                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>    
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 multi">
                <label class="control-label m-t-5">Material Lente</label> 
                <div class="fg-line">
                    <select class="select2 form-control" name="c_color"> 
                        <option value="-1">Color</option>
                        @foreach($color as $c)
                            <option value="{{ $c->id }}">{{ $c->nombre }}</option>    
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 multi">
                <label class="control-label m-t-5">Valor Lente</label> 
                <div class="fg-line">
                    <input class="form-control" name="valor_c_lente" value="">
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
                    <input class="form-control color" name="i_c_esf" value="" style="">
                </div>                                  
            </div>
            <div class="col-lg-1">
                <label class="control-label m-t-5">Cilíndrico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="i_c_cil" value="" style="">
                </div>                                  
            </div>
            <div class="col-lg-1">
                <label class="control-label m-t-5">Eje</label> 
                <div class="fg-line">
                    <input class="form-control color" name="i_c_eje" value="" style="">
                </div>                                  
            </div>
            <div class="col-lg-2 multi" style="display: block">
                <label class="control-label m-t-5">Armazon</label> 
                <div class="fg-line">
                    <input class="form-control" name="" value="" >
                </div>
            </div>
            <div class="col-lg-2 multi" style="display: block">
                <label class="control-label m-t-5">Tratamiento</label> 
                <div class="fg-line">
                    <select class="select2 form-control" id="l_tratamiento"> 
                        <option value="-1">Sin Tratamiento</option>
                        @foreach($tratamiento as $t)
                            <option value="{{ $t->id }}" >{{ $t->nombre }}</option>  
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 c_tratamiento">
                <label class="control-label m-t-5">Tipo Tratamiento</label> 
                <div class="fg-line">
                    <input class="form-control" id="l_tipo_tratamiento" value="">
                </div>
            </div>
            <div class="col-lg-2 multi" >
                <label class="control-label m-t-5">Valor Armazon</label> 
                <div class="fg-line">
                    <input class="form-control" name="valor_c_armazon" value="">
                </div>
            </div>
        </div>
    </div>
</div>
<div id="cerca">
    <hr>
    <h4 class="lead-label">Cerca</h4>
    <div id="cerca-container" class="m-l-20">
        <div class="row">
            <div class="col-lg-1 m-t-30 p-r-0">
                <label class="control-label m-t-5">Ojo D</label> 
            </div>
            <div class="col-lg-1 m-l-0">
                <label class="control-label m-t-5">Esférico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="d_c_esf" value="" style="">
                </div>                                  
            </div>
            <div class="col-lg-1">
                <label class="control-label m-t-5">Cilíndrico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="d_c_cil" value="" style="">
                </div>                                  
            </div>
            <div class="col-lg-1">
                <label class="control-label m-t-5">Eje</label> 
                <div class="fg-line">
                    <input class="form-control color" name="d_c_eje" value="" style="">
                </div>                                  
            </div>
                <div class="col-lg-2 multi">
                    <label class="control-label m-t-5">Material Lente</label> 
                    <div class="fg-line">
                        <select class="select2 form-control" name="c_material"> 
                            <option value="-1">Material</option>
                            @foreach($material_lente as $m)
                                <option value="{{ $m->id }}" >{{ $m->nombre }}</option>    
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 multi">
                    <label class="control-label m-t-5">Material Lente</label> 
                    <div class="fg-line">
                        <select class="select2 form-control" name="c_color"> 
                            <option value="-1">Color</option>
                            @foreach($color as $c)
                                <option value="{{ $c->id }}" >{{ $c->nombre }}</option>    
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 multi">
                    <label class="control-label m-t-5">Valor Lente</label> 
                    <div class="fg-line">
                        <input class="form-control" name="valor_c_lente" value="">
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
                    <input class="form-control color" name="i_c_esf" value="" style="">
                </div>                                  
            </div>
            <div class="col-lg-1">
                <label class="control-label m-t-5">Cilíndrico</label> 
                <div class="fg-line">
                    <input class="form-control color" name="i_c_cil" value="" style="">
                </div>                                  
            </div>
            <div class="col-lg-1">
                <label class="control-label m-t-5">Eje</label> 
                <div class="fg-line">
                    <input class="form-control color" name="i_c_eje" value="" style="">
                </div>                                  
            </div>
            <div class="col-lg-2 multi" style="display: block">
                <label class="control-label m-t-5">Armazon</label> 
                <div class="fg-line">
                    <input class="form-control" name="cerca_armazon" value="" >
                </div>
            </div>
            <div class="col-lg-2 multi" style="display: block">
                <label class="control-label m-t-5">Tratamiento</label> 
                <div class="fg-line">
                    <select class="select2 form-control" name="c_tratamiento"> 
                        <option value="-1">Sin Tratamiento</option>
                        @foreach($tratamiento as $t)
                            <option value="{{ $t->id }}">{{ $t->nombre }}</option>  
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 c_tratamiento">
                <label class="control-label m-t-5">Tipo Tratamiento</label> 
                <div class="fg-line">
                    <input class="form-control" name="c_tipo_tratamiento" value="">
                </div>
            </div>
            <div class="col-lg-2 multi" >
                <label class="control-label m-t-5">Valor Armazon</label> 
                <div class="fg-line">
                    <input class="form-control" name="valor_c_armazon" value="">
                </div>
            </div>
        </div>
    </div>
</div>
<div id="medidas_r">
    <hr>
    <div class="row">
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Distancia</label> 
        </div>
        <div class="col-sm-1">
            <div class="fg-line">
                <input id="distancia" class="form-control input-sm" type="text" placeholder="Distancia" value="">
            </div>                                  
        </div>
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Altura</label> 
        </div>
        <div class="col-sm-1">
            <div class="fg-line">
                <input id="altura" class="form-control input-sm" type="text" placeholder="Altura" value="">
            </div>                                  
        </div>
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Adición</label> 
        </div>
        <div class="col-sm-1">
            <div class="fg-line">
                <input id="adicion" class="form-control input-sm" type="text" value="">
            </div>                                  
        </div>
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Profesional</label> 
        </div>
        <div class="col-sm-2">
            <div class="fg-line">
                <select class="select2 form-control" name="profesional"> 
                    <option value="-1">Sin Profesional</option>
                    @foreach($profesional as $p)
                        <option value="{{ $p->id }}">{{ $p->nombre }}</option>    
                    @endforeach
                </select>
            </div>                                  
        </div>
    </div>
    <div class="row m-t-20">
        <div class="col-md-1 p-r-0 m-l-10">
            <label class="control-label m-t-5">Observación</label> 
        </div>
        <div class="col-sm-8">
            <div class="fg-line">
                <textarea id="observacion" class="form-control" cols="80" rows="7" style="height: 155px; width: 750px"></textarea>
            </div>                                  
        </div>
    </div>
    <div class="row">
    <hr>
        <div class="col-lg-2" style="margin-top: 5px;">
            <button type="button" name="guardar_receta" class="but btn btn-primary" style="background: #468e46">Guardar Receta</button>
        </div>
    </div>
</div>