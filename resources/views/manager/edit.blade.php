@extends('layouts.app')

@section('content')
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
                              Manager
                        </h3>
                    </div>
                </div>
            </div>

            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" method="POST" id="mngedit" action="{{ route('manager.update',$user->id) }}">
                {{ csrf_field() }}
                <div class="m-portlet__body">
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
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Full Name:</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" name="name" value="{{ $user->name }}" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Email address:</label>
                        <div class="col-lg-6">
                            <input type="email" class="form-control m-input" name="email" readonly value="{{ $user->email }}" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Password:</label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control m-input" value="" name="password" placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-2">Assign Artist</label>
                        <div class="col-lg-6">
                                <select class="form-control m-select2" id="m_select2_3" name="assignartist[]" multiple="multiple">
                                <optgroup label="Select Artist">
                                    <?php $assignArtist = explode(',',$user->assign_artists); ?>
                                    <?php $selected =''; ?>
                                    @if(!empty($artist))
                                        @foreach($artist as $val)
                                                <?php if(in_array($val->id,$assignArtist)){ ?>
                                                        <option value="{{$val->id}}" selected>{{$val->name}}</option>
                                                <?php }else{ ?>
                                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                                <?php }?>
                                        @endforeach
                                    @endif
                                </optgroup>
                            </select>
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
    $(document).ready(function () {
        $("#mngedit").validate({
            rules: {
                name: {required: !0},
                email: {required: !0, email: !0},
            },
        });
    });
</script>
@endsection