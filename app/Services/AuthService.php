<?php
namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService{
    public function registerUser(array $validatedBody){
      $user = User::create([
        'name' =>$validatedBody['name'],
        'email'=>$validatedBody['email'],
        'password'=> Hash::make($validatedBody['password']),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;

        return[

        'user'=> $user,
        'accessToken'=>$token,
        'tokenType'=>'Bearer',
        ];
    }
}
