<?php

namespace App\Http\Controllers;

use App\Category;
use App\Material;
use App\Preference;
use App\Topic;
use App\UserStudies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function index()
    {
        $courses = Material::select('materials.*')
            ->join('categories', 'materials.category_id', '=', 'categories.id')
            ->where('deleted_at', '=', NULL)
            ->get();

        $categories = Category::all();
        
        return view('courses', ['courses' => $courses, 'categories' => $categories]);
    }

    public function create()
    {
        if (count(Preference::where('user_id', '=', Auth::user()->id)->get()) == 0) return redirect('/course/all');

        $courses = Preference::select('materials.*')
            ->join('categories', 'preferences.category_id', '=', 'categories.id')
            ->join('materials', 'categories.id', '=', 'materials.category_id')
            ->where('user_id', '=', Auth::user()->id)
            ->where('categories.deleted_at', '=', NULL)
            ->get();

        $categories = Category::all();

        return view('courses', ['courses' => $courses, 'categories' => $categories, 'isPreferred' => true]);
    }

    public function show($id)
    {
        $course = Material::where('id', '=', $id)->first();

        return view('course-detail', ['course' => $course]);
    }

    public function search(Request $request)
    {
        if ($request == null) return redirect('/course');

        $topics = Material::where('material_name', 'like', "%" . $request->key . "%")->get();
        $categories = Category::all();

        return view('courses', ['courses' => $topics, 'categories' => $categories]);
    }


    public function topic($material_id, $topic_id)
    {
        $current_topic = Topic::where('id', '=', $topic_id)->first();

        if (!$this->checkStudiedExist($material_id, $topic_id)) {
            $studied = new UserStudies;
            $studied->user_id = Auth::user()->id;
            $studied->material_id = $material_id;
            $studied->topic_id = $topic_id;
            $studied->save();
        }

        $topic_id++;

        $next_topic = Topic::where([
            ['id', '=', $topic_id],
            ['material_id', '=', $material_id]
        ])->first();

        return view('course-video', ['current' => $current_topic, 'next' => $next_topic]);
    }

    public function find(Request $request)
    {
        if ($request->category == null) return redirect('/course');

        $topics = Material::whereIn('category_id', $request->category)->get();
        $categories = Category::all();

        return view('courses', ['courses' => $topics, 'categories' => $categories, 'checked' => $request->category]);
    }

    private function checkStudiedExist($material_id, $topic_id)
    {
        $studied = UserStudies::where('user_id', '=', Auth::user()->id)
            ->where('material_id', '=', $material_id)
            ->where('topic_id', '=', $topic_id)
            ->get();

        return ($studied->count() > 0) ? true : false;
    }
}
