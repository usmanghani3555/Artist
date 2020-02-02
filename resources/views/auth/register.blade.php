@extends('layouts.app')
@section('content')
@php use App\User;
@endphp
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(public/theme/assets/app/media/img//bg/bg-3.jpg);">
        <div class="m-grid__item m-grid__item--fluid pt-5 pb-5">
            <div class="m-login__container w-100">
                <div class="m-login__logo">
                    <a href="#">
                        {{--<img src="../../../assets/app/media/img/logos/logo-1.png">--}}
                    </a>
                </div>
                <div class="container">
                    <div class="row justify-content-center inner-form">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header text-center bg-white " id="sing-form-link">{{ __('ARTIST REGISTRATION') }}</div>

                                <div class="card-body">
                                    @if (session('error') || session('success'))
                                    <p class="{{ session('error') ? 'error':'success' }}">
                                        {{ session('error') ?? session('success') }}
                                    </p>
                                    @endif
                                    <form method="POST" class="m-form" action="{{ route('register') }}" id="registers">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name *') }}</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Username" name="name" value="{{ old('name') }}" autofocus>
                                                @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address *') }}</label>
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-Mail Address" name="email" value="{{ old('email') }}">
                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Mobile *') }}</label>

                                            <div class="col-md-6">
                                                <input id="mobile" type="number" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" placeholder="Mobile" name="mobile" value="{{ old('mobile') }}">
                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('mobile') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password">
                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Instagram Name') }}</label>

                                            <div class="col-md-6">
                                                <input type="text" class="form-control{{ $errors->has('insta_name') ? ' is-invalid' : '' }}" name="insta_name" value="{{ old('insta_name') }}">
                                                @if ($errors->has('insta_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('insta_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-6">
                                                <label for="email" class="col-form-label">{{ __('PLEASE LIST: - ARTIST GROUP NAME - VIDEO LINKS - AUDIO LINKS - SOCIAL MEDIA LINKS - SHOWS OF INTEREST *') }}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-6">
                                                <textarea class="form-control{{ $errors->has('members_details') ? ' is-invalid' : '' }}" rows="4" value="{{ old('members_details') }}" name="members_details"></textarea>
                                                @if ($errors->has('members_details'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('members_details') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-6">
                                                <label for="multiple-choice" class="col-form-label">{{ __('Multiple Choice *') }}</label>
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-6">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" value="free_booking" name="booking">Free Registration (Email Blast Only) </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" value="vip_booking" name="booking">(USA) VIP Booking Registration (General Support)</label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" value="elite_booking" name="booking">(USA) Elite Booking Registration (Assigned Agent)</label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" value="intl_booking" name="booking">(INTL) Booking Registration (Visa, Passport Prep)</label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" value="llc_booking" name="booking">Business Registration (LLC | Label Prep, CPA, Attorney)</label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" value="tap2020" name="booking">Tap2020(Initial Deposit , Hold Placement)</label>
                                                </div>
                                                <div class="radio">
                                                    <label>Note: Artist or Management, please make a selection for booking option of interest. Remember if you are just being adding to system, you will receive quarterly emails.</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="multiple-choice" class="col-md-4 col-form-label text-md-right">{{ __('Agent Selection') }}</label>
                                            <div class="col-md-6">
                                                <div class="m-radio-list">
                                                    <label class="m-radio">
                                                        <input type="radio" name="agent" value=""> No Agent (As Of Yet)
                                                        <span></span>
                                                    </label>
                                                    <?php
                                                    $allman = User::where('role', 'manager')->get();
                                                    ?>
                                                    @if(!empty($allman))
                                                    @foreach($allman as $val)
                                                    <label class="m-radio">
                                                        <input type="radio" name="agent" value="{{$val->id}}"> {{$val->name}}
                                                        <span></span>
                                                    </label>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row w-100 text-center total">
                                            <div class="col">Total</div>
                                            <div class="col amn">0$</div>
                                            <div class="w-100"></div>
                                            <div class="col amount"></div>
                                        </div>
                                        <input type="hidden" class="hidamount" name="amount" value="">
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">

                                                <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary" name="submit">
                                                    {{ __('Selection Made, Book Me') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="m-login__account text-center mt-3">
                                        <span class="m-login__account-msg">
                                            Already have an account ?
                                        </span>&nbsp;&nbsp;
                                        <a href="{{route('login')}}" id="m_login_signup" class="m-link m-link--light m-login__account-link">Sign In</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('public/theme/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/theme/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/theme/assets/demo/default/custom/crud/forms/validation/form-controls.js') }}" type="text/javascript"></script>

@endsection