@extends('layouts.app')
@section('content')
<style>
    .table-checkable thead{
        background-color: #2c2e3e;
        color: #fff;
    }
    .table-bordered th, .table-bordered td{
    border:none !important;
    }
</style>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <!-- END: Subheader -->
        <div class="m-content">
            @if(session()->get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                    <strong>Well done!</strong>  {{ session()->get('success') }}.
                </div>
            @endif
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                All Members
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                @php
                                $segments = \Request::segment(2);
                                if (!empty($segments)){
                                @endphp
                                <a href="{{route('member.create',$segments)}}" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
								<span>
									<i class="la la-plus"></i>

										</span>
                                </a>
                                @php }else{ @endphp

                                <a href="{{route('member.create')}}" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
								<span>
									<i class="la la-plus"></i>

										</span>
                                </a>
                                @php } @endphp
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($data) && count($data)> 0)
                        @foreach($data as $val)
                        <tr class="data-row line{{$val->id}}">
                            <td class="align-middle name memname{{$val->id}}">{{$val->name}}</td>
                            <td class="align-middle memid" hidden>{{$val->id}}</td>
                            <td class="align-middle email mememail{{$val->id}}">{{$val->email}}</td>
                            <td class="align-middle word-break description memdesc{{$val->id}}">{{$val->role}}</td>
                            <td class="align-middle">
                                <a href="javascript:void(0);" class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air
                                            " id="edit-item" data-item-id="1"><i class="fa flaticon-edit"></i></a>

                                <a href="javascript:void(0);" data-id="{{$val->id}}"
                                   class="btn btn-outline-danger m-btn m-btn--icon dlmem btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                    <i class="fa flaticon-delete"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <tr class="text-center">
                            <td colspan="4">Members not added by Artist.</td>
                        </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
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
@endsection