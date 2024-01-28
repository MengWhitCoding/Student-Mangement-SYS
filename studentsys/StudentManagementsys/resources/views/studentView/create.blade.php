@extends('layout')
@section('content')

<div class="card " style="width: 500px ">
  <h3 class="card-header text-center">Students Page</h3>
  <div class="card-body">

      <form action="{{ route("students.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("POST")
                 <label for="" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Gender</label>
                <select   class="form-control @error('gender') is-invalid @enderror" id="gender"  name="gender">
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
                @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control " id="img" name="img" />

                <label for="" class="form-label">Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                    name="address" />
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Tel</label>
                <input type="text" class="form-control @error('tel') is-invalid @enderror" id="tel"
                    name="tel" /></br>
                @error('tel')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

        <a class="btn btn-primary" href=" {{ route("students.index") }}">Back</a>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop



