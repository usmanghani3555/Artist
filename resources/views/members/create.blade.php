@extends('layouts.app')

@section('content')

<!-- BEGIN: Subheader -->
<div class="container mt-5">
    <!--begin::Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Create Members
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" id="m_form_1" method="post" action="{{route('member.store')}}">
            @csrf
            <input type="hidden" name="u_id" value="@php if(!empty($id)) { echo  $id; } @endphp">
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Name *</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="name"  placeholder="Enter member name"  >
                    </div>
                </div><div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Email *</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="email"  placeholder="Enter member email"  >
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Role *</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="role"  placeholder="Enter member role"  >
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
