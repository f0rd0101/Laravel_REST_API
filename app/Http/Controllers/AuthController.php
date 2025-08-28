<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Requests\RegistrationRequest;


class AuthController extends Controller
{
    protected AuthService $authService;
    public function __construct(AuthService $authService){
       $this->authService = $authService;
    }


public function register(RegistrationRequest $request){

        $validatedBody = $request->validated();

        $res = $this->authService->registerUser($validatedBody);

        return response()->json($res, 201);

    }
}



