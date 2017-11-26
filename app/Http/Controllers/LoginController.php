<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;
use Validator;
use App\Http\Controllers\Controller;
use App\Administrador;
use App\Mail\ResetPassword;
use Mail;
use Hash;


class LoginController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function viewLogin()
    {
        return view('login.login');
    }

    public function viewPasswordReset()
    {
        return view('login.email');
    }

    public function validacion($request)
    {   
        return Validator::make($request->all(), [
            'mail' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);
    }

    public function login(Request $request)
    {
        try {   
            if( $this->validacion($request)->fails() )
                throw new Exception("Ingrese datos válidos", 1);        
            
            $info = [
                'mail' => $request->mail,
                'password' => $request->password,
            ];

            $remember = $request->remember == 'on' ? true : false;
            if( Auth::attempt($info, $remember) )
                $response = ['error' => false];
            else               
                $response = ['error' => true, 'msj' => 'Datos incorrectos.'];
        
        } catch (Exception $e) {
            $response = $this->formatError($e);
        }

        return $response;
    }

    public function logout(Request $request)
    {           
        Auth::logout();
        return redirect('/login');
    }

    public function passwordReset(Request $request)
    {   
        try {
            $email = $request->email;
            if( !$email )
                throw new Exception("Ingrese un email", 1);

            $administrador = Administrador::where('mail', '=', $email)->first();
            if( !$administrador )
                throw new Exception("Email no registrado", 1);
            
            $administrador->password = Hash::make('123seguro');
            $administrador->save();

            Mail::to($administrador->mail)->send(new ResetPassword()); 

            $response = ['error' => false, 'msj' => 'Pass reseteada'];    
            
        } catch (Exception $e) {
            $response = $this->formatError($e);
        }

        return $response;
    }
}
