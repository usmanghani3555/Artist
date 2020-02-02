@extends('layouts.app')

@section('content')

<!-- BEGIN: Subheader -->
<div class="container mt-5">
    @if(session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        </button>
        <strong>Well done!</strong> {{ session()->get('success') }}.
    </div>
    @endif
    <!--begin::Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Gallery
                    </h3>
                </div>
            </div>
        </div>
        @foreach($errors as $error)
        <li>{{$error}}</li>
        @endforeach
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" id="gallery_form" method="post"
              action="{{ route('gallery.store') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="u_id" value="@php if(!empty($id)) { echo  $id; } @endphp">
            <div class="m-portlet__body">
                <div class="m-form__content">
                    <div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="m_form_1_msg">
                        <div class="m-alert__icon">
                            <i class="la la-warning"></i>
                        </div>
                        <div class="m-alert__text">
                            Oh snap! Change a few things up and try submitting again.
                        </div>
                        <div class="m-alert__close">
                            <button type="button" class="close" data-close="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Title</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="title"/>
                        @if ($errors->has('name'))

                        <span class="text-danger">{{ $errors->first('title') }}</span>

                        @endif
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Description</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="description"/>
                        @if ($errors->has('name'))

                        <span class="text-danger">{{ $errors->first('description') }}</span>

                        @endif
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Image</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="file" class="form-control m-input" name="gallery_image" id="gallery_image" />
                        @if ($errors->has('name'))

                        <span class="text-danger">{{ $errors->first('title') }}</span>

                        @endif
                    </div>
                </div>

            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>

    <!--end::Portlet-->

    <!--begin::Portlet-->
</div>
@endsection
