<?php

namespace App\Http\Controllers;

use App\Models\PaymentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ReportController extends Controller
{
    public function report1($pid)
    {
        $payment = PaymentModel::find($pid);
        $pdf = App::make("dompdf.wrapper");

        $pdf->loadHTML(
            "<div style='margin: 20px; padding:20px'>
             <h1 align='center'>Payment Recipt</h1>
             <hr/>
             <p>Recipt No : <b>   $pid  </b></p>
             <p>Date : <b>  $payment->paid_date </b></p>
             <p>Emrollment_no : <b>" . $payment->enrollment->enroll_no . "</b></p>

             <p>Student Name : <b>" . $payment->enrollment->student->name . "</b></p>
             <hr/>

                <table style='width:100%;text-align: center'>
                   <thead>
                        <tr>
                            <th>Description</th>
                            <th>Course<th>
                            <th>Amount</th>
                        </tr>
                   </thead>
                   <tbody>
                        <tr>
                            <td >" . $payment->enrollment->batch->name . "</td>
                            <td >" . $payment->enrollment->batch->course->name . "</td>
                            <td></td>
                            <td >" . $payment->amount . "$</td>
                       </tr>
                   </tbody>
                </table>
                <hr/>
                <span> Printed Date: <b>" . date('Y-m-d',time()) . "</b></span>
             </div>
            "
        );
        return $pdf->stream();
    }
}
