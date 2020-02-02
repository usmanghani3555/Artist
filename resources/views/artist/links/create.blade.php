@extends('layouts.app')

@section('content')
<style>
    .m-form__actions{
        padding-top: 0;
        border-bottom: 1px solid #ebedf2;
    }
    .m-form .m-form__actions{
        padding-top: 0;
    }
    .m-form{
        padding: 0px 0px 50px 0px;
    }
    .m-portlet .m-portlet__foot:not(.m-portlet__no-border){
        border-top: 0px !important;
    }
</style>
    <!-- BEGIN: Subheader -->
    <div class="container-fluid mt-5 mb-5">

        <!--begin::Portlet-->
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Create Links
                        </h3>
                    </div>
                </div>
            </div>

            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right" id="m_form_1" method="post" action="{{route('link.save')}}">
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
                        <label class="col-form-label col-lg-3 col-sm-12">Bandcamp</label>
                        <div class="col-lg-5 col-md-9 col-sm-12">
                            <input type="text" class="form-control m-input" name="bandcamp" placeholder="https://bandcamp.com/">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Facebook </label>
                        <div class="col-lg-5 col-md-9 col-sm-12">
                            <input type="text" class="form-control m-input" name="facebook" placeholder="http://facebook.com/" >
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Instagram </label>
                        <div class="col-lg-5 col-md-9 col-sm-12">
                            <input type="text" class="form-control m-input" name="instagram" placeholder="http://instagram.com/" >
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">SoundCloud </label>
                        <div class="col-lg-5 col-md-9 col-sm-12">
                            <input type="text" class="form-control m-input" name="soundcloud" placeholder="https://soundcloud.com/">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Spotify</label>
                        <div class="col-lg-5 col-md-9 col-sm-12">
                            <input type="text" class="form-control m-input" name="spotify" placeholder="https://www.spotify.com/">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Twitter</label>
                        <div class="col-lg-5 col-md-9 col-sm-12">
                            <input type="text" class="form-control m-input" name="twitter" placeholder="https://www.twitter.com/">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Youtube</label>
                        <div class="col-lg-5 col-md-9 col-sm-12">
                            <input type="text" class="form-control m-input" name="youtube" placeholder="https://www.youtube.com/">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Apple</label>
                        <div class="col-lg-5 col-md-9 col-sm-12">
                            <input type="text" class="form-control m-input" name="apple" placeholder="https://www.apple.com/">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Featured Playlist Url</label>
                        <div class="col-lg-5 col-md-9 col-sm-12">
                            <input type="text" class="form-control m-input" name="featuredplaylist" placeholder="https://www.open.spotify.com/artist/ARTIST_ID/">
                        </div>
                    </div>
                    <div class="m-portlet__body doctorsLocations" >

                        <div class="form-group m-form__group row ">
                            <label class="col-form-label col-lg-3 col-sm-12"></label>
                            <div class="col-lg-2 col-md-9 col-sm-12">
                                <input type="text" class="form-control m-input" id="Olabel1" name="Olabel1" placeholder="Other1">

                            </div>
                            <div class="col-lg-5 col-md-9 col-sm-12">
                                <input type="text" class="form-control m-input doclocaton" id="Other1" name="Other1" placeholder="https://www.example.com/">

                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">
                        </label>
                        <div class="col-md-5">

                            <a href="javascript:void(0);" class="addmorelocation btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" class="btn btn-success">Save Links</button>
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
