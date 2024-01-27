<?php

namespace App\Http\Controllers;

use App\Models\BatchesModel;
use App\Models\CourseModel;
use Illuminate\Http\Request;

class BatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batchess = BatchesModel::all();
        return view("batchesView.index", compact("batchess"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course = CourseModel::pluck("name","id");
        return view("batchesView.add", compact("course"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name"=> "required",
            "course_id"=> "required",
            "start_date"=> "required"
        ]);
        BatchesModel::create($request->all());
        return redirect()->route("batches.index")->with("success","");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $batch = BatchesModel::find($id);
        return view("batchesView.show", compact("batch"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $batch = BatchesModel::find($id);
        return view("batchesView.edit", compact("batch"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name"=> "required",
            "course_id"=> "required",
            "start_date"=> "required"
        ]);
        BatchesModel::find($id)->update($request->all());
        return redirect()->route("batches.index")->with("success","");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        BatchesModel::find($id)->delete();
        return redirect()->route("batches.index")->with("flash_message","Batches deleted!");
    }
}
