<?php

namespace App\Http\Controllers;

use App\Contracts\Services\AuthServiceInterface;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    private $authService;

    /**
     * Create a new controller instance.
     * @param AuthServiceInterface $taskServiceInterface
     * @return void
    */
    public function __construct(AuthServiceInterface $authServiceInterface) 
    {
        $this->authService = $authServiceInterface;
    }

    /**
     * Store User.
     * @param UserCreateRequest $request
     * @return object
    */
    public function register() 
    {
        $this->authService->storeUser();
        $response = ['message' => 'Page created successfully.'];
        return response()->json($response);
    }
}
