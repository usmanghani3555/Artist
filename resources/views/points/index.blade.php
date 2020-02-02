@extends('layouts.app')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ url()->previous() }}" class="btn btn-circle btn-success"><i class="fa fa-arrow-left"></i>Back </a>
            </div>
        </div>
        <br />
        @if(session()->get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Well done!</strong> {{ session()->get('success') }}.
        </div>
        @endif
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            All Points
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{ route('add_point') }}" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    {{--<span>New Record</span>--}}
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                    <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Points</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($data))
                        @foreach($data as $val)
                        <tr class="row{{$val->id}}">
                            <td>{{$val->amount}}</td>
                            <td>{{$val->coins}}</td>
                            <td>
                                @if(!empty($val->image) && file_exists( public_path().'/coin/'.$val->image))
                                <img src="{{asset('public/coin/'.$val->image)}}" alt="" height="60" width="60">
                                @endif
                            </td>
                            <td>{{ \CommonHelper::instance()->dateFormate($val->created_at) }}</td>
                            <td>
                                <a href="{{route('edit_point', $val->id)}}" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Edit Point Info" class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air"><i class="fa flaticon-edit"></i></a>

                                <a href="javascript:void(0);" data-id="{{$val->id}}" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Delete Point Info" class="btn delcoin btn-outline-danger m-btn m-btn--icon deluser btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                    <i class="fa flaticon-delete"></i>
                                </a>
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

@endsection