<?php
namespace App\Http\Controllers;
use App\User;
use App\Notifications\SignupActivate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
 
    public function signup(Request $request)
    {
        // falta validar sus cosas.

        $reglas = [
            'id_titulo'     => 'required|numeric|exists:titulo,id',
            'nombres'    => 'required',
            'apellidos'    => 'required',
            'identificacion'    => 'required|unique:usuarios,identificacion|numeric|digits_between:5,11',
            'tipo_identificacion'    => 'required|numeric',
            'id_entidad'    => 'required|numeric|exists:entidades,id',
            'id_rol'    => 'required|numeric|exists:roles,id',
            'id_tipotel'    => 'required|numeric|exists:tipostelefonos,id',
            'telefono'    => 'required|unique:usuarios,telefono|digits_between:6,11',
            'email'    => 'required|email|unique:usuarios,email',
            'ultimoinicio'    => 'required',
            'ultimaip'    => 'required|ipv4',
            'unavegador'    => 'required',
            'isline'    => 'required|numeric|',
            'password' => 'required|min:8|confirmed',
            'password_confirmation'=> 'same:password',

        ];
        $this->validate($request, $reglas);

        $user = new User([
            'id_titulo'     => $request->id_titulo,
            'nombres'    => ucfirst(strtolower($request->nombres)),
            'apellidos'    => ucfirst(strtolower($request->apellidos)),
            'identificacion'    => $request->identificacion,
            'tipo_identificacion'    => $request->tipo_identificacion,
            'id_entidad'    => $request->id_entidad,
            'id_rol'    => $request->id_rol,
            'id_tipotel'    => $request->id_tipotel,
            'telefono'    => $request->telefono,
            'email'    => strtolower($request->email),
            'ultimoinicio'    => $request->ultimoinicio,
            'ultimaip'    => $request->ultimaip,
            'unavegador'    => $request->unavegador,
            'isline'    => $request->isline,
            'password' => bcrypt($request->password),
            'activation_token'  => str_random(60),
        ]);

        
        
        $user->save();
       
        $user->notify(new SignupActivate($user));
       
   
        
      //  return response()->json([
          //  'message' => 'Successfully created user!'], 201);

            return $this->successResponse('Le hemos enviado un correo para que pueda acceder a su cuenta',401);
    }

    


    public function login(Request $request)
    {

        $reglas = [
            'email'     => 'required|exists:usuarios,email',
            'password'    => 'required',
            
            

        ];
        $this->validate($request, $reglas);
       
      $credentials = request(['email', 'password']);
       

        $credentials['active'] = 1;
      //  $credentials['deleted_at'] = null;

      $user = DB::table('usuarios')->select('active')->where('email', $request->email)->get();
      

        if ($user[0]->active == 0){
            return $this->errorResponse('Su usuario no se encuentra activo.',401);

        }else  if (!Auth::attempt($credentials)) {
           
            return $this->errorResponse('La contraseña no son correctos',401);
        }
      

        $user = $request->user();
        $tokenResult = $user->createToken('Token Acceso Personal');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
        ]);
    }






    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 
            'Successfully logged out']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }


    public function signupActivate($token)
    
{

    $user = User::where('activation_token', $token)->first();
    if (!$user) {
        return $this->successResponse('El token es invalido',404);   
     }
    $user->active = true;
    $user->activation_token = '';
    $user->save();
    return $user;

}





}