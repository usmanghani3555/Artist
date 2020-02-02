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
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Points History
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Assign By</th>
                            <th>Assign To</th>
                            <th>Current Points</th>
                            <th>New Points</th>
                            <th>Total</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($data))
                            @foreach($data as $val)
                            <tr class="row{{$val->id}}">
                                <td>{{$val->id}}</td>
                                <td>{{$val->name}}</td>
                                <td>{{$val->assign_by}}</td>
                                <td>{{$val->assign_to}}</td>
                                <td>{{$val->availablepoints}}</td>
                                <td>{{$val->addpoints}}</td>
                                <td>{{$val->totalpoints}}</td>
                                <td>{{ \CommonHelper::instance()->dateFormate($val->created_at) }}</td>
                            </tr>
                            @endforeach
                        @else
                        <tr><td colspan="8" style="text-align: center;">No Data Found!</td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection