@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 mb-5">
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
                            Edit Biography
                        </h3>
                    </div>
                </div>
            </div>

            <!--begin::Portlet-->

            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" id="biography_form"
                  method="POST" action="{{ route('artist.store_biography') }}">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ $id }}"/>
                <div class="m-portlet__body">
                    <div class="form-group m-form__group">
                        <label for="exampleTextarea">Biagrophy</label>
                        <textarea class="form-control m-input m-input--air m-input--pill" id="exampleTextarea" name="biography" maxlength="1200" rows="3">@if(!empty($data->biography)){{ $data->biography }}@endif</textarea>
                        <div class="m-form__actions m-form__actions--solid d-flex justify-content-lg-end" style="background-color: #fff;padding-right: 0;">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

            <!--end::Form-->

            <!--end::Portlet-->
        </div>
    </div>
@endsection