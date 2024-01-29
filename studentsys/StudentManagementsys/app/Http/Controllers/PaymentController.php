<?php

namespace App\Http\Controllers;

use App\Models\EnrollmentModel;
use App\Models\PaymentModel;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = PaymentModel::all();
        return view("paymentView.index", compact("payments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enrollments = EnrollmentModel::pluck("enroll_no","id");
        return view("paymentView.add", compact("enrollments"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "enrollment_id"=> "required",
            "paid_date" => "required",
            "amount"=> "required"
        ]);
        PaymentModel::create($request->all());
        return redirect()->route("payment.index")->with("success","Payment Added!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $payment = PaymentModel::find($id);
        return view("paymentView.show", compact("payment"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $payment = PaymentModel::find($id);
        $enrollments = EnrollmentModel::pluck("enroll_no","id");
        return view("paymentView.edit", compact("payment","enrollments"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            "enrollment_id"=> "required",
            "paid_date" => "required",
            "amount"=> "required"
        ]);
        PaymentModel::find($id)->update($request->all());
        return redirect()->route("payment.index")->with("success","Update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PaymentModel::find($id)->delete();
        return redirect()->route("payment.index")->with("success","Payment Deleted!");
    }

    public function search(Request $request){
        $search = $request->search;
        $payments = PaymentModel::where(function($query) use ($search){
            $query->where("id","like","%".$search."%")
            ->orWhere("paid_date","like","%".$search."%")
            ->orWhere("amount","like","%".$search."%");
        })
        ->orWhereHas("enrollment", function($query) use ($search){
            $query->where("enroll_no","like","%".$search."%");
        })
        ->get();
        return view("paymentView.index", compact("payments","search"));
    }
}
