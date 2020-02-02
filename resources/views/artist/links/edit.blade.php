@extends('layouts.app')

@section('content')

<!-- BEGIN: Subheader -->
<div class="container-fluid mt-5 mb-5">

    <!--begin::Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Edit Links
                    </h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        @php $segments = \Request::segment(3);
        //dd($segments);
        @endphp
        <form class="m-form m-form--fit m-form--label-align-right" id="m_form_1" method="post" action="{{route('link.update',$segments)}}">
            @csrf
            <input type="hidden" name="u_id" value="@php if(!empty($segments)) { echo $segments ;}@endphp">
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
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="bandcamp" value="{{$user->bandcamp}}">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Facebook </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="facebook" value="{{$user->facebook}}" >
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Instagram </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="instagram" value="{{$user->instagram}}" >
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">SoundCloud </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="soundcloud" value="{{$user->soundcloud}}" >
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Spotify</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="spotify" value="{{$user->spotify}}">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Twitter</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="twitter" value="{{$user->twitter}}">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Youtube</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="youtube" value="{{$user->youtube}}">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Apple</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="apple" value="{{$user->apple}}">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Featured Playlist Url</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="featuredplaylist" value="{{$user->featured_playlist}}" >
                    </div>
                </div>

                <div class="m-portlet__body doctorsLocations" >
                    @php
                    $val = $user->other;
                    $otherlnks = json_decode($val);
                    $counts = count($otherlnks);
                    @endphp
                    <?php
                    for($i=0;$i<$counts;$i++) {
                    if($i == 0){
                        $key1 = !empty($otherlnks[$i]->key1)?$otherlnks[$i]->key1:"";
                        $value1 = !empty($otherlnks[$i]->value1)?$otherlnks[$i]->value1:"";
                        ?>
                    <div class="form-group m-form__group row ">
                        <label class="col-form-label col-lg-3 col-sm-12"></label>
                        <div class="col-lg-2 col-md-9 col-sm-12">
                            <input type="text" class="form-control m-input" id="Olabel1" name="Olabel1" value="<?php echo !empty($key1)?$key1:"";?>" placeholder="Other1">

                        </div>
                        <div class="col-lg-5 col-md-9 col-sm-12">
                            <input type="text" class="form-control m-input doclocaton" id="Other1" name="Other1" value="<?php echo !empty($value1)?$value1:"";?>" placeholder="https://www.example.com/">

                        </div>
                    </div>
                    <?php  }
                        if($i == 1){
                            $key2 = !empty($otherlnks[$i]->key2)?$otherlnks[$i]->key2:"";
                            $value2 = !empty($otherlnks[$i]->value2)?$otherlnks[$i]->value2:"";
                            ?>
                            <div class="form-group m-form__group row ">
                                <label class="col-form-label col-lg-3 col-sm-12"></label>
                                <div class="col-lg-2 col-md-9 col-sm-12">
                                    <input type="text" class="form-control m-input" id="Olabel2" name="Olabel2" value="<?php echo !empty($key2)?$key2:"";?>" placeholder="Other1">

                                </div>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <input type="text" class="form-control m-input doclocaton" id="Other2" name="Other2" value="<?php echo !empty($value2)?$value2:"";?>" placeholder="https://www.example.com/">

                                </div>
                            </div>
                        <?php  }
                        if($i == 2){
                            $key3 = !empty($otherlnks[$i]->key3)?$otherlnks[$i]->key3:"";
                            $value3 = !empty($otherlnks[$i]->value3)?$otherlnks[$i]->value3:"";
                            ?>
                            <div class="form-group m-form__group row ">
                                <label class="col-form-label col-lg-3 col-sm-12"></label>
                                <div class="col-lg-2 col-md-9 col-sm-12">
                                    <input type="text" class="form-control m-input" id="Olabel3" name="Olabel3" value="<?php echo !empty($key3)?$key3:"";?>" placeholder="Other1">

                                </div>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <input type="text" class="form-control m-input doclocaton" id="Other3" name="Other3" value="<?php echo !empty($value3)?$value3:"";?>" placeholder="https://www.example.com/">

                                </div>
                            </div>
                        <?php  }
                        if($i == 3){
                            $key4 = !empty($otherlnks[$i]->key4)?$otherlnks[$i]->key4:"";
                            $value4 = !empty($otherlnks[$i]->value4)?$otherlnks[$i]->value4:"";
                            ?>
                            <div class="form-group m-form__group row ">
                                <label class="col-form-label col-lg-3 col-sm-12"></label>
                                <div class="col-lg-2 col-md-9 col-sm-12">
                                    <input type="text" class="form-control m-input" id="Olabel4" name="Olabel4" value="<?php echo !empty($key4)?$key4:"";?>" placeholder="Other1">

                                </div>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <input type="text" class="form-control m-input doclocaton" id="Other4" name="Other4" value="<?php echo !empty($value4)?$value4:"";?>" placeholder="https://www.example.com/">

                                </div>
                            </div>
                        <?php  }
                    } ?>
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
                            <button type="submit" class="btn btn-success">Update</button>
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
