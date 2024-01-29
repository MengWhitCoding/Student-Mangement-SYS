@extends('layout')
@section('content')

    <div class="card " style="width: 500px ">
        <h3 class="card-header text-center">Add New Corse</h3>
        <div class="card-body">

            <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" />
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Syllabus</label>
                <input type="text" class="form-control @error('syllabus') is-invalid @enderror" id="syllabus"
                    name="syllabus" />
                @error('syllabus')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Duration</label>
                <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration"
                    name="duration" />
                @error('duration')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Teacher_id</label>
                <select name="teacher_id"  id="teacher_id" class="form-control " >
                    @foreach ($teachers as $id=> $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>

                <a class="btn btn-primary" href=" {{ route('courses.index') }}">Back</a>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>
        </div>
    </div>

@stop
