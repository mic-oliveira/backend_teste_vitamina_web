<?php

namespace App\Http\Controllers;

use App\Actions\AuthenticateUser;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        return AuthenticateUser::run($request->get('email'), $request->get('password'), $request->userAgent());
    }
}
