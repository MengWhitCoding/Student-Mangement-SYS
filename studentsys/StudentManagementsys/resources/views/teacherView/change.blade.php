@extends('layout')
@section('content')

    <div class="card " style="width: 500px ">
        <h3 class="card-header text-center">Teachers Update</h3>
        <div class="card-body">

            <form action="{{ route('teachers.update',$teacher->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="tag" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ $teacher->name }}"/>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Gender</label>
                <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender"
                    name="gender" value="{{ $teacher->gender }}"/>
                @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                    name="address" value="{{ $teacher->address }}"/>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Tel</label>
                <input type="text" class="form-control @error('tel') is-invalid @enderror" id="tel"
                    name="tel" value="{{ $teacher->tel }}"/></br>
                @error('tel')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <a class="btn btn-primary" href=" {{ route('teachers.index') }}">Back</a>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>
        </div>
    </div>

@stop
