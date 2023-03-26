<!doctype html>
<html lang="en">

<head>
    {{-- css  --}}
    @include('frontend.includes.css')
</head>

<body>
    <div class="body_wrap">
        @php
        $setting = App\Models\Backend\Setting::first();
        @endphp
        <!-- backtotop - start -->
        <div class="backtotop">
            <a href="#" class="scroll">
                <i class="far fa-arrow-up"></i>
            </a>
        </div>

        {{-- header  --}}
        @include('frontend.includes.header')
        <main>
            {{-- sidebar cart  --}}
            @include('frontend.includes.sidebar_cart')
            @yield('body')
            {{-- news later  --}}
            @include('frontend.includes.newslater')
        </main>
        {{-- footer  --}}
        @include('frontend.includes.footer')
    </div>
    {{-- scripts  --}}
    @include('frontend.includes.scripts')
</body>

</html>
