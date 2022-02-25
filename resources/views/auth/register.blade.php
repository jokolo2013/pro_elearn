@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="Fname" class="col-md-4 col-form-label text-md-right">ชื่อ</label>

                                <div class="col-md-6">
                                    <input id="Fname" type="text" class="form-control @error('Fname') is-invalid @enderror"
                                        name="Fname" value="{{ old('Fname') }}" required autocomplete="Fname" autofocus>

                                    @error('Fname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Lname" class="col-md-4 col-form-label text-md-right">นามสกุล</label>

                                <div class="col-md-6">
                                    <input id="Lname" type="text" class="form-control @error('Lname') is-invalid @enderror"
                                        name="Lname" value="{{ old('Lname') }}" required autocomplete="Lname" autofocus>

                                    @error('Lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Gender" class="col-md-4 col-form-label text-md-right">เพศ</label>

                                <div class="col-md-6 mt-2">
                                    <input type="radio" id="Gender_1" name="Gender" value="1" checked>
                                    <label for="html">ชาย</label>
                                    <input type="radio" id="Gender_2" name="Gender" value="2">
                                    <label for="html">หญิง</label>
                                    <input type="radio" id="Gender_3" name="Gender" value="3">
                                    <label for="html">อื่นๆ</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tel" class="col-md-4 col-form-label text-md-right">เบอร์มือถือ</label>

                                <div class="col-md-6">
                                    <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror"
                                        name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus>

                                    @error('tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


