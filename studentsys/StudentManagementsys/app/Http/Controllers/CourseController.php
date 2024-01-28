<?php

namespace App\Http\Controllers;

use App\Models\CourseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            "image"=> "nullable|mimes:png,jpg,jpeg,webp",
            "syllabus"=> "required",
            "duration"=> "required",
        ]);

        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;

            $path ='uploads/couses/';
            $file->move($path, $filename);
        }

        CourseModel::create([
            'name'=> $request->name,
            'image'=> $path.$filename,
            'syllabus'=> $request->syllabus,
            'duration'=> $request->duration,
        ]);
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
            "image"=> "nullable|mimes:png,jpg,jpeg,webp",
            "syllabus"=> "required",
            "duration"=> "required",
        ]);
        $courses = CourseModel::find($id);
        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;

            $path ='uploads/couses/';
            $file->move($path, $filename);

            if( File::exists($courses->image)){
                File::delete($courses->image);
            }
        }
        $courses->update([
            'name'=> $request->name,
            'image'=> $path.$filename,
            'syllabus'=> $request->syllabus,
            'duration'=> $request->duration,
        ]);
        return redirect()->route("courses.index")->with("success","");
    }
    public function destroy($id){
        $course = CourseModel::find($id);
        if(File::exists($course->image)){
            File::delete($course->image);
        }
        $course->delete();
        return redirect()->route("courses.index")->with("flash_message","Course deleted!");
    }
    public function search(Request $request){
        $search = $request->search;
        $courses = CourseModel::where(function($query) use ($search){
            $query->where("name","like","%".$search."%")
            ->orWhere("syllabus","like","%".$search."%")
            ->orWhere("duration","like","%".$search."%")
            ->orWhere("id","like","%".$search."%");
        })

        ->get();
        return view("courseView.index", compact("courses","search"));
    }
}
