@extends('layouts.app')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        @if(session()->get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            {{ session()->get('success') }}.
        </div>
        @endif
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">My Profile</h3>
            </div>
        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active show" aria-selected="true">
                                        <i class="flaticon-share m--hide"></i>
                                        Update Profile
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="m_user_profile_tab_1">
                            <form class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data" method="post" action="{{route('user.profile.update',$data->id)}}">
                                @csrf
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group m--margin-top-10 m--hide">
                                        <div class="alert m-alert m-alert--default" role="alert">
                                            The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                        </div>
                                    </div>
                                    <div class="m-card-profile">
                                        <div class="m-card-profile__title m--hide">
                                            Your Profile
                                        </div>
                                        <div class="m-card-profile__pic">
                                            <div class="">

                                                @if(!empty($data->photo))
                                                <img src="{{url('public/img/'.$data->photo)}}" alt="" height="140" width="140">
                                                @else
                                                <img src="https://traximtech.com/abs/public/theme/assets/app/media/img/users/user4.jpg" alt="" hight="170" width="170">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">User Name</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="name" value="{{$data->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Email</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="email" name="email" value="{{$data->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="mobile" value="{{$data->mobile}}">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">ARTIST GROUP NAME</label>
                                        <div class="col-7">
                                            <textarea class="form-control" rows="4" value="{{$data->members_details}}" name="members_details" id="members_details">{{$data->members_details}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Profile.</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="file" name="photo" value="" style="height: auto;">
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-7">
                                                <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;
                                                <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection