@extends('layout')
@section('content')


 <div class="card" style="width:500px">
        <h3 class="card-header text-center ">Teacher Page</h3>
        <div class="card-body">
                <div class="card-body">
                <h5 class="card-title ">Name :{{ $teacher->name }}</h5>
                <div class="card-text" ><p class="font-weight-bold">Gender : <span class="font-weight-normal">{{ $teacher->gender }}</p></div>
                <div class="card-text" ><p class="font-weight-bold">Address : <span class="font-weight-normal">{{ $teacher->address }}</p></div>
                <div class="card-text" ><p class="font-weight-bold">Mobile : <span class="font-weight-normal">{{ $teacher->tel }}</p></div>
                <a class="btn btn-primary" href=" {{ route("teachers.index") }}">Back</a>
        </div>
            </hr>
        </div>
 </div>
@endsection
