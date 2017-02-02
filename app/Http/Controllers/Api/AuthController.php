<?php

namespace CodeFin\Http\Api\Auth;

use CodeFin\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use CodeFin\User;

class AuthController extends Controller
{

    use AuthenticatesUsers;
    

    public function accessToken(Request $request){
        $this->validateLogin($request);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        // if ($this->hasTooManyLoginAttempts($request)) {
        //     $this->fireLockoutEvent($request);
        //     return $this->sendLockoutResponse($request);
        // }
        
        $credentials = $this->credentials($request);
        if($token = Auth::guard('api')->attempt($credentials)){
           return $this->sendLoginResponse($request, $token);
        }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }    


    protected function sendLoginResponse(Request $request, $token)
    {
// 		$this->clearLoginAttempts($request);
//         return response()->json([
//           'token' => $token
//         ]);
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect(env('URL_ADMIN_LOGIN','/login'));
    }
    
}
