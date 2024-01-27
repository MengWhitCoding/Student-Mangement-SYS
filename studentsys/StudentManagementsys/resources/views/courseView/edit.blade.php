@extends('layout')
@section('content')

    <div class="card " style="width: 500px ">
        <h3 class="card-header text-center">Course Update</h3>
        <div class="card-body">

            <form action="{{ route('courses.update',$course->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="tag" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ $course->name }}"/>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Syllabus</label>
                <input type="text" class="form-control @error('syllabus') is-invalid @enderror" id="syllabus"
                    name="syllabus" value="{{ $course->syllabus}}"/>
                @error('syllabus')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Duration</label>
                <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration"
                    name="duration" value="{{ $course->duration }}"/></br>
                @error('duration')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <a class="btn btn-primary" href=" {{ route('courses.index') }}">Back</a>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>
        </div>
    </div>

@stop
