<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        return new UserResource($user);
    }

    public function index()
    {
        return UserResource::collection(User::all());
    }
}
