<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<!-- jquery csrf -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title')</title>
<link rel="shortcut icon" href="{{ asset('frontend') }}/images/logo/favourite_icon_1.png">

<!-- fraimwork - css include -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/bootstrap.min.css">

<!-- icon font - css include -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/fontawesome.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/stroke-gap-icons.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/icofont.css">

<!-- animation - css include -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/animate.css">

<!-- carousel - css include -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/slick.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/slick-theme.css">

<!-- popup - css include -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/magnific-popup.css">

<!-- jquery-ui - css include -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/jquery-ui.css">

<!-- select option - css include -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/nice-select.css">

@if (Route::currentRouteName() == 'web.checkout')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/woocommerce-2.css">    
@else
<!-- woocommercen - css include -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/woocommerce.css">
@endif



<!-- toster-->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- custom - css include -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/style.css">
