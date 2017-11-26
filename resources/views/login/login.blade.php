@extends('layout.login')

@section('content')
    <div class="crsf">
        {{ csrf_field() }}
    </div>
    <div class="col-lg-3 col-md-4 col-xs-12">
        <div class="card">
            <h4 class="l-login">Login</h4>
            <form class="col-md-12" id="sign_in">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        <label class="form-label">Email</label>
                    </div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input id="password" type="password" class="form-control" name="password" required>
                        <label class="form-label">Contraseña</label>
                    </div>
                </div>
                <div>
                    <input type="checkbox" name="remember" id="remember" class="filled-in chk-col-cyan">
                    <label for="remember">Recordame</label>
                </div>
                <a class="btn btn-raised waves-effect bg-red" id="iniciar">INICIAR</a> 
                <div class="text-left"> 
                    <a href="/reset">Olvidé la contraseña</a> 
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