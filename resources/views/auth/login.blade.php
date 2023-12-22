@extends('layouts.login_regiseter')

@section('body')







<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="row">
        <div class="col-md-8 m-x-auto pull-xs-none vamiddle">
            <div class="card-group ">
                <div class="card p-a-2">
                    <div class="card-block">
                        <h1 class="text-center">{{ __('Login') }}</h1>
                        <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-user"></i>
                            </span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email Address') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group m-b-2">
                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <button type="submit" class="btn btn-primary p-x-2">
                                    <i class="icon-login"></i>
                                    {{ __('Login') }}</button>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password') }}
                                </a>
                            @endif

                            <a class="btn btn-link" href="{{ route('index') }}">
                                {{ __('with out login') }}
                            </a>

                        </div>
                    </div>
                </div>
                <div id="regester_parent" class="card card-inverse card-primary p-y-3" style="width:44%">
                    <div class="card-block text-xs-center">
                        <div>
                            <h2>{{ __('Register') }}</h2>
                            <p>{{__('Register_paragraph')}}</p>
                            <a href="{{route('register')}}" class="btn btn-primary active m-t-1">{{ __('Register') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@stop
