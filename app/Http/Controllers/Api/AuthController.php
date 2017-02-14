<?php

namespace CodeFin\Http\Controllers\Api;

use CodeFin\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

use CodeFin\User;

class AuthController extends Controller
{

    use AuthenticatesUsers;
    

    public function accessToken(Request $request){
        	
        $this->validateLogin($request);
        

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            
            return $this->sendLockoutResponse($request);
        }
        
        $credentials = $this->credentials($request);
        
        if($token = Auth::guard('api')->attempt($credentials)){
           return $this->sendLoginResponse($request, $token);
        }
        
        $this->incrementLoginAttempts($request); // incrementa o número de tentativas
        
        return $this->sendFailedLoginResponse($request); // login falho
    }
    
    public function refreshToken(Request $request){
        $token = Auth::guard('api')->refresh();
        return $this->sendLoginResponse($request, $token);
    }

    protected function sendLoginResponse(Request $request, $token)
    {
 		$this->clearLoginAttempts($request);
 
 		
        return response()->json([
          'token' => $token
        ]);
    }
    

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );
        
        $message = Lang::get('auth.throttle', ['seconds' => $seconds]);
        
        return response()->json([
                'message' => $message
            ], 403);
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);
        
        return response()->json([
            'message' => Lang::get('auth.failed')
        ], 401);
    }
    
    // public function logout(Request $request)
    // {
    //     $this->guard()->logout();
    //     $request->session()->flush();
    //     $request->session()->regenerate();
    //     return redirect(env('URL_ADMIN_LOGIN','/login'));
    // }
    
    public function logout()
    {
        Auth::guard('api')->logout();
        return response()->json([], 204); // No Content
    }
    
}
