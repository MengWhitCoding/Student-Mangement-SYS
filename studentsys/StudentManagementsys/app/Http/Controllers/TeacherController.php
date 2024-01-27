<?php

namespace App\Http\Controllers;

use App\Models\TeacherModel;
use Illuminate\Http\Request;

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
            "tel" => "required"
        ]);
        TeacherModel::create($request->all());
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
            "tel" => "required"
        ]);
        TeacherModel::find($id)->update($request->all());
        return redirect()->route("teachers.index");
    }
    public function destroy($id){
        TeacherModel::destroy($id);
        return redirect()->route("teachers.index")->with("flash_message","Student deleted!");;
    }

}
