@extends('layouts.app')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Accommodation</h3>
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
                        <h3 class="m-portlet__head-text">
                            Create New
                        </h3>
                    </div>
                </div>
            </div>
            @php $segments = \Request::segment(3);
            @endphp
            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{route('accommodation.save',$segments)}}" id="Acomodation_form">
                @csrf
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Hotel Name</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="input-group ">
                                <input id="hotel" type="text" class="form-control" required placeholder="Hotel Name" name="hotel" autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Date & Time</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="input-group date">
                                <input type="text" class="form-control m-input" readonly name="dandt" placeholder="Select date & time" id="m_datetimepicker_2" />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Address</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="input-group ">
                                <input id="address" type="text" class="form-control" placeholder="Address" name="address" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Confirmation Code</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="input-group ">
                                <input id="c_code" type="text" class="form-control" placeholder="Confirmation Code" name="c_code" autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Arrival Date</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="input-group date">
                                <input type="text" name="arrve_date" class="form-control m-input" placeholder="Select date" id="m_datetimepicker_6" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar glyphicon-th"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Departure Date</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="input-group date">
                                <input type="text" name="d_date" class="form-control m-input" placeholder="Select date" id="m_datetimepicker_6_6" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar glyphicon-th"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Airline</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="input-group ">
                                <input id="address" type="text" class="form-control" placeholder="Airline" name="airline" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Flight Confirmation Code</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="input-group ">
                                <input id="flight_c_code" type="text" class="form-control" placeholder="Confirmation Code" name="flight_c_code" autofocus>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!--end::Form-->
        </div>

    </div>
</div>
@endsection