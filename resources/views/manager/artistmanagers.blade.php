@extends('layouts.app')
@section('content')
    <style>
        .table-checkable thead {
            background-color: #2c2e3e;
            color: #fff;
        }

        .table-bordered th, .table-bordered td {
            border: none !important;
        }

        .table-responsive .table thead tr th i {
            margin-right: 5px;
        }

        .table th, .table td {
            border-top: 0px;
        }

        .table th, .table td {
            border-bottom: 2px solid #f4f5f8;
        }

        .m-portlet {
            box-shadow: none;
        }

        .m-brand__logo {
            width: 60% !important;

        }

        .tz-gallery .lightbox img {
            width: 100%;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link href="{{ asset('public/thumbnail-gallery.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">Artist Detail</h3>
                </div>
            </div>
        </div>

        <!-- END: Subheader -->
        <div class="m-content">
            <div class="row">
                <div class="col-xl-12">


                    <!--begin::Portlet-->
                    <div class="m-portlet m-portlet--tabs">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-tools">
                                <ul class="nav nav-tabs m-tabs-line m-tabs-line--primary m-tabs-line--2x"
                                    role="tablist">
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_6_1"
                                           role="tab">
                                            <i class="la la-cog"></i> Personal Info
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="m_tabs_6_1" role="tabpanel">
                                    <div class="m-portlet">
                                        <div class="m-portlet__body m-portlet__body--no-padding">
                                            <div class="m-invoice-2">
                                                <div class="m-invoice__wrapper">
                                                    <div class="m-invoice__head">
                                                        <div class="m-invoice__container m-invoice__container--centered">
                                                            <div class="m-invoice__logo" style="float: left;">
                                                                <a href="#">
                                                                    <h1>{{$data->name}}</h1>
                                                                </a>
                                                                <a href="#">
                                                                </a>
                                                            </div>
                                                            <span class="m-invoice__desc" style="float: left;">
															<span>{{$data->email}}</span>
															<span>{{$data->mobile}}</span>
														</span>
                                                            <div class="m-invoice__items">

                                                                    @if(!empty($data->admin_upgrage) || $data->admin_upgrage == "free_booking")
                                                                <div class="m-invoice__item">
                                                                    <span class="m-invoice__subtitle">Payment Id</span>
                                                                    <span class="m-invoice__text"></span>
                                                                    </div>
                                                                    <div class="m-invoice__item">
                                                                    <span class="m-invoice__subtitle">Payer ID</span>
                                                                    <span class="m-invoice__text"></span>
                                                                    </div>
                                                                    <div class="m-invoice__item">
                                                                    <span class="m-invoice__subtitle">Instagram Name</span>
                                                                    <span class="m-invoice__text"></span>
                                                                    </div>
                                                                    
                                                                    @else


                                                                <div class="m-invoice__item">
                                                                    <span class="m-invoice__subtitle">Payment Id</span>
                                                                    <span class="m-invoice__text">{{$data->paymentId}}</span>
                                                                </div>
                                                                <div class="m-invoice__item">
                                                                    <span class="m-invoice__subtitle">Payer ID</span>
                                                                    <span class="m-invoice__text">{{$data->PayerID}}</span>
                                                                </div>
                                                                <div class="m-invoice__item">
                                                                    <span class="m-invoice__subtitle">Instagram Name</span>
                                                                    <span class="m-invoice__text">{{$data->insta_name}}</span>
                                                                </div>
                                                                @endif
                                                            </div>
                                                                @if(!empty($data->admin_upgrage))
                                                                <div class="m-invoice__items">
                                                                    <div class="m-invoice__item">
                                                                    <span class="m-invoice__subtitle">Booking Type</span>
                                                                    <span class="m-invoice__text">{{$data->admin_upgrage}}</span>
                                                                    </div>
                                                                    <div class="m-invoice__item">
                                                                    <span class="m-invoice__subtitle">Amount</span>
                                                                    <span class="m-invoice__text">0</span>
                                                                </div>
                                                                @else
                                                            <div class="m-invoice__items">
                                                                <div class="m-invoice__item">
                                                                    <span class="m-invoice__subtitle">Booking Type</span>
                                                                    <span class="m-invoice__text">{{$data->booking_type}}</span>
                                                                </div>
                                                                <div class="m-invoice__item">
                                                                    <span class="m-invoice__subtitle">Amount</span>
                                                                    <span class="m-invoice__text">{{$data->amount}}</span>
                                                                </div> 
                                                                @endif
                                                                <div class="m-invoice__item">
                                                                    <span class="m-invoice__subtitle">Agent</span>
                                                                    <span class="m-invoice__text">{{$data->agent}}</span>
                                                                </div>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-portlet m-portlet--mobile">
                                            <div class="m-portlet__head">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">
                                                        <h3 class="m-portlet__head-text">
                                                            Registrations List
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-portlet__body">
                                                <!--begin: Datatable -->
                                                <table class="table table-striped- table-bordered table-hover table-checkable" id="">
                                                    <thead>
                                                    <tr style="background-color: #575962;color: #fff;">
                                                        <th>Payment Id</th>
                                                        <th>Registration Type</th>
                                                        <th>Amount</th>
                                                        <th>PayerID</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(!empty($subs) && count($subs) > 0)
                                                        @foreach($subs as $val)
                                                            <tr>
                                                                <td>{{$val->paymentId}}</td>
                                                                <td>{{$val->booking_type}}</td>
                                                                <td>{{$val->amount}}</td>
                                                                <td>{{$val->PayerID}}</td>

                                                            </tr>
                                                        @endforeach

                                                    @else
                                                        <tr><td colspan="4">No Data</td></tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end::Portlet-->
                </div>
            </div>
        </div>
    </div>

    <!-- Attachment Modal -->
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header " style="background-color: #2c2e3e;padding: 17px 25px;">
                    <h5 class="modal-title" id="edit-modal-label" style="color:#fff;font-weight: 600;">Edit Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="position: relative;top: 10px;color:#fff;"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="attachment-body-content" style="background-color: #eee">
                    <form id="edit-form" class="form-horizontal" style="font-weight: 500;">
                        <input type="hidden" id="memid">

                        <div class="">
                            <!-- name -->
                            <div class="form-group">
                                <label class="col-form-label" for="modal-input-name">Name</label>
                                <input type="text" name="modal-input-name" class="form-control" id="modal-input-name"
                                       required autofocus>
                            </div>
                            <!-- /name -->
                            <div class="form-group">
                                <label class="col-form-label" for="modal-input-id">Email</label>
                                <input type="text" name="modal-input-id" class="form-control" id="modal-input-email"
                                       required>
                            </div>
                            <!-- description -->
                            <div class="form-group">
                                <label class="col-form-label" for="modal-input-description">Role</label>
                                <input type="text" name="modal-input-description" class="form-control"
                                       id="modal-input-description" required>
                            </div>
                            <!-- /description -->
                        </div>
                        <div class="modal-footer" style="background-color: #eee;padding-top: 0px;padding-bottom: 0px;">
                            <button type="button" class="btn btn-primary memupdate">Update</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="edit-bio" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header " style="background-color: #2c2e3e;padding: 17px 25px;">
                    <h5 class="modal-title" id="edit-modal-label" style="color:#fff;font-weight: 600;">Edit Bio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="position: relative;top: 10px;color:#fff;"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="attachment-body-content" style="background-color: #eee">
                    <form id="edit-form-bio" class="form-horizontal" style="font-weight: 500;">
                        <input type="hidden" id="bioid">

                        <div class="">
                            <!-- name -->
                            <div class="form-group">
                                <label class="col-form-label" for="modal-input-name">Bio</label>
                                <input type="text" name="modal-input-bio" class="form-control" id="modal-input-bio"
                                       required autofocus>
                            </div>
                            <!-- /name -->
                            <!-- /description -->
                        </div>
                        <div class="modal-footer" style="background-color: #eee;padding-top: 0px;padding-bottom: 0px;">
                            <button type="button" class="btn btn-primary bioupdate">Update</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>

@endsection