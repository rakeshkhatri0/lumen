<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
//create new post
    public function add(Request $request)
    {
        $request['api_token'] = str_random(60);
        $request['password'] =  app('hash')->make($request['password']);
        $user = User::create($request->all());
        return response()->json($user);
    }

    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }
}

?>