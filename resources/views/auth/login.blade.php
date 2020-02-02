@extends('layouts.app')

@section('content')
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(public/theme/assets/app/media/img//bg/bg-3.jpg);">
        <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="#">
{{--
                        <img src="../../../assets/app/media/img/logos/logo-1.png">
--}}
                    </a>
                </div>
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title" style="color:#fff;">Sign In To Dashboard</h3>
                    </div>
                    <form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group m-form__group">
                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} m-input" type="email" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="off">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="row m-login__form-sub">
                            <div class="col m--align-left m-login__form-left">
                                <label class="m-checkbox  m-checkbox--focus">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember me
                                    <span></span>
                                </label>
                            </div>
                            {{--<div class="col m--align-right m-login__form-right">--}}
                                {{--@if (Route::has('password.request'))--}}
                                {{--<a href="{{ route('password.request') }}" id="m_login_forget_password" class="m-link">Forget Password ?</a>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_signin_submit" type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Sign In</button>
                        </div>
                    </form>
                </div>

                <div class="m-login__account">
							<span class="m-login__account-msg" style="color: #fff;">
								Don't have an account yet ?
							</span>&nbsp;&nbsp;
                    <a href="{{route('register')}}" id="m_login_signup" class="m-link m-link--light m-login__account-link" style="color: #fff;">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
