@extends('layout')
@section('content')

    <div class="card " style="width: 500px ">
        <h3 class="card-header text-center">Add New Batches</h3>
        <div class="card-body">

            <form action="{{ route('batches.store') }}" method="post">
                @csrf
                @method('POST')
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Course_Name</label>
                <select name="course_id"  id="course_id" class="form-control @error('course_id') is-invalid @enderror" >
                    @foreach ($course as $id=> $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                @error('course_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Start_date</label>
                <input type="text" class="form-control @error('start_date') is-invalid @enderror" id="start_date"
                    name="start_date" /></br>
                @error('start_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <a class="btn btn-primary" href=" {{ route('batches.index') }}">Back</a>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>
        </div>
    </div>

@stop
