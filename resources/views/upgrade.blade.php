@extends('layouts.app')
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">

      @if(session('success'))
    <div class="alert alert-success" role="alert">
         <strong>Well done!</strong> {{session('success')}}.
      </div>
@endif
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">Upgrade Registration </h3>
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
                                Upgrade
                            </h3>
                        </div>
                    </div>
                </div>

            <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{ route('create-payment1') }}"   id="registers">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="m-form__group form-group">
                            <label>Select</label>
                            <div class="m-radio-list">
                            @if(!empty($data->admin_upgrage))

                            <label class="m-radio m-radio--success">
                                    <input type="radio" name="booking" value="free_booking" @if($data->admin_upgrage ==  'free_booking') checked="checked" @endif> Free Registration (Email Blast Only)
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--success">
                                    <input type="radio" name="booking" value="vip_booking"@if($data->admin_upgrage ==  'vip_booking') checked="checked" @endif> (USA) VIP Booking Registration (General Support)
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--success">
                                    <input type="radio" name="booking" value="elite_booking"@if($data->admin_upgrage ==  'elite_booking') checked="checked" @endif> (USA) Elite Booking Registration (Assigned Agent)
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--success">
                                    <input type="radio" name="booking" value="intl_booking"@if($data->admin_upgrage ==  'intl_booking') checked="checked" @endif> (INTL) Booking Registration (Visa, Passport Prep)
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--success">
                                    <input type="radio" name="booking" value="llc_booking"@if($data->admin_upgrage ==  'llc_booking') checked="checked" @endif> Business Registration (LLC | Label Prep, CPA, Attorney)
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--success">
                                    <input type="radio" name="booking" value="tap2020"@if($data->admin_upgrage ==  'tap2020') checked="checked" @endif> Tap2020
                                    <span></span>
                                </label>
                            @else
                            
                                <label class="m-radio m-radio--success">
                                    <input type="radio" name="booking" value="free_booking" @if($data->booking_type ==  'free_booking') checked="checked" @endif> Free Registration (Email Blast Only)
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--success">
                                    <input type="radio" name="booking" value="vip_booking"@if($data->booking_type ==  'vip_booking') checked="checked" @endif> (USA) VIP Booking Registration (General Support)
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--success">
                                    <input type="radio" name="booking" value="elite_booking"@if($data->booking_type ==  'elite_booking') checked="checked" @endif> (USA) Elite Booking Registration (Assigned Agent)
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--success">
                                    <input type="radio" name="booking" value="intl_booking"@if($data->booking_type ==  'intl_booking') checked="checked" @endif> (INTL) Booking Registration (Visa, Passport Prep)
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--success">
                                    <input type="radio" name="booking" value="llc_booking"@if($data->booking_type ==  'llc_booking') checked="checked" @endif> Business Registration (LLC | Label Prep, CPA, Attorney)
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--success">
                                    <input type="radio" name="booking" value="tap2020"@if($data->booking_type ==  'tap2020') checked="checked" @endif> Tap2020
                                    <span></span>
                                </label>
                                @endif
                            </div>
                            <span class="m-form__help">Note: Artist or Management, please make a selection for booking option of interest. Remember if you are just being adding to system, you will receive quarterly emails.</span>
                        </div>
                        <div class="row w-100 text-center total" style="margin: 0;">
                            <div class="col">Total</div>
                            <div class="col amn">0$</div>
                            <div class="w-100"></div>
                            <div class="col amount"></div>
                        </div>
                        <input type="hidden" class="hidamount" name="amount" value="">
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


