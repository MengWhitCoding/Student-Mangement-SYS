@extends('layout')
@section('content')


 <div class="card" style="width:500px">
        <h3 class="card-header text-center ">Payment Detail Page</h3>
        <div class="card-body">
                <div class="card-body">
                <h5 class="card-title ">Enroll_no :{{ $payment->enrollment->enroll_no }}</h5>
                <div class="card-text" ><p class="font-weight-bold">Paid_date : <span class="font-weight-normal">{{ $payment->paid_date }}</p></div>
                <div class="card-text" ><p class="font-weight-bold">Amount : <span class="font-weight-normal">{{ $payment->amount }} $</p></div>

                <a class="btn btn-primary" href=" {{ route("payment.index") }}">Back</a>
        </div>
            </hr>
        </div>
 </div>
@endsection
