@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
   .table thead td a{
   color: #575962;	
   }
   .table thead th{
   font-weight:600;
   margin-left: 12px;
   display: block;
   border-bottom: none;
   padding: 15px 0px !important;
   }
   .table th, .table td{
   border-top: none;
   padding: 15px 0px !important;
   }
   table tr{
   border-bottom: 1px solid #f4f5f8;
   }
   .m-invoice-2 .m-invoice__wrapper .m-invoice__body.m-invoice__body--centered{
   width: 90% !important;
   }
   .table-responsive tr:nth-child(even){background-color: #f2f2f2;
   }
   .other-table .table td{
   width:52%;
   }
   .other-table{
   padding: 0px 0px 30px 0px;   
   }
   .m-portlet__head-caption{
   width:100%;
   }
   .table-responsive .table thead tr th i{
	margin-right:5px;   
   }
</style>
<?php use App\User;
use App\Links;
?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
   <!-- BEGIN: Subheader -->
   <!-- END: Subheader -->
   <div class="container-fluid m-content">
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
               <div class="row" style="width: 100%;">
                  <div class="col-sm-5">
                     <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                           All Links
                        </h3>
                     </div>
                  </div>
                  <div class="col-sm-7" style="padding-right: 0;">
                     @php $segments = \Request::segment(3);@endphp
                      @if(!empty($data))
                     <div class="d-flex justify-content-lg-end">
                        <a href="{{route('link.edit',$data->user_id)}}" class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                        <i class="fa flaticon-edit"></i>
                        </a>
                     </div>
                      @endif
                  </div>
               </div>
            </div>
            <div class="m-portlet__head-tools">
               <ul class="m-portlet__nav">
                  <li class="m-portlet__nav-item">
                     @if (auth()->user()->role == "admin" || auth()->user()->role == "manager" || auth()->user()->role == "artist")
                         @php $segments = \Request::segment(2);
                             if (!empty($segments)){
                         $tot = Links::where('user_id' ,$segments)->get();
                        if(!count($tot)> 0 ){
                         @endphp
                         <a href="{{route('link.create',$segments)}}" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
								<span>
									<i class="la la-plus"></i>

										</span>
                         </a>
                         @php } } @endphp
                     @endif

                  </li>
               </ul>
            </div>
         </div>
         @if(!empty($data))
         <div class="row">
            <div class="col-lg-12">
               <div class="m-portlet">
                  <div class="m-portlet__body m-portlet__body--no-padding">
                     <div class="m-invoice-2">
                        <div class="m-invoice__wrapper">
                           <div class="m-invoice__head" style="background-image: url(../../assets/app/media/img//logos/bg-6.jpg);">
                              <div class="m-invoice__container m-invoice__container--centered">
                              </div>
                           </div>
                           <div class="m-invoice__body m-invoice__body--centered">
                              <div class="table-responsive">
                                 <table class="table">
                                    <thead>
                                       <tr style="border-bottom: 0;">
                                          <th colspan="12" style="font-weight: bold;font-size: 17px;border-bottom: 0;margin-left: 0;text-decoration: underline;">Suggested Links</th>
                                       </tr>
                                       <tr>
                                          <th><i class="fa fa-bandcamp" aria-hidden="true"></i> Bandcamp</th>
                                          <td><a href="{{$data->bandcamp}}" target="_blank">{{$data->bandcamp}}</a></td>
                                       </tr>
                                       <tr>
                                          <th><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</th>
                                          <td><a href="{{$data->facebook}}" target="_blank">{{$data->facebook}}</a></td>
                                       </tr>
                                       <tr>
                                          <th><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</th>
                                          <td><a href="{{$data->instagram}}" target="_blank">{{$data->instagram}}</a></td>
                                       </tr>
                                       <tr>
                                          <th><i class="fa fa-soundcloud" aria-hidden="true"></i> SoundCloud</th>
                                          <td><a href="{{$data->soundcloud}}" target="_blank">{{$data->soundcloud}}</a></td>
                                       </tr>
                                       <tr>
                                          <th><i class="fa fa-spotify" aria-hidden="true"></i> Spotify</th>
                                          <td><a href="{{$data->spotify}}" target="_blank">{{$data->spotify}}</a></td>
                                       </tr>
                                       <tr>
                                          <th><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter</th>
                                          <td><a href="{{$data->twitter}}" target="_blank">{{$data->twitter}}</a></td>
                                       </tr>
                                       <tr>
                                          <th><i class="fa fa-youtube-square" aria-hidden="true"></i> Youtube</th>
                                          <td><a href="{{$data->youtube}}" target="_blank">{{$data->youtube}}</a></td>
                                       </tr>
                                       <tr>
                                          <th><i class="fa fa-apple" aria-hidden="true"></i> Apple</th>
                                          <td><a href="{{$data->apple}}" target="_blank">{{$data->apple}}</a></td>
                                       </tr>
                                       <tr>
                                          <th><i class="fa fa-play-circle" aria-hidden="true"></i> Featured Playlist</th>
                                          <td><a href="{{$data->featured_playlist}}" target="_blank">{{$data->featured_playlist}}</a></td>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                 </table>
                              </div>
                              <br>
                              <br>
                              <div class="table-responsive other-table">
                                 <table class="table">
                                    <thead>
                                       <tr style="border-bottom: 0;">
                                          <th colspan="2" style="font-weight: bold;font-size: 17px;border-bottom: 0;margin-left: 0;text-decoration: underline;">Other Links</th>
                                       </tr>
                                       @php
                                       $val = $data->other;
                                       $otherlnks = json_decode($val);
                                       $counts = count($otherlnks);
                                       @endphp
                                       <?php
                                          for($i=0;$i<$counts;$i++) {
                                              if($i == 0){
                                                  $key1 = !empty($otherlnks[$i]->key1)?$otherlnks[$i]->key1:"";
                                                  $value1 = !empty($otherlnks[$i]->value1)?$otherlnks[$i]->value1:"";
                                                  ?>
                                       <tr>
                                          <th>@php echo !empty($key1)?$key1:""; @endphp</th>
                                          <td><a href="@php echo !empty($value1)?$value1:""; @endphp" target="_blank">@php echo !empty($value1)?$value1:""; @endphp</a></td>
                                       </tr>
                                       <?php  }
                                          if($i == 1){
                                              $key2 = !empty($otherlnks[$i]->key2)?$otherlnks[$i]->key2:"";
                                              $value2 = !empty($otherlnks[$i]->value2)?$otherlnks[$i]->value2:"";?>
                                       <tr>
                                          <th>@php echo !empty($key2)?$key2:""; @endphp</th>
                                          <td><a href="@php echo !empty($value2)?$value2:""; @endphp" target="_blank">@php echo !empty($value2)?$value2:""; @endphp</a></td>
                                       </tr>
                                       <?php
                                          }if($i == 2){
                                              $key3 = !empty($otherlnks[$i]->key3)?$otherlnks[$i]->key3:"";
                                              $value3 = !empty($otherlnks[$i]->value3)?$otherlnks[$i]->value3:"";?>
                                       <tr>
                                          <th>@php echo !empty($key3)?$key3:""; @endphp</th>
                                          <td><a href="@php echo !empty($value3)?$value3:""; @endphp" target="_blank">@php echo !empty($value3)?$value3:""; @endphp</a></td>
                                       </tr>
                                       <?php
                                          }if($i == 3){
                                              $key4 = !empty($otherlnks[$i]->key4)?$otherlnks[$i]->key4:"";
                                              $value4 = !empty($otherlnks[$i]->value4)?$otherlnks[$i]->value4:"";?>
                                       <tr>
                                          <th>@php echo !empty($key4)?$key4:""; @endphp</a></th>
                                          <td><a href="@php echo !empty($value4)?$value4:""; @endphp" target="_blank">@php echo !empty($value4)?$value4:""; @endphp</a></td>
                                       </tr>
                                       <?php
                                          }
                                          }
                                          ?>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @else
         <div class="row">
            <h5 class="text-center" style="display: block;margin: auto;padding: 16px;">No Links to show.</h5>
         </div>
         @endif
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
   </div>
</div>
@endsection