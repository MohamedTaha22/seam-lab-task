<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function login()
    {
        $data = request()->all();
        $user = User::where('user_name', $data['user_name'])->first();
        if ($user) {
            $passwordCheck = Hash::check(($data['password']), $user->password);
            if ($passwordCheck) {
                return "Welcome $user[user_name]";
            } else {
                return "Invalid password ";
            }
        } else {
            return "Invalid user name ";
        }
    }

    public function index()
    {
        $allUsers = User::all();
        return response()
        ->json($allUsers);
        ;
    }

    public function show($userId)
    {
        $user = User::find($userId);
        if ($user) {
            return response()
            ->json($user);
            ;
        }
        return "Not Found";
    }

    public function register(StoreUserRequest $request)
    {
        $data = request()->all();
        User::create([
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']) ,
            'number' => $data['number'],
            'birthday' => $data['birthday'],
        ]);
        return "done";
    }

    public function destroy($userId)
    {
        $deletedPost=User::find($userId);
        if ($deletedPost) {
            $deletedPost->delete();
            return "deleted";
        }
        return "user doesn't exist";
    }

    public function update($userId, UpdateUserRequest $request)
    {
        $data = request()->all();

        $updatedPost=User::find($userId);
        if (array_key_exists("email", $data)) {
            $updatedPost->email=$data['email'];
        }
        if (array_key_exists("user_name", $data)) {
            $updatedPost->user_name=$data['user_name'];
        }
        if (array_key_exists("password", $data)) {
            $updatedPost->password= Hash::make($data['password']);
        }
        if (array_key_exists("number", $data)) {
            $updatedPost->number=$data['number'];
        }
        if (array_key_exists("birthday", $data)) {
            $updatedPost->birthday=$data['birthday'];
        }
        $updatedPost->save();
        return "updated";
    }
}
