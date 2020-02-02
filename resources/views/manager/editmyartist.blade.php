@extends('layouts.app')

@section('content')
<style>
    .m-aside-menu .m-menu__nav>.m-menu__item>.m-menu__heading .m-menu__link-text,
    .m-aside-menu .m-menu__nav>.m-menu__item>.m-menu__link .m-menu__link-text {
        font-size: 1.4rem !important;
    }

    .m-aside-menu .m-menu__nav>.m-menu__item>.m-menu__heading .m-menu__link-icon,
    .m-aside-menu .m-menu__nav>.m-menu__item>.m-menu__link .m-menu__link-icon {
        font-size: 1.8rem !important;
    }

    .m-brand__logo-wrapper {
        color: #5867dd
    }

    .m-form .form-control-label,
    .m-form label {
        font-size: 1.4rem !important;
    }

    .m-portlet .m-portlet__head .m-portlet__head-caption .m-portlet__head-title .m-portlet__head-text {
        font-size: 1.6rem !important;
    }
    
</style>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">

        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Edit Manager</h3>
            </div>

        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <!--begin::Portlet-->
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Edit Artist
                        </h3>
                    </div>
                </div>
            </div>

            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" method="POST" action="{{ route('myartist.update',$artist->id) }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $id }}" name="artist_id" />
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Full Name:</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" name="name" value="{{ $artist->name }}" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Email address:</label>
                        <div class="col-lg-6">
                            <input type="email" class="form-control m-input" name="email" value="{{ $artist->email }}" disabled="" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Password:</label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control m-input" name="password" value="" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Mobile:</label>
                        <div class="col-lg-6">
                            <input type="number" class="form-control m-input" name="mobile" value="{{ $artist->mobile }}" placeholder="Enter mobile">
                        </div>
                    </div>
                    @if(Auth::user()->role == "admin")
                    <div class="form-group m-form__group row">
                        <label for="availablepoints" class="col-lg-2 col-form-label">Available Points:</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" name="availablepoints" id="availablepoints" value="{{ $artist->coins }}" placeholder="Enter points" readonly>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="managepoint" class="col-lg-2 col-form-label">Manage Points:</label>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <select name="managepoint" id="managepoint" class="form-control">
                                    <option value=''>Select Points</option>
                                    <option value="200|Shows - 200 PTS">Shows - 200 PTS</option>
                                    <option value="400|International Shows - 400 PTS">International Shows - 400 PTS</option>
                                    <option value="400|Indie Festivals - 400 PTS">Indie Festivals - 400 PTS</option>
                                    <option value="800|majors">Majors Festivals - 800 PTS</option>
                                    <option value="600|International Festivals - 600 PTS">International Festivals - 600 PTS</option>
                                    <option value="100|Auditions - 100 PTS">Auditions - 100 PTS</option>
                                    <option value="50|Registration - 50 PTS">Registration - 50 PTS</option>
                                    <option value="100|Social Media Promo - 100 PTS">Social Media Promo - 100 PTS</option>
                                    <option value="100|Minor Interviews - 100 PTS">Minor Interviews - 100 PTS</option>
                                    <option value="200|Major Interviews - 200 PTS">Major Interviews - 200 PTS</option>
                                    <option value="50|Hotel Arrangements - 50 PTS">Hotel Arrangements - 50 PTS</option>
                                    <option value="75|Flight Arrangements - 75 PTS">Flight Arrangements - 75 PTS</option>
                                    <option value="50|Car Rental Arrangements - 50 PTS">Car Rental Arrangements - 50 PTS</option>
                                </select>
                            </div>
                            <input type="hidden" class="form-control" name="pointname" id="pointname" value="" readonly>
                        </div>
                        <div class="col-lg-4">
                            <a href="{{ route('myartist.pointshistory', $artist->id) }}" class="btn btn-success">
                                <span><i class="fa fa-history"></i><span> Points History</span></span>
                            </a>
                        </div>
                    </div>
                    <div style="text-align:center; margin-top: 10px;margin-right:170px;">
                        <span id="msgshow" class="btn " style="display:none"></span>
                    </div>
                    <div class="form-group m-form__group row pointsdiv" style="display:none">
                        <label for="addpoints" class="col-lg-2 col-form-label">New Points:</label>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-danger minusplus" data-type="minus">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </button>
                                </span>
                                <input type="text" class="form-control m-input" name="addpoints" id="addpoints" value="" readonly>
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn-success minusplus" data-type="plus">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                </span>
                            </div>
                            <p class="text-info">Note: Please click plus or minus button.</p>
                        </div>
                    </div>
                    <div class="form-group m-form__group row pointsdiv" style="display:none">
                        <label for="totalpoints" class="col-lg-2 col-form-label">Total Points:</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" name="totalpoints" id="totalpoints" value="" readonly>
                        </div>
                    </div>
                    @else
                    <input type="hidden" class="form-control" name="availablepoints" id="availablepoints" value="{{ $artist->coins }}" readonly>
                    @endif
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Instagram Name:</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" name="insta_name" value="{{ $artist->insta_name}}" placeholder="Enter Instagram">
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!--end::Form-->
        </div>
        <!--end::Portlet-->
    </div>
</div>
<script src="{{ asset('public/theme/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/theme/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#mngedit").validate({
            rules: {
                name: {
                    required: !0
                },
                email: {
                    required: !0,
                    email: !0
                },
                password: {
                    required: !0
                }
            },
        });

        $('#managepoint').change(function() {
            var points = $(this).val().split('|');
            var addpoints = points[0];
            var pointname = points[1];
            var availablepoints = $('#availablepoints').val();
            var totalpoints = parseInt(availablepoints) + parseInt(addpoints);
            $('#addpoints').val(addpoints);
            $('#totalpoints').val(availablepoints);
            $('#pointname').val(pointname);
            $('.pointsdiv').show();

            if(points == ''){
                $('#addpoints').empty();
                $('#totalpoints').empty();
                $('.pointsdiv').hide();
                $('#msgshow').hide();
            }
        });

    });

    $(document).on('click', ".minusplus", function() {
        type = $(this).attr('data-type');
        var availablepoints = parseInt($('#availablepoints').val());
        var addpoints = parseInt($('#addpoints').val());
        var totalpoints = 0;
        if (type == 'minus') {
            if(availablepoints > addpoints){
                totalpoints = availablepoints - addpoints; 
                $('#msgshow').show().addClass('btn-success').removeClass('btn-danger');
                $('#msgshow').html('<strong>Well done!</strong> New points has been detected from total points.');
            }else{
                totalpoints = availablepoints;
                $('#msgshow').show().addClass('btn-danger').removeClass('btn-success');
                $('#msgshow').html('<strong>Sorry!</strong> New points are greater than total points.');
            }
        } else if (type == 'plus') {
            totalpoints = availablepoints + addpoints;
            $('#msgshow').hide();
            $('#msgshow').show().addClass('btn-success').removeClass('btn-danger');
            $('#msgshow').html('<strong>Well done!</strong> New points has been added in total points.');
        }
        setTimeout(function() {
            $('#msgshow').fadeOut(5000);
        }, 10000);
        $('#totalpoints').val(totalpoints);
    });
</script>
@endsection