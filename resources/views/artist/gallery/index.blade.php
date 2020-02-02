@extends('layouts.app')
@section('content')
<style>
    .m-brand__logo{
        width: 60% !important;

    }
    .tz-gallery .lightbox img{width:100%;}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
<link href="{{ asset('public/thumbnail-gallery.css') }}" rel="stylesheet" type="text/css" />

<div class="container gallery-container mt-3" >
    @php
        $segments = \Request::segment(2);
          if (!empty($segments)){
            @endphp
    <a href="{{route('gallery.create',$segments)}}" class="btn btn-outline-accent btn-sm 	m-btn m-btn--icon m-btn--pill">
        <span><i class="fa fa-plus"></i><span>Add New</span></span>
    </a>
    @php }else{ @endphp
    <a href="{{route('gallery.create')}}" class="btn btn-outline-accent btn-sm 	m-btn m-btn--icon m-btn--pill">
        <span><i class="fa fa-plus"></i><span>Add New</span></span>
    </a>

    @php } @endphp
    @if(session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        </button>
        <strong>Well done!</strong>  {{ session()->get('success') }}.
    </div>
    @endif
    <h1>Gallery</h1>

    <p class="page-description text-center">Artist Gallery</p>

    <div class="tz-gallery">

        <div class="row">
            @if(!empty($data) && count($data)> 0)
            @foreach($data as $val)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a class="lightbox" href="{{ asset('public/images/gallery_images/'.$val->image) }}">
                        <img src="{{ asset('public/images/gallery_images/'.$val->image) }}" alt="Park" height="260" width="323">
                    </a>
                    <div class="caption">
                        <h3>{{$val->title}}</h3>
                        <p>{{$val->descripton}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-sm-12">
                <h3 class="text-center">gallery not available</h3>
            </div>
            @endif
        </div>

    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>

@endsection