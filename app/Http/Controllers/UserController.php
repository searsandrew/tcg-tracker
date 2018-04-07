<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return response()->json(User::all());
    }

    public function show($user)
    {
        return response()->json(User::find($user));
    }

    public function create(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }
}
