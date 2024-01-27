@extends('layout')
@section('content')

    <div class="card " style="width: 500px ">
        <h3 class="card-header text-center">Teachers Update</h3>
        <div class="card-body">

            <form action="{{ route('enrollment.update',$enrollment->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="" class="form-label">Enroll_no</label>
                <input type="text" class="form-control @error('enroll_no') is-invalid @enderror" id="enroll_no"
                    name="enroll_no" value="{{ $enrollment->enroll_no }}"/>
                @error('enroll_no')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Batch_id</label>
                <input type="text" class="form-control @error('batch_id') is-invalid @enderror" id="batch_id"
                    name="batch_id" value="{{ $enrollment->batch->id }}"/>
                @error('batch_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Student_Name</label>
                <input type="text" class="form-control @error('student_id') is-invalid @enderror" id="student_id"
                    name="student_id" value="{{ $enrollment->student->id }}"/>
                @error('student_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Join_date</label>
                <input type="text" class="form-control @error('join_date') is-invalid @enderror" id="join_date"
                    name="join_date" value="{{ $enrollment->join_date }}"/>
                @error('join_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Fee</label>
                <input type="text" class="form-control @error('fee') is-invalid @enderror" id="fee"
                    name="fee" value="{{ $enrollment->fee }}"/></br>
                @error('fee')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <a class="btn btn-primary" href=" {{ route('enrollment.index') }}">Back</a>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>
        </div>
    </div>

@stop
