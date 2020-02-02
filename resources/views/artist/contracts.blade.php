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
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            All Contracts
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                        @if (auth()->user()->role == "admin")
                            <a href="{{ route('artist.add_contract', $id) }}" class="btn btn-outline-accent btn-sm 	m-btn m-btn--icon m-btn--pill">
                                <span><i class="fa fa-plus"></i><span>Add New Contract</span></span>
                            </a>
                        @endif
                        </li>

                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                    <thead>
                        <tr>
                            <th>Contract Name</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($data))
                        @foreach($data as $val)
                        <tr class="row{{$val->id}}">
                            <td>{{$val->contract_name}}</td>
                            <td>{{ \CommonHelper::instance()->dateFormate($val->created_at) }}</td>
                            <td>
                            @if (auth()->user()->role == "admin")
                                <a href="{{route('artist.edit_contract', $val->id)}}" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Edit Contract Info" class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air"><i class="fa flaticon-edit"></i></a>

                                <a href="javascript:void(0);" data-id="{{$val->id}}" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Delete Contract Info" class="btn delcontract btn-outline-danger m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                    <i class="fa flaticon-delete"></i>
                                </a>
                            @endif
                                @if(!empty($val->contract_document))
                                <!-- <a href="{{ asset('public/images/contract_document/'.$val->contract_document) }}" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Download Contract" class="btn btn-outline-accent btn-sm m-btn m-btn--icon m-btn--pill download" target="_blank"><i class="fa fa-download"></i></a> -->

                                <a href="javascript:void(0);" data-id="{{$val->id}}" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Read more.." class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air contract-read"><i class="fas fa-book-reader"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7" style="text-align: center;">No Data Found!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<div class="modal fade" id="m_contract_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contract Information</h5>
                <button type="reset" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-remove"></span>
                </button>
            </div>
            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                <thead>
                    <tr>
                        <th>Contract Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="showdocument">
                    
                </tbody>
            </table>

            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="modal-footer">
                        <button type="reset" data-dismiss="modal" aria-label="Close" class="btn btn-info">Cancel</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection