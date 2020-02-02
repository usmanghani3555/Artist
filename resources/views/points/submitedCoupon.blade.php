@extends('layouts.app')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ url()->previous() }}" class="btn btn-circle btn-success"><i class="fa fa-arrow-left"></i> Back</a>
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
        <div id="messagealert" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <span id="flashmessage"></span>
        </div>
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Gamification
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Card Title</th>
                            <th>Card Icon</th>
                            <th>Coupon</th>
                            <th>Price</th>
                            <th>Submission Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($data))
                        @foreach($data as $val)
                        <tr class="row{{$val->id}}">
                            <td>{{$val->id}}</td>
                            <td>{{$val->customer_name}}</td>
                            <td>{{$val->customer_email}}</td>
                            <td>{{$val-> card_title}}</td>
                            <td>
                                @if(!empty($val->card_image) && file_exists( public_path().'/coin/'.$val->card_image))
                                <img src="{{asset('public/coin/'.$val->card_image)}}" alt="" height="60" width="60">
                                @endif
                            </td>
                            <td class="coupUpdate{{$val->id}}">{{$val-> coupon}}</td>
                            <td>{{$val-> card_price}}</td>
                            <td>{{ \CommonHelper::instance()->dateFormate($val->created_at) }}</td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#divID{{$val->id}}"><i class="fa flaticon-edit"></i></button>
                                <div id="divID{{$val->id}}" class="form-group m-form__group row collapse in">
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control m-input" name="coupon" id="coupon{{$val->id}}" placeholder="Enter Coupe">
                                        <button id="submitCoupeId{{$val->id}}" name="submitCoupe" data-id="{{$val->id}}" data-update="update" class="btn btn-success submitCoupe">Update</button>
                                    </div>
                                </div>
                                <!-- <i href="{{route('edit_coin', $val->id)}}" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Edit Coin Info" class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air"><i class="fa flaticon-edit"></i></a> -->

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