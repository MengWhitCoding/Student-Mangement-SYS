@extends('layout')
@section('content')


 <div class="card" style="width:500px">
        <h3 class="card-header text-center ">Emrollment Page</h3>
        <div class="card-body">
                <div class="card-body">
                <h5 class="card-title ">Enroll_no :{{ $enrollment->enroll_no }}</h5>
                <div class="card-text" ><p class="font-weight-bold">Batch_id : <span class="font-weight-normal">{{ $enrollment->batch->name }}</p></div>
                <div class="card-text" ><p class="font-weight-bold">Student_Name : <span class="font-weight-normal">{{$enrollment->student->name}}</p></div>
                <div class="card-text" ><p class="font-weight-bold">Join_date : <span class="font-weight-normal">{{ $enrollment->join_date }}</p></div>
                <div class="card-text" ><p class="font-weight-bold">Fee : <span class="font-weight-normal">{{ $enrollment->fee }} $</p></div>
                <a class="btn btn-primary" href=" {{ route("enrollment.index") }}">Back</a>
        </div>
            </hr>
        </div>
 </div>
@endsection
