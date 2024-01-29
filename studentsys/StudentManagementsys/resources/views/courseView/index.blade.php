@extends('layout')
@section('content')
                <div class="card">
                    <div class="card-header">
                        <h2  class="text-center">Courses Application</h2>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route("courses.create") }}" class="btn btn-success btn-sm" title="Add New Course">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <form action="/searchc" method="get">
                                        <div class="input-group">
                                            <input class="form-control" name="search" placeholder="Search..." value="{{ isset($search) ? $search : ''}}">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                       </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>syllabus</th>
                                        <th>duration</th>
                                        <th>Teacher_name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $cus)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cus->name }}</td>
                                        <td>
                                            <img src="{{ asset($cus->image) }}" alt="Img" style="width: 70px; height:70px;">
                                        </td>
                                        <td>{{ $cus->syllabus }}</td>
                                        <td>{{ $cus->  duration()}}</td>
                                        <td>{{ $cus->teacher->name }}</td>

                                        <td>
                                            <a href="{{ route('courses.show',$cus->id) }}" title="View Course"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ route('courses.edit',$cus->id) }}" title="Edit Course"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ route('courses.destroy', $cus->id) }}" accept-charset="UTF-8" style="display:inline">
                                               @csrf
                                               @method("DELETE")
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Course" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
@endsection
