<?php

namespace App\Http\Controllers;

use App\Category;
use App\Material;
use App\Topic;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $courses = Material::all();
        $categories = Category::all();
        return view('courses', ['courses' => $courses, 'categories' => $categories]);
    }

    public function create()
    {
        //
    }

    public function show($id)
    {
        $course = Material::where('id', '=', $id)->first();

        return view('course-detail', ['course' => $course]);
    }

    public function edit($id)
    {
        //
    }


    public function topic($material_id, $topic_id)
    {
        $current_topic = Topic::where('id', '=', $topic_id)->first();
        
        $topic_id++;

        $next_topic = Topic::where([
                ['id', '=', $topic_id],
                ['material_id', '=', $material_id]
            ])->first();

        return view('course-video', ['current' => $current_topic, 'next' => $next_topic]);
    }

    public function find(Request $request)
    {
        if($request->category == null) return redirect('/course');

        $topics = Material::whereIn('category_id', $request->category)->get();
        $categories = Category::all();
        
        return view('courses', ['courses' => $topics, 'categories' => $categories, 'checked' => $request->category]);
    }
}
