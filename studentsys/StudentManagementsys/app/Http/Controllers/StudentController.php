<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = StudentModel::all();
        return view("studentView.index", compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("studentView.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name"=> "required",
            "gender"=> "required",
            "img"=> "nullable|mimes:png,jpg,jpeg,webp",
            "address"=> "required",
            "tel" => "required"
        ]);

        if($request->has('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;

            $path ='uploads/students/';
            $file->move($path, $filename);
        }

        StudentModel::create([
            'name'=> $request->name,
            'gender'=> $request->gender,
            'img'=> $path.$filename,
            'address'=> $request->address,
            'tel'=> $request->tel
        ]);
        return redirect()->route("students.index")->with("success","");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = StudentModel::find($id);
        return view("studentView.show", compact("student"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $item = StudentModel::find($id);
       return view("studentView.edit", compact("item"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name"=> "required",
            "gender"=> "required",
            "img"=> "nullable|mimes:png,jpg,jpeg,webp",
            "address"=> "required",
            "tel" => "required"
        ]);

        $student = StudentModel::find($id);

        if($request->has('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;

            $path ='uploads/students/';
            $file->move($path, $filename);

           if( File::exists($student->img)){
               File::delete($student->img);
           }
        }

        $student->update([
            'name'=> $request->name,
            'gender'=> $request->gender,
            'img'=> $path.$filename,
            'address'=> $request->address,
            'tel'=> $request->tel
        ]);

        return redirect()->route("students.index")->with("success","");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = StudentModel::find($id);
        if(File::exists($student->img)){
            File::delete($student->img);
        }
        $student->delete();
        return redirect()->route("students.index")->with("flash_message","Student deleted!");
    }

    public function search(Request $request){
        $search = $request->search;
        $students = StudentModel::where(function($query) use ($search){
            $query->where("name","like","%".$search."%")
            ->orWhere("gender","like","%".$search."%")
            ->orWhere("address","like","%".$search."%")
            ->orWhere("tel","like","%".$search."%");
        })

        ->get();
        return view("StudentView.index", compact("students","search"));
    }
}
