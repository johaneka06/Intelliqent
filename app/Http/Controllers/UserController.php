<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\NewUser  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewUser $request)
    {
        $request = $request->validated();

        $newUser = new User();
        $newUser->email = $request['email'];
        $newUser->name = $request['name'];
        $newUser->username = $request['username'];
        $newUser->password = bcrypt($request['password']);
        $newUser->remember_token = Str::random(32);
        $newUser->save();

        $newUser->fresh();

        Auth::attempt(['email' => $newUser->email, 'password' => $request['password']]);

        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', '=', $id)->first();
        return view('member', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
