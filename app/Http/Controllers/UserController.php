<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use http\Client\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function Psy\debug;

class UserController extends Controller
{
    public function index(): string

    {
        return User::paginate();
    }

    public function show($id): Model|Collection|array|User|null

    {
        return User::find($id);
    }

    public function store(UserCreateRequest $request): \Illuminate\Http\Response|Application|ResponseFactory

    {
        $user = User::create($request->only('first_name', 'last_name', 'email') + [

                'password' => Hash::make(1234),
            ]);

        return response($user, \Symfony\Component\HttpFoundation\Response::HTTP_CREATED);
    }

    public function update(UserUpdateRequest $request, $id): \Illuminate\Http\Response|Application|ResponseFactory
    {

        $user = User::find($id);

//        The following return amended for debug purpose. In postman we need to select x-www-form instead of form-data.
//        Otherwise Laravel thinks the data is coming from Laravel

//        return [
//            'first_name' => $request->input('first_name'),
//            'last_name' => $request->input('last_name'),
//            'email' => $request->input('email'),
//            'password' => Hash::make($request->input('password')),
//        ];

        $user->update($request->only('first_name', 'last_name', 'email'));

        return response($user, \Symfony\Component\HttpFoundation\Response::HTTP_ACCEPTED);

    }

    public function destroy($id): \Illuminate\Http\Response|Application|ResponseFactory
    {

        User::destroy($id);

        return response(null, \Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);

    }
}
