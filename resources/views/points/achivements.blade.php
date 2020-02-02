@extends('layouts.app')
@section('content')
<style>
    .m-brand__logo {
        width: 60% !important;

    }

    .thumbnail img {
        height: 100px;
        display: block;
        margin: auto;

    }

    .tz-gallery .caption h3 {
        font-size: 16px !important;
    }

    .thumbnail {
        padding: 10px 0px !important;
    }

    .caption-img {
        width: 40px !important;
        height: 40px !important;
        float: left;
    }

    .caption-list {
        padding-left: 0;
        padding-bottom: 0;
    }

    .caption-list li {
        display: inline-block;
    }

    .caption-list li span {
        margin-top: 11px;

        float: left;

        margin-left: 5px;
    }

    .tz-gallery .caption p {
        margin-bottom: 10px !important;
    }

    .tz-gallery .thumbnail {
        padding-top: 26px !important;
        padding-bottom: 16px !important;
    }

    .tz-gallery .caption {
        padding-bottom: 0 !important;
    }
    .backbtn{
        margin-bottom: -193px;
        margin-left: 41px;
    }
    .btn-success {
        background: linear-gradient(135deg, #5b53c2 30%, #1996f6 100%);
        border: none;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
<link href="{{ asset('public/thumbnail-gallery.css') }}" rel="stylesheet" type="text/css" />

<div class="container-fluid gallery-container mt-3">
<a href="{{ url()->previous() }}" class="btn btn-circle btn-success backbtn"><i class="fa fa-arrow-left"></i> Back </a>
<h1>Achivements</h1>
    @if(session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        </button>
        <strong>Well done!</strong> {{ session()->get('success') }}.
    </div>
    @endif
    <div class="tz-gallery">
        <div class="row">
            @if(!empty($data) && count($data)> 0)
            @foreach($data as $val)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    @if(!empty($val->card_image) && file_exists( public_path().'/coin/'.$val->card_image))
                    <a class="lightbox" href="{{asset('public/coin/'.$val->card_image)}}">
                        <img src="{{asset('public/coin/'.$val->card_image)}}" alt="Achivements">
                    </a>
                    @endif
                    <div class="caption">
                        <h3>Coupon : {{$val->coupon}}</h3>
                        <h5>Card Title : {{$val->card_title}}</h5>
                        <h6>Price : {{$val->card_price}}</h6>
                        <ul class="caption-list">
                            <li><img class="caption-img" src="http://artistauditions.com/dev/public/theme/assets/app/media/img/users/coins.gif" alt="" /> <span>{{$val->coins}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-sm-12">
                <h3 class="text-center">Achivements Not Found!</h3>
            </div>
            @endif
        </div>

    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>

@endsection