<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('index');
    }

    public function form(){
        return view('form');
    }

    public function store(Request $request)
    {

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15'
        ]);

        $user = User::create($request->all());
        return response()->json($user, 201);
    }


    public function show(){
        $users= User::all();
        return view('show_users')->with('users',$users);
    }
}
