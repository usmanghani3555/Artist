<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ABMS- Artist Booking Management System</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" />
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });

    </script>
    <!--end::Web font -->
    <!--begin::Global Theme Styles -->
    <link href="{{ asset('public/theme/assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/css/mystyle.css') }}" rel="stylesheet" type="text/css" />
    <!--RTL version:<link href="assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <link href="{{ asset('public/theme/assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/theme/assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--RTL version:<link href="assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <!--end::Global Theme Styles -->
    <!--begin::Page Vendors Styles -->
    <!--RTL version:<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <!--end::Page Vendors Styles -->
{{--
    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
--}}
</head>
{{--<head>--}}
{{--<meta charset="utf-8">--}}
{{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--<!-- CSRF Token -->--}}
{{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--<title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--<!-- Scripts -->--}}
{{--<script src="{{ asset('public/js/app.js') }}" defer></script>--}}

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}

{{--<!-- Fonts -->--}}
{{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

{{--<!-- Styles -->--}}
{{--<link href="{{ asset('public/css/app.css') }}" rel="stylesheet">--}}
{{--<link href="{{ asset('public/css/mystyle.css') }}" rel="stylesheet">--}}

{{--</head>--}}
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
@if (!Auth::guest())
@include('includes.header')
@include('includes.leftbar')
@yield('content')
@include('includes.footer')
@include('includes.footer-scripts')
@else
    @yield('content')

@endif
{{--
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
--}}
<script>
    $(document).ready(function () {

        $('input[name=booking]').change(function(){
            var radioValue = $("input[name='booking']:checked").val();

            if(radioValue == "free_booking"){

                $(".amount").text('Free Registration (Email Blast Only) $00.00');
                $(".amn").text('$0');
                $(".hidamount").val('0');

            }if(radioValue == "vip_booking"){

                $(".amount").text('(USA) VIP Booking Registration (General Support) $99.00');
                $(".amn").text('$99');
                $(".hidamount").val('99');

            }if(radioValue == "elite_booking"){
                $(".amount").text('(USA) Elite Booking Registration (Assigned Agent) $235.00');
                $(".amn").text('$235.00');
                $(".hidamount").val('235');

            }if(radioValue == "intl_booking"){
                $(".amount").text('(INTL) Booking Registration (Visa, Passport Prep) $199.00');
                $(".amn").text('$199.00');
                $(".hidamount").val('199');


            }if(radioValue == "llc_booking"){

                $(".amount").text('Business Registration (LLC | Label Prep, CPA, Attorney) $299.00');
                $(".amn").text('$299.00');
                $(".hidamount").val('299');

            }
            if(radioValue == "tap2020"){

                $(".amount").text('Tap2020 $200.00');
                $(".amn").text('$200.00');
                $(".hidamount").val('200');

                }
        });
        var radioValue = $("input[name='booking']:checked").val();

        if(radioValue == "free_booking"){

            $(".amount").text('Free Registration (Email Blast Only) $00.00');
            $(".amn").text('$0');
            $(".hidamount").val('0');

        }if(radioValue == "vip_booking"){

            $(".amount").text('(USA) VIP Booking Registration (General Support) $99.00');
            $(".amn").text('$99');
            $(".hidamount").val('99');

        }if(radioValue == "elite_booking"){
            $(".amount").text('(USA) Elite Booking Registration (Assigned Agent) $235.00');
            $(".amn").text('$235.00');
            $(".hidamount").val('235');

        }if(radioValue == "intl_booking"){
            $(".amount").text('(INTL) Booking Registration (Visa, Passport Prep) $199.00');
            $(".amn").text('$199.00');
            $(".hidamount").val('199');


        }if(radioValue == "llc_booking"){

            $(".amount").text('Business Registration (LLC | Label Prep, CPA, Attorney) $299.00');
            $(".amn").text('$299.00');
            $(".hidamount").val('299');

        }
        if(radioValue == "tap2020"){

            $(".amount").text('Tap2020 $200.00');
            $(".amn").text('$200.00');
            $(".hidamount").val('200');

            }
    });


</script>
</body>
</html>
