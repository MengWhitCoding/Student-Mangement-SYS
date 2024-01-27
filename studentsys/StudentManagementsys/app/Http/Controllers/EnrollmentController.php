<?php

namespace App\Http\Controllers;

use App\Models\BatchesModel;
use App\Models\StudentModel;
use App\Models\EnrollmentModel;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = EnrollmentModel::all();
        return view("enrollmentView.index", compact("enrollments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $batches = BatchesModel::pluck("name","id");
        $students = StudentModel:: pluck("name","id");
        return view("enrollmentView.add", compact("batches","students"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "enroll_no"=> "required",
            "batch_id"=> "required",
            "student_id"=> "required",
            "join_date"=> "required",
            "fee"=> "required"
        ]);
        EnrollmentModel::create($request->all());
        return redirect()->route("enrollment.index")->with("success","Insert Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $enrollment = EnrollmentModel::find($id);
        return view("enrollmentView.show", compact("enrollment"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $enrollment = EnrollmentModel::find($id);
        return view("enrollmentView.edit", compact("enrollment"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "enroll_no"=> "required",
            "batch_id"=> "required",
            "student_id"=> "required",
            "join_date"=> "required",
            "fee"=> "required"
        ]);
        EnrollmentModel::find($id)->update($request->all());
        return redirect()->route("enrollment.index")->with("success","Update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        EnrollmentModel::find($id)->delete();
        return redirect()->route("enrollment.index")->with("success","Enrollment deleted!");
    }
}
