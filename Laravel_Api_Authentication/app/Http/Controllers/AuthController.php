<?php

namespace App\Http\Controllers;


//use App\Http\Requests\LoginRequest;

use App\Http\Requests\RegisterRequest;
use App\Contracts\Services\AuthServiceInterface;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    private $authService;
    
    /**
     * Create a new controller instance.
     * @param AuthServiceInterface $taskServiceInterface
     * @return void
     */
    public function __construct(AuthServiceInterface $AuthServiceInterface) 
    {
        $this->authService = $AuthServiceInterface;
    }

    public function register(RegisterRequest $request)
    {   
        $user = $this->authService->registerUser($request->only([
            'name',
            'email',
            'password',
        ]));

        $token = $user->createToken('API Token')->plainTextToken;
        $code = 200;
        return response()->json([
            'status' => 'Success',
            'message' => 'Successfully Registered',
            'user' => $user,
            'data' => $token,
        ], $code);
    }

    public function logout() {

        auth()->user()->tokens()->delete();
        $code = 200;
        
        return response()->json([
            'status' => 'Success' , 
            'message' => 'Token Revoked',
        ],$code);
    }
}
