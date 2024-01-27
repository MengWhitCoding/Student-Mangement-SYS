@extends('layout')
@section('content')


 <div class="card">
        <h3 class="card-header text-center ">Batches Detail Page</h3>
        <div class="card-body">
                <div class="card-body">
                <h5 class="card-title ">Name :{{ $batch->name }}</h5>
                <div class="card-text" ><p class="font-weight-bold">Course_Name : <span class="font-weight-normal">{{ $batch->course->name }}</p></div>
                <div class="card-text" ><p class="font-weight-bold">Start_date : <span class="font-weight-normal">{{ $batch->start_date }}</p></div>

                <a class="btn btn-primary" href=" {{ route("batches.index") }}">Back</a>
        </div>
            </hr>
        </div>
 </div>
@endsection
