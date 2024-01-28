<?php

namespace App\Http\Controllers;

use App\Models\TeacherModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{
    public function index(){
        $teachers = TeacherModel::all();
        return view("teacherView.index",compact("teachers"));
    }

    public function create (){
        return view("teacherView.add");
    }

    public function store (Request $request){
        $this->validate($request,[
            "name"=> "required",
            "gender"=> "required",
            "address"=> "required",
            "tel" => "required",
            "image"=> "nullable|mimes:png,jpg,jpeg,webp"
        ]);

        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;

            $path ='uploads/teachers/';
            $file->move($path, $filename);
        }

        TeacherModel::create([
            'name'=> $request->name,
            'gender'=> $request->gender,
            'address'=> $request->address,
            'tel'=> $request->tel,
            'image'=> $path.$filename,

        ]);
        return redirect()->route('teachers.index');
    }
    public function show($id){
        $teacher = TeacherModel::find($id);
        return view('teacherView.show',compact('teacher'));
    }
    public function edit($id){
        $teacher = TeacherModel::find($id);
        return view('teacherView.change',compact('teacher'));
    }
    public function update (Request $request, $id){
        $this->validate($request,[
            'name'=> 'required',
            'gender'=> 'required',
            "address"=> "required",
            "tel" => "required",
            "image"=> "nullable|mimes:png,jpg,jpeg,webp",
        ]);
        $teachers = TeacherModel::find($id);

        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;

            $path ='uploads/teachers/';
            $file->move($path, $filename);

           if( File::exists($teachers->image) ){
               File::delete($teachers->image);
           }
        }

        $teachers->update([
            'name'=> $request->name,
            'gender'=> $request->gender,
            'address'=> $request->address,
            'tel'=> $request->tel,
            'image'=> $path.$filename,
        ]);
        return redirect()->route("teachers.index");
    }
    public function destroy($id){
        $teacher = TeacherModel::find($id);
        if(File::exists($teacher->image)){
            File::delete($teacher->image);
        }
       // TeacherModel::destroy($id);
       $teacher->delete();
        return redirect()->route("teachers.index")->with("flash_message","Student deleted!");;
    }

    public function search(Request $request){
        $search = $request->search;
        $teachers = TeacherModel::where(function($query) use ($search){
            $query->where("name","like","%".$search."%")
            ->orWhere("gender","like","%".$search."%")
            ->orWhere("address","like","%".$search."%")
            ->orWhere("tel","like","%".$search."%");
        })

        ->get();
        return view("TeacherView.index", compact("teachers","search"));
    }

}
