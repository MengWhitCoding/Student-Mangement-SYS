@extends('layout')
@section('content')


 <div class="card" style="width:500px">
        <h3 class="card-header text-center ">Courses Detail</h3>
        <div class="card-body">
                <div class="card-body">
                <h5 class="card-title ">Name :{{ $course->name }}</h5>
                <div class="card-text" ><p class="font-weight-bold">Syllabus : <span class="font-weight-normal">{{ $course->syllabus }}</p></div>
                <div class="card-text" ><p class="font-weight-bold">Duration :  <span class="font-weight-normal">{{ $course-> duration()}}</p></div>
                <div class="card-text" ><p class="font-weight-bold">Image : <img src="{{ asset($course->image) }}" alt="Img" style="width: 100px; height:100px;"> </p></div>
                <a class="btn btn-primary" href=" {{ route("courses.index") }}">Back</a>
        </div>
            </hr>
        </div>
 </div>
@endsection
