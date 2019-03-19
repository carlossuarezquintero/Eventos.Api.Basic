<?php
namespace App\Http\Controllers;
use App\User;
use App\Notifications\SignupActivate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function signup(Request $request)
    {
        // falta validar sus cosas.

        $user = new User([
            'id_titulo'     => $request->id_titulo,
            'nombres'    => $request->nombres,
            'apellidos'    => $request->apellidos,
            'identificacion'    => $request->identificacion,
            'tipo_identificacion'    => $request->tipo_identificacion,
            'id_entidad'    => $request->id_entidad,
            'id_rol'    => $request->id_rol,
            'id_tipotel'    => $request->id_tipotel,
            'telefono'    => $request->telefono,
            'correo'    => $request->correo,
            'ultimoinicio'    => $request->ultimoinicio,
            'ultimaip'    => $request->ultimaip,
            'unavegador'    => $request->unavegador,
            'isline'    => $request->isline,
            'password' => bcrypt($request->password),
        ]);

        $user->save();
        
        // Problemas al encontrar el metodo Signup Activate
         $user->notify( new SignupActivate($user));
        

        return response()->json([
            'message' => 'Successfully created user!'], 201);
    }

    
    public function login(Request $request)
    {
        
      // falta validar todo
      
        $credentials = request(['correo', 'password']);
        $credentials['active'] = 1;
        $credentials['deleted_at'] = null;

        
        if (!Auth::attempt($credentials)) {
           
            return response()->json([
                'message' => 'Unauthorized'], 401);
        }
        
        $user = $request->user();
       

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                    ->toDateTimeString(),
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
        return response()->json(['message' => 'El token de activación es inválido'], 404);
    }
    $user->active = true;
    $user->activation_token = '';
    $user->save();
    return $user;

}





}