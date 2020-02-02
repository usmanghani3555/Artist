@extends('layouts.app')
@section('content')
@if (auth()->user()->role == "admin")
<style>
   .counter {
   background-color:#fff;
   padding: 20px 0;
   border-radius: 5px;
   box-shadow: 0px 1px 15px 1px rgba(69, 65, 78, 0.08)
   }
   .count-title {
   font-size: 40px;
   font-weight: normal;
   margin-top: 10px;
   margin-bottom: 0;
   text-align: center;
   }
   .count-text {
   font-size: 13px;
   font-weight: normal;
   margin-top: 10px;
   margin-bottom: 0;
   text-align: center;
   }
   .fa-2x {
   margin: 0 auto;
   float: none;
   display: table;
   color: #4ad1e5;
   }
   .m-portlet{
   background-color:transparent;
   box-shadow:none;
   }
</style>
@endif
<div class="m-grid__item m-grid__item--fluid m-wrapper container">
   <div class="m-content">
   <div class="m-subheader ">
      @if (session('error') || session('success'))
      <div class="alert alert-success" role="alert">
         <strong>Well done!</strong> {{ session('error') ?? session('success') }}.
      </div>
      @endif

      <div class="d-flex align-items-center" style="margin-bottom: 20px;">
         <div class="mr-auto">
            <h1 class="m-subheader__title" style="padding: 0px 0;font-size: 2.55rem;">Welcome</h1>

            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
               <!--<li class="m-nav__item m-nav__item--home">
                  <a href="{{route('home')}}" class="m-nav__link m-nav__link--icon">
                  <i class="m-nav__link-icon la la-home"></i>
                  </a>
               </li>-->
               <li class="m-nav__item">
                  <a href="javascript:void(0);" class="m-nav__link" style="margin: 10px 0px 0px;">
                     @if (auth()->user()->role == "admin")
                     <h2>Admin</h2>
                     @elseif(auth()->user()->role == "artist")
                        <h2>Artist</h2>

                     @elseif(auth()->user()->role == "manager")
                        <h2>Manager</h2>
                     @endif
                  </a>
               </li>
            </ul>

         </div>
         <div class="m-demo__preview  m-demo__preview--btn"> @if (auth()->user()->role == "artist")
               <a href="{{route('upgradepack')}}"><button type="button" class="btn m-btn--square  m-btn m-btn--gradient-from-brand m-btn--gradient-to-info">Package Selection</button></a>
            @endif</div>
      </div>
   </div>

   @if (auth()->user()->role == "admin")
   <div class="m-content">
      <div class="m-portlet ">
         <div class="m-portlet__body  m-portlet__body--no-padding" >
            <div class="row m-row--no-padding m-row--col-separator-xl">
               <div class="row text-center" style="width:100%">
                  <div class="col-4">
                     <div class="counter">
                        <i class="fa fa-users fa-2x"></i>
                        <h2 class="timer count-title count-number" data-to="100"  data-speed="1500">{{$totalusers ? $totalusers : "0"}}</h2>
                        <p class="count-text ">Total Users</p>
                     </div>
                  </div>
                  <div class="col-4">
                     <div class="counter">
                        <i class="fa fa-briefcase fa-2x"></i>
                        <h2 class="timer count-title count-number" data-to="1700" data-speed="1500">{{$manusers ? $manusers : "0"}}</h2>
                        <p class="count-text ">Managers</p>
                     </div>
                  </div>
                  <div class="col-4">
                     <div class="counter">
                        <i class="fa fa-user-plus fa-2x"></i>
                        <h2 class="timer count-title count-number" data-to="11900" data-speed="1500">{{$artusers ? $artusers : "0"}}</h2>
                        <p class="count-text ">Artists</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


   @elseif (auth()->user()->role == "artist")
      <div class="m-portlet__body m-portlet__body--no-padding" style="background-color: #fff;">
         <div class="m-invoice-2">
            <div class="m-invoice__wrapper">
               <div class="m-invoice__head">
                  <a href="{{route('user.profile',auth()->user()->id)}}"
                     class="btn btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"
                     style="float: right;margin: 10px 29px;">
                     <i class="fa flaticon-edit"></i>
                  </a>
                  <div class="m-invoice__container m-invoice__container--centered">
                     <div class="m-invoice__logo" style="float: left;">
                        <a href="#">
                           <h1>{{$data->name}}</h1>
                        </a>
                        <a href="#">
                        </a>
                     </div>
                     <span class="m-invoice__desc" style="float: left;">
															<span>{{$data->email}}</span>
															<span>{{$data->mobile}}</span>
														</span>
                     <div class="m-invoice__items">
                     @if(!empty($data->admin_upgrage) || $data->admin_upgrage == "free_booking")
                     <div class="m-invoice__item">
                           <span class="m-invoice__subtitle">Payment Id</span>
                           <span class="m-invoice__text"></span>
                        </div>
                        <div class="m-invoice__item">
                           <span class="m-invoice__subtitle">Payer ID</span>
                           <span class="m-invoice__text"></span>
                        </div>
                        <div class="m-invoice__item">
                           <span class="m-invoice__subtitle">Instagram Name</span>
                           <span class="m-invoice__text"></span>
                        </div>
                        
                        @else
                        <div class="m-invoice__item">
                           <span class="m-invoice__subtitle">Payment Id</span>
                           <span class="m-invoice__text">{{$data->paymentId}}</span>
                        </div>
                        <div class="m-invoice__item">
                           <span class="m-invoice__subtitle">Payer ID</span>
                           <span class="m-invoice__text">{{$data->PayerID}}</span>
                        </div>
                        <div class="m-invoice__item">
                           <span class="m-invoice__subtitle">Instagram Name</span>
                           <span class="m-invoice__text">{{$data->insta_name}}</span>
                        </div>
                        @endif
                     </div>
                     @if(!empty($data->admin_upgrage))
                     <div class="m-invoice__items">
                        <div class="m-invoice__item">
                           <span class="m-invoice__subtitle">Booking Type</span>
                           <span class="m-invoice__text">{{$data->admin_upgrage}}</span>
                        </div>
                        <div class="m-invoice__item">
                           <span class="m-invoice__subtitle">Amount</span>
                           <span class="m-invoice__text">0</span>
                        </div>
                     @else
                     <div class="m-invoice__items">
                        <div class="m-invoice__item">
                           <span class="m-invoice__subtitle">Booking Type</span> 
                           <span class="m-invoice__text">{{$data->booking_type}}</span>
                        </div>  
                        <div class="m-invoice__item">
                           <span class="m-invoice__subtitle">Amount</span>
                           <span class="m-invoice__text">{{$data->amount}}</span>
                        </div>
                        @endif
                        <div class="m-invoice__item">
                           <span class="m-invoice__subtitle">Agent</span>
                           <span class="m-invoice__text">

                           @if(!empty($data->agent))
                              {{DB::table('users')->where('id',$data->agent)->first()->name}}
                         @else
                              {{$data->agent}}
                           @endif
                           </span>
                        </div>
                        
                     </div>
                  </div>
               </div>

            </div>
         </div>
      </div>
         <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
               <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                     <h3 class="m-portlet__head-text">
                        Registrations List
                     </h3>
                  </div>
               </div>
            </div>
            <div class="m-portlet__body">
               <!--begin: Datatable -->
               <table class="table table-striped- table-bordered table-hover table-checkable" id="">
                  <thead>
                  <tr style="background-color: #575962;color: #fff;">
                     <th>Payment Id</th>
                     <th>Registration Type</th>
                     <th>Amount</th>
                     <th>PayerID</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if(!empty($subs) && count($subs) > 0)
                     @foreach($subs as $val)
                        <tr>
                           <td>{{$val->paymentId}}</td>
                           <td>{{$val->booking_type}}</td>
                           <td>{{$val->amount}}</td>
                           <td>{{$val->PayerID}}</td>

                        </tr>
                     @endforeach

                  @else
                     <tr ><td colspan="6">No Data</td></tr>
                  @endif
                  </tbody>
               </table>
            </div>
         </div>

   @endif
</div>
</div>
@endsection