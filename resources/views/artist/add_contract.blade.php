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
    @if(count($errors))
    <div class="form-group">
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    <!--begin::Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        @if(!empty($data->id))
                        Edit Contract
                        @else
                        Add New Contract
                        @endif
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Portlet-->

        <!--begin::Form-->
        <form id="contract_form" method="POST" action="{{ route('artist.store_contract') }}" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator">
            {{ csrf_field() }}
            <input type="hidden" name="contract_id" value="@if(!empty($data->id)){{ $data->id }}@endif" />
            <input type="hidden" name="user_id" value="@if(!empty($data->user_id)){{ $data->user_id }} @else {{ $id }} @endif" />
            <div class="m-portlet__body">
                <div class="form-group m-form__group" style="border-bottom: none;">
                    <label for="contract">Name:</label>
                    <input type="text" class="form-control m-input m-input" id="contract" name="contract_name" placeholder="Contract Name" value="@if(!empty($data->contract_name)){{ $data->contract_name }}@endif">
                </div>
                <div></div>
            
                <div class="form-group m-form__group">
                    <label for="document">Contract Document:</label>
                    <div></div>
                    <div class="custom-file">
                        <input type="file" id="document" name="contract_document[]" class="form-control m-input" value="{{ old('image') }}" multiple>
                        <p class="text-info">Note: Upload filenames without commas.</p>
                    </div> 
                </div>
                <div class="m-form__actions m-form__actions--solid d-flex justify-content-lg-end" style="background-color: #fff;">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-12">
                            <a href="{{ url()->previous() }}" class="btn btn-circle btn-success"><i class="fa fa-arrow-left"></i>Back</a>
                            <button type="submit" class="btn btn-success">@if(!empty($data->id))Update @else Save @endif</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->

        <!--end::Portlet-->
    </div>
</div>
<script src="{{ asset('public/theme/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/theme/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        $("#contract_form").validate({
            rules: {
                contract_name: {
                    required: true
                },
                "contract_document[]": "required"
            },
            messages: {
                "contract_name": "Please Enter Title!",
                "contract_document[]": "Please Upload Document!",
            }
        });
    });
</script>
@endsection