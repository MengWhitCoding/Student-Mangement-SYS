@extends('layout')
@section('content')
                <div class="card">
                    <div class="card-header">
                        <h2  class="text-center">Batches Application</h2>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route("batches.create") }}" class="btn btn-success btn-sm" title="Add New Batches">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <form action="/searchb" method="get">
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
                                        <th>Course_Name</th>
                                        <th>Start_date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($batchess as $bat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bat->name }}</td>
                                        <td>{{ $bat->course->name }}</td>
                                        <td>{{ $bat->start_date }}</td>

                                        <td>
                                            <a href="{{ route('batches.show',$bat->id) }}" title="View Teacher"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ route('batches.edit',$bat->id) }}" title="Edit Teacher"><button class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i> Edit</button></a>

                                            <form method="POST" action="{{ route('batches.destroy', $bat->id) }}" accept-charset="UTF-8" style="display:inline">
                                               @csrf
                                               @method("DELETE")
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Batches" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa-solid fa-trash"></i> Delete</button>
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
