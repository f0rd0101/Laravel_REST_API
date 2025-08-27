<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected AuthService $authService;
    public function __construct(AuthService $authService){
       $this->authService = $authService;
    }
//    public function register(Request $request){
//     $validatedBody = $request->validate([
//         'name' => ['string','required','max:50'],
//         'email' => ['string','required','max:30','unique:users,email'],
//         'password' => ['string','required','max:20','min:8'],
//     ],[
//         'name.required' => 'Name is required',
//         'email.required'=> 'Email is required',
//         'password.required'=> 'Password is required',
//         'email.unique' => 'This email is already in use',
//         'password.min'=> 'Password must be at least 8 characters',
//     ]);

//     $res = $this->authService->registerUser($validatedBody);

//     return response()->json($res,201);

    
// }

public function register(Request $request){
    try {
        $validatedBody = $request->validate([
            'name' => ['string','required','max:50'],
            'email' => ['string','required','max:30','unique:users,email'],
            'password' => ['string','required','max:20','min:8'],
        ],[
            'name.required' => 'Name is required',
            'email.required'=> 'Email is required',
            'password.required'=> 'Password is required',
            'email.unique' => 'This email is already in use',
            'password.min'=> 'Password must be at least 8 characters',
        ]);

        $res = $this->authService->registerUser($validatedBody);

        return response()->json($res, 201);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
        ], 500);
    }
}


}
