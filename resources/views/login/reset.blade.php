@extends('layout.login')

@section('content')
<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
<div class="col-lg-3 col-md-5 col-xs-12">
    <div class="card">
        <h4 class="l-login">¿Olvidó la contraseña? <div class="msg">Ingrese su email y le resetearemos la contraseña.</div></h4>
        <form class="col-md-12" id="sign_in" method="POST">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="email" class="form-control">
                    <label class="form-label">Email</label>
                </div>
            </div>            
            <div class="row">                    
                <div class="col-xs-12">
                    <a href="index.html" class="btn btn-raised waves-effect bg-red" type="submit">RESETEAR MI PASSWORD</a>
                </div>
                <div class="col-xs-12"> 
                    <a href="/login">¡Iniciar sesión!</a> 
                </div>
            </div>
        </form>
    </div>
</div>
<div class="col-lg-3 col-md-5 col-xs-12">
    <div class="card">
        <h4 class="l-login">Forgot Password? <div class="msg">Enter your e-mail address below to reset your password.</div></h4>
        <form class="col-md-12" id="sign_in" method="POST">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="email" class="form-control">
                    <label class="form-label">Email</label>
                </div>
            </div>            
            <div class="row">                    
                <div class="col-xs-12">
                    <a href="index.html" class="btn btn-raised waves-effect bg-red" type="submit">RESET MY PASSWORD</a>
                </div>
                <div class="col-xs-12"> <a href="sign-in.html">Sign In!</a> </div>
            </div>
        </form>
    </div>
</div>
@endsection
