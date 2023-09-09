<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    public function register(RegisterRequest $req){
        $user = User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>bcrypt($req->password),
        ]);

        $user_role = Role::where(['name'=>'user'])->first();
        if($user_role){
            $user->assignRole($user_role);
        }
        return new UserResource($user);
    }
}
