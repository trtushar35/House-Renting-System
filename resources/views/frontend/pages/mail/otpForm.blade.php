@extends('frontend.partial.other')

@section('content')

<div class="container mt-3 mb-3">
    <div class="col">
        <div class="row">
            <form action="{{route('otp.verify')}}" method="post">
                @csrf

                <div class="form-group">
                    <label for="otp">Enter Otp: </label>
                    <input type="text" class="form-control" id="otp" rows="3" name="otp" placeholder="Enter Otp">

                    @error('otp')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Verify OTP</button>
            </form>
        </div>
    </div>
</div>

@endsection