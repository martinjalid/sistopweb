@extends('layout.login')

@section('content')
<div class="col-lg-3 col-md-5 col-xs-12">
    <div class="card">
        <h4 class="l-login">¿Olvidó la contraseña? <div class="msg">Ingrese su email y NED se la reseteará.</div></h4>
        <form class="col-md-12" id="sign_in" role="form">
            {{ csrf_field() }}
            <div class="form-group form-float">
                <div class="form-line">
                    <input id="email" type="email" class="form-control" name="mail" value="{{ old('email') }}" required>
                    <label class="form-label">Email</label>
                </div>
            </div>            
            <div class="row">                    
                <div class="col-xs-12">
                    <a class="btn btn-raised waves-effect bg-red" id="reset">RESETEAR MI PASSWORD</a>
                </div>
                <div class="col-xs-12"> 
                    <a href="/login">¡Iniciar sesión!</a> 
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/login/index.js') }}"></script>
    <script type="text/javascript"> // INIT
        document.addEventListener("DOMContentLoaded", function(event) { 
            var lg = new Login();
        });        
    </script>
@endsection