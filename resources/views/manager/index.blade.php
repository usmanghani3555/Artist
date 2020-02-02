@extends('layouts.app')
@section('content')
<?php use App\User; ?>
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
                                All Managers
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{ route('add_manager') }}" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
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
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Assign Artists</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($users))
                            @foreach($users as $user)
                                <tr class="row{{$user->id}}">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <?php
                                        if(!empty($user->assign_artists)){
                                        $myartis = User::whereIn('id',explode(',',$user->assign_artists))->get();
                                        if(!empty($myartis)){
                                        foreach ($myartis as $myarti) {
                                            echo $myarti->name;
                                            echo "<br>";
                                       }
                                       }
                                       }

                                        ?>
                                    </td>
                                    <td>
                                        <a href="{{route('edit_manager',$user->id)}}" target="_blank" class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                        <i class="fa flaticon-edit"></i>
                                        </a>

                                        {{--<a href="{{route('artist.view',$val->id)}}" target="_blank" class="btn btn-outline-success m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                            <i class="fa flaticon-eye"></i>
                                        </a>--}}
                                        <a href="javascript:void(0);" data-id="{{$user->id}}" target="_blank" class="btn manager_del btn-outline-danger m-btn m-btn--icon deluser btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                            <i class="fa flaticon-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        @else
                            <tr><td colspan="6">No Data</td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection