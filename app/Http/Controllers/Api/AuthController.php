<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CwdUser;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

class AuthController extends Controller
{
    use ResponseTrait;

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'refresh']]);
    }

    public function login(LoginRequest $request)
    {
        $dataLogin = [
            'user_name' => $request->post('user_name'),
            'password' => $request->post('password')
        ];

        if (! $token = Auth::attempt($dataLogin)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    public function logout() {
        auth()->logout();
        return $this->responseJsonSuccess([
            'success' => true,
            'message' => 'User successfully signed out'
        ]);
    }

    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    public function userProfile() {
        return $this->responseJsonSuccess([
            'success' => true,
            'data' => auth()->user()
        ]);
    }

    protected function createNewToken($token){
        return $this->responseJsonSuccess([
            'success' => true,
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
                'user' => auth()->user()
            ]
        ]);
    }

    //    public function postLogin(LoginRequest $request)
//    {
//        $user_name = $request->post('user_name');
//        $password = $request->post('password');
//
//        if (Auth::guard('cwd_user')->attempt(['user_name' => $user_name, 'password' => $password])) {
//            $cwdUser = Auth::guard('cwd_user')->user();
//            return Json('true', 'login success', $cwdUser, 200);
//        }else{
//            return Json('false', 'login fails', null, 200);
//        }
//    }
}
