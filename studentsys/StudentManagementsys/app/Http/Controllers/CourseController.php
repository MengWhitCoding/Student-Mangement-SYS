<?php

namespace App\Http\Controllers;

use App\Models\CourseModel;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $courses = CourseModel::all();
        return view("courseView.index",compact("courses"));
    }
    public function create(){
        return view("courseView.create");
    }
    public function store(Request $request){
        $this->validate($request,[
            "name"=> "required",
            "syllabus"=> "required",
            "duration"=> "required",
        ]);

        CourseModel::create($request->all());
        return redirect()->route("courses.index")->with("success","");
    }
    public function show($id){
        $course = CourseModel::find($id);
        return view("courseView.show",compact("course"));
    }
    public function edit($id){
        $course = CourseModel::find($id);
        return view("courseView.edit",compact("course"));
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            "name"=> "required",
            "syllabus"=> "required",
            "duration"=> "required",
        ]);
        CourseModel::find($id)->update($request->all());
        return redirect()->route("courses.index")->with("success","");
    }
    public function destroy($id){
        CourseModel::find($id)->delete();
        return redirect()->route("courses.index")->with("flash_message","Course deleted!");
    }
}
