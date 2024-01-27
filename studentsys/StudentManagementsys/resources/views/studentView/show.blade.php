@extends('layout')
@section('content')


 <div class="card" style="width:500px">
        <h3 class="card-header text-center ">Students  Detail</h3>
        <div class="card-body">
                <div class="card-body">
                <h5 class="card-title ">Name :{{ $student->name }}</h5>
                <div class="card-text" ><p class="font-weight-bold">Gender : <span class="font-weight-normal">{{ $student->gender }}</p></div>
                <div class="card-text" ><p class="font-weight-bold">Address : <span class="font-weight-normal">{{ $student->address }}</p></div>
                <div class="card-text" ><p class="font-weight-bold">Mobile : <span class="font-weight-normal">{{ $student->tel }}</p></div>
                <a class="btn btn-primary" href=" {{ route("students.index") }}">Back</a>
        </div>
            </hr>
        </div>
 </div>
@endsection
