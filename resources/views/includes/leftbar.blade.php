<?php

use Illuminate\Support\Facades\URL; ?>
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
    <!-- Start: Left Aside -->
    <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
    <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
        <!-- BEGIN: Aside Menu -->
        <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
            <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                <li class="m-menu__item  m-menu__item--active" aria-haspopup="true"><a href="{{route('home')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Dashboard</span>
                                <span class="m-menu__link-badge"></span> </span></span></a>
                </li>
                <li class="m-menu__section ">
                    <h4 class="m-menu__section-text">Tasks</h4>
                    <i class="m-menu__section-icon flaticon-more-v2"></i>
                </li>
                {{--<li class="m-menu__item  m-menu__item"><a href="javascript:;" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-handshake"></i><span class="m-menu__link-text">Agreements</span><i
                                class=""></i></a>
                </li>--}}
                @if (auth()->user()->role == "admin")
                <li class="m-menu__item  m-menu__item"><a href="{{route('all_manager')}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-text">All Manager</span><i class=""></i></a>

                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('artist')}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-plus"></i><span class="m-menu__link-text">All Artists</span><i class=""></i></a>
                </li>

                @if (auth()->user()->role == "admin" && Route::currentRouteName() != 'myartist.view' && Route::currentRouteName() != 'artist' && Route::currentRouteName() != 'myartist.edit' && Route::currentRouteName() != 'link' && Route::currentRouteName() != 'member.index' && Route::currentRouteName() != 'accommodation.view' && Route::currentRouteName() != 'artist.add_biography' && Route::currentRouteName() != 'gallery.all' && Route::currentRouteName() != 'myartist' && Route::currentRouteName() != 'artist.contracts' && Route::currentRouteName() != 'artist.edit' && Route::currentRouteName() != 'gallery.create' && Route::currentRouteName() != 'member.create' && Route::currentRouteName() != 'link.edit' && Route::currentRouteName() != 'link.create' && Route::currentRouteName() != 'accommodation.view' && Route::currentRouteName() != 'accommodation.create' && Route::currentRouteName() != 'artist.add_contract' && Route::currentRouteName() != 'artist.edit_contract')

                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-gamepad"></i><span class="m-menu__link-text">Cash Back</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Game</span></span></li>

                            <li class="m-menu__item  m-menu__item"><a href="{{route('points')}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-coins"></i><span class="m-menu__link-text">Points</span><i class=""></i></a>
                            </li>
                            <li class="m-menu__item  m-menu__item"><a href="{{route('submissions')}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fas fa-tags"></i><span class="m-menu__link-text">Submissions</span><i class=""></i></a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                @php
                $segments = \Request::segment(3);
                //echo Route::currentRouteName();
                if (Route::currentRouteName() == 'myartist.view'
                || Route::currentRouteName() == 'member.index'
                || Route::currentRouteName() == 'artist.add_biography'
                || Route::currentRouteName() == 'artist.contracts'
                || Route::currentRouteName() == 'artist.add_contract'
                || Route::currentRouteName() == 'artist.edit_contract'
                || Route::currentRouteName() == 'link'
                || Route::currentRouteName() == 'gallery.all'
                || Route::currentRouteName() == 'artist.edit'
                || Route::currentRouteName() == 'gallery.create'
                || Route::currentRouteName() == 'member.create'
                || Route::currentRouteName() == 'link.edit'
                || Route::currentRouteName() == 'link.create'
                || Route::currentRouteName() == 'accommodation.view'
                || Route::currentRouteName() == 'accommodation.create') {

                $segments = collect(request()->segments())->last() ;
                //dd($segments);

                $userpak = DB::table('users')->where('id',$segments)->first();


                @endphp
                @if(!empty($userpak->admin_upgrage) && $userpak->admin_upgrage == "free_booking")

                <li class="m-menu__item  m-menu__item"><a href="{{route('link',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-link"></i><span class="m-menu__link-text">Media Links</span><i class=""></i></a>

                </li>
                <li class="m-menu__item  m-menu__item"><a href="javascript:void(0);" data-toggle="tooltip" title="Upgrade Package to use this feature!" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-text">Band Members</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-book"></i><span class="m-menu__link-text">Accommodation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-info"></i><span class="m-menu__link-text">Biography</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-university"></i><span class="m-menu__link-text">Compensation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-bus"></i><span class="m-menu__link-text">Tour</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-music"></i><span class="m-menu__link-text">Music / Video Tracks</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-handshake"></i><span class="m-menu__link-text">Contracts</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="javascript:void(0);" data-toggle="tooltip" title="Upgrade Package to use this feature!" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-image"></i><span class="m-menu__link-text">Gallery</span><i class=""></i></a>
                </li>

                @elseif(!empty($userpak) && $userpak->booking_type == "free_booking" && empty($userpak->admin_upgrage))

                <li class="m-menu__item  m-menu__item"><a href="{{route('link',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-link"></i><span class="m-menu__link-text">Media Links</span><i class=""></i></a>

                </li>
                <li class="m-menu__item  m-menu__item"><a href="javascript:void(0);" data-toggle="tooltip" title="Upgrade Package to use this feature!" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-text">Band Members</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-book"></i><span class="m-menu__link-text">Accommodation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-info"></i><span class="m-menu__link-text">Biography</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-university"></i><span class="m-menu__link-text">Compensation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-bus"></i><span class="m-menu__link-text">Tour</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-music"></i><span class="m-menu__link-text">Music / Video Tracks</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-handshake"></i><span class="m-menu__link-text">Contracts</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="javascript:void(0);" data-toggle="tooltip" title="Upgrade Package to use this feature!" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-image"></i><span class="m-menu__link-text">Gallery</span><i class=""></i></a>
                </li>

                @else

                <li class="m-menu__item  m-menu__item"><a href="{{route('link',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-link"></i><span class="m-menu__link-text">Media Links</span><i class=""></i></a>
                <li class="m-menu__item  m-menu__item"><a href="{{route('member.index',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-text">Band Members</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('accommodation.view',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-book"></i><span class="m-menu__link-text">Accommodation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('artist.add_biography',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-info"></i><span class="m-menu__link-text">Biography</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item">
                    <a href="#" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-university"></i><span class="m-menu__link-text">Compensation</span><i class=""></i>
                    </a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('artist.contracts',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-handshake"></i><span class="m-menu__link-text">Contracts</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('gallery.all',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-image"></i><span class="m-menu__link-text">Gallery</span><i class=""></i></a>
                </li>
                @endif
                @php
                }
                @endphp

                @elseif (auth()->user()->role == "artist" && auth()->user()->admin_upgrage != "free_booking" && auth()->user()->booking_type != "free_booking")
                <li class="m-menu__item  m-menu__item"><a href="{{route('link',auth()->user()->id)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-link"></i><span class="m-menu__link-text">Media Links</span><i class=""></i></a>

                </li>

                <li class="m-menu__item  m-menu__item"><a href="{{route('member.index')}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-text">Band Members</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('artist.add_biography',auth()->user()->id)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-info"></i><span class="m-menu__link-text">Biography</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="#" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-university"></i><span class="m-menu__link-text">Compensation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="#" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-bus"></i><span class="m-menu__link-text">Tour</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('accommodation.view',auth()->user()->id)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-bed"></i><span class="m-menu__link-text">Accommodation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="#" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-music"></i><span class="m-menu__link-text">Music / Video Tracks</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('artist.contracts',auth()->user()->id)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-handshake"></i><span class="m-menu__link-text">Contracts</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('gallery.all')}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-image"></i><span class="m-menu__link-text">Gallery</span><i class=""></i></a>
                </li>
                @elseif (auth()->user()->role == "artist" && auth()->user()->admin_upgrage != "free_booking" && auth()->user()->admin_upgrage != "" && auth()->user()->booking_type == "free_booking")
                <li class="m-menu__item  m-menu__item"><a href="{{route('link',auth()->user()->id)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-link"></i><span class="m-menu__link-text">Media Links</span><i class=""></i></a>

                </li>

                <li class="m-menu__item  m-menu__item"><a href="{{route('member.index')}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-text">Band Members</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('artist.add_biography',auth()->user()->id)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-info"></i><span class="m-menu__link-text">Biography</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="#" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-university"></i><span class="m-menu__link-text">Compensation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="#" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-bus"></i><span class="m-menu__link-text">Tour</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('accommodation.view',auth()->user()->id)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-bed"></i><span class="m-menu__link-text">Accommodation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="#" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-music"></i><span class="m-menu__link-text">Music / Video Tracks</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('artist.contracts',auth()->user()->id)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-handshake"></i><span class="m-menu__link-text">Contracts</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('gallery.all')}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-image"></i><span class="m-menu__link-text">Gallery</span><i class=""></i></a>
                </li>

                @elseif (auth()->user()->role == "artist" && auth()->user()->booking_type != "" && auth()->user()->admin_upgrage == "free_booking")

                <li class="m-menu__item  m-menu__item"><a href="{{route('link',auth()->user()->id)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-link"></i><span class="m-menu__link-text">Media Links</span><i class=""></i></a>

                </li>
                <li class="m-menu__item  m-menu__item"><a href="javascript:void(0);" data-toggle="tooltip" title="Upgrade Package to use this feature!" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-text">Band Members</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-book"></i><span class="m-menu__link-text">Accommodation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-info"></i><span class="m-menu__link-text">Biography</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-university"></i><span class="m-menu__link-text">Compensation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-bus"></i><span class="m-menu__link-text">Tour</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-music"></i><span class="m-menu__link-text">Music / Video Tracks</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-handshake"></i><span class="m-menu__link-text">Contracts</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="javascript:void(0);" data-toggle="tooltip" title="Upgrade Package to use this feature!" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-image"></i><span class="m-menu__link-text">Gallery</span><i class=""></i></a>
                </li>
                @elseif (auth()->user()->role == "artist" && auth()->user()->booking_type == "" && auth()->user()->admin_upgrage == "free_booking")

                <li class="m-menu__item  m-menu__item"><a href="{{route('link',auth()->user()->id)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-link"></i><span class="m-menu__link-text">Media Links</span><i class=""></i></a>

                </li>
                <li class="m-menu__item  m-menu__item"><a href="javascript:void(0);" data-toggle="tooltip" title="Upgrade Package to use this feature!" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-text">Band Members</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-book"></i><span class="m-menu__link-text">Accommodation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-info"></i><span class="m-menu__link-text">Biography</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-university"></i><span class="m-menu__link-text">Compensation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-bus"></i><span class="m-menu__link-text">Tour</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-music"></i><span class="m-menu__link-text">Music / Video Tracks</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-handshake"></i><span class="m-menu__link-text">Contracts</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="javascript:void(0);" data-toggle="tooltip" title="Upgrade Package to use this feature!" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-image"></i><span class="m-menu__link-text">Gallery</span><i class=""></i></a>
                </li>
                @elseif (auth()->user()->role == "artist" && auth()->user()->admin_upgrage == "" && auth()->user()->booking_type == "free_booking")

                <li class="m-menu__item  m-menu__item"><a href="{{route('link',auth()->user()->id)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-link"></i><span class="m-menu__link-text">Media Links</span><i class=""></i></a>

                </li>
                <li class="m-menu__item  m-menu__item"><a href="javascript:void(0);" data-toggle="tooltip" title="Upgrade Package to use this feature!" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-text">Band Members</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-book"></i><span class="m-menu__link-text">Accommodation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-info"></i><span class="m-menu__link-text">Biography</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-university"></i><span class="m-menu__link-text">Compensation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-bus"></i><span class="m-menu__link-text">Tour</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-music"></i><span class="m-menu__link-text">Music / Video Tracks</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-handshake"></i><span class="m-menu__link-text">Contracts</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="javascript:void(0);" data-toggle="tooltip" title="Upgrade Package to use this feature!" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-image"></i><span class="m-menu__link-text">Gallery</span><i class=""></i></a>
                </li>
                @elseif (auth()->user()->role == "manager")
                <li class="m-menu__item  m-menu__item"><a href="{{route('myartist')}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-plus"></i><span class="m-menu__link-text">My Artists</span><i class=""></i></a>
                </li>
                @php $segments = \Request::segment(3);
                //echo Route::currentRouteName();
                if (Route::currentRouteName() == 'myartist.view'
                || Route::currentRouteName() == 'member.index'
                || Route::currentRouteName() == 'artist.add_biography'
                || Route::currentRouteName() == 'artist.contracts'
                || Route::currentRouteName() == 'artist.add_contract'
                || Route::currentRouteName() == 'artist.edit_contract'
                || Route::currentRouteName() == 'link'
                || Route::currentRouteName() == 'gallery.all'
                || Route::currentRouteName() == 'artist.edit'
                || Route::currentRouteName() == 'gallery.create'
                || Route::currentRouteName() == 'member.create'
                || Route::currentRouteName() == 'link.edit'
                || Route::currentRouteName() == 'link.create'
                || Route::currentRouteName() == 'accommodation.view'
                || Route::currentRouteName() == 'accommodation.create') {

                $segments = collect(request()->segments())->last();
                @endphp
                @php

                $userpak = DB::table('users')->where('id',$segments)->first();

                @endphp
                @if ( !empty($userpak->admin_upgrage) && $userpak->admin_upgrage == "free_booking")

                <li class="m-menu__item  m-menu__item"><a href="{{route('link',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-link"></i><span class="m-menu__link-text">Media Links</span><i class=""></i></a>

                </li>
                <li class="m-menu__item  m-menu__item"><a href="javascript:void(0);" data-toggle="tooltip" title="Upgrade Package to use this feature!" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-text">Band Members</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-book"></i><span class="m-menu__link-text">Accommodation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-info"></i><span class="m-menu__link-text">Biography</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-university"></i><span class="m-menu__link-text">Compensation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-bus"></i><span class="m-menu__link-text">Tour</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-music"></i><span class="m-menu__link-text">Music / Video Tracks</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-handshake"></i><span class="m-menu__link-text">Contracts</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="javascript:void(0);" data-toggle="tooltip" title="Upgrade Package to use this feature!" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-image"></i><span class="m-menu__link-text">Gallery</span><i class=""></i></a>
                </li>
                @elseif (!empty($userpak) && $userpak->booking_type == "free_booking" && empty($userpak->admin_upgrage))

                <li class="m-menu__item  m-menu__item"><a href="{{route('link',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-link"></i><span class="m-menu__link-text">Media Links</span><i class=""></i></a>

                </li>
                <li class="m-menu__item  m-menu__item"><a href="javascript:void(0);" data-toggle="tooltip" title="Upgrade Package to use this feature!" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-text">Band Members</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-book"></i><span class="m-menu__link-text">Accommodation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-info"></i><span class="m-menu__link-text">Biography</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-university"></i><span class="m-menu__link-text">Compensation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-bus"></i><span class="m-menu__link-text">Tour</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-music"></i><span class="m-menu__link-text">Music / Video Tracks</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a data-toggle="tooltip" title="Upgrade Package to use this feature!" href="javascript:void(0);" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-handshake"></i><span class="m-menu__link-text">Contracts</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="javascript:void(0);" data-toggle="tooltip" title="Upgrade Package to use this feature!" class="m-menu__link m-menu" style="cursor: no-drop;"><i class="m-menu__link-icon fa fa-image"></i><span class="m-menu__link-text">Gallery</span><i class=""></i></a>
                </li>
                @else
                <li class="m-menu__item  m-menu__item"><a href="{{route('link',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-link"></i><span class="m-menu__link-text">Media Links</span><i class=""></i></a>

                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('member.index',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-text">Band Members</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('accommodation.view',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-bed"></i><span class="m-menu__link-text">Accommodation</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('artist.add_biography',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-info"></i><span class="m-menu__link-text">Biography</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('artist.contracts',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-handshake"></i><span class="m-menu__link-text">Contracts</span><i class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="{{route('gallery.all',$segments)}}" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-image"></i><span class="m-menu__link-text">Gallery</span><i class=""></i></a>
                </li>
                @endif
                @php
                }
                @endphp
                @endif
            </ul>
        </div>
        <!-- END: Aside Menu -->
    </div>
    <!-- END: Left Aside -->