<div class="m-grid m-grid--hor m-grid--root m-page">
    <!-- Start: Header-->
    <header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
        <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">
                <!-- BEGIN: Brand -->
                <div class="m-stack__item m-brand  m-brand--skin-dark ">
                    <div class="m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo" style="width: 60%;"><a href="#" class="m-brand__logo-wrapper">{{--
                                <img alt=""
                                     src="public/theme/assets/demo/default/media/img/logo/logo_default_dark.png"/>--}}
                                <p><strong style="font-size: 13px;">ABMS</strong><br>Artist Booking Management System</p>
                            </a></div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">
                            <!-- BEGIN: Left Aside Minimize Toggle --> <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                                <span></span> </a> <!-- END -->
                            <!-- BEGIN: Responsive Aside Left Menu Toggler --> <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                <span></span> </a> <!-- END -->
                            <!-- BEGIN: Responsive Header Menu Toggler -->
                            <span></span> </a> <!-- END -->
                            <!-- BEGIN: Topbar Toggler --> <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                <i class="flaticon-more"></i> </a> <!-- BEGIN: Topbar Toggler -->
                        </div>
                    </div>
                </div> <!-- END: Brand -->
                <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                    <!-- BEGIN: Horizontal Menu -->
                    <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                    <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
                        <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                            <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
                                <a href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link">
                                    <span class="m-menu__link-title"> <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text">
                                                @if (auth()->user()->role == "admin")
                                                @php
                                                //echo Route::currentRouteName();
                                                if (Route::currentRouteName() == 'myartist.view' || Route::currentRouteName() == 'member.index'
                                                || Route::currentRouteName() == 'artist.add_biography'|| Route::currentRouteName() == 'link'
                                                || Route::currentRouteName() == 'gallery.all'|| Route::currentRouteName() == 'artist.edit'
                                                || Route::currentRouteName() == 'gallery.create'|| Route::currentRouteName() == 'member.create'
                                                || Route::currentRouteName() == 'link.edit'|| Route::currentRouteName() == 'link.create'
                                                || Route::currentRouteName() == 'acomodation.view'|| Route::currentRouteName() == 'acomodation.create' ) {

                                                $segments = collect(request()->segments())->last();
                                                @endphp

                                                {{DB::table('users')->where('id',$segments)->first()->name}}

                                                @php }@endphp
                                                @endif


                                            </span> <span class="m-menu__link-badge"></span>
                                        </span></span></a>

                            </li>

                        </ul>
                    </div>
                    @can('artist-only',auth()->user())
                    <a href="{{route('gamification')}}" class="btn m-btn--square m-btn m-btn--gradient-from-brand m-btn--gradient-to-info game-lobby"><i class="fas fa-coins"> </i> Points Lobby</a>
                    @endcan
                    <!-- BEGIN: Topbar -->
                    <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
                        <div class="m-stack__item m-topbar__nav-wrapper" id="notificationDiv">
                            <ul class="m-topbar__nav m-nav m-nav--inline">

                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                    @cannot('manager',auth()->user())
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
                                        <span class="m-topbar__userpic">
                                            <i class="fa fa-bell"> {{ \NotificationHelper::instance()->count_notification() }}</i>
                                            <span class="notify"></span>
                                            <span class="heartbeat"></span>
                                        </span>
                                    </a>
                                    @endcan
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner m-dropdown__inner-notificaion">
                                            <div class="external">
                                                <h3><span class="bold">Notifications</span></h3>
                                                <!-- <span class="notification-label purple-bgcolor">New 288</span> -->
                                            </div>
                                            <div class="m-dropdown__body m-dropdown__body-notificaion">
                                                <div class="m-dropdown__content">
                                                    <ul class="notification-list">
                                                        @php
                                                        // get all user notifications
                                                        $notifications = \NotificationHelper::instance()->notifications();
                                                        @endphp
                                                        @if (count($notifications))
                                                        @foreach ($notifications as $notify)
                                                        <li class="notification-message" data-id="{{$notify->id}}">
                                                            <a href="">
                                                                <div class="media">
                                                                    <div class="media-body">
                                                                        <span class="notification-icon circle">
                                                                            @if(!empty($notify->photo) && file_exists( public_path().'/img/'.$notify->photo))
                                                                            <img src="{{asset('public/img/'.$notify->photo)}}" height="40" class="m--img-rounded m--marginless" alt="User profile">
                                                                            @else
                                                                            <img src="{{asset('public/theme/assets/app/media/img/users/user4.jpg')}}" height="40" class="m--img-rounded m--marginless" alt="User profile" />
                                                                            @endif
                                                                        </span>
                                                                        <p class="noti-details">
                                                                            <span class="noti-title">{{$notify->notificaion}}</span></p>
                                                                        <b>{{ \NotificationHelper::instance()->get_time_ago($notify->created_at) }}</b>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                        @else
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <center>
                                                                    <p class="noti-details">No Notification Yet!</p>
                                                                </center>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click"><a href="#" class="m-nav__link m-dropdown__toggle">

                                        <span class="m-topbar__userpic">
                                            @can('artist-only',auth()->user())
                                            <div class="coin_count">
                                                <img src="{{asset('public/theme/assets/app/media/img/users/coins.gif')}}" class="m--img-rounded m--marginless" alt="" />
                                                <span>{{ Auth::user()->coins ?? '0'}}</span>
                                            </div>
                                            @endcan
                                        </span>

                                        <span class="m-topbar__userpic">
                                            @if(!empty(Auth::user()->photo))
                                            <img src="{{url('public/img/'.Auth::user()->photo)}}" height="40" class="m--img-rounded m--marginless" alt="">
                                            @else
                                            <img src="{{asset('public/theme/assets/app/media/img/users/user4.jpg')}}" class="m--img-rounded m--marginless" alt="" />
                                            @endif
                                        </span>
                                        <span class="m-topbar__username m--hide">Nick</span> </a>
                                    <div class="m-dropdown__wrapper"><span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center">
                                                <div class="m-card-user m-card-user--skin-dark">
                                                    <div class="m-card-user__pic">
                                                        @if(!empty(Auth::user()->photo))
                                                        <img src="{{url('public/img/'.Auth::user()->photo)}}" height="40" width="40" class="m--img-rounded m--marginless" alt="">
                                                        @else
                                                        <img src="{{asset('public/theme/assets/app/media/img/users/user4.jpg')}}" class="m--img-rounded m--marginless" alt="" />

                                                        @endif

                                                        <!--                                                       <span class="m-type m-type--lg m--bg-danger"><span class="m--font-light">S<span><span>                                                       -->
                                                    </div>
                                                    <div class="m-card-user__details"><span class="m-card-user__name m--font-weight-500">{{ Auth::user()->name }} </span>
                                                        <a href="" class="m-card-user__email m--font-weight-300 m-link">{{
                                                            Auth::user()->email }} </a></div>
                                                </div>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav m-nav--skin-light">
                                                        <li class="m-nav__section m--hide"><span class="m-nav__section-text">Section</span></li>
                                                        <li class="m-nav__item">
                                                            <a href="{{route('user.profile',auth()->user()->id)}}" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                <span class="m-nav__link-title">
                                                                    <span class="m-nav__link-wrap">
                                                                        <span class="m-nav__link-text">My Profile</span>
                                                                        <span class="m-nav__link-badge"></span>
                                                                    </span>
                                                                </span>
                                                            </a></li>
                                                        <li class="m-nav__separator m-nav__separator--fit"></li>
                                                        <li class="m-nav__item"><a href="{{ route('logout') }}" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" onclick="event.preventDefault();                                                     document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }} </a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- END: Topbar -->
                </div>
            </div>
        </div>
    </header><!-- END: Header -->