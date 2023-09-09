<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $req){
        if(!Auth::attempt($req->only('email','password'))){
            Helper::sendError('Email Or Password Wrong!');
        }

        return new UserResource(auth()->user());
    }
}
