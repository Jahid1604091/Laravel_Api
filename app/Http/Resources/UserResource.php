<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        //$this is used to indeicate Model property
        return [
            'user_id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'token'=>$this->createToken('veryStrongToken')->plainTextToken,
            'roles'=>$this->roles->pluck('name') ?? [],
            'permissions'=>$this->permissions->pluck('name') ?? [],
        ];
    }
}
