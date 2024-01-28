@extends('layout')
@section('content')

    <div class="card " style="width: 500px ">
        <h3 class="card-header text-center">Batches Update</h3>
        <div class="card-body">

            <form action="{{ route('batches.update',$batch->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="tag" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ $batch->name }}"/>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Course_Name</label>
                <input type="text" class="form-control @error('course_id') is-invalid @enderror" id="course_id"
                    name="course_id" value="{{ $batch->course->name}}"/>
                @error('course_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Start_date</label>
                <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date"
                    name="start_date" value="{{ $batch->start_date }}"/></br>
                @error('start_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <a class="btn btn-primary" href=" {{ route('batches.index') }}">Back</a>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>
        </div>
    </div>

@stop
