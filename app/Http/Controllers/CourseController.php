<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function store(Request $request)
    {
        $request = $request->validate([
            'material_name' => 'required|unique:materials',
            'description' => 'required',
            'category' => 'required'
        ]);

        $course = new Material;
        $course->material_name = $request['material_name'];
        $course->material_description = $request['description'];
        $course->category_id = $request['category'];
        $course->save();

        return redirect('/course/all');
    }

    public function show($id)
    {
        $course = Material::where('id', '=', $id)->first();
        return view('update-course', ['course' => $course]);
    }

    public function update(Request $request, $id)
    {
        $course = Material::where('id', '=', $id)->first();
        $course->material_name = $request->name;
        $course->material_description = $request->description;
        $course->save();

        return redirect('/course/all');
    }
}
