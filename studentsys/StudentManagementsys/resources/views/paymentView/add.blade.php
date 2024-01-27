@extends('layout')
@section('content')

    <div class="card " style="width: 500px ">
        <h3 class="card-header text-center">Add New Payment</h3>
        <div class="card-body">

            <form action="{{ route('payment.store') }}" method="post">
                @csrf
                @method('POST')

                <label for="" class="form-label">Enroll_no</label>
                <select name="enrollment_id"  id="enrollment_id" class="form-control @error('enrollment_id') is-invalid @enderror" >
                    @foreach ($enrollments as $id=> $enroll_no)
                        <option value="{{ $id }}">{{ $enroll_no }}</option>
                    @endforeach
                </select>
                @error('enrollment_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Paid_date</label>
                <input type="text" class="form-control @error('paid_date') is-invalid @enderror" id="paid_date"
                    name="paid_date" />
                @error('paid_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Amount</label>
                <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount"
                    name="amount" /></br>
                @error('amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <a class="btn btn-primary" href=" {{ route('payment.index') }}">Back</a>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>
        </div>
    </div>

@stop
