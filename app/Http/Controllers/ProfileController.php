<?php

namespace App\Http\Controllers;

use App\Category;
use App\UserStudies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
