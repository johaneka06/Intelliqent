<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProfileUpdate;
use App\User;
use App\UserStudies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function edit($id)
    {
        //
    }

    public function update(ProfileUpdate $request, $id)
    {
        $request = $request->validated();

        $path = "profile/default.png";

        if($request['profile'] != null)
        {
            $path = Storage::disk('local')->put('public', $request['profile'], 'public');
            $path = 'storage/'.basename($path);
        }

        $user = User::where('id', '=', $id)->first();
        
        $user->name = $request['name'];
        $user->username = $request['username'];
        $user->profile = $path;
        $user->save();

        return redirect('/member');
    }
}
