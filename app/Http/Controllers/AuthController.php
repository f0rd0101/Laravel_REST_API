<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;



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

public function login(LoginRequest $request){
    $validatedBody = $request->validated();
    $res = $this->authService->loginUser($validatedBody);
  return response()->json(['message' => 'Successfully logged in','data' => $res], 201);


}
public function logout(Request $request){
    $user = $request->user();
    $this->authService->logoutUser($user);
    return response()->json(['message' => 'Successfully logged out'], 200);

}
}



