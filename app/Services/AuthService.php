<?php
namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\AuthenticationException;

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

    public function loginUser(array $validatedBody){
        $user = User::where('email',$validatedBody['email'])->first();
        if(!$user || !Hash::check($validatedBody['password'],$user->password)){
        throw new AuthenticationException('The provided credentials are incorrect.');
        }
        $token = $user->createToken('auth_token')->plainTextToken;
         return[

        'accessToken'=>$token,
        'tokenType'=>'Bearer',
        ];

    }

    public function logoutUser($user){
      return $user->currentAccessToken()->delete();
    }
}
