<?php

namespace App\Exceptions;

use Exception;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException) {
            if (is_null($exception->getPrevious())){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Token is missing'
                ], $exception->getStatusCode());
            }
            switch (get_class($exception->getPrevious())) {
                case \Tymon\JWTAuth\Exceptions\TokenExpiredException::class:
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Token has been expired',
                        'data' => []
                    ], $exception->getStatusCode());
                case \Tymon\JWTAuth\Exceptions\TokenInvalidException::class:
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Token is invalid'
                    ], $exception->getStatusCode());
                case \Tymon\JWTAuth\Exceptions\TokenBlacklistedException::class:
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Token is on Blacklist'
                    ], $exception->getStatusCode());
                default:
                    break;
            }
        } elseif ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            if (is_null($exception->getPrevious())){                
                return response()->json([
                    'status' => 'error',
                    'message' => 'You don\'t have a permission to access this API' 
                ], $exception->getStatusCode());
            }
        }
        // if ($exception instanceof TokenExpiredException ) {
        //     return response()->json(['message' => 'session expired'], 400);
        // }
        return parent::render($request, $exception);
    }
}
