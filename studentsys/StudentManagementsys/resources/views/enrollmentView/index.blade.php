@extends('layout')
@section('content')
                <div class="card">
                    <div class="card-header">
                        <h2  class="text-center">Enrollment Application</h2>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route("enrollment.create") }}" class="btn btn-success btn-sm" title="Add New Enrollment">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <form action="/searche" method="get">
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
                                        <th>Enroll_Name</th>
                                        <th>Batch_id</th>
                                        <th>Student_Name</th>
                                        <th>Join_date</th>
                                        <th>Fee</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($enrollments as $enroll)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $enroll->enroll_no }}</td>
                                        <td>{{ $enroll->batch->name }}</td>
                                        <td>{{ $enroll->student->name }}</td>
                                        <td>{{ $enroll->join_date}}</td>
                                        <td>{{ $enroll->fee}} $</td>
                                        <td>
                                            <a href="{{ route('enrollment.show',$enroll->id) }}" title="View Enrollment"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ route('enrollment.edit',$enroll->id) }}" title="Edit Enrollment"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ route('enrollment.destroy', $enroll->id) }}" accept-charset="UTF-8" style="display:inline">
                                               @csrf
                                               @method("DELETE")
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Enrollment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
