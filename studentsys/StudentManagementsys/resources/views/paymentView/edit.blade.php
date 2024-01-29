@extends('layout')
@section('content')

    <div class="card " style="width: 500px ">
        <h3 class="card-header text-center">Payment Update</h3>
        <div class="card-body">

            <form action="{{ route('payment.update', $payment->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="tag" class="form-label">Enroll_no</label>
                <select class="form-control @error('enrollment_id') is-invalid @enderror" id="enrollment_id" name="enrollment_id">
                    <option value="{{ $payment->enrollment->id }}" selected>{{ $payment->enrollment->enroll_no }}</option>
                    @foreach ($enrollments as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                @error('enroll_no')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Paid_date</label>
                <input type="date" class="form-control @error('paid_date') is-invalid @enderror" id="paid_date"
                    name="paid_date" value="{{ $payment->paid_date }}" />
                @error('paid_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Amount</label>
                <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount"
                    name="amount" value="{{ $payment->amount }}" /></br>
                @error('amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <a class="btn btn-primary" href=" {{ route('payment.index') }}">Back</a>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>
        </div>
    </div>

@stop
