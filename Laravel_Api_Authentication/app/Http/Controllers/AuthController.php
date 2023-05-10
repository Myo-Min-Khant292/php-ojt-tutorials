<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
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

        return response()->json([
            'status' => 'Success',
            'message' => 'Successfully Registered',
            'user' => $user,
        ]);
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
 
            $token = $request->user()->createToken('API Token')->plainTextToken;
            $code = 200;

            return response()->json([
                'status' => 'Success',
                'message' => 'Successfully login',
                'user' => $credentials,
                'data' => $token,
            ], $code);
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    
    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        $code = 200;
        
        return response()->json([
            'status' => 'Success' , 
            'message' => 'Token Revoked',
        ],$code);
    }
}
