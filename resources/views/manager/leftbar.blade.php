<?php use Illuminate\Support\Facades\URL; ?>
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
    <!-- Start: Left Aside -->
    <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
                class="la la-close"></i></button>
    <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
        <!-- BEGIN: Aside Menu -->
        <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
             m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
            <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                <li class="m-menu__item  m-menu__item--active" aria-haspopup="true"><a href="{{route('home')}}"
                                                                                       class="m-menu__link "><i
                                class="m-menu__link-icon flaticon-line-graph"></i><span
                                class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span
                                        class="m-menu__link-text">Dashboard</span>
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
                    <li class="m-menu__item  m-menu__item"><a href="{{route('all_manager')}}"
                                                              class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-text">All Manager</span><i
                                    class=""></i></a>

                    </li>
                    <li class="m-menu__item  m-menu__item"><a href="{{route('artist')}}" class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-plus"></i><span
                                    class="m-menu__link-text">All Artists</span><i
                    </li>
                    @php $segments = \Request::segment(3);
                       //echo Route::currentRouteName();
                        if (Route::currentRouteName() == 'myartist.view' || Route::currentRouteName() == 'member.index'
                        || Route::currentRouteName() == 'artist.add_biography'|| Route::currentRouteName() == 'link'
                        || Route::currentRouteName() == 'gallery.all'|| Route::currentRouteName() == 'artist.edit'
                        || Route::currentRouteName() == 'gallery.create'|| Route::currentRouteName() == 'member.create'
                        || Route::currentRouteName() == 'link.edit'|| Route::currentRouteName() == 'link.create') {                                    class=""></i></a>


                          $segments = \Request::segment(2);
                        }
                    @endphp
                    <li class="m-menu__item  m-menu__item"><a href="{{route('link',$segments)}}" class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-link"></i><span
                                    class="m-menu__link-text">Media Links</span><i
                                    class=""></i></a>

                    </li>
                    <li class="m-menu__item  m-menu__item"><a href="{{route('member.index',$segments)}}"
                                                              if (Route::currentRouteName() == 'myartist.view'){
                        $segments = \Request::segment(3);
                        }else{
                                                              class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-users"></i><span
                                    class="m-menu__link-text">Band Members</span><i
                                    class=""></i></a>
                    </li>
                    <li class="m-menu__item  m-menu__item"><a
                                href="{{route('artist.add_biography',$segments)}}" class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-info"></i><span
                                    class="m-menu__link-text">Biography</span><i
                                    class=""></i></a>
                    </li>
                    <li class="m-menu__item  m-menu__item"><a href="{{route('gallery.all',$segments)}}"
                                                              class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-image"></i><span
                                    class="m-menu__link-text">Gallery</span><i
                                    class=""></i></a>
                    </li>
                    @php
                        }
                    @endphp
                @elseif (auth()->user()->role == "artist")
                    <li class="m-menu__item  m-menu__item"><a href="{{route('link',auth()->user()->id)}}" class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-link"></i><span
                                    class="m-menu__link-text">Media Links</span><i
                                    class=""></i></a>

                    </li>

                    <li class="m-menu__item  m-menu__item"><a href="{{route('member.index')}}"
                                                              class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-users"></i><span
                                    class="m-menu__link-text">Band Members</span><i
                                    class=""></i></a>
                    </li>
                    <li class="m-menu__item  m-menu__item"><a
                                href="{{route('artist.add_biography',auth()->user()->id)}}" class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-info"></i><span
                                    class="m-menu__link-text">Biography</span><i
                                    class=""></i></a>
                    </li>
                    <li class="m-menu__item  m-menu__item"><a
                                href="#" class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-university"></i><span
                                    class="m-menu__link-text">Compensation</span><i
                                    class=""></i></a>
                    </li>
                    <li class="m-menu__item  m-menu__item"><a
                                href="#" class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-plane"></i><span
                                    class="m-menu__link-text">Tour</span><i
                                    class=""></i></a>
                    </li>
                    <li class="m-menu__item  m-menu__item"><a
                                href="#" class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-music"></i><span
                                    class="m-menu__link-text">Music Tracks</span><i
                                    class=""></i></a>
                    </li>
                    <li class="m-menu__item  m-menu__item"><a href="{{route('gallery.all')}}"
                                                              class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-image"></i><span
                                    class="m-menu__link-text">Gallery</span><i
                                    class=""></i></a>
                    </li>
                @elseif (auth()->user()->role == "manager")
                    <li class="m-menu__item  m-menu__item"><a href="{{route('myartist')}}"
                                                              class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-plus"></i><span
                                    class="m-menu__link-text">My Artists</span><i
                                    class=""></i></a>
                    </li>
                    @php $segments = \Request::segment(3);
                       //echo Route::currentRouteName();
                        if (Route::currentRouteName() == 'myartist.view' || Route::currentRouteName() == 'member.index'
                        || Route::currentRouteName() == 'artist.add_biography'|| Route::currentRouteName() == 'link'
                        || Route::currentRouteName() == 'gallery.all'|| Route::currentRouteName() == 'artist.edit'
                        || Route::currentRouteName() == 'gallery.create'|| Route::currentRouteName() == 'member.create'
                        || Route::currentRouteName() == 'link.edit'|| Route::currentRouteName() == 'link.create') {

                        if (Route::currentRouteName() == 'myartist.view'){
                    $segments = \Request::segment(3);
                        }else{
                          $segments = \Request::segment(2);
                        }
                    @endphp
                    <li class="m-menu__item  m-menu__item"><a href="{{route('link',$segments)}}" class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-link"></i><span
                                    class="m-menu__link-text">Media Links</span><i
                                    class=""></i></a>

                    </li>
                    <li class="m-menu__item  m-menu__item"><a href="{{route('member.index',$segments)}}"
                                                              class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-users"></i><span
                                    class="m-menu__link-text">Band Members</span><i
                                    class=""></i></a>
                    </li>
                    <li class="m-menu__item  m-menu__item"><a
                                href="{{route('artist.add_biography',$segments)}}" class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-info"></i><span
                                    class="m-menu__link-text">Biography</span><i
                                    class=""></i></a>
                    </li>
                    <li class="m-menu__item  m-menu__item"><a href="{{route('gallery.all',$segments)}}"
                                                              class="m-menu__link m-menu"><i
                                    class="m-menu__link-icon fa fa-image"></i><span
                                    class="m-menu__link-text">Gallery</span><i
                                    class=""></i></a>
                    </li>
                    @php
                        }
                    @endphp
                @endif
                {{--<li class="m-menu__item  m-menu__item"><a href="javascript:;" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-hotel"></i><span class="m-menu__link-text">Hotel Booking</span><i
                                class=""></i></a>
                </li>
                <li class="m-menu__item  m-menu__item"><a href="javascript:;" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-music"></i><span class="m-menu__link-text">Songs/Music Video</span><i
                                class=""></i></a>
                </li>--}}
                {{--<li class="m-menu__item  m-menu__item"><a href="javascript:;" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-info"></i><span class="m-menu__link-text">Artist Biography</span><i
                               class=""></i></a>
               {{--</li>
               <li class="m-menu__item  m-menu__item"><a href="javascript:;" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-images"></i><span class="m-menu__link-text">Pictures</span><i
                               class=""></i></a>
               </li>
               <li class="m-menu__item  m-menu__item"><a href="javascript:;" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-wifi"></i><span class="m-menu__link-text">Professional Connections</span><i
                               class=""></i></a>
               </li>
               <li class="m-menu__item  m-menu__item"><a href="javascript:;" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-link"></i><span class="m-menu__link-text">Links</span><i
                               class=""></i></a>
               </li>
               <li class="m-menu__item  m-menu__item"><a href="javascript:;" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-file-contract"></i><span class="m-menu__link-text">Contacts</span><i
                               class=""></i></a>
               </li>
               <li class="m-menu__item  m-menu__item"><a href="javascript:;" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-industry"></i><span class="m-menu__link-text">Production</span><i
                               class=""></i></a>
               </li>
               <li class="m-menu__item  m-menu__item"><a href="javascript:;" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-money"></i><span class="m-menu__link-text">Compensation</span><i
                               class=""></i></a>
               </li>
               <li class="m-menu__item  m-menu__item"><a href="javascript:;" class="m-menu__link m-menu"><i class="m-menu__link-icon fa fa-meetup"></i><span class="m-menu__link-text">Conference</span><i
                               class=""></i></a>
               </li>
               <li class="m-menu__item  m-menu__item"><a href="javascript:;" class="m-menu__link m-menu"><i class="m-menu__link-icon flaticon-layers"></i><span class="m-menu__link-text">Artist Info/Resources</span><i
                               class=""></i></a>
               </li>--}}
            </ul>
        </div>
        <!-- END: Aside Menu -->
    </div>
    <!-- END: Left Aside -->
