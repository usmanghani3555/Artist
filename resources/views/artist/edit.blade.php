@extends('layouts.app')

@section('content')
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
            <div class="col-lg-12">
                <div class="m-portlet">
                    <div class="m-portlet__body m-portlet__body--no-padding">
                        <div class="m-invoice-2">
                            <div class="m-invoice__wrapper">
                                <div class="m-invoice__head" style="background-image: url(../../assets/app/media/img//logos/bg-6.jpg);">
                                    <div class="m-invoice__container m-invoice__container--centered">
                                        <div class="m-invoice__logo">
                                            <a href="#">
                                                <h1>{{$data->name}}</h1>
                                            </a>
                                            <a href="#">
                                            </a>
                                        </div>
                                        <span class="m-invoice__desc">
															<span>{{$data->email}}</span>
															<span>{{$data->mobile}}</span>
														</span>
                                        <div class="m-invoice__items">
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
                                        </div>
                                        <div class="m-invoice__items">
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Booking Type</span>
                                                <span class="m-invoice__text">{{$data->booking_type}}</span>
                                            </div>
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Agent</span>
                                                <span class="m-invoice__text">{{$data->agent}}</span>
                                            </div>
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Amount</span>
                                                <span class="m-invoice__text">{{$data->amount}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection