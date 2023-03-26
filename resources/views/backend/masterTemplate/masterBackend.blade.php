<!DOCTYPE html>
<html lang="en">
@php
    $setting = App\Models\Backend\Setting::first();
@endphp
<head>

    <!--=================CSS_&_METATAGS START======================-->
    @include('backend.includes._css_backend')
    <!--=================CSS_&_METATAGS END======================-->
</head>

<body>
    <!--=================LEFT SIDEBAR START======================-->
    @include('backend.includes._leftSideBar_backend')
    <!--=================LEFT SIDEBAR END======================-->

    <!--=================TOP HEADER START======================-->
    @include('backend.includes._topHeader_backend')
    <!--=================TOP HEADER END======================-->

    <!--=================RIGHT SIDEBAR START======================-->
    @include('backend.includes._rightSidebar_backend')
    <!--=================RIGHT SIDEBAR END======================-->

    <div class="br-mainpanel">

        <!--=================MAIN CONTENT START======================-->
        @yield('maincontent')
        <!--=================MAIN CONTENT END======================-->

        <!--=================FOOTER START======================-->
        {{-- @include('backend.includes._footer_backend') --}}
        <!--=================FOOTER END======================-->

    </div>

    <!--=================JAVSCRIPT START======================-->
    @include('backend.includes._script_backend')
    <!--=================JAVSCRIPT END======================-->
</body>

</html>
