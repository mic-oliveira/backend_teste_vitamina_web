<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class AuthenticateUser
{
    use AsAction;

    public function handle($email, $password, $userAgent)
    {
        $user = User::where('email', $email)->firstOrFail();
        if (env('UNIQUE_TOKEN')) {
            $user?->tokens()->delete();
        }
        if (Auth::attempt(compact('email', 'password'))){
            $token = $user->createToken($userAgent);
            return ['token' => $token->plainTextToken];
        }
        throw new AuthenticationException('Email ou senha incorreta.');

    }
}
