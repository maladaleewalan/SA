@extends('layouts.master')

@section('content')
<div class="center">
    <div class="divtop">
        <span class="titlepage center mr-2 font"><i class="fas fa-user-circle icontop"></i>&nbsp;Register</span><br>
    </div>
</div>

<div class="container formlogin">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row thaifont">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right shadowfont">Firstname</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror input" name="firstname" value="{{ old('firstname') }}" autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row thaifont">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right shadowfont">Lastname</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror input" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row thaifont">
                            <label for="email" class="col-md-4 col-form-label text-md-right shadowfont">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row thaifont">
                            <label for="tel" class="col-md-4 col-form-label text-md-right shadowfont">Tel</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror input" name="tel" value="{{ old('tel') }}" autocomplete="tel" autofocus>

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row thaifont">
                            <label for="username" class="col-md-4 col-form-label text-md-right shadowfont">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror input" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row thaifont">
                            <label for="password" class="col-md-4 col-form-label text-md-right shadowfont">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row thaifont">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right shadowfont">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control input" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success font buttonsubmit">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection