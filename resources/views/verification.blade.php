@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<div class="container">

    <div class="row justify-content-center">



        <div class="col-md-8">
            @if(@$request['error'])
    <div class="alert alert-danger">
       {{@$request['error']}}
    </div>
    @endif
            <div class="card">
                <div class="card-header">{{ __('Enter Verification Code') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('verify_code')}}" id="verificationForm">
                        @csrf
                        <input type="hidden" readonly name="email" value="{{$email}}">
                        <div class="mb-3">
                            <label for="verification_code" class="form-label">Verification Code</label>
                            <input type="text" class="form-control @error('verification_code') is-invalid @enderror" id="verification_code" name="verification_code" required>
                            <div class="invalid-feedback" id="verification-code-feedback"></div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
