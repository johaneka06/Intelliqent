<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProfileUpdate;
use App\User;
use App\UserStudies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $category = Category::all();

        $studied = DB::table('user_studies')->select([
                    DB::raw('user_studies.material_id'),
                    DB::raw('count(*) as counter')
                ])
                ->join('materials', 'user_studies.material_id', '=', 'materials.id')
                ->where('user_id', '=', $user->id)
                ->groupBy('user_id', 'user_studies.material_id')
                ->get();

        $courseCount = DB::table('topics')->select([
                    DB::raw('topics.material_id'),
                    DB::raw('materials.material_name'),
                    DB::raw('materials.category_id'),
                    DB::raw('count(*) as counter'),
                ])
                ->join('materials', 'topics.material_id', '=', 'materials.id')
                ->groupBy('material_id', 'material_name', 'category_id')
                ->get();

        return view('member', ['user' => $user, 'categories' => $category, 'studied' => $studied, 'courseCount' => $courseCount]);
    }

    public function create()
    {
        $current = Auth::user();
        return view('update-profile', ['user' => $current]);
    }

    public function edit(Request $request)
    {
        $request = $request->validate([
            'current' => 'required|min:8',
            'new' => 'required|min:8',
            'confirm' => 'required|min:8|same:new'
        ]);

        if(!Hash::check($request['current'], Auth::user()->password)) return redirect('/member/profile')->withErrors('Current password is different');
        
        $user = User::where('id', '=', Auth::user()->id)->first();
        $user->password = bcrypt($request['new']);
        $user->save();

        return redirect('/member');

    }

    public function update(ProfileUpdate $request, $id)
    {
        $request = $request->validated();

        $user = User::where('id', '=', $id)->first();
        
        $user->name = $request['name'];
        $user->username = $request['username'];
        $user->save();

        return redirect('/member');
    }

    
    public function profilePict(Request $request)
    {
        $userId = Auth::user()->id;
        $this->validate($request, [
            'pict' => 'required|mimes:png,jpeg,jpg|max:2048|image'
        ]);

        $file = $request->file('pict');
        $fileName = basename($file->getClientOriginalName());
        $file->move(public_path().'/profile', $fileName);
        
        $user = User::find($userId);
        $user->profile = $fileName;
        $user->save();
        
        return redirect('/member');
    }
}
