@extends('layouts.app')
@section('content')
<title>Profile Setting</title>

<div style="text-align:center">
<form method="POST" action="{{route ('user.update') }}">
    @csrf

    <div class="form-group row">
        <label for="fname" class="col-md-4 col-form-label text-md-right">First Name</label>

        <div class="col-md-6">
            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ $user['fname'] }}" required autocomplete="fname" autofocus>
        </div>
    </div>

    <div class="form-group row">
        <label for="lname" class="col-md-4 col-form-label text-md-right">Last Name</label>

        <div class="col-md-6">
            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ $user['lname'] }}" required autocomplete="lname" autofocus>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user['email'] }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror " placeholder="************" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

        <div class="col-md-6">
            <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $user['dob'] }}" required autocomplete="dob" autofocus>
        </div>
    </div>


    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Update Profile') }}
            </button>
</div>
@endsection