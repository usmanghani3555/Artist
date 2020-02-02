@extends('layouts.app')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <!-- END: Subheader -->
    <div class="m-content">
        @if(session()->get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Well done!</strong> {{ session()->get('success') }}.
        </div>
        @endif
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Accommodation
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            @php $segments = \Request::segment(2);
                            @endphp
                            <a href="{{route('accommodation.create',$segments)}}" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    {{--<span>New Record</span>--}}
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                    <thead>
                        <tr>
                            <th>Hotel</th>
                            <th>Arrival Date</th>
                            <th>Departure Date</th>
                            <th>Confirmation Code</th>
                            <th>Address</th>
                            <th>Airline</th>
                            <th>Flight Confirmation Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($data))
                        @foreach($data as $user)

                        <tr class="data-row row{{$user->id}}">
                            <td class="hotel htl{{$user->id}}">{{$user->hotel_name}}</td>
                            <td class="align-middle acumid" hidden>{{$user->id}}</td>
                            <td class="align-middle datentime" hidden>{{$user->date}}</td>
                            <td class="arrival_date arrv{{$user->id}}">{{$user->arrival_date}}</td>
                            <td class="departure_date dep{{$user->id}}">{{$user->departure_date}}</td>
                            <td class="align-middle con_code">{{$user->confirmation_code}}</td>
                            <td class="address addr{{$user->id}}">{{$user->address}}</td>
                            <td class="align-middle airline">{{$user->airline}}</td>
                            <td class="align-middle flight_confirmation_code">{{$user->flight_confirmation_code}}</td>
                            <td>
                                <a href="javascript:void(0);" id="edit-acum" class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                    <i class="fa flaticon-edit"></i>
                                </a>

                                {{--<a href="{{route('artist.view',$val->id)}}" target="_blank" class="btn btn-outline-success m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                <i class="fa flaticon-eye"></i>
                                </a>--}}
                                <a href="javascript:void(0);" data-id="{{$user->id}}" class="btn delacm btn-outline-danger m-btn m-btn--icon deluser btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                    <i class="fa flaticon-delete"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <td colspan="6">No Data</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<div class="modal fade" id="m_datetimepicker_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Accommodation</h5>
                <button type="reset" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-remove"></span>
                </button>
            </div>
            <form class="m-form m-form--fit m-form--label-align-right" method="post" id="Acomodations_form">
                @csrf
                <input type="hidden" name="aid" id="accumid">
                <div class="m-portlet__body" style="margin-top: 20px;">
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Hotel Name</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <div class="input-group ">
                                <input id="hotel" type="text" class="form-control" placeholder="Hotel Name" name="hotel" autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Date & Time</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
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
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <div class="input-group ">
                                <input id="address" type="text" class="form-control" placeholder="Address" name="address" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Confirmation Code</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <div class="input-group ">
                                <input id="c_code" type="text" class="form-control" placeholder="Confirmation Code" name="c_code" autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Arrival Date</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
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
                        <div class="col-lg-6 col-md-9 col-sm-12">
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
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <div class="input-group ">
                                <input id="airline" type="text" class="form-control" placeholder="Airline" name="airline" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Flight Confirmation Code</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
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
                                <button type="button" class="btn btn-success accummbtn" id="accummbtns">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection