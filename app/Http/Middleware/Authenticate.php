<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure $next, ...$guards)
    {
        try {
            JWTAuth::parseToken()->authenticate();
            return $next($request);
        } catch (TokenBlacklistedException $e) {
//            return response()->json([
//                'error' => 'token_blacklisted',
//            ], 401);
            return $this->responseJsonError([
                'success' => false,
                'message' => "update level fail"
            ], 401);
        } catch (TokenExpiredException $e) {
            try {
                $customClaims = [];
                $refreshedToken = JWTAuth::refresh(JWTAuth::getToken());
            } catch (TokenExpiredException $e) {
                return $this->responseJsonError([
                    'success' => false,
                    'message' => "token_expired",
                    'refresh' => false,
                ], 401);
            }

            return $this->responseJsonError([
                'success' => false,
                'message' => "token_expired",
//                'refresh' => [
//                    'token' => $refreshedToken,
//                ],
            ], 401);
        } catch (TokenInvalidException $e) {
            return $this->responseJsonError([
                'success' => false,
                'message' => "token_invalid",
            ], 401);
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'token_absent',
            ], 401);
        }
        return $next($request);
    }
}
