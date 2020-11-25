<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\NewUser;
use App\Preference;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        return view('/register');
    }

    public function create()
    {
        $categories = Category::all();
        return view('select-preference', ['categories' => $categories]);
    }

    public function save(Request $request)
    {
        $userId = Auth::user()->id;
        $preferences = $request->input('preferences');

        if ($preferences != null) {
            foreach ($preferences as $preference) {
                $pref = new Preference;
                $pref->user_id = $userId;
                $pref->category_id = $preference;
                $pref->save();
            }
        }

        return redirect('/');
    }

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

        return redirect('/register/preferences');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function display()
    {
        $categories = Category::all();
        $array = [];
        $prefs = Preference::where('user_id', '=', Auth::user()->id)->get();

        foreach ($prefs as $pref) {
            array_push($array, $pref->category_id);
        }
        
        return view('select-preference', ['preferences' => $array, 'categories' => $categories]);
    }

    public function edit(Request $request)
    {
        $preferences = $request->preferences;

        $userId = Auth::user()->id;
        Preference::where('user_id', '=', $userId)->delete();

        foreach ($preferences as $preference) {
            $pref = new Preference;
            $pref->user_id = $userId;
            $pref->category_id = $preference;
            $pref->save();
        }

        return redirect('/member');
    }
}
