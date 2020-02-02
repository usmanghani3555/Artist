@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
    .right {
        background-color: rgba(0, 0, 0, 0.7);
        background-image: url(https://artistauditions.com/dev/public/img/2.png);
        background-repeat: no-repeat;
        background-position: center;
    }

    .check-image-span {
        top: -5px;
        position: absolute;
        left: 0;
        right: 0;
        width: 95%;
        height: 100%;
        display: block;
        margin: auto;
    }

    .card {
        background: #fff;
        border-radius: 2px;
        display: inline-block;
        height: auto;
        margin: 1rem;
        position: relative;
        width: 100%;
    }

    .check-image h2 {
        margin: 0px;
        font-size: 12px !important;
        line-height: 15px;
        text-transform: capitalize;
    }

    .dollar-pic img {
        margin-top: 10px;
        padding: 25px;
        height: auto;
        margin-left: auto !important;
        margin-right: auto !important;
        display: block;
        width:100%;
        margin-top: 35px;
    }

    .profile-userpic img {
        margin: 0px auto;
        width: 130px;
        padding: 3px;
        border: 3px solid rgb(210, 214, 222);
        border-radius: 50% 50% 50% 50%;
        height: 130px;
        margin-bottom: 25px;
        margin-top: 27px;
        display: block;
    }

    .mdl-progress {
        margin-bottom: 32px;
        height: 6px;
    }

    .mdl-progress {
        width: 100% !important;
    }

    .mdl-progress span {
        font-size: 10px;
        float: right;
        color: #3a405b;
        margin-top: 8px;
    }

    .mdl-progress {
        display: block;
        position: relative;
        height: 4px;
        width: 500px;
        max-width: 100%;
    }

    .mdl-progress>.progressbar {
        background-color: #3a405b;
        z-index: 1;
        left: 0;
    }

    .mdl-progress>.bufferbar {
        border-radius: 20px;
        border: 1px solid #c2c2c2;
    }

    .mdl-progress>.bufferbar {
        background-image: linear-gradient(to right, rgba(255, 255, 255, .7), rgba(255, 255, 255, .7)), linear-gradient(to right, rgb(63, 81, 181), rgb(63, 81, 181));
        z-index: 0;
        left: 0;
    }

    .mdl-progress>.bar {
        display: block;
        border-radius: 20px;
        position: absolute;
        top: 0;
        bottom: 0;
        width: 0%;
        transition: width .2s cubic-bezier(.4, 0, .2, 1);
    }

    .mdl-progress:not(.mdl-progress--indeterminate):not(.mdl-progress--indeterminate)>.auxbar,
    .mdl-progress:not(.mdl-progress__indeterminate):not(.mdl-progress__indeterminate)>.auxbar {
        background-image: linear-gradient(to right, rgba(255, 255, 255, .7), rgba(255, 255, 255, .7)), linear-gradient(to right, rgb(63, 81, 181), rgb(63, 81, 181));
        -webkit-mask: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+Cjxzdmcgd2lkdGg9IjEyI…IwLjZzIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSIgLz4KICA8L2VsbGlwc2U+Cjwvc3ZnPgo=);
        mask: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+Cjxzdmcgd2lkdGg9IjEyI…IwLjZzIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSIgLz4KICA8L2VsbGlwc2U+Cjwvc3ZnPgo=);
    }

    .mdl-progress:not(.mdl-progress--indeterminate)>.auxbar,
    .mdl-progress:not(.mdl-progress__indeterminate)>.auxbar {
        background-image: linear-gradient(to right, rgba(255, 255, 255, .9), rgba(255, 255, 255, .9)), linear-gradient(to right, rgb(63, 81, 181), rgb(63, 81, 181));
    }

    .mdl-progress>.auxbar {
        right: 0;
    }

    .blue-box {
        width: 100%;
        margin: 0 auto;
        height: auto !important;
        margin-bottom: 5px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .1), 0 1px 2px rgba(0, 0, 0, .18);
        margin-top: 20px;
    }

    .coins-blue {
        color: #ffe331;
        font-size: 20px;
        text-align: center;
        font-weight: bold;
        margin: 0px;
    }

    .lobby-img {
        margin-bottom: 10px;
        height: 100px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        border-radius: 5px;
    }

    .check-img h2 {
        margin: 0px;
        line-height: 15px;
        white-space: normal;
        line-height: 20px;
        text-transform: capitalize;
    }

    .title-box {
        text-align: center;
        font-size: 16px;
        white-space: normal;
        word-break: break-all;
    }

    .title-box2 {
        font-size: 17px;
        margin-top: 10px;
        font-weight: 100;
        margin-top: 10px;
        margin-bottom: 10px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    #purchaseCoin #submitbtn {
        background: linear-gradient(135deg, #716aca 30%, #36a3f7 100%);
        border: none;
    }

    #purchaseCoin .w-100 {
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .hidden {
        display: none !important;
    }

    .btn-primary-1 {
        position: relative;
    }

    #shiva {
        text-align: center;
    }

    .progressbar span {
        float: right;
        font-size: 11px;
        margin-top: 6px;
        margin-right: 10px;
    }

    .check-img .new-btn-disabled {
        cursor: no-drop !important;
        /* border: 1px solid #c3c3c3; */
        padding: 22px 10px;
    }

    .m-portlet {
        width: 100%;
        float: left;
    }

    .m-portlet .m-portlet__body {
        width: 100%;
        float: left;
    }

    .m-aside-menu .m-menu__nav>.m-menu__item>.m-menu__heading .m-menu__link-text,
    .m-aside-menu .m-menu__nav>.m-menu__item>.m-menu__link .m-menu__link-text {
        font-size: 1.4rem !important;
    }

    .m-aside-menu .m-menu__nav>.m-menu__item>.m-menu__heading .m-menu__link-icon,
    .m-aside-menu .m-menu__nav>.m-menu__item>.m-menu__link .m-menu__link-icon {
        font-size: 1.8rem !important;
    }

    .blue-box .btn-primary-1 {
        width: 100%;
    }

    }

    .page-container-bg-solid .page-bar,
    .page-content-white .page-bar {
        background-color: #eaeef3;
        position: relative;
        padding: 0 20px;
        margin: 0px -20px 0px;
    }

    .page-title-breadcrumb {
        line-height: 24px;
    }

    .page-content-white .page-title {
        font-size: 24px;
    }

    .page-container-bg-solid .page-title,
    .page-content-white .page-title {
        color: #666;
        margin-bottom: 15px;
        margin-top: 15px;
    }

    .game-title {
        color: #9e9e9e !important;
        font-weight: 500;
    }

    .page-title {
        padding: 0;
        font-size: 28px;
        letter-spacing: -1px;
        display: block;
        color: #666;
        margin: 0 0 15px;
        margin-top: 0px;
        margin-bottom: 15px;
        font-weight: 300;
    }

    .page-bar .page-breadcrumb {
        display: inline-block;
        padding: 8px;
        margin: 0;
        margin-top: 0px;
        margin-bottom: 0px;
        list-style: none;
        background-color: transparent;
        border-radius: 50px;
        background: rgba(220, 208, 208, 0.3);
        padding-left: 20px !important;
        color: #9a9898;
        padding: 15px 15px;
    }

    .page-container-bg-solid .page-bar .page-breadcrumb>li>a,
    .page-container-bg-solid .page-bar .page-breadcrumb>li>span,
    .page-content-white .page-bar .page-breadcrumb>li>a,
    .page-content-white .page-bar .page-breadcrumb>li>span {
        color: #888;
        text-decoration: none;
    }

    .page-container-bg-solid .page-bar .page-breadcrumb,
    .page-content-white .page-bar .page-breadcrumb {
        padding: 15px 15px;
        padding-left: 15px;
        margin-top: 2px;
        margin-bottom: 15px;
    }

    .game-lobby-section {
        width: 100%;
        float: left;
        padding: 25px 20px 10px;
    }

    .inner-btns {
        margin-top: 40px;
    }

    .game-lobby-section .btn-success {
        background: linear-gradient(135deg, #5b53c2 30%, #1996f6 100%);
        border: none;
    }

    .progress-bar-success {
        background: linear-gradient(135deg, #5b53c2 30%, #1996f6 100%);
    }

    .progress-bar-button {
        background: linear-gradient(to right, #ffeb2a, #e52e2b);
        border-radius: 12px;
        color: #122dff;
        display: inline-block;
        margin-top: 0px;
        padding: 5px;
        width: 100%;
        text-decoration: none;

    }

    .progress-bar-button span {

        background-color: #423632;
        display: block;
        padding: 0.5em 1em;
        border-radius: 8px;
        height: 34px;

    }

    .coin-progress {

        display: inherit !important;
        background: #fff;
        height: 20px;
        width: 100%;
        line-height: 20px;

    }

    .coins-field {
        background: url(<?php echo asset('public/img/points.png') ?>);
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-size: auto;
        background-repeat: no-repeat;
        background-size: contain;
        height: 70px;
        background-position: center center;
        margin-top: -15px;

    }

    .coins-field p {

        margin: 0px;
        font-size: 15px;
        font-weight: 500;
        color: #fff;
        text-align: center;
        padding-top: 24px;

    }

    .buy-coins {

        font-size: 20px;
        color: #9e9e9e;
        margin: 0px;
        margin-top: 0px;
        font-weight: 600;
        margin-top: 10px;
        text-align: center !important;

    }

    .m-header-menu .m-menu__nav>.m-menu__item {
        padding: 0px 10px;
    }

    .coins-box {
        padding-left: 0px;
    }

    .dollar-left img {
        height: 100%;
    }

    .dollar-left {
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .check-img {
        background: #fff;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 10px;
        border-radius: 10px;
        float: left;
        width: 100%;
        padding-bottom: 0px;
        box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
    }

    .card {
        box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        margin-top: 0px;
        padding: 10px 24px 14px 24px;
        border: none;
    }

    .m-body .m-content {
        padding: 30px 22px 30px 12px;
        float: left;
        width: 100%;
    }

    .profile-usertitle-name {
        font-size: 20px;
        margin-bottom: 2px;
        font-weight: bold;
        color: #3a405b;
    }

    .profile-usertitle-job {
        color: #b7b6b6;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .inner-poit p {
        color: #666666;
        font-size: 12px;
    }

    .inner-poit .available {
        font-size: 18px;
        font-weight: bold;
        color: #3a405b;
    }

    .inner-poit .count {
        margin-top: 15px;
    }

    .inner-poit .count span {
        font-size: 14px;
    }

    .page-bar .page-breadcrumb li .parent-item {
        color: #9a9898;
        font-weight: bold;
        text-decoration: none;
    }
</style>

<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="game-lobby-section">
        <div class="col-sm-12">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title game-title">Points Lobby</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active" id="patname">Cash Back Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-sm-12 inner-btns">
            <div class="new-buttons case-mngr">


                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ url()->previous() }}" class="btn btn-circle btn-success">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                        <a href="{{ route('achivements') }}" class="btn btn-circle btn-success">
                            <i class="fa fa-trophy"></i> Achivements
                        </a>
                    </div>


                    <div class="col-md-3">


                        <div class="coins-heading">
                            <h4 class="buy-coins">Select Your Loyaly Gifts</h4>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="coins-field">
                            <p class="">
                                <span class="count">{{ Auth::user()->coins ?? '0'}}</span>
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- BEGIN: Subheader -->
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet--mobile">
            <div class="m-portlet__body">
                <div class="col-sm-12">
                    @if(session('success'))
                        <p class="alert alert-success" style="margin-left: 8px; width: 99%;">{{session('success')}}</p>
                    @endif

                    @if(session('error'))
                        <p class="alert alert-danger" style="margin-left: 8px; width: 99%;">{{session('error')}}</p>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="card card-1">
                        <div class="dollar-pic">
                            <img src="https://artistauditions.com/dev/public/img/1556272214.png" height="40" class="m--marginless" alt="">
                        </div>
                        <div class="inner-poit">
                            <div class="row justify-content-center align-items-center">
                                <div id="shiva" class="col-md-12">
                                    <img src="https://artistauditions.com/dev/public/img/coins-show.gif" height="85" class="m--marginless" alt="">
                                    <p class="available" style="display:none;">Available Now</p>
                                    <h3 class="count"><sub>{{Auth::user()->coins}}</sub> <span>Points</span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="profile-usertitle attorny-profile">
                            <div class="profile-usertitle-name text-center ">
                                {{Auth::user()->name}}
                            </div>
                            <div class="profile-usertitle-job text-center">
                                {{Auth::user()->email}}
                            </div>
                        </div>
                        <div class="profile-userpic">
                            @if(!empty(Auth::user()->photo))
                            <img class="img-responsive" src="{{asset('public/img/'.Auth::user()->photo)}}" alt="profile image">
                            @else
                            <img src="{{asset('public/theme/assets/app/media/img/users/default_user.jpg')}}" class="img-responsive" alt="Default profile image" />
                            @endif
                        </div>

                        <div id="p1" class="mdl-progress mdl-js-progress is-upgraded" data-upgraded=",MaterialProgress" style="display:none;">
                            <div class="progressbar bar bar1" style="width: 100%;"><span>100% completed</span></div>
                            <div class="bufferbar bar bar2" style="width: 100%;">
                            </div>
                            <div class="auxbar bar bar3" style="width: 0%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="check-img">

                        <div class="coins-box">
                            <form name="purchaseCoin" id="purchaseCoin" action="{{route('purchaseCoin')}}" method="POST">
                                {{csrf_field()}}

                                @if(!(empty($coins)))
                                @foreach($coins as $key =>$coin)
                                <div class="col-sm-4">
                                    <div class="blue-box">
                                        <center>
                                            <label class="btn btn-primary-1 mt-3">
                                                <input type="checkbox" name="card[]" data-id="{{$coin->id}}" value="{{$coin->id}}" data-nocoins="{{$coin->coins}}" data-price="{{$coin->amount}}" data-count="{{Auth::user()->coins}}" class="hidden imgceck chekOffer" autocomplete="off">
                                                <img src="{{asset('public/coin/'.$coin->image)}}" alt="Gift Card" class="lobby-img img-check image_0">
                                                <i class="fa fa-check hidden"></i>
                                                <h2 class="title-box2"> ${{$coin->amount}} Gift Card <span>from {{$coin->coins}} points</span> </h2>
                                                <span class="check-image-span check-image-span0 removeclass_{{$coin->id}} "></span>
                                            </label>
                                        </center>
                                    </div>
                                </div>
                                @endforeach

                                <div class="col-sm-12">
                                    <div class="btn w-100">
                                        <input type="hidden" name="ptotalCoin" id="ptotalCoin" value="" class="ptotalCoin" />
                                        <button name="submitbtn" id="submitbtn" type="button" class="btn btn-success d-block mx-auto mb-2 mt-2">Submit</button>
                                    </div>
                                </div>
                                @else
                                <div class="col-sm-12">
                                    <div class="blue-box">
                                        <h2 class="title-box">
                                            No Data Found!
                                        </h2>
                                    </div>
                                </div>
                                @endif

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<script>
    $(document).ready(function(e) {
        $(".check-image-span").click(function() {
            $(this).toggleClass("right");
        });

        var hightBox = 0;
        $('.blue-box').each(function() {
            if ($(this).height() > hightBox) {
                hightBox = $(this).height();
            }
        });
        $('.blue-box').height(hightBox);

        $('.chekOffer').click(function(event) {
            if ($(this).prop("checked") == true) {
                var total_coins = $(this).data('count');
                var no_of_coins = $(this).data('nocoins');
                //var coin_amount = $(this).data('price');
                var coin_id = $(this).data('id');

                var totalc = 0;
                $('input:checkbox:checked').each(function() {
                    totalc += isNaN(parseInt($(this).data('nocoins'))) ? 0 : parseInt($(this).data('nocoins'));
                });
                if (totalc > total_coins) {
                    swal('You have not enough points to purchase this offer!');
                    $('.removeclass_' + coin_id).removeClass(' check-image-span');
                    event.preventDefault();
                    event.stopPropagation();
                    return false;
                } else {
                    $('#ptotalCoin').val(totalc);
                    $('.removeclass_' + coin_id).addClass(' check-image-span');
                }
            } else {
                var no_of_coins = $(this).data('nocoins');
                var ptotalCoin = $('#ptotalCoin').val();
                var unckeck = ptotalCoin - no_of_coins;
                $('#ptotalCoin').val(unckeck);
            }
        });

        $('#submitbtn').click(function() {
            var checkedNum = $('input[name="card[]"]:checked').length;
            if (checkedNum != 0) {
                $("#purchaseCoin").submit();
            } else {
                swal('Please! Check at least one gift card.');
                return false;
            }

        });

    });
</script>
@endsection