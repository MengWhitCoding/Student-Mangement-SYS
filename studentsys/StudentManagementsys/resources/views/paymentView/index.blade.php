@extends('layout')
@section('content')
                <div class="card">
                    <div class="card-header">
                        <h2  class="text-center">Payment Application</h2>
                    </div>
                    <div class="card-body">
                       <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route("payment.create") }}" class="btn btn-success btn-sm" title="Add New Payment">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            </div>
                            <div class="col-md-6">
                               @include('components.search')
                            </div>
                       </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Enroll_Id</th>
                                        <th>Paid_date</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $pay)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pay->enrollment->enroll_no }}</td>
                                        <td>{{ $pay->paid_date }}</td>
                                        <td>{{ $pay->amount }} $</td>

                                        <td>
                                            <a href="{{ route('payment.show',$pay->id) }}" title="View Payment"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ route('payment.edit',$pay->id) }}" title="Edit Payment"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ route('payment.destroy', $pay->id) }}" accept-charset="UTF-8" style="display:inline">
                                               @csrf
                                               @method("DELETE")
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Payment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            <a href="{{ url('/report/report1/' . $pay->id) }}" title="report payment"><button class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>Print</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
@endsection
